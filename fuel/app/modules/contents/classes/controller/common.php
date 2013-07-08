<?php

/*
 * @Contents
 */
namespace Contents;
class Controller_Common extends \Controller_Template {

    protected $user_profile_id;
    protected $user_profile;
    
    protected $agent;
    protected $view_data;
    protected $seg;


    protected $lib_util;
    protected $lib_user_profile;
    protected $model_wrap;

    
    public function before() {
        
        $this->lib_util         = new Lib_Util();
        
        $this->model_wrap       = new Lib_Modelwrap();


        //ユーザエージェントを用いてPC版とスマフォ版のビューを切り替える
        $this->agent = $this->lib_util->getAgentList();
        if ($this->agent['mobile'] === 'true') {
            $this->template = 'template_mobile';
        } else {
            $this->template = 'template_pc';        
        }
        //親クラスのbeforeを呼び出して, $this->templateを使えるようにしてもらう
        parent::before();
        
        $this->view_data['base_url'] = \Uri::Base() . 'contents/';
        
        //リファラーの取得
        $this->view_data['referer'] = \Input::referrer();
        

        
        $this->seg = \Uri::segments();
        // 認証時は以下の処理は行わない
        if ($this->seg[1] === 'auth') {
            return;
        }
        
        
        //ログインしているかチェック
        $this->user_profile_id = \Session::get('user_profile_id');
        if ($this->user_profile_id === null) {
            \Response::redirect($this->view_data['base_url'] . 'auth/');
        }
        
        $this->user_profile = new Lib_UserProfile($this->model_wrap, $this->user_profile_id);
           
        

    }


    public function after($response) {
        //親クラスのafterを呼び出して, responseインスタンスをもらう
        parent::after($response);
        $response = parent::after($response);
        return $response;
    }
    
    
    
    protected function viewWrap($path = null, $title = '貸し借り管理') {        
        //Viewのtemplate.phpにそれぞれ渡す
        $this->template->content = \View::forge($path,  array('view_data' => $this->view_data, 'title' => $title));        
        if ($this->seg[1] !== 'auth') {
            $this->template->footer  = \View::forge('inc/footer',  array('view_data' => $this->view_data));
        } else {
            $this->template->footer  = null;
        }
    }

    
    

}