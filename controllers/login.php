<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
		
	public function __construct() {
		parent :: __construct();
		//load encryption
		$this->load->library('encrypt');
		//load session
		$this->load->library('session');
		//load user
		//$this->load->library('UserImpl');
		//load models
		$this->load->model('login_model');
		//load helper
		$this->load->helper('url');
		//access
		//username:"jsmith" => ADMIN
		//		   "pnavarro" => STUDENT
		//password:"qwerty"
	}
		
	public function initialize() {
		//set login page title
		$data['title'] = "Welcome to the University Registration System";
		//load views
		$this->load->view('templates/header', $data);
		$this->load->view('login_page',$data);
		$this->load->view('templates/footer', $data);
	}
	
	public function validateLoginCredentials() {
		//grab username and password from post array
		$username = $this->input->post('loginFormUsername');
		$password = $this->input->post('loginFormPassword');
		//create array to send to model
		$userCredentialsArray = array('un' => $username, 'pw' => $password);
		//check for empty fields
		if($this->areLoginFieldsNotEmpty($userCredentialsArray)) {
			//query db for username && pw match
			$result = $this->login_model->validateInputCredentials($userCredentialsArray);
			//check for empty result
			if($this->isResultNotEmpty($result)) {
				if($this->doPasswordsMatch($result, $password)) {
					//set session array for logged in check
					$userid = $result['user_id'];
					$accessLevel = $result['access_id'];
					$result2 = $this->login_model->getUserSpecificInfo($userid,$accessLevel);
					$loggedInUser = $this->createUser($result,$result2);
					$createLoggedInSuccessfulArray = array('userInfoObject' => $loggedInUser);
					$this->session->set_userdata($createLoggedInSuccessfulArray);	
					redirect('schedule/home');
				}
			}
		}
		$this->reinitialize($userCredentialsArray);
	}
		
	public function logout() {
		//get logout p-tag message
		$string = "Logged Out!";
		$message = $this->createMutedMessage($string);
		//grab username for login default
		//fancy logout perk
		$username = $this->session->userdata('loggedIn');	
		//destroy current session meaning all data in session array
		$this->session->sess_destroy();
		//put data into data array for view
		$data['title'] = "Welcome to the University Registration System";
		$data['reloadedUsername'] = $username;
		$data['logoutPrompt'] = $message;
		//load views
		$this->load->view('templates/header', $data);
		$this->load->view('login_page',$data);
		$this->load->view('templates/footer', $data);
	}
	
	private function reinitialize($userCredentialsArray){
		//create an error message
		$string = "Invalid Credentials";
		$errorMessage = $this->createErrorMessageInDiv($string);
		//get username inputted by user
		$typedUsername = $userCredentialsArray['un'];
		//put needed data in $data array
		$data['loginError'] = $errorMessage;
		$data['reloadedUsername'] = $typedUsername;
		$data['title'] = "Welcome to the University Registration System";
		//load views
		$this->load->view('templates/header', $data);
		$this->load->view('login_page',$data);
		$this->load->view('templates/footer', $data);
	}
	
	private function doPasswordsMatch($resultArray,$keyboardPassword) {
		//get encrypted password from result row
		$encryptedPassword = $resultArray['user_password'];
		//decrypt password
		$decryptedPassword = $this->encrypt->decode($encryptedPassword);	
		//compare passwords
		$bool = ($keyboardPassword === $decryptedPassword) ? TRUE : FALSE;
		return $bool;
	}
	
	private function areLoginFieldsNotEmpty($userCredentialsArrayToCheck) {
		//check for empty values for keys in array
		$bool = ($userCredentialsArrayToCheck['un'] != "" && $userCredentialsArrayToCheck['pw'] != "") ? TRUE : FALSE;
		return $bool;
	}
	
	private function isResultNotEmpty($resultArrayToCheck) {
		//check if result array is empty from model
		$bool = (count($resultArrayToCheck) != 0) ? TRUE : FALSE;
		return $bool;
	}
	
	private function createErrorMessageInDiv($text) {
		$errorMessageInDiv = "<div class='alert alert-danger'>".
						 "<strong> Error! </strong>". 
						 $text.
						 "</div>";
		return $errorMessageInDiv;
	}
	
	private function createMutedMessage($text) {
		$message = "<p class='text-muted'> Logged Out! </p>";
		return $message;
	}
	
	private function createUser($userInfoArray,$userInfoArray2) {
		$userid = $userInfoArray['user_id'];
		$theFirstName = $userInfoArray['user_firstName'];
		$theLastName = $userInfoArray['user_lastName'];
		$theEmail = $userInfoArray['user_email'];
		$theUsername = $userInfoArray['user_username'];
		$thePassword = $userInfoArray['user_password'];
		$theAccessLevel = $userInfoArray['access_id'];
		if($theAccessLevel == 10) {
			$theMajor = $userInfoArray2['major_string'];
			$theClassification = $userInfoArray2['class_string'];
			$theSchool = "";
			$theRank = "";
		}
		else if($theAccessLevel == 20) {
			$theMajor = "";
			$theClassification = "";
			$theSchool = $userInfoArray2['school_string'];
			$theRank = $userInfoArray2['rank_string'];
		}
		
		//$user = new UserImpl($theFirstName, $theLastName, $theEmail, $theUsername, $thePassword, $theMajor, $theClassification, $theSchool, $theRank, $theAccessLevel);
		
		$user = array ('user_firstName' => $theFirstName, 'user_lastName' => $theLastName, 'user_email' => $theEmail, 'user_username' => $theUsername, 'user_password' => $thePassword, 'major_string' => $theMajor, 'class_string' => $theClassification, 'access_id' => $theAccessLevel, 'user_id' => $userid, 'school_string' => $theSchool, 'rank_string' => $theRank);
		
		//$user2 = $this->load->library('UserImpl',$user);
	
		return $user;
	}		
}
//end of class
?>