<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$active_group = 'default';
$active_record = TRUE;

if (strpos(base_url(), "wfpc92.tk")) {
    $db['default']['hostname'] = 'mysql.nixiweb.com';
    $db['default']['username'] = 'u974710561_proy1';
    $db['default']['password'] = 'u974710561_proy1';
} else {
    $db['default']['hostname'] = 'localhost';
    $db['default']['username'] = 'root';
    $db['default']['password'] = '';
}

$db['default']['database'] = 'u974710561_proy1';
$db['default']['dbdriver'] = 'mysql';
$db['default']['port'] = 3306;
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = FALSE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;



/* End of file database.php */
/* Location: ./application/config/database.php */