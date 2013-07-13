<?php


require_once APPPATH.'vendor/facebook-php-sdk/src/facebook.php';

class Lib_Facebook_Strategy extends Lib_Strategy implements Lib_Strategy_interface{
    private $facebook;

    
    public function __construct() {
        $this->facebook = new \Facebook(\Config::get('facebook.init'));

    }
    
    
    public function getLoginUrl() {
        return $this->facebook->getLoginUrl(\Config::get('facebook.login'));
    }
    
    public function getLogoutUrl() {
        return $this->facebook->getLogoutUrl(\Config::get('facebook.logout'));;
    }
    
    public function getUserProfile() {
        $user_data = $this->facebook->api('/me');

        $return_data = array();        
        $return_data['id'] = $user_data['id'];         //FB_ID
        $return_data['user_name'] = $user_data['last_name'] . $user_data['first_name'];

        return $return_data;
    }        
    
    public function getuserImage($user_id) {
        return str_replace(\Config::get('str_replace'), $user_id, \Config::get('facebook.user_picture'));
    }
    
    public function getUserFriends() {
        $user_friends = $this->facebook->api('/me/friends');
        
        $return_data = array();
        if(empty($user_friends['data']) === false) {
            //名前の順番に並べ替えれたらうれしい
            
            
            
            foreach ($user_friends['data'] as $user) {
                $array = array();
                $array['id']      = $user['id'];
                $array['name']    = $user['name'];
                $array['img_url'] = 'https://graph.facebook.com/' . $user['id'] . '/picture';
                $return_data[] = $array;
            }
        
        }
        return array('data' => $return_data, 'platform' => 'facebook');
    }
}
