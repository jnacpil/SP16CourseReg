<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
		
	public function __construct() {
		parent :: __construct();
		//load encryption
		$this->load->library('encrypt');
		//load session
		$this->load->library('session');
		//load models
		$this->load->model('login_model');
		//load helper
		$this->load->helper('url');
		//admin access
		//username:"jsmith"
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
					$createLoggedInSuccessfulArray = array('loggedIn' => $username);
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
}
//end of class
?>