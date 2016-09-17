<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function lispra_enqueues() {

    /* Styles */

    wp_register_style('lispra-css', get_lispra_lib_path().'css/lispra.css', false, null);
    wp_enqueue_style('lispra-css');
    /* Scripts */
    
    wp_register_script('lispra-js', get_lispra_lib_path().'js/lispra.js', false, null, true);
    wp_enqueue_script('lispra-js');

}

add_action('wp_enqueue_scripts', 'lispra_enqueues', 101);


?>