<?php
class Errors extends MY_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper(array('url','cookie','date','form','email','site_language_helper'));
		$this->load->library(array('form_validation'));		
		$this->load->model('landing_model');
		
    } 
	public function index()
	{
		redirect(base_url());
	}
 
	public function error_404()
	{
		redirect(base_url());
	}
	public function page_missing()
	{
		redirect(base_url());
	}
}