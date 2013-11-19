<?php

/*
 * @Contents
 */

namespace Contents;

class Controller_Setting extends Controller_Common
{

    /**
     * The basic welcome message
     *
     * @access  public
     * @return  Response
     */
    public function action_index()
    {
        //相手の情報を取得
        $this->view_data['user_info'] = $this->model_wrap->call('Model_User_Profile','find','first',array(
                'where' => array(
                    array('id', '=', $this->user_profile_id),
                ),
            ));
        $this->viewWrap('setting/index', '設定');
    }

}
