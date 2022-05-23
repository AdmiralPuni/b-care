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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//request plasma/blood
$route['api/v1/request/new'] = 'api_donor/new_request_item';
$route['api/v1/request/blood'] = 'api/get_blood';
$route['api/v1/request/plasma'] = 'api/get_plasma';
$route['api/v1/request/simple/blood'] = 'api_request/get_simple_blood';
$route['api/v1/request/simple/plasma'] = 'api_request/get_simple_plasma';

//donor routes / pasien
$route['api/v1/donor/new'] = 'api_donor/new_donor';
$route['api/v1/donor/switch'] = 'api_donor/switch_status';
$route['api/v1/donor/blood'] = 'api_donor/get_blood';
$route['api/v1/donor/plasma'] = 'api_donor/get_plasma';
$route['api/v1/donor/simple/blood'] = 'api_donor/get_simple_blood';
$route['api/v1/donor/simple/plasma'] = 'api_donor/get_simple_plasma';
$route['api/v1/donor/simple/blood/range'] = 'api_donor/get_simple_blood_range';
$route['api/v1/donor/simple/plasma/range'] = 'api_donor/get_simple_plasma_range';

//user management
$route['api/v1/user/new'] = 'api_user/register';
$route['api/v1/user/verify'] = 'api_user/verify';
$route['api/v1/admin/verify'] = 'api_user/verify_admin';
$route['api/v1/user/info'] = 'api_profile/get_single_donor';
$route['api/v1/profile'] = 'api_donor/get_both_single';

//user donor
$route['api/v1/profile/new'] = 'api_profile/new_donor';
$route['api/v1/profile/update'] = 'api_profile/update_donor';
$route['api/v1/profile/all'] = 'api_profile/get_donors';
$route['api/v1/profile/simple'] = 'api_profile/get_simple_donors';
$route['api/v1/profile/single'] = 'api_profile/get_single_donor';
$route['api/v1/profile/single/simple'] = 'api_profile/get_single_donor_simple';

//stock
$route['api/v1/stock/blood'] = 'api_stock/get_blood';
$route['api/v1/stock/blood/update'] = 'api_stock/update_blood';

//event
$route['api/v1/event/new'] = 'api_event/insert_event';
$route['api/v1/event/all'] = 'api_event/get_all_events';
$route['api/v1/event/active'] = 'api_event/get_active_event';

//static pages
$route['dashboard'] = 'pages/dashboard';
$route['blood'] = 'pages/blood';
$route['plasma'] = 'pages/plasma';
$route['profiles'] = 'pages/profiles';
$route['stock'] = 'pages/stock';
$route['events'] = 'pages/events';
$route['docs'] = 'pages/docs';
$route['reports'] = 'pages/reports';

//verification
$route['verification/verify'] = 'api_user/verify_email';
$route['verification/resend'] = 'api_user/resend_email';
$route['verification/status'] = 'api_user/verification_status';

$route['verification/reset'] = 'api_reset/reset';
$route['verification/reset/verify'] = 'api_reset/reset_password';
$route['verification/reset/change'] = 'api_reset/change_password';