<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*HELLO CONTROLLER*/
function add_hello_controller($controllers) {
  $controllers[] = 'hello';
  return $controllers;
}
add_filter('json_api_controllers', 'add_hello_controller');
function set_hello_controller_path() {
    return dirname(__FILE__) . '/hello.php';
}
add_filter('json_api_hello_controller_path', 'set_hello_controller_path');
/*!HELLO CONTROLLER*/

/*LISPRA BETA CONTROLLER*/
function add_lispra_beta_controller($controllers) {
  $controllers[] = 'lispra_beta';
  return $controllers;
}
add_filter('json_api_controllers', 'add_lispra_beta_controller');
function set_lispra_beta_controller_path() {
    return dirname(__FILE__) . '/lispra_beta.php';
}
add_filter('json_api_lispra_beta_controller_path', 'set_lispra_beta_controller_path');
/*!LISPRA BETA CONTROLLER */

