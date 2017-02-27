<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['page/level'] = 'page/level';
$route['page/success'] = 'page/success';
$route['page/contact-us'] = 'page/contact_us';
$route['page/about-us'] = 'page/about_us';
$route['page/faqs'] = 'page/faqs';
$route['page/coding'] = 'page/coding';
$route['page/coding'] = 'page/courses';
$route['page/coding'] = 'page/certificate';
$route['page/thanks'] = 'page/thanks';
$route['page/(:any)'] = 'page/index/$1';

$route['default_controller'] = 'Home';
$route['admin'] = 'admin/Admin/index';
$route['admin/logout'] = 'admin/Dashboard/logout';
$route['admin/manage_users'] = 'admin/Manage/manage_users';
$route['admin/admin-table'] = 'admin/Manage/admin_data_table';
$route['admin/manage_admins'] = 'admin/Manage/manage_admins';
$route['admin/new_admin'] = 'admin/Manage/new_admin';
$route['admin/manage_admins/(:num)'] = 'admin/Manage/edit_admin/$1';
$route["admin/block_user/(:num)"] = "admin/Manage/block_user/$1"; 
$route["admin/unblock_user/(:num)"] = "admin/Manage/unblock_user/$1"; 
$route["admin/change_admin_password/(:num)"] = "admin/Dashboard/change_password/$1"; 
$route["user_verification"] = "Login/user_verification"; 
$route["admin/view_user/(:num)"] = "admin/Manage/view_user/$1"; 
$route["admin/request_password"] = "admin/Admin/request_password"; 
$route["user/logout"] = "User_Authentication/logout"; 

/* Provider Route*/
$route['account/provider/(:any)'] = 'provider/$1';
$route['account/provider/delete/(:any)/(:any)'] = 'provider/delete/$1/$2';

/* Page Route*/
$route['admin/page/admin-table'] = 'admin/page/admin_data_table';
$route["admin/edit_page/(:num)"] = "admin/page/edit_page/$1"; 

$route["register"] = "login/register"; 
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;
