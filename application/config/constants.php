<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
/*
|--------------------------------------------------------------------------
| Table Constants
|--------------------------------------------------------------------------
|
*/
define('ADMIN_PATH',						'admin');
define('TBL_PREF',						'fc_');
define('ADMIN',						TBL_PREF.'admin');
define('USERS',						TBL_PREF.'users');
define('CITY_STATUS',				TBL_PREF.'city_status');
define('TASKER_CITY',				TBL_PREF.'tasker_location');
define('TASKER_VEHICLE',			TBL_PREF.'vehicle');
define('TASKER_CATEGORY',			TBL_PREF.'task_category');
define('TASKER_CATEGORY_SELECTION',	TBL_PREF.'tasker_category_selection');
define('BOOKING',					TBL_PREF.'booking');
define('TRANSACTION',				TBL_PREF.'transaction');
define('NOTIFICATION',				TBL_PREF.'notification');
define('REVIEWS',				    TBL_PREF.'reviews');
define('ADMIN_SETTINGS',			TBL_PREF.'admin_settings');
define('CMS',						TBL_PREF.'cms');
define('TRACKING_PAID',				TBL_PREF.'tracking_paid');
define('BLOCK_DATES',				TBL_PREF.'block_dates');
define('PAYMENTS',				    TBL_PREF.'payments');
define('EMAIL',				        TBL_PREF.'email');
define('TASKER_SUB_CATEGORY',	    TBL_PREF.'task_subcategory');
define('CONTACTUS',	                TBL_PREF.'contactus');
define('CURRENCY',	                TBL_PREF.'currency');
define('CATEGORY_DETAILS',	        TBL_PREF.'task_category_details');
define('SUBCATEGORY_DETAILS',	    TBL_PREF.'task_subcategory_details');
define('CMS_DETAILS',	            TBL_PREF.'cms_details');
define('TASKER_CITY_DETAILS',	    TBL_PREF.'tasker_location_details');
define('EMAIL_DETAILS',			    TBL_PREF.'email_details');
define('TASKER_VEHICLE_DETAILS',			TBL_PREF.'vehicle_details');
/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
