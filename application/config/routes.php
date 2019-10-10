<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login';
$route['beranda'] = 'beranda' ;
$route['equipment/backlog'] = 'equipment/backlog' ;
$route['equipment/save'] = 'equipment/save' ;
$route['inventory/save'] = 'inventory/save' ;
$route['pm'] = 'pm';
$route['operation/daily-monitoring'] = 'operation/index';
$route['operation/daily-log'] = 'operation/log_daily';
$route['user/edit-user'] = 'user/editUser';
$route['inventory/sell-log'] = 'inventory/sellLog';
$route['inventory/transfer-log'] = 'inventory/transfer_log';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
