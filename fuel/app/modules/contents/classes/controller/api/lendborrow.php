<?php

/*
 * @Contents
 */

namespace Contents;

class Controller_Api_Lendborrow extends \Controller_Rest
{
    private $strategy;
    public function before() {
        //親クラスのbeforeを呼び出して, $this->templateを使えるようにしてもらう
        parent::before();
        
    }
    
    public function action_pf_friends($platform, $user_profile_id = null) {
        if ($platform === 'default') {
            if (empty($user_profile_id)) {
                $this->response('user_profile_id not found', 404);
            }
            $model_wrap       = new Lib_Modelwrap();
            $user_profile = new Lib_UserProfile($model_wrap, $user_profile_id);
            
            $frind_list = $user_profile->getFriends();
            $user_data = array();
            foreach ($frind_list as $user) {
                $tmp['id']      = $user['id'];
                $tmp['name']    = $user['user_name'];
                $tmp['img_url'] = $user['img_url'];
                $user_data[] = $tmp;
            }
            $user_friends = array('data' => $user_data, 'platform' => 'default');
            
        } else {
            $this->strategy = \Lib_Strategy::getInstance($platform);
            $user_friends = $this->strategy->getUserFriends();            
        }
        $this->response($user_friends, 200);
    }       
 
}
