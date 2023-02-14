<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Language extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'cookie', 'date', 'form', 'email', 'site_language_helper'));
		$this->load->library(array('form_validation'));
	}

	public function lang_set($lang_key)
	{
		$this->session->set_userdata('pictuslang_key', $lang_key);
		if (isset($_SERVER['HTTP_REFERER'])) {
			$remo = $_SERVER['HTTP_REFERER'];
			redirect($remo);
		} else {
			redirect('');
		}
	}
}
