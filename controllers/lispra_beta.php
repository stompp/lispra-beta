<?php

/*
  Controller name: Lispra B3t4
  Controller description: Lispra Beta REST Controller ou yeah
  Controller Author: Riggitt
  Controller Author Twitter: @akakaka
  Controller Author Website: ak.com
 */

class JSON_API_Lispra_Beta_Controller {

    public function hello() {
        global $json_api;
        if (!is_user_logged_in()) {
            $json_api->error("YOU CANNOT PASSS LOGGINNN");
        }
        if (function_exists("wp_get_current_user")) {
            $u = wp_get_current_user();
            return array(
                "message" => "Greetings Sir $u->display_name from Lispra Land"
            );
        }
        $json_api->error("YOU CANNOT PASSS NO CURRENT USERRRR");
    }

    public function hello_world() {
        return array(
            "message" => "Hello, world from Lispra Land"
        );
    }

    public function hello_person() {
        global $json_api;
        $name = $json_api->query->name;
        return array(
            "message" => "Hello, $name from Lispra Land."
        );
    }

    public function checkuser() {
        global $json_api;

        if (function_exists("get_current_user_id")) {
            $id = get_current_user_id();
            return array(
                "message" => "Your user id is : $id"
            );
        }

        $json_api->error("YOU CANNOT PASSS");
    }

    public function action() {
        $current_user = wp_get_current_user();
        $current_user_id = $current_user->ID;
        $output = "ACTION DEFAULT OUTPUT";
        ob_start();
        require_once LISPRA_PATH.'actions.php';
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

}

?>
