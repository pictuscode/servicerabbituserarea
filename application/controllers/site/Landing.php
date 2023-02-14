<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

	public $data = array();

	function __construct()
	{
		parent::__construct();
		ob_start();
		$this->data['key'] = $this->security->get_csrf_token_name();
		$this->data['value'] = $this->security->get_csrf_hash();
		$this->load->helper(array('url', 'cookie', 'text', 'date', 'form', 'email', 'site_language_helper'));
		$this->load->library(array('form_validation'));
		$this->load->model('landing_model');
		$this->load->model('mail_model');
		$this->data['lang_key'] = $this->session->userdata('pictuslang_key');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->load->library('session');
		$this->load->model(array('landing_model'));
		$this->load->database();
		$this->db->reconnect();
		define('BASEURL', base_url());
		if (empty($this->data['lang_key'])) {
			$lang_datas  = langdata_default();
			$lang_key 	 = $lang_datas[0]['lang_code'];
			$this->data['lang_key'] = $lang_key;
			$this->session->set_userdata('pictuslang_key', $lang_key);
			$this->session->set_userdata('lang_key', $lang_key);
		}
		$this->data['logincheck'] = $this->checkLogin('U');
		$this->data['logcheck'] = $this->checkLogin('U');
		if ($this->config->item('site_logo') != '') {
			$this->data['logo'] = base_url() . "images/site/logo/" . $this->config->item('site_logo');
		} else {
			$this->data['logo'] = base_url() . "images/site/logo/logo.png";
		}
		if ($this->checkLogin('U') != '') {
			$this->data['userDetails'] = $this->db->query('select * from ' . USERS . ' where `id`="' . $this->checkLogin('U') . '"');
		}

		if ($this->session->userdata('currency_code') == "") {
			$GeoCurrencyType = $this->currencyCode();
			$currencyArr = $this->landing_model->get_all_details(CURRENCY, array('status' => 'Active', 'currency_type' => $GeoCurrencyType));
			if ($currencyArr->num_rows() > 0) {
				$get_default_currency = $currencyArr;
			} else {
				$get_default_currency = $this->landing_model->get_all_details(CURRENCY, array('default_currency' => 'Yes'));
			}
			$this->session->set_userdata('currency_code', $get_default_currency->row()->currency_type);
			$this->session->set_userdata('currency_symbol', $get_default_currency->row()->currency_symbols);
			$this->session->set_userdata('currency_rate', $get_default_currency->row()->currency_rate);
		}

		$this->data['currency_lists'] = $this->landing_model->get_all_details(CURRENCY, array('status' => 'Active'));
		$this->data['currency_code'] = $this->session->userdata('currency_code');
		$this->data['currency_symbol'] = $this->session->userdata('currency_symbol');
		$this->data['currency_rate'] = $this->session->userdata('currency_rate');

		$this->data['cms_row1'] = $this->landing_model->get_all_details(CMS, array('status' => 'Active', 'footer_order' => 'row1'));
		$this->data['cms_row2'] = $this->landing_model->get_all_details(CMS, array('status' => 'Active', 'footer_order' => 'row2'));
		$this->data['cms_row3'] = $this->landing_model->get_all_details(CMS, array('status' => 'Active', 'footer_order' => 'row3'));
		$this->data['cmstask_category'] = $this->landing_model->get_all_details(TASKER_CATEGORY, array('status' => 'Active'));
	}
	public function index()
	{




		$this->data['task_category'] = $this->landing_model->get_all_details(TASKER_CATEGORY, array('status' => 'Active'));
		$this->data['task_category1'] = $this->landing_model->get_service();
		$this->data['get_service_featured'] = $this->landing_model->get_service_featured();
		$this->data['get_tasker_featured'] = $this->landing_model->get_tasker_featured();
		$this->data['get_review'] = $this->landing_model->get_review();
		$this->data['cms_service'] = $this->landing_model->get_all_details(CMS, array('status' => 'Active', 'footer_order' => 'services'));
		$this->load->view('site/landing/landing', $this->data);
	}

	public function contact_us()
	{
		$this->data['heading'] = "Contact us";
		$this->load->view('site/landing/contact_us', $this->data);
	}
	public function save_contactus()
	{
		$this->landing_model->simple_insert(CONTACTUS, $_POST);
		$new_array = $_POST;
		$check = $this->mail_model->send_contact_mail($new_array);
		echo json_encode(array('result' => 1));
	}

	public function user_login()
	{
		$this->load->library('user_agent');
		$this->session->set_userdata('referrer_url', $this->agent->referrer());
		$this->load->library('facebook');
		include_once APPPATH . "libraries/google-api-php-client/Google_Client.php";
		include_once APPPATH . "libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
		$clientId = $this->config->item('gmail_client_id');
		$clientSecret = $this->config->item('gmail_client_secret');
		$redirectUrl = $this->config->item('gmail_redirect_url');
		$gClient = new Google_Client();
		$gClient->setApplicationName('Login to gmtechindia.com');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectUrl);
		$google_oauthV2 = new Google_Oauth2Service($gClient);
		$this->data['heading'] = "User Login";
		$this->data['gmail_link'] = $gClient->createAuthUrl();
		$this->data['fb_login'] = $this->facebook->getLoginUrl(array(
			'display' => 'popup',
			'redirect_uri' => base_url('site/user/fb_response'),
			'scope' => array("email")
		));
		$this->load->view('site/user/user_login', $this->data);
	}

	public function user_signup()
	{
		$this->data['heading'] = "User Signup";
		$this->load->view('site/user/user_signup', $this->data);
	}
	public function signup_process()
	{
		$email = $this->input->post('email');
		$t = count($this->landing_model->get_single_details(USERS, array('id'), array('email' => $email))->result());
		if ($t <= 0) {
			$_POST['password'] = md5($_POST['password']);
			$t = $this->landing_model->simple_insert(USERS, $_POST);
			$checkUser = $this->landing_model->get_all_details(USERS, array('email' => $email));
			/* $userdata = array(
				'gm_user_id' => $checkUser->row()->id,

				'gm_user_email' => $checkUser->row()->email
			);
			$this->session->set_userdata($userdata); */
			$datestring = "%Y-%m-%d %h:%i:%s";
			$time = time();
			$newdata = array(
				'last_login_date' => mdate($datestring, $time),
				'last_login_ip' => $this->input->ip_address()
			);
			$condition = array(
				'id' => $checkUser->row()->id
			);
			$this->landing_model->update_details(USERS, $newdata, $condition);

			$t1['result'] = 'success';
		} else {
			$t1['result'] = 'error';
		}
		$t1['redirecturl'] = '';

		echo json_encode($t1);
	}
	public function check_email()
	{
		$email = $this->input->post('email');
		$t = count($this->landing_model->get_single_details(USERS, array('id'), array('email' => $email))->result());
		if ($t <= 0) {
			echo "true";
		} else {
			echo "false";
		}
	}

	public function logout()
	{
		$datestring = "%Y-%m-%d %h:%i:%s";
		$time = time();
		$newdata = array(
			'last_logout_date' => mdate($datestring, $time)
		);
		$condition = array(
			'id' => $this->checkLogin('U')
		);
		$this->landing_model->update_details(USERS, $newdata, $condition);
		$userdata = array(
			'gm_user_id' => '',
			'gm_user_email' => ''
		);
		$this->session->unset_userdata($userdata);
		echo $this->session->set_userdata('gm_user_id', '');
		$this->session->set_userdata('pictuslang_key', '');
		redirect(base_url());
	}

	public function login_process()
	{

		$email = $this->input->post('login_email');
		$pwd = md5($this->input->post('login_password'));
		$condition = array(
			'email' => $email,
			'password' => $pwd,
			'status' => 'Active'
		);
		$checkUser = $this->landing_model->get_all_details(USERS, $condition);
		if ($checkUser->num_rows() == '1') {
			$email_preference = $this->landing_model->get_all_details(USERS, array('id' => $checkUser->row()->id))->row()->email_preference;
			$this->session->set_userdata('pictuslang_key', $email_preference);
			$this->data['lang_key'] = $this->session->userdata('pictuslang_key');
			if (empty($this->data['lang_key'])) {
				$lang_datas  = langdata_default();
				$lang_key 	 = $lang_datas[0]['lang_code'];
				$this->data['lang_key'] = $lang_key;
				$this->session->set_userdata('pictuslang_key', $lang_key);
				$this->session->set_userdata('lang_key', $lang_key);
			} else {
				$this->session->set_userdata('lang_key', $email_preference);
			}
			$datestring = "%Y-%m-%d %h:%i:%s";
			$time = time();
			$newdata = array(
				'last_login_date' => mdate($datestring, $time),
				'last_login_ip' => $this->input->ip_address()
			);
			$condition = array(
				'id' => $checkUser->row()->id
			);
			$this->landing_model->update_details(USERS, $newdata, $condition);
			$returnStr['tasker_steps_pending_redirect'] = base_url();

			$returnStr['status'] = 1;
		} else {
			$condition = array('email' => $email, 'status' => 'Inactive');
			$checkUser1 = $this->landing_model->get_all_details(USERS, $condition);
			if ($checkUser1->num_rows() == '1') {
				$returnStr['message'] = get_lang_site_key($this->data['lang_key'], "profile_lang", "account_inactive");
				$returnStr['status'] = 2;
			} else {
				$returnStr['message'] = get_lang_site_key($this->data['lang_key'], "profile_lang", "invalid_login");
				$returnStr['status'] = 3;
			}
		}
		$returnStr['redirecturl'] = base_url();



		echo json_encode($returnStr);
	}

	public function fb_response()
	{

		$this->load->library('facebook');
		echo $user = $this->facebook->getUser();

		if ($user) {
			try {
				$user_profile = $this->facebook->api('/me/?fields=email,name,id');
				$email = $user_profile['email'];
				if ($email == "") {
					redirect(base_url());
				}
				$t = count($this->landing_model->get_single_details(USERS, array('email'), array('email' => $user_profile['email']))->result());
				if ($t <= 0) {

					$filename = now() . rand() . ".jpg";
					$image = file_get_contents("https://graph.facebook.com/" . $user_profile['id'] . "/picture?type=large");
					file_put_contents("images/site/profile/" . $filename, $image);
					$dataarray = array('first_name' => $user_profile['name'], 'email' => $user_profile['email'], 'photo' => $filename, 'facebook' => $user_profile['id']);
					$t = $this->landing_model->simple_insert(USERS, $dataarray);
					$checkUser = $this->landing_model->get_all_details(USERS, array('email' => $email));
					$datestring = "%Y-%m-%d %h:%i:%s";
					$time = time();
					$newdata = array(
						'last_login_date' => mdate($datestring, $time),
						'last_login_ip' => $this->input->ip_address()
					);
					$condition = array(
						'id' => $checkUser->row()->id
					);
					$this->landing_model->update_details(USERS, $newdata, $condition);

					redirect(base_url());
				} else {

					$checkUser = $this->landing_model->get_all_details(USERS, array('email' => $email));
					if ($checkUser->row()->status == "Active") {
						$email_preference = $this->landing_model->get_all_details(USERS, array('id' => $checkUser->row()->id))->row()->email_preference;
						$this->session->set_userdata('pictuslang_key', $email_preference);
						$this->data['lang_key'] = $this->session->userdata('pictuslang_key');
						if (empty($this->data['lang_key'])) {
							$lang_datas  = langdata_default();
							$lang_key 	 = $lang_datas[0]['lang_code'];
							$this->data['lang_key'] = $lang_key;
							$this->session->set_userdata('pictuslang_key', $lang_key);
							$this->session->set_userdata('lang_key', $lang_key);
						} else {
							$this->session->set_userdata('lang_key', $email_preference);
						}
						$datestring = "%Y-%m-%d %h:%i:%s";
						$time = time();
						$newdata = array(
							'last_login_date' => mdate($datestring, $time),
							'last_login_ip' => $this->input->ip_address()
						);
						$condition = array(
							'id' => $checkUser->row()->id
						);
						$this->landing_model->update_details(USERS, $newdata, $condition);

						redirect(base_url());
					} else {
						echo 'swal(' . get_lang_site_key($this->data['lang_key'], "common_lang", "oops") . '!!",' . get_lang_site_key($this->data['lang_key'], "profile_lang", "account_inactive") . ',"error")';
						redirect(base_url());
					}
				}
			} catch (FacebookApiException $e) {
				$user = null;
			}
		}
	}
	public function google_response()
	{

		include_once APPPATH . "libraries/google-api-php-client/Google_Client.php";
		include_once APPPATH . "libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
		$clientId = $this->config->item('gmail_client_id');
		$clientSecret = $this->config->item('gmail_client_secret');
		$redirectUrl = $this->config->item('gmail_redirect_url');
		$gClient = new Google_Client();
		$gClient->setApplicationName('Login to service rabbit');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectUrl);
		$google_oauthV2 = new Google_Oauth2Service($gClient);
		if (isset($_GET['code'])) {
			$gClient->authenticate();
			$this->session->set_userdata('token', $gClient->getAccessToken());
			redirect($redirectUrl);
		}

		$token = $this->session->userdata('token');
		if (!empty($token)) {
			$gClient->setAccessToken($token);
		}

		if ($gClient->getAccessToken()) {
			$userProfile = $google_oauthV2->userinfo->get();
			$userData['oauth_provider'] = 'google';
			$userData['oauth_uid'] = $userProfile['id'];
			$userData['first_name'] = $userProfile['given_name'];
			$userData['last_name'] = $userProfile['family_name'];
			$userData['email'] = $userProfile['email'];
			$userData['gender'] = $userProfile['gender'];
			$userData['locale'] = $userProfile['locale'];
			$userData['profile_url'] = $userProfile['link'];
			$userData['picture_url'] = $userProfile['picture'];
			$email = $userData['email'];
			$t = count($this->landing_model->get_single_details(USERS, array('email'), array('email' => $userData['email']))->result());
			if ($t <= 0) {

				$filename = now() . rand() . ".jpg";
				$image = file_get_contents($userData['picture_url']);
				file_put_contents("images/site/profile/" . $filename, $image);
				$dataarray = array('first_name' => $userData['first_name'], 'last_name' => $userData['last_name'], 'email' => $userData['email'], 'photo' => $filename, 'google' => $userData['oauth_uid']);
				$t = $this->landing_model->simple_insert(USERS, $dataarray);
				$checkUser = $this->landing_model->get_all_details(USERS, array('email' => $email));
				/* $userdata = array(
					'gm_user_id' => $checkUser->row()->id,

					'gm_user_email' => $checkUser->row()->email
				);
				$this->session->set_userdata($userdata); */
				$datestring = "%Y-%m-%d %h:%i:%s";
				$time = time();
				$newdata = array(
					'last_login_date' => mdate($datestring, $time),
					'last_login_ip' => $this->input->ip_address()
				);
				$condition = array(
					'id' => $checkUser->row()->id
				);
				$this->landing_model->update_details(USERS, $newdata, $condition);





				redirect(base_url());
			} else {
				$checkUser = $this->landing_model->get_all_details(USERS, array('email' => $email));
				if ($checkUser->row()->status == "Active") {
					$email_preference = $this->landing_model->get_all_details(USERS, array('id' => $checkUser->row()->id))->row()->email_preference;
					$this->session->set_userdata('pictuslang_key', $email_preference);
					$this->data['lang_key'] = $this->session->userdata('pictuslang_key');
					if (empty($this->data['lang_key'])) {
						$lang_datas  = langdata_default();
						$lang_key 	 = $lang_datas[0]['lang_code'];
						$this->data['lang_key'] = $lang_key;
						$this->session->set_userdata('pictuslang_key', $lang_key);
						$this->session->set_userdata('lang_key', $lang_key);
					} else {
						$this->session->set_userdata('lang_key', $email_preference);
					}

					$datestring = "%Y-%m-%d %h:%i:%s";
					$time = time();
					$newdata = array(
						'last_login_date' => mdate($datestring, $time),
						'last_login_ip' => $this->input->ip_address()
					);
					$condition = array(
						'id' => $checkUser->row()->id
					);
					$this->landing_model->update_details(USERS, $newdata, $condition);

					redirect(base_url());
				} else {
					echo 'swal(' . get_lang_site_key($this->data['lang_key'], "common_lang", "oops") . '!!",' . get_lang_site_key($this->data['lang_key'], "profile_lang", "account_inactive") . ',"error")';

					redirect(base_url());
				}
			}
		}
	}

	public function forgot_password()
	{
		$this->data['heading'] = "User Password reset";
		$this->load->view('site/user/forgot_password', $this->data);
	}

	public function send_forgot_password()
	{
		$email = $_POST['login_email'];
		$check_user = $this->landing_model->get_all_details(USERS, array('email' => $email));
		if ($check_user->num_rows() > 0) {
			$password = time();
			$to = $email;
			$this->mail_model->send_user_password($password, $check_user->row()->first_name, $email, $this->data['lang_key']);
			$this->landing_model->update_details(USERS, array('password' => md5($password)), array('email' => $email));
			$ret['status'] = 1;
			$ret['message'] = get_lang_site_key($this->data['lang_key'], "profile_lang", "password_reset");
		} else {
			$ret['status'] = 2;
			$ret['message'] = get_lang_site_key($this->data['lang_key'], "profile_lang", "no_email");
		}
		echo json_encode($ret);
	}

	public function tasker_signup()
	{
		$this->data['heading'] = "Tasker Signup";
		$this->load->view('site/tasker/tasker_signup', $this->data);
	}


	public function tasker_signup_process()
	{
		$email = $this->input->post('email');
		$t = count($this->landing_model->get_single_details(USERS, array('id'), array('email' => $email))->result());
		if ($t <= 0) {
			$_POST['group'] = '1';
			$_POST['password'] = md5($_POST['password']);
			$t = $this->landing_model->simple_insert(USERS, $_POST);
			$checkUser = $this->landing_model->get_all_details(USERS, array('email' => $email));
			$userdata = array(
				'gm_user_id' => $checkUser->row()->id,

				'gm_user_email' => $checkUser->row()->email
			);

			$datestring = "%Y-%m-%d %h:%i:%s";
			$time = time();
			$newdata = array(
				'last_login_date' => mdate($datestring, $time),
				'last_login_ip' => $this->input->ip_address()
			);
			$condition = array(
				'id' => $checkUser->row()->id
			);
			$this->landing_model->update_details(USERS, $newdata, $condition);

			$t1['result'] = 'success';
		} else {
			$t1['result'] = 'error';
		}
		echo json_encode($t1);
	}


	public function get_notification()
	{
		if ($this->checkLogin('U') != '') {
			$id = $this->checkLogin('U');
			$tot['result'] = array();
			$tot['success'] = 0;
			$notification = $this->landing_model->get_all_details(NOTIFICATION, array('viewer_id' => $id, 'viewer_status' => 1));
			if ($notification->num_rows() > 0) {
				foreach ($notification->result() as $av) {
					$userDetails1 = $this->landing_model->get_all_details(USERS, array('id' => $av->user_id));
					if ($userDetails1->row()->photo != '') {
						$pro_pic = base_url() . 'images/site/profile/' . $userDetails1->row()->photo;
					} else {
						$pro_pic = base_url() . 'images/site/profile/avatar.png';
					}
					$tot['result'][] = array('message' => $av->message, 'title' => $av->title, 'id' => $av->id, 'img' => $pro_pic);
					$tot['success'] = 1;
				}
			}
			echo json_encode($tot);
		} else {
			redirect(base_url());
		}
	}

	public function checkLogin($type = '')
	{
		if ($type == 'A') {

			return $this->session->userdata('gmtech_admin_id');
		} else if ($type == 'N') {
			return $this->session->userdata('fc_session_admin_name');
		} else if ($type == 'M') {
			return $this->session->userdata('fc_session_admin_email');
		} else if ($type == 'P') {
			return $this->session->userdata('gm_session_prev');
		} else if ($type == 'U') {
			$user_check = $this->landing_model->get_all_details(USERS, array('id' => $this->session->userdata('gm_user_id'), 'status' => 'Active'));
			if ($user_check->num_rows() > 0) {
				return $this->session->userdata('gm_user_id');
			} else
				$this->session->unset_userdata('gm_user_id');
		} else if ($type == 'T') {
			return $this->session->userdata('fc_session_temp_id');
		}
	}

	public function currencyCode()
	{


		$ip = $_SERVER['REMOTE_ADDR'];

		#$ip = '115.118.170.1'; //IND

		#$ip = '146.185.28.59'; //UK

		$host = "http://www.geoplugin.net/php.gp?ip=$ip";

		if (ini_get('allow_url_fopen')) {
			$response = file_get_contents($host, 'r');
		}

		$data = unserialize($response);

		return $data['geoplugin_currencyCode'];
	}
}
