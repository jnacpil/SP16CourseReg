<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	public function validateInputCredentials($userVaidationArray) {
		//create array to query for username match
		$username = $userVaidationArray['un'];
		$usernameArray = array('user_username' => $username);
		//run query
		$query = $this->db->get_where('User', $usernameArray);
		//just get row and return
		$row = $query->row_array();
		return $row;
	}
}
//end of class
?>