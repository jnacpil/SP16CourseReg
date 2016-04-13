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
			print_r($valid);
			
			//get current schedule
			$id = $valid['user_id'];
			$accessLevel = $valid['access_id'];
			$result = $this->schedule_model->getCurrentSched($id,$accessLevel);
			print_r($result);
			
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
		
				
}
//end of class
?>