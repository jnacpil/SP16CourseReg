<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
		
	public function __construct() {
		parent :: __construct();
		//load encryption
		$this->load->library('encrypt');
		//load session
		$this->load->library('session');
		//load models
		$this->load->model('search_model');
		//load helper
		$this->load->helper('url');
	}
	
	public function init(){
		$data['title'] = 'Welcome to the University Registration System';
	
		$this->load->view('templates/header', $data);
		$this->load->view('search_page', $data);
		$this->load->view('templates/footer', $data);	
	}
	
	public function searchResults(){
		$data['title'] = 'Welcome to the University Registration System';
		$departmentName = $this->input->post('deptName');
		$searchID = $this->input->post('searchID');
		//echo $departmentName;
		//echo $searchID;
		$result = array();
		if($departmentName == 'course_name')
		{
			$result = $this->search_model->searchByCourseName($departmentName, $searchID);
		}
		if($departmentName == 'course_number')
		{
			$result = $this->search_model->searchByCourseNumber($departmentName, $searchID);
		}
		if($departmentName == 'dept_name')
		{
			$result = $this->search_model->searchByDepartmentName($departmentName, $searchID);
		}
		if($departmentName == 'user_lastName')
		{
			$result = $this->search_model->searchByProfName($departmentName, $searchID);
			//print_r($result);
		}
		
		$data['listOfCourses'] = $result;
		
		$this->load->view('templates/header', $data);
		$this->load->view('search_page', $data);
		$this->load->view('templates/footer', $data);
	}



}
//end of class
?>