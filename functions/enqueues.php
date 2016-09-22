<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function lispra_enqueues() {



    /**STYLES**/

    /* Bootstrap */
    wp_register_style('bootstrap', lispra_lib_uri('vendors/bootstrap/dist/css/bootstrap.min.css'), false, null);
    wp_enqueue_style('bootstrap');
    /* Font Awesome */
    wp_register_style('fontawesome', lispra_lib_uri('vendors/font-awesome/css/font-awesome.min.css'), false, null);
    wp_enqueue_style('fontawesome');
    /* PNotify */
    wp_register_style('pnotify', lispra_lib_uri('vendors/pnotify/dist/pnotify.css'), false, null);
    wp_enqueue_style('pnotify');
    wp_register_style('pnotify-buttons', lispra_lib_uri('vendors/pnotify/dist/pnotify.buttons.css'), false, null);
    wp_enqueue_style('pnotify-buttons');
    wp_register_style('pnotify-nonblock', lispra_lib_uri('vendors/pnotify/dist/pnotify.nonblock.css'), false, null);
    wp_enqueue_style('pnotify-nonblock');
    /*Gentelella */
    wp_register_style('gentelella', lispra_lib_uri('css/gentelella.css'), false, null);
    wp_enqueue_style('gentelella');
    /* Lispra */
    wp_register_style('lispra-css', lispra_lib_uri('css/lispra.css'), false, null);
    wp_enqueue_style('lispra-css');
    /**!STYLES**/

    /**SCRIPTS**/

    /* JQuery */
    wp_register_script('jquery-js', lispra_lib_uri('vendors/jquery/dist/jquery.min.js'), false, null, true);
    wp_enqueue_script('jquery-js');
    /* Bootstrp */
    wp_register_script('bootstrap-js', lispra_lib_uri('vendors/bootstrap/dist/js/bootstrap.min.js'), false, null, true);
    wp_enqueue_script('bootstrap-js');
    /* PNotify */
    wp_register_script('pnotify', lispra_lib_uri('vendors/pnotify/dist/pnotify.js'), false, null, true);
    wp_enqueue_script('pnotify');
    wp_register_script('pnotify-buttons', lispra_lib_uri('vendors/pnotify/dist/pnotify.buttons.js'), false, null, true);
    wp_enqueue_script('pnotify-buttons');
    wp_register_script('pnotify-nonblock', lispra_lib_uri('vendors/pnotify/dist/pnotify.nonblock.js'), false, null, true);
    wp_enqueue_script('pnotify-nonblock');
     /* Gentelella */   
    wp_register_script('gentelella-js', lispra_lib_uri('js/gentelella.js'), false, null, true);
    wp_enqueue_script('gentelella-js');
    /* Lispra */
    wp_register_script('lispra-js', lispra_lib_uri('js/lispra.js'), false, null, true);
    wp_enqueue_script('lispra-js');
    /**!SCRIPTS**/
}

add_action('wp_enqueue_scripts', 'lispra_enqueues', 100);
?>