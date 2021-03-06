<?php

/*
  Controller name: Lispra Beta
  Controller description: Lispra Beta REST Controller ou yeah
  Controller Author: Riggitt
  Controller Author Twitter: @akakaka
  Controller Author Website: ak.com
 */

class JSON_API_Lispra_Beta_Controller {

    public function __construct() {
        require_once locate_in_lispra('LispraRestApi.php');
        require_once locate_in_lispra('LispraIdeas.php');
    }

    private function checkAuth() {
        global $json_api;
        global $lispraREST;

        if (!$lispraREST->isUserSet()) {
            $json_api->error("YOU CANNNOT PASSS!!!");
            return false;
        }
        return true;
    }

    private function checkQueryNotNulloEmptyRequiredKeys($keys) {
        global $json_api;

        foreach ($keys as $key) {
            if ((!is_null($key)) && isNullorEmpty($json_api->query->get($key))) {
                return false;
            }
        }

        return true;
    }

    private function getQueryDefaultParams($defaults) {
        global $json_api;

        $o = array();
        foreach ($defaults as $key => $value) {
            if (!isNullorEmpty($key)) {
                $v = $json_api->query->get($key);
                $o[$key] = (is_null($v)) ? $value : urldecode($v);

//            if (is_null($v)) {
//                $o[$key] = $value;
//            } else {
//                $o[$key] = $v;
//            }
            }
        }

        return $o;
    }

    private function pfunc() {
        return array("message" => "im private");
    }

    public function hello() {
        global $json_api;
        if (function_exists("wp_get_current_user")) {
            $u = wp_get_current_user();
            return array(
                "message" => "Greetings Sir $u->display_name from Lispra Land"
            );
        } else
            $json_api->error("YOU CANNOT PASSS NO CURRENT USERRRR");
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

    public function actions() {
        global $json_api;
        global $lispraREST;

        return json_encode($lispraREST->actions());
//        return array("ola" => "k ase");
    }

    public function action() {
        global $json_api;
        global $lispraREST;

        $responses = array();

        $q = urldecode($json_api->query->q);

        if (isJson($q)) {
            $a = json_decode($q, true);
            if (array_key_exists("user_actions", $a)) {
                if (is_array($a["user_actions"])) {
                    $responses = $lispraREST->getResponsesForUserActions($a["user_actions"]);
                }
            }
        }

        return array(
            "responses" => $responses
        );
    }

    public function test() {
        global $json_api;
        global $lispraREST;
        $action = urldecode($json_api->query->action);

        $a = json_decode($action, true);

//        return $a;
        return array(
            "a" => $a
        );

//        $p = json_decode($polla,true);
//        $message = $p["cipote"];
//         return array(
//            "message" => "asdsa",
//             "cipote" => "adsdas"
//        );
//        $action = json_decode($json_api->query->action);
//        ob_start();
//        $lispraREST->executeAction($action);
//        $message = $lispraREST->getUser()->getLists();
//        $message = ob_get_contents();
//        ob_end_clean();
//
//        return array(
//            "lists" => $message
//        );
    }

    public function test_scr() {
        global $json_api;
        global $lispraREST;

        $defaults = array(
            "embed" => "true"
        );


        $data = $this->getQueryDefaultParams($defaults);

        $content = $lispraREST->test_scr();

        if (isJson($content)) {
            $content = json_decode($content, true);
        }
//        if ($data["embed"] == "true") {
        return array(
            "response" => $content
        );
//        }
//        return $content;
    }

    public function createList() {
        global $json_api;
        global $lispraREST;
        if (!$this->checkAuth()) {
            return;
        }
        $requiredKeys = array(
            LISPRA_KEY_LIST_NAME
        );
        if (!$this->checkQueryNotNulloEmptyRequiredKeys($requiredKeys)) {
            $json_api->error("REQUIRED KEYS MISSING");
            return;
        }

//         $json_api->error("REQUIRED KEYS ok");
//            return;

        $defaults = array(
            LISPRA_KEY_LIST_NAME => "Untitled",
            LISPRA_KEY_LIST_CLASS => LISPRA_LIST_CLASS_TODO
        );

        $data = $this->getQueryDefaultParams($defaults);
//$json_api->error($data[LISPRA_KEY_LIST_NAME]." ".$data[LISPRA_KEY_LIST_CLASS]);
//        global $json_api;
//        global $lispraREST;
//
//        $list_name = $json_api->query->list_name;
//        $list_class = $json_api->query->list_class;
//
//        if (isNullorEmpty($list_name)) {
//            $json_api->error(LISPRA_KEY_LIST_NAME . " not set");
//            return;
//        }
//        if (isNullorEmpty($list_class)) {
//            $list_class = LISPRA_LIST_CLASS_TODO;
//        }
//
//        $data = array(
//            LISPRA_KEY_LIST_NAME => $list_name,
//            LISPRA_KEY_LIST_CLASS => $list_class
//        );
        $r = $lispraREST->getUser()->createList($data);

        if (is_null($r)) {
            $json_api->error("Null user action content");
//            return;
        }

        return array(
            "response" => $r
        );
    }

    public function deleteList() {
        
    }

    public function getLists() {

        if (!$this->checkAuth()) {
            return;
        }

        global $json_api;
        global $lispraREST;


        $r = $lispraREST->getUser()->getLists();
        $message = json_encode($lispraREST->getUser()->getLists());


        return array(
            "responseContent" => $r
        );
    }

    public function createListItem() {
        
    }

    public function getListContent() {
        
    }

    public function updateListItem() {
        
    }

    public function updateListHeader() {
        
    }

    public function pf() {
        return "this was private";
    }

    // IDEAS //

    public function getIdeas() {
        global $json_api;

        $user_id = LispraCore::getCurrentLispraUserID();

        if ($user_id) {
            return array(
                "response" => LispraIdeas::userGetIdeas($user_id));
        }

        $json_api->error("U CANNOT PASS");
    }

    public function getIdea() {
        global $json_api;

        $user_id = LispraCore::getCurrentLispraUserID();
        $params = $this->getQueryDefaultParams(array(LispraIdeas::IDEA_ID => null));

        if ($user_id) {
            return array(
                "response" => LispraIdeas::userGetIdeas($user_id));
        }

        $json_api->error("U CANNOT PASS");
    }

    public function createIdea() {
        global $json_api;

        $user_id = LispraCore::getCurrentLispraUserID();

        if ($user_id) {
            return array(
                "response" => LispraIdeas::userGetIdeas($user_id));
        }

        $json_api->error("U CANNOT PASS");
    }

    public function updateIdea() {
        global $json_api;

        $user_id = LispraCore::getCurrentLispraUserID();

        if ($user_id) {
            return array(
                "response" => LispraIdeas::userGetIdeas($user_id));
        }

        $json_api->error("U CANNOT PASS");
    }

    public function deleteIdea() {
        global $json_api;

        $user_id = LispraCore::getCurrentLispraUserID();

        if ($user_id) {
            return array(
                "response" => LispraIdeas::userGetIdeas($user_id));
        }

        $json_api->error("U CANNOT PASS");
    }

}

?>
