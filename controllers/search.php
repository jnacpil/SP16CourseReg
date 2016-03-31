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

//My comment is clean

}
//end of class
?>