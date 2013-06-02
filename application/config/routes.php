<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['api/makeavatar/(:any)'] = 'api/makeavatar/$1';
$route['api/viewavatar/(:any)'] = 'api/getAvatar/$1';
$route['api/downloadavatar/(:any)'] = 'api/downloadAvatar/$1';
$route['api/downloaditem/(:any)'] = 'api/downloadItem/$1';
$route['api/getavatars'] = 'api/getAllAvatars/';
$route['api/viewitem/(:any)'] = 'api/getItem/$1';
$route['api/getitems'] = 'api/getAllItems/';
$route['api/index'] = 'api/index';


$route['type/create'] = 'type/create/';
$route['type/add'] = 'type/add/';
$route['type/update/(:any)'] = 'type/update/$1/';
$route['type/edit/(:any)'] = 'type/edit/$1/';
$route['type/view/(:any)'] = 'type/view/$1';
$route['type/delete/(:any)'] = 'type/delete/$1/';
$route['type/index'] = 'type/index';
$route['type/(:any)'] = 'type';
$route['type'] = 'type';

$route['user/create'] = 'user/create/';
$route['user/add'] = 'user/add/';
$route['user/update/(:any)'] = 'user/update/$1/';
$route['user/edit/(:any)'] = 'user/edit/$1/';
$route['user/view/(:any)'] = 'user/view/$1';
$route['user/delete/(:any)'] = 'user/delete/$1/';
$route['user/index'] = 'user/index';
$route['user/(:any)'] = 'user';
$route['user'] = 'user';

$route['avatar/create'] = 'avatar/create/';
$route['avatar/add'] = 'avatar/add/';
$route['avatar/update/(:any)'] = 'avatar/update/$1/';
$route['avatar/edit/(:any)'] = 'avatar/edit/$1/';
$route['avatar/view/(:any)'] = 'avatar/view/$1';
$route['avatar/delete/(:any)'] = 'avatar/delete/$1/';
$route['avatar/index'] = 'avatar/index';
$route['avatar/(:any)'] = 'avatar';
$route['avatar'] = 'avatar';


$route['item/create'] = 'item/create/';
$route['item/create_manual'] = 'item/create_manual/';
$route['item/add'] = 'item/add/';
$route['item/add_manual'] = 'item/add_manual/';
$route['item/update/(:any)'] = 'item/update/$1/';
$route['item/edit/(:any)'] = 'item/edit/$1/';
$route['item/view/(:any)'] = 'item/view/$1';
$route['item/delete/(:any)'] = 'item/delete/$1/';
$route['item/index'] = 'item/index';
$route['item/(:any)'] = 'item';
$route['item'] = 'item';

$route['register/create'] = 'register/create';
$route['register/(:any)'] = 'register';
$route['register'] = 'register';

$route['default_controller'] = "login";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */