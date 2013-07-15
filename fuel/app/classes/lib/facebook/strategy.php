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

        if (isset($user_data['id'])) {
            $return_data = array();        
            $return_data['id'] = $user_data['id'];         //FB_ID
            $return_data['user_name'] = $user_data['last_name'] . $user_data['first_name'];

            return $return_data;
        }
        return false;
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
    public function sendMessage($message, $url) {
        //ウォールへ投稿
        $result = $this->facebook->api("/me/feed", "post", array(
                       "message" => '〜さんが〜に貸し借り登録をしました。詳細はこちら。',
//                       "picture" => '',
                       "link" => $url,
                       "name" => 'リンク名',
                       "caption" => '貸し借り管理アプリで楽々',
                       "description" => 'リンクの説明文',
//                       "source" => '動画URL',
//                       "action" => json_encode(array(
  //                                   "name" => 'アクションリンク名',
    //                                 "link" => 'アクションリンクURL'))
        ));        
        var_dump($result);
        exit();
        return $result;
    }      
    
}
