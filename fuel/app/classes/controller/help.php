<?php

class Controller_Help extends Controller_Template
{
    
    private $view_data;
    
    public function before() {
        $this->template = 'template';
        //親クラスのbeforeを呼び出して, $this->templateを使えるようにしてもらう
        parent::before();
   }
    
    public function action_index()
    {
        
        $this->template->content = \View::forge('help/index',  array('view_data' => $this->view_data, 'title' => 'お問い合わせ'));        
        
    }

}
