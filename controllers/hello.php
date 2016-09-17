<?php
/*
  Controller name: Hello
  Controller description: Hello REST Controller Beta Ark
  Controller Author: Riggitt
  Controller Author Twitter: @akakaka
  Controller Author Website: ak.com 
*/
class JSON_API_Hello_Controller {

    public function hello_world() {
        return array(
            "message" => "Hello, world"
        );
    }

    public function hello_person() {
        global $json_api;
        $name = $json_api->query->name;
        return array(
            "message" => "Hello, $name."
        );
    }
    
    public function getid() {
//        global $json_api;
//        $name = $json_api->query->name;
//        return array(
//            "message" => "Hello, $name."
//        );
        return "TOMA COMEMIERDA";
    }

}

?>
