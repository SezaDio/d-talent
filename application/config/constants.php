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

/*
 * Application constants
 */
defined('WEB_LOGOFILE')			OR define('WEB_LOGOFILE', '/assets/images/logo-v1.3.png');
defined('WEB_CONTACTEMAIL')		OR define('WEB_CONTACTEMAIL', 'hello@d-talentsolution.id');
defined('WEB_CONTACTNUMBER')	OR define('WEB_CONTACTNUMBER', '+62-81-2222-3781');
defined('WEB_HEADQUARTER_ADDRESS')	OR define('WEB_HEADQUARTER_ADDRESS', "Jl. Seudati IV No. E34 Perumahan P4A\nPudakpayung, Kota Semarang, 50265");
defined('WEB_SUBMIT_TAG')			OR define('WEB_SUBMIT_TAG', 'formsubmit');
defined('WEB_IDPLACEHOLDER_TAG')	OR define('WEB_IDPLACEHOLDER_TAG', '%%id%%');

//-- Session
defined('WEB_SESS_TYPE')		OR define('WEB_SESS_TYPE', 'sessType');
defined('WEB_SESS_MEMBERID')	OR define('WEB_SESS_MEMBERID', 'sessMemberId');
defined('WEB_SESS_FNAME')		OR define('WEB_SESS_FNAME', 'sessUserName');
defined('WEB_SESS_DETAILID')	OR define('WEB_SESS_DETAILID', 'sessDetailId');
defined('WEB_SESS_ROLE')		OR define('WEB_SESS_ROLE', 'sessUserRole');
defined('WEB_SESS_PRIV')		OR define('WEB_SESS_PRIV', 'sessUserPriv');

//-- Limits
defined('SRV_EMAILVERIFY_SENDLIMIT')	OR define('SRV_EMAILVERIFY_SENDLIMIT', 5); // Send email once in 5 minutes each user

//-- Backoffice
defined('WEB_BACKOFFICE_BASEURL')	OR define('WEB_BACKOFFICE_BASEURL', '/members/bo');

//-- Status values
defined('SRV_STATUS_REJECTED')		OR define('SRV_STATUS_REJECTED', 0);
defined('SRV_STATUS_ACCEPTED')		OR define('SRV_STATUS_ACCEPTED', 1);
defined('SRV_STATUS_PENDING')		OR define('SRV_STATUS_PENDING', 99);

//-- Table constants
defined('SRV_TBL_LOGINDATA')	OR define('SRV_TBL_LOGINDATA', 'members');
defined('SRV_TBL_TALENTINFO')	OR define('SRV_TBL_TALENTINFO', 'talent');
defined('SRV_TBL_COURSES')      OR define('SRV_TBL_COURSES', 'courses');
