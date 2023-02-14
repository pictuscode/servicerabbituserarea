<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['404_override'] = 'errors/error_404';
$route['default_controller'] = 'site/landing/index';
$route['contact_us'] = 'site/landing/contact_us';
$route['user_login'] = 'site/landing/user_login';
$route['user_signup'] = 'site/landing/user_signup';
$route['become-a-tasker'] = 'site/landing/tasker_signup';
$route['forgot_password'] = 'site/landing/forgot_password';
$route['tasker_signup_process']='site/landing/tasker_signup_process';
$route['logout']='site/landing/logout';
$route['site/user/get_notification']='site/landing/get_notification';
$route['site/user/send_forgot_password']='site/landing/send_forgot_password';
$route['add_task/(:num)'] = 'site/landing/index';
$route['page/(:any)'] = 'site/cms/page/$1';
$route['services/(:any)/(:num)'] = 'site/cms/services/$1/$1';






