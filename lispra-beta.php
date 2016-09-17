<?php
/*
Plugin Name: LispraBeta
Plugin URI:  https://bitbucket.org/jmtome/lispra-beta
Description: LispraBeta Beta Test Plugin
Version: 1.0.0
Author: J.M Tomé
Author URI: 
License: GPLv2
*/

/** Absolute path to the Lispra Lib */
define('LISPRA_LIB_PATH', '/lispra/');

function get_lispra_lib_path(){
    return LISPRA_LIB_PATH;
}

/** enqueues Styles and Scripts */
require_once dirname(__FILE__) . '/functions/enqueues.php';
/** [short-codes] */
require_once dirname(__FILE__) . '/functions/short_codes.php';
/** Controllers */
require_once dirname(__FILE__) . '/controllers/setup.php';





