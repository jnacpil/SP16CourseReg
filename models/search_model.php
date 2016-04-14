<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	public function searchByCourseName($departmentName, $searchID){
		
		$courseNameArray = array($departmentName => $searchID);
		$query = $this->db->get_where('Course', $courseNameArray);
		$result = $query->row_array();
		$result2 = $this->getCourseDataByName($result);
		return $result2;
		
	}
	
	public function searchByCourseNumber($departmentName, $searchID){
		
		$courseNumberArray = array($departmentName => $searchID);
		$query = $this->db->get_where('Course', $courseNumberArray);
		$result = $query->row_array();
		$result2 = $this->getCourseDataByName($result);
		return $result2;
		
	}
	
	public function searchByDepartmentName($departmentName, $searchID){
		
		$departmentNameArray = array($departmentName => $searchID);
		$query = $this->db->get_where('Department', $departmentNameArray);
		$result = $query->row_array();
		$result2 = $this->getCourseDataByDept($result);
		print_r($result2);
		return $result2;
		
	}
	
	public function searchByProfName($departmentName, $searchID){
		
		$profNameArray = array($departmentName => $searchID);
		$query = $this->db->get_where('User', $profNameArray);
		$result = $query->row_array();
		//print_r($result);
		$id = $result['user_id'];
		//echo $id;
		$result2 = $this->getCourseData($id);
		return $result2;
	}
	
	public function getCourseData($id)
	{
		$courseDataArray = array('user_id' => $id);
		$courseArray = array();
		
		//get row from Section using sect_id from Student to Section table
			$query2 = $this->db->get_where('Section', $courseDataArray);
			$resultArray99 = $query2->result_array();
			//print_r($resultArray99);
			foreach($resultArray99 as $row)
			{
			//get row from Course using course_id from row pulled from Section 
			$courID = $row['course_id'];
			$courArray = array('course_id' => $courID);
			$query3 = $this->db->get_where('Course', $courArray);
			$resultArray3 = $query3->row_array();
			
			//get row from TimePeriod using tp_id from row pulled from Section ($resultArray99)
			$timePerID = $row['tp_id'];
			$tpArray = array('tp_id' => $timePerID);
			$query4 = $this->db->get_where('TimePeriod', $tpArray);
			$resultArray4 = $query4->row_array();
			
			//get row from TimeSlot using ts_id from row pulled from Section ($resultArray99)
			$timeSlotID = $row['ts_id'];
			$tsArray = array('ts_id' => $timeSlotID);
			$query5 = $this->db->get_where('TimeSlot', $tsArray);
			$resultArray5 = $query5->row_array();
			
			//get row from User using user_id from row pulled from Section ($resultArray99)
			$instID = $row['user_id'];
			$instArray = array('user_id' => $instID);
			$query6 = $this->db->get_where('User', $instArray);
			$resultArray6 = $query6->row_array();
			
			//get row from Department using dept_id from row pulled from Course ($resultArray3)
			$courDepID = $resultArray3['dept_id'];
			//echo "HEREHEREHERE ".$courDepID;
			$deptArray = array('dept_id' => $courDepID);
			$query7 = $this->db->get_where('Department', $deptArray);
			$resultArray7 = $query7->row_array(); 
		
		$sessarr = array('sect_id' => $row['sect_id']);
			$courInfo = array_merge($resultArray3, $resultArray4, $resultArray5, $resultArray6, $resultArray7,$sessarr);
			array_push($courseArray, $courInfo);
			}
			return $courseArray;
	}
	
	public function getCourseDataByName($arr) {
		
		$courseArray = array();
		$arr2 = array('course_id' => $arr['course_id']);
		$query2 = $this->db->get_where('Section', $arr2);
			$resultArray99 = $query2->result_array();
			//print_r($resultArray99);
			foreach($resultArray99 as $row)
			{
			//get row from Course using course_id from row pulled from Section 
			$courID = $row['course_id'];
			$courArray = array('course_id' => $courID);
			$query3 = $this->db->get_where('Course', $courArray);
			$resultArray3 = $query3->row_array();
			
			//get row from TimePeriod using tp_id from row pulled from Section ($resultArray99)
			$timePerID = $row['tp_id'];
			$tpArray = array('tp_id' => $timePerID);
			$query4 = $this->db->get_where('TimePeriod', $tpArray);
			$resultArray4 = $query4->row_array();
			
			//get row from TimeSlot using ts_id from row pulled from Section ($resultArray99)
			$timeSlotID = $row['ts_id'];
			$tsArray = array('ts_id' => $timeSlotID);
			$query5 = $this->db->get_where('TimeSlot', $tsArray);
			$resultArray5 = $query5->row_array();
			
			//get row from User using user_id from row pulled from Section ($resultArray99)
			$instID = $row['user_id'];
			$instArray = array('user_id' => $instID);
			$query6 = $this->db->get_where('User', $instArray);
			$resultArray6 = $query6->row_array();
			
			//get row from Department using dept_id from row pulled from Course ($resultArray3)
			$courDepID = $resultArray3['dept_id'];
			//echo "HEREHEREHERE ".$courDepID;
			$deptArray = array('dept_id' => $courDepID);
			$query7 = $this->db->get_where('Department', $deptArray);
			$resultArray7 = $query7->row_array(); 
		
		$sessarr = array('sect_id' => $row['sect_id']);
			$courInfo = array_merge($resultArray3, $resultArray4, $resultArray5, $resultArray6, $resultArray7,$sessarr);
			array_push($courseArray, $courInfo);
			}
			return $courseArray;

	}
	
	public function getCourseDataByDept($arr6) 
	{
			$courseArray = array();
			$arr2 = array('dept_id' => $arr6['dept_id']);
			$query2 = $this->db->get_where('Course', $arr2);
			$resultArray99 = $query2->result_array();
			//print_r($resultArray99);
			
			
			foreach($resultArray99 as $row)
			{
				$arre = array('course_id' => $row['course_id']);
				$query24 = $this->db->get_where('Section', $arre);
				$resultArray88 = $query24->result_array();
			foreach($resultArray88 as $row2)
			{
			//get row from Course using course_id from row pulled from Section 
			$courID = $row2['course_id'];
			$courArray = array('course_id' => $courID);
			$query3 = $this->db->get_where('Course', $courArray);
			$resultArray3 = $query3->row_array();
			
			//get row from TimePeriod using tp_id from row pulled from Section ($resultArray99)
			$timePerID = $row2['tp_id'];
			$tpArray = array('tp_id' => $timePerID);
			$query4 = $this->db->get_where('TimePeriod', $tpArray);
			$resultArray4 = $query4->row_array();
			
			//get row from TimeSlot using ts_id from row pulled from Section ($resultArray99)
			$timeSlotID = $row2['ts_id'];
			$tsArray = array('ts_id' => $timeSlotID);
			$query5 = $this->db->get_where('TimeSlot', $tsArray);
			$resultArray5 = $query5->row_array();
			
			//get row from User using user_id from row pulled from Section ($resultArray99)
			$instID = $row2['user_id'];
			$instArray = array('user_id' => $instID);
			$query6 = $this->db->get_where('User', $instArray);
			$resultArray6 = $query6->row_array();
			
			//get row from Department using dept_id from row pulled from Course ($resultArray3)
			$courDepID = $resultArray3['dept_id'];
			//echo "HEREHEREHERE ".$courDepID;
			$deptArray = array('dept_id' => $courDepID);
			$query7 = $this->db->get_where('Department', $deptArray);
			$resultArray7 = $query7->row_array(); 
		
			$sessarr = array('sect_id' => $row2['sect_id']);
			$courInfo = array_merge($resultArray3, $resultArray4, $resultArray5, $resultArray6, $resultArray7,$sessarr);
			array_push($courseArray, $courInfo);
			}
			return $courseArray;	
			}
	}
	
	public function getCourseRoster($sectID)
	{
		$sectArray = array('sect_id' => $sectID);
			$query = $this->db->get_where('Attend', $sectArray);
			$resultArray = $query->result_array();
			
			$studentArray = array();
			
			foreach($resultArray as $row)
			{
				$userID = $row['user_id'];
				$userArray = array('user_id' => $userID);
				$query1 = this->db->get_where('User', $userArray);
				$resultArray1 = $query1->row_array();
				
				$query2 = this->db->get_where('Student', $userArray);
				$resultArray2 = $query2->row_array();
				
				$studInfo = array_merge($resultArray1, $resultArray2);
				array_push($studentArray, $studInfo);
				
			}
			return $studentArray;
			
	}
	
	
}
//end of class
?>