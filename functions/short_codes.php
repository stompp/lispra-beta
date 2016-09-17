<?php

/* 
 * LispraBeta Shortcodes
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function lispra_beta_hello_shortcode($atts, $content = null) {

    $output = '';

    $a = shortcode_atts(array(
        'name' => 'No one',
        'from' => 'No where',
            ), $atts);

    $output .= '<div class="alert alert-info">';
    $output .= " Greetings Lord <strong>"
            . wp_kses_post($a['name'])
            . "</strong> from <strong>"
            . wp_kses_post($a['from'])
            . "nindelierien.</strong> Welcom to our Lispra Beta Domains";
    $output .= '</div>';
    if (!is_null($content)) {
        $output .= '<div class="alert alert-warning">';
        $output .= $content;
        $output .= '</div>';
    }

    return $output;
}

add_shortcode('lispra-beta-hello', 'lispra_beta_hello_shortcode');


function lispra_component_short_code($atts, $content,$tag) {


    /*
     * Iniciar valores por defecto, no necesario en realidad
     * $a = shortcode_atts(array('key' => 'defaultValue'...),$atts)
     *  shortcode_atts( $pairs , $atts, $shortcode/$tag especifica segun tag  ); 
     * Obtener valor de para key apta 
     * Sanitize content for allowed HTML tags for post content. 
     * wp_kses_post($a['keyName'])
     * !no wp_kses_post hace esto Sanitize content for allowed HTML tags for post content.
     */

     include_once 'lispra/wp_core.php';

      if (function_exists("lispra_get_component_content")) {
          $output = lispra_get_component_content($tag,$atts,  $content);
//        $output = call_user_func_array($api_func,array($tag,$atts,  $content));
        if($output== FALSE) { return "<p>lispra_component_short_code false output</p>";}
        return $output;
    }  
    return "<p>lispra_component_short_code ERROR $api_func not found</p>";

}

add_shortcode('lispra_dismissable_alert', 'lispra_component_short_code');
add_shortcode('lispra_modal', 'lispra_component_short_code');
add_shortcode('lispra_user_list_of_lists_panel', 'lispra_component_short_code');
add_shortcode('lispra_user_list_panel', 'lispra_component_short_code');