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
	
	public function getUserSpecificInfo($userid,$accessLevel) {
		$result = array();
		if($accessLevel == '10') {
			//create array to query for username match
			$usernameArray = array('user_id' => $userid);
			//run query
			$query = $this->db->get_where('Student', $usernameArray);
			//just get row and return
			$row = $query->row_array();
			
			//get major
			$majorArray = array('major_id' => $row['major_id']);
			//run query
			$query2 = $this->db->get_where('Major', $majorArray);
			//just get row nad return
			$row2 = $query2->row_array();
			
			//get classification
			$classArray = array('class_id' => $row['class_id']);
			//run query
			$query3 = $this->db->get_where('Classification', $classArray);
			//just get row nad return
			$row3 = $query3->row_array();
			
			$result = array ('class_string' => $row3['class_string'], 'major_string' => $row2['major_string']);
		}
		else if($accessLevel == '20') {
			//get prof info	
			//create array to query for username match
			$usernameArray = array('user_id' => $userid);
			//run query
			$query = $this->db->get_where('Instructor', $usernameArray);
			//just get row and return
			$row = $query->row_array();
			
			//get school
			$schoolArray = array('school_id' => $row['school_id']);
			//run query
			$query2 = $this->db->get_where('School', $schoolArray);
			//just get row nad return
			$row2 = $query2->row_array();
			
			//get Rank
			$rankArray = array('rank_id' => $row['rank_id']);
			//run query
			$query3 = $this->db->get_where('Rank', $rankArray);
			//just get row nad return
			$row3 = $query3->row_array();
			
			$result = array ('school_string' => $row2['school_string'], 'rank_string' => $row3['rank_string']);

		}
		return $result;
	}
}
//end of class
?>