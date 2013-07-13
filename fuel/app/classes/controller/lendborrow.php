<?php

class Controller_Lendborrow extends Controller_Template
{
    
    private $view_data;
    
    public function before() {
        $this->template = 'template';
        //親クラスのbeforeを呼び出して, $this->templateを使えるようにしてもらう
        parent::before();
   }
    
    public function action_check($access_key)
    {
        //DB接続
        //$access_key から取得
        $access_data = $this->view_data['lendborrow'] = Model_Lend_And_Borrow_Sendurl::find('first',array(
            'where' => array(
                array('access_key', '=' ,$access_key),
            ),
        ));

        if (empty($access_data)){
            //エラーページへ
            echo 'データがありませn。エラー';
            exit();
        }
        
        $this->view_data['lendborrow'] = Model_Lend_And_Borrow_Mng::find('first',array(
            'where' => array(
                array('id', '=' ,$access_data->lend_and_borrow_mng_id),
            ),
            'related' => array('category_mst')
        ));
        
        //typeは受け手側にとっての情報 lend:受けて側が貸している　borrow:受けてがわが借りている
        $type = \Input::get('type');
        if ($type === 'lend') {
            $this->view_data['type'] = 'lend';
            $your_colmun = 'borrow_user_id';
            $my_colmun = 'lend_user_id';
        } else {
            $this->view_data['type'] = 'borrow';
            $your_colmun = 'lend_user_id';
            $my_colmun = 'borrow_user_id';
        }
                
        //自分の情報取得
        //相手ユーザ名
        $this->view_data['my_user_profile'] = Model_User_Profile::find('first',array(
            'where' => array(
                array('id', '=' ,$this->view_data['lendborrow']->$my_colmun),
            )
        ));        

        
        //相手ユーザ名
        $this->view_data['your_user_profile'] = Model_User_Profile::find('first',array(
            'where' => array(
                array('id', '=' ,$this->view_data['lendborrow']->$your_colmun),
            )
        ));        
        
        //状態を取得
        $this->view_data['lendborrow_status'] = \Config::get('lendborrow_status');
        

        $this->template->content = \View::forge('lendborrow/index',  array('view_data' => $this->view_data, 'title' => $this->view_data['my_user_profile']->user_name . 'さんへ'));        
        
    }

}
