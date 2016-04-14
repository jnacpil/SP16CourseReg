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
	
	public function getCurrentSched($id, $accessLevel)
	{
		if($accessLevel == 10)
		{
	
		$idDBArray = array('user_id' => $id);
		$query1 = $this->db->get_where('Attend', $idDBArray);
		//just get row and return
		$resultArray1 = $query1->result_array();
		
		}
		
		if($accessLevel == 20)
		{
		$idDBArray = array('user_id' =>$id);
		$query1 = $this->db->get_where('Section', $idDBArray); 
		$resultArray1 = $query1->result_array();
		}
		
		$courseArray = array();
		
		foreach($resultArray1 as $row)
		{
			//get row from Section using sect_id from Student to Section table
			$secID = $row['sect_id'];
			$sectArray = array('sect_id' => $secID);
			$query2 = $this->db->get_where('Section', $sectArray);
			$resultArray2 = $query2->row_array();
			
			//get row from Course using course_id from row pulled from Section 
			$courID = $resultArray2['course_id'];
			$courArray = array('course_id' => $courID);
			$query3 = $this->db->get_where('Course', $courArray);
			$resultArray3 = $query3->row_array();
			
			//get row from TimePeriod using tp_id from row pulled from Section ($resultArray2)
			$timePerID = $resultArray2['tp_id'];
			$tpArray = array('tp_id' => $timePerID);
			$query4 = $this->db->get_where('TimePeriod', $tpArray);
			$resultArray4 = $query4->row_array();
			
			//get row from TimeSlot using ts_id from row pulled from Section ($resultArray2)
			$timeSlotID = $resultArray2['ts_id'];
			$tsArray = array('ts_id' => $timeSlotID);
			$query5 = $this->db->get_where('TimeSlot', $tsArray);
			$resultArray5 = $query5->row_array();
			
			//get row from User using user_id from row pulled from Section ($resultArray2)
			$instID = $resultArray2['user_id'];
			$instArray = array('user_id' => $instID);
			$query6 = $this->db->get_where('User', $instArray);
			$resultArray6 = $query6->row_array();
			
			//get row from Department using dept_id from row pulled from Course ($resultArray3)
			$courDepID = $resultArray3['dept_id'];
			$deptArray = array('dept_id' => $courDepID);
			$query7 = $this->db->get_where('Department', $deptArray);
			$resultArray7 = $query7->row_array(); 
			
			$courInfo = array_merge($resultArray2, $resultArray3, $resultArray4, $resultArray5, $resultArray6, $resultArray7);
			array_push($courseArray, $courInfo);
		}
		
		return $courseArray;
	}
	
	
	
	
	public function getSectionDetails($sectID)
	{
		$sectArray = array('sect_id' => $secID);
		$query2 = $this->db->get_where('Section', $sectArray);
		$resultArray2 = $query2->row_array();
			
		//get row from Course using course_id from row pulled from Section 
		$courID = $resultArray2['course_id'];
		$courArray = array('course_id' => $courID);
		$query3 = $this->db->get_where('Course', $courArray);
		$resultArray3 = $query3->row_array();
			
		//get row from TimePeriod using tp_id from row pulled from Section ($resultArray2)
		$timePerID = $resultArray2['tp_id'];
		$tpArray = array('tp_id' => $timePerID);
		$query4 = $this->db->get_where('TimePeriod', $tpArray);
		$resultArray4 = $query4->row_array();
			
		//get row from TimeSlot using ts_id from row pulled from Section ($resultArray2)
		$timeSlotID = $resultArray2['ts_id'];
		$tsArray = array('ts_id' => $timeSlotID);
		$query5 = $this->db->get_where('TimeSlot', $tsArray);
		$resultArray5 = $query5->row_array();
			
		//get row from User using user_id from row pulled from Section ($resultArray2)
		$instID = $resultArray2['user_id'];
		$instArray = array('user_id' => $instID);
		$query6 = $this->db->get_where('User', $instArray);
		$resultArray6 = $query6->row_array();
			
			//get row from Department using dept_id from row pulled from Course ($resultArray3)
		$courDepID = $resultArray3['dept_id'];
		$deptArray = array('dept_id' => $courDepID);
		$query7 = $this->db->get_where('Department', $deptArray);
		$resultArray7 = $query7->row_array(); 
			
		$courInfo = array_merge($resultArray2, $resultArray3, $resultArray4, $resultArray5, $resultArray6, $resultArray7);
			
		return $courInfo;

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