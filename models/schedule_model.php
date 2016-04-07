<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Schedule_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	public function getPersonalInfo($usernameArray)
	{
		$userN = $usernameArray['username'];
		$usernameDBArray = array('user_username' => $userN);
		$query = $this->db->get_where('User', $usernameDBArray);
		//just get row and return
		$row = $query->row_array();
		return $row;
	}
	
	public function getStudentCurrentSched($id)
	{
		$idDBArray = array('user_id' => $id);
		$query1 = $this->db->get_where('Attend', $idDBArray);
		//just get row and return
		$resultArray1 = $query1->result_array();
		$courseArray = array();
		
		foreach($resultArray1 as $row)
		{
			$secID = $row['sect_id'];
			$sectArray = array('sect_id' => $secID);
			$query2 = $this->db->get_where('Section', $sectArray);
			$resultArray2 = $query2->row_array();
			
			$courID = $resultArray2['course_id'];
			$courArray = array('course_id' => $courID);
			$query3 = $this->db->get_where('Course', $courArray);
			$resultArray3 = $query3->row_array();
			
			$courInfo = array_merge($resultArray2, $resultArray3);
			array_push($courseArray, $courInfo);
		}
		
		return $courseArray;
	}
}
//end of class
?>