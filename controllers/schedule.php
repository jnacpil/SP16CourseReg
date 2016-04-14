<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {
		
	public function __construct() {
		parent :: __construct();
		//load encryption
		$this->load->library('encrypt');
		//load session
		$this->load->library('session');
		//load models
		$this->load->model('schedule_model');
		//load helper
		$this->load->helper('url');
		//load unit_test
		$this->load->library('unit_test');

	}
		
	public function home() {
		//logged in check
		$valid = $this->session->userdata('userInfoObject');
		if (!$valid) {
			redirect('/login/initialize');
		}
		else {
			//put any data into data array for view
			$data['title'] = "University Registration System";
			
			//get user information
			//$usernameArray = array ('username' => $valid);
			//$result = $this->schedule_model->getPersonalInfo($usernameArray);
			//print_r($valid);
			
			//get current schedule
			$id = $valid['user_id'];
			$accessLevel = $valid['access_id'];
			$result = $this->schedule_model->getCurrentSched($id,$accessLevel);
			//print_r($result);
			
			$data['userInfo'] = $valid;
			$data['courseInfo'] = $result;
			
			if($accessLevel == 10) {
				//load views
				$this->load->view('templates/header', $data);
				$this->load->view('schedule_page',$data);
				$this->load->view('templates/footer', $data);
			}
			else if($accessLevel == 20) {
				$this->load->view('templates/header', $data);
				$this->load->view('instructor_page',$data);
				$this->load->view('templates/footer', $data);
			}
			//	COMMENT OUT ABOVE
			// DELETE EVENTUALLY
			// will use username from session array to call to
			// schedule_model to get user info
			// then based on access level go to a function in next line
			// will make calls to Student(), Professor(), etc. for specific homepage
			// within the function make specific logic calls to model
			// get course to student stuff, get course info to display a scedule
			// get student info if student,
			// get professor info if professor, etc.
			// same view file, just different display data
			//buttons for dropping 
		}
	}
		
	public function drop() {
		$sectID = $this->input->post('cour');
		$userID = $this->input->post('use');
		$this->schedule_model->dropCourse($userID,$sectID);
		redirect('schedule/home');
	}
	
	public function add() {
		$sectID = $this->input->post('cour');
		$userID = $this->input->post('use');
		echo "HERHERHE".$sectID." suer:  ".$userID;
		$this->schedule_model->addCourse($userID,$sectID);
		redirect('schedule/home');
	}
	
		
	function testing()
	{
	$valid = $this->session->userdata('userInfoObject');
	$data['userInfo'] = $valid;
	
	// $test = $valid['user_firstName'];
// 	
// 	$expected_result = "Patrick";
// 	
// 	$test_name = 'Test getFirstName method';
// 	
// 	echo $this->unit->run($test, $expected_result, $test_name);
// 	
	$testArray = Array
	(
	Array($valid['user_firstName'], "Patrick", "Test getFirstName method"),
	Array($valid['user_lastName'], "Navarro", "Test getLastName method"),
	Array($valid['user_accessLevel'], 10, "Test if User is student"),
	Array($valid['user_accessLevel'], 99, "Test if User is instructor"),
	Array($valid['user_accessLevel'], 30, "Test if User is registrar")
	);
	
	for(int i = 0; i < 5; i++)
	{
	$test = $testArray[i][0];
	$expected_result = $testArray[i][1];
	$test_name = $testArray[i][2];
	$this->unit->run($test, $expected_result, $test_name);
	}
	echo $this->unit->report();
	
	//$test2 = $data->getLastName();
	
	//$expected_result2 = $userInfo['lastName'];
	
	//$test_name2 = 'Test getLastName method';
	
	//echo $this->unit->run($test2, $expected_result2, $test_name2);
	}

				
}
//end of class
?>