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
$route['default_controller'] = 'FrontControl_Home/home';
$route['event_page'] = 'FrontControl_Event/event_page';
$route['event_page/(:num)'] = 'FrontControl_Event/event_page/$1';
$route['(:num)'] = 'FrontControl_Event/event_click/$1';
$route['mendaftar_event/(:num)'] = 'KelolaPendaftar/mendaftar_event/$1';
$route['ngertirak'] = 'FrontControl_NgertiRak/ngertirak';
$route['ngertirak/(:num)'] = 'FrontControl_NgertiRak/ngertirak/$1';
$route['artikel/(:num)'] = 'KelolaArtikel/halaman_baca_artikel/$1';
$route['faq'] = 'FrontControl_Faq/faq';
$route['contact_us'] = 'FrontControl_ContactUs/contact_us';
$route['registrasi_member_baru'] = 'KelolaMember/registrasi_member_baru';
$route['reset_password_member'] = 'KelolaMember/reset_password_member';
$route['home'] = 'FrontControl_Home/home';
$route['home/(:num)'] = 'FrontControl_Home/home/$1';
$route['liputan/(:num)'] = 'KelolaNews/halaman_baca_artikel_pra_event/$1';
$route['upload_bukti_bayar'] = 'KelolaPendaftar/upload_bukti_bayar';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* company profile admin */
$route['admin'] = 'Account/index';

/* test character */
$route['admin/test-character'] 				 = 'TestCharacter/index';
$route['admin/test-character/edit/(:num)']   = 'TestCharacter/edit/$1';
$route['admin/test-character/store'] 		 = 'TestCharacter/store';
$route['admin/test-character/update/(:num)'] = 'TestCharacter/update/$1';
$route['admin/test-character/delete/(:num)'] = 'TestCharacter/delete/$1';

/* test passion */
$route['admin/test-passion-interest'] 				= 'TestPassion/index';
$route['admin/test-passion-interest/create'] 		= 'TestPassion/create';
$route['admin/test-passion-interest/edit/(:num)']   = 'TestPassion/edit/$1';
$route['admin/test-passion-interest/store'] 		= 'TestPassion/store';
$route['admin/test-passion-interest/update/(:num)'] = 'TestPassion/update/$1';
$route['admin/test-passion-interest/delete/(:num)'] = 'TestPassion/delete/$1';

/* test work attitude */
$route['admin/test-work-attitude'] 				 = 'TestWorkAttitude/index';
$route['admin/test-work-attitude/create'] 		 = 'TestWorkAttitude/create';
$route['admin/test-work-attitude/edit/(:num)']   = 'TestWorkAttitude/edit/$1';
$route['admin/test-work-attitude/store'] 		 = 'TestWorkAttitude/store';
$route['admin/test-work-attitude/update/(:num)'] = 'TestWorkAttitude/update/$1';
$route['admin/test-work-attitude/delete/(:num)'] = 'TestWorkAttitude/delete/$1';

/* test softskill */
$route['admin/test-softskill'] 				 = 'TestSoftskill/index';
$route['admin/test-softskill/create'] 		 = 'TestSoftskill/create';
$route['admin/test-softskill/edit/(:num)']   = 'TestSoftskill/edit/$1';
$route['admin/test-softskill/store'] 		 = 'TestSoftskill/store';
$route['admin/test-softskill/update/(:num)'] = 'TestSoftskill/update/$1';
$route['admin/test-softskill/delete/(:num)'] = 'TestSoftskill/delete/$1';


/*=========================================================*/

/* talent */
$route['talent/login'] = 'AccountTalent/index';
$route['talent/logout'] = 'AccountTalent/logout_member';
$route['talent/signup'] = 'AccountTalent/view_signup';

$route['talent'] = 'Talent/index';
$route['talent/account/edit'] = 'Talent/editAccount';
$route['talent/account/update'] = 'Talent/updateAccount';
$route['talent/profile/edit'] = 'Talent/editProfile';
$route['talent/profile/update'] = 'Talent/updateProfile';
$route['talent/password/update'] = 'Talent/updatePassword';

$route['talent/cv-work-experience/create'] = 'TalentCVWork';
$route['talent/cv-work-experience/edit/(:num)'] = 'TalentCVWork/edit/$1';
$route['talent/cv-work-experience/store'] = 'TalentCVWork/store';
$route['talent/cv-work-experience/update/(:num)'] = 'TalentCVWork/update/$1';
$route['talent/cv-work-experience/delete/(:num)'] = 'TalentCVWork/delete/$1';

$route['talent/cv-education/create'] = 'TalentCVEducation';
$route['talent/cv-education/edit/(:num)'] = 'TalentCVEducation/edit/$1';
$route['talent/cv-education/store'] = 'TalentCVEducation/store';
$route['talent/cv-education/update/(:num)'] = 'TalentCVEducation/update/$1';
$route['talent/cv-education/delete/(:num)'] = 'TalentCVEducation/delete/$1';

$route['talent/cv-achievement/create'] = 'TalentCVAchievement';
$route['talent/cv-achievement/edit/(:num)'] = 'TalentCVAchievement/edit/$1';
$route['talent/cv-achievement/store'] = 'TalentCVAchievement/store';
$route['talent/cv-achievement/update/(:num)'] = 'TalentCVAchievement/update/$1';
$route['talent/cv-achievement/delete/(:num)'] = 'TalentCVAchievement/delete/$1';

$route['talent/cv-course/create'] = 'TalentCVCourse';
$route['talent/cv-course/edit/(:num)'] = 'TalentCVCourse/edit/$1';
$route['talent/cv-course/store'] = 'TalentCVCourse/store';
$route['talent/cv-course/update/(:num)'] = 'TalentCVCourse/update/$1';
$route['talent/cv-course/delete/(:num)'] = 'TalentCVCourse/delete/$1';

$route['talent/vacancy/detail'] = 'Talent/vacancyDetail';


/* test character */
$route['talent/test-character'] 		= 'TalentTest/showCharacter';
$route['talent/test-character/submit']	= 'TalentTest/submitCharacter';

/* test passion */
$route['talent/test-passion'] 		 = 'TalentTest/showPassion';
$route['talent/test-passion/submit'] = 'TalentTest/submitPassion';

/* test work attitude */
$route['talent/test-work-attitude'] 		= 'TalentTest/showWorkAttitude';
$route['talent/test-work-attitude/submit']	= 'TalentTest/submitWorkAttitude';

/* test soft skill */
$route['talent/test-soft-skill'] 		= 'TalentTest/showSoftSkill';
$route['talent/test-soft-skill/submit']	= 'TalentTest/submitSoftSkill';

$route['talent/test/access-denied'] = 'TalentTest/accessDenied';


/*================================================================================*/


/* company member */
$route['company'] 						= 'CompanyMember/index';
$route['company/updates'] 				= 'CompanyMember/updates_page';
$route['company/updates/page']		 	= 'CompanyMember/updates_page';
$route['company/updates/page/(:num)'] 	= 'CompanyMember/updates_page';
$route['company/updates/detail/(:num)'] = 'CompanyMember/detail_updates/$1';
$route['company/updates/edit/(:num)'] 	= 'CompanyMember/edit_updates/$1';
$route['company/updates/store'] 		= 'CompanyMember/store_updates';
$route['company/updates/update/(:num)'] = 'CompanyMember/update_updates/$1';
$route['company/updates/delete/(:num)'] = 'CompanyMember/delete_updates/$1';

/* company job vacancy */
$route['company/job-vacancy'] 				= 'CompanyMember/jobs_page';
$route['company/job-vacancy/page'] 			= 'CompanyMember/jobs_page';
$route['company/job-vacancy/page/(:num)'] 	= 'CompanyMember/jobs_page';
$route['company/job-vacancy/create'] 		= 'CompanyMember/add_jobs_page';
$route['company/job-vacancy/detail/(:num)'] = 'CompanyMember/detail_job/$1';
$route['company/job-vacancy/edit/(:num)'] 	= 'CompanyMember/edit_job/$1';
$route['company/job-vacancy/store'] 		= 'CompanyMember/store_job';
$route['company/job-vacancy/update/(:num)'] = 'CompanyMember/update_job/$1';
$route['company/job-vacancy/delete/(:num)'] = 'CompanyMember/delete_job/$1';
$route['company/job-vacancy/category/(:any)'] 			  = 'CompanyMember/filter_job/$1';
$route['company/job-vacancy/category/(:any)/page']		  = 'CompanyMember/filter_job/$1';
$route['company/job-vacancy/category/(:any)/page/(:num)'] = 'CompanyMember/filter_job/$1';
$route['company/job-vacancy/search'] 			 = 'CompanyMember/search_job';
$route['company/job-vacancy/search/page']		 = 'CompanyMember/search_job';
$route['company/job-vacancy/search/page/(:num)'] = 'CompanyMember/search_job';

/* company job notification */
$route['company/notification'] 				 = 'CompanyMember/notification_page';
$route['company/notification/detail/(:num)'] = 'CompanyMember/detail_notification/$1';


/* job vacancy */
$route['job-vacancy'] 				= 'JobVacancy/job_list';
$route['job-vacancy/page'] 			= 'JobVacancy/job_list';
$route['job-vacancy/page/(:num)'] 	= 'JobVacancy/job_list';
