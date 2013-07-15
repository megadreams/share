<?php

/*
 * @Contents
 */

namespace Contents;

class Controller_auth extends Controller_Common
{
    private $fb;
    private $strategy;
    
    public function before() {
        //親クラスのbeforeを呼び出して, $this->templateを使えるようにしてもらう
        parent::before();
               
        //初回ログイン画面の場合紹介画面を強制的に流す
        //モーダルビューで表示
        
    }
    
    
    public function action_index(){
        $this->viewWrap('auth/index', 'TOP');
    }    
    
    public function action_login($auth_platform){
        
        $this->strategy = \Lib_Strategy::getInstance($auth_platform);

        $login_url = $this->strategy->getLoginUrl();

        \Response::redirect($login_url);
    }    
    
    
    public function action_res($auth_platform) {
        $this->strategy = \Lib_Strategy::getInstance($auth_platform);

        //ユーザ情報と名前を取得する
        $login_user_data = $this->strategy->getUserProfile();
        
        //エラーチェック
        if ($login_user_data === false) {
            //エラーページへ
            \Response::redirect(\Uri::base() . 'error/message/1');
        }
        

        //既に登録されているユーザかをチェックする
        $user_profile = $this->model_wrap->call('Model_User_Profile', 'find', 'first', array(
            'where' => array(
                array('facebook_user_id', '=', $login_user_data['id'])
            )
        ));
        
        //登録されていなければ、登録処理
        if (empty($user_profile)) {

            if ($auth_platform === FACEBOOK) {
                $auth_pf_user_id_text = 'facebook_user_id';
            } else if ($auth_platform === TWITTER) {
                $auth_pf_user_id_text = 'facebook_user_id';                
            } else {
                exit();
            }
            $insert_data = array();
            $insert_data['facebook_user_id'] = $login_user_data['id'];            
            
            $insert_data['user_name']        = $login_user_data['user_name'];
            $insert_data['img_url']          = $this->strategy->getuserImage($login_user_data['id']);
            $user_profile = $this->model_wrap->getModelInstance('Model_User_Profile', $insert_data);
            $user_profile->save();
        }
        //セッションにセットする
        \Session::set('user_profile_id', $user_profile->id);
        
        \Response::redirect('contents/lendborrow/top?auth');
    }
    
    
    public function action_logout($auth_platform) {
        $this->strategy = \Lib_Strategy::getInstance($auth_platform);
        
        \Session::delete_flash('user_profile_id');
        $logoutUrl = $this->strategy->getLogoutUrl();
        \Response::redirect($logoutUrl);
    }
    
    
    public function action_post(){
        $data   = array();
        $result = "";
        $post   = "";
        $data['word'] = 'facebook/post';
        $data['menuClass'] = $this->menuClass;
        $data['pageTitle'] = $this->pageTitle;

        if(Input::post()){
            // POST時
            // テスト用に直接記述してますが、適宜変更してください。
            // 本来はDBから直接取得など。
            $user = '[投稿先のFBuserID]';

            // ユーザーのアクセストークンを使わないので無制限に利用できます。
            // ここではアプリ側のapp token & seacretで投稿してますが、用途が制限されるため、
            // ウォール投稿の他の使い方は保障できません。

            if($user){
                $post = Input::post('postbox');
                if(mb_strlen($post)>0 && mb_strlen($post)<1000){
                    try{
                        $result = $this->fb->api("/". $user ."/feed", "post", array(
                        "message" => $post . "TESTtime:" . date("Y/m/d H:i:s"),
                         "access_token" => Config::get('facebook.init.appId') ."|". Config::get('facebook.init.secret')
                        ));
                    } catch (FacebookApiException $e) {
                        $result    = $e;
                    }
                    $result        = "投稿成功！";
                    $post          = "";
                    $data['login'] = true;
                }
            }
        }

        $data['login'] = true;
        $data['result'] = $result;
        $data['post'] = $post;
        $this->template->content = View::forge('fb/post',$data);
    }    
    
}

