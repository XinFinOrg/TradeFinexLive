<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['pre_controller'][] = array(

);

/*

$hook['post_controller'][] = array(
        'class'    => 'Usernotify',
        'function' => 'Create_Notification',
        'filename' => 'Usernotify.php',
        'filepath' => 'hooks',
        'params'   => array()
);

*/

$hook['display_override'][] = array(
    'class' => '',
    'function' => 'CI_Minifier_Hook_Loader',
    'filename' => '',
    'filepath' => ''
);