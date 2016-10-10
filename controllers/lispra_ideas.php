<?php

/*
  Controller name: Lispra Ideas
  Controller description: Lispra Ideas REST Controller ou yeah
  Controller Author: Riggitt
  Controller Author Twitter: @akakaka
  Controller Author Website: ak.com
 */

class JSON_API_Lispra_ideas_Controller {

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

    public function hello() {
        global $json_api;
        if (function_exists("wp_get_current_user")) {
            $u = wp_get_current_user();
            return array(
                "message" => "Greetings Sir $u->display_name from Lispra Ideas Land"
            );
        } else
            $json_api->error("YOU CANNOT PASSS NO CURRENT USERRRR");
    }

    // IDEAS //
    //DONE
    public function get() {
//           require_once locate_in_lispra('LispraRestApi.php');
//        require_once locate_in_lispra('LispraIdeas.php');
        global $json_api;
        $user_id = LispraCore::getCurrentLispraUserID();

        if ($user_id) {
            $params = $this->getQueryDefaultParams(array(LispraIdeas::IDEA_ID => NULL));

            return array(
                "response" => LispraIdeas::userGet($user_id, $params[LispraIdeas::IDEA_ID]));
        }
        $json_api->error("U CANNOT PASS");
    }

    //DONE
    public function delete() {
        global $json_api;
        $user_id = LispraCore::getCurrentLispraUserID();
        if ($user_id) {
            $params = $this->getQueryDefaultParams(array(LispraIdeas::IDEA_ID => NULL));
            return array(
                "response" => LispraIdeas::userDelete($user_id, $params[LispraIdeas::IDEA_ID]));
        }
        $json_api->error("U CANNOT PASS");
    }

    //DONE
    public function create() {
        global $json_api;
        $user_id = LispraCore::getCurrentLispraUserID();
        if ($user_id) {
            $data = $this->getQueryDefaultParams(array(
                LispraIdeas::IDEA_TITLE => "",
                LispraIdeas::IDEA_DESC => "",
                LispraIdeas::IDEA_TAGS => ""));
            if (ArrayUtils::isKeyEmpty($data, LispraIdeas::IDEA_TITLE)) {
                $json_api->error(LispraIdeas::IDEA_TITLE . " is empty");
            }
            return array(
                "response" => LispraIdeas::userCreate($user_id, $data));
        }
        $json_api->error("U CANNOT PASS");
    }

    //DONE
    public function update() {
        global $json_api;
        $user_id = LispraCore::getCurrentLispraUserID();
        if ($user_id) {

            $data = $this->getQueryDefaultParams(array(
                LispraIdeas::IDEA_ID => 0,
                LispraIdeas::IDEA_TITLE => "",
                LispraIdeas::IDEA_DESC => "",
                LispraIdeas::IDEA_TAGS => ""));

            if (ArrayUtils::isKeyEmpty($data, LispraIdeas::IDEA_TITLE)) {
                $json_api->error(LispraIdeas::IDEA_TITLE . " is empty");
            } elseif ((intval($data[LispraIdeas::IDEA_ID])) < 1) {
                $json_api->error(LispraIdeas::IDEA_ID . " not valid");
            } else {
                return array(
                    "response" => LispraIdeas::userUpdate($user_id, $data[LispraIdeas::IDEA_ID], $data));
            }
        }
        $json_api->error("U CANNOT PASS");
    }

}

?>
