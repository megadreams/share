<?php

/*
 * @Contents
 */

namespace Contents;

class Controller_Top extends Controller_Common
{

    /**
     * The basic welcome message
     *
     * @access  public
     * @return  Response
     */
    public function action_index()
    {
        //友達情報を取得する
        $user_friends = $this->user_profile->getFriends();
        
        //貸している情報
        $lend_info = $this->model_wrap->call('Model_Lend_And_Borrow_Mng','find','all',array(
                'where' => array(
                    array('lend_user_id', '=', $this->user_profile_id),
                ),
                'group_by' => array('borrow_user_id'),
            ));
        
        
        //借りている情報
        $borrow_info = $this->model_wrap->call('Model_Lend_And_Borrow_Mng','find','all',array(
                'where' => array(
                    array('borrow_user_id', '=', $this->user_profile_id),
                ),
                'group_by' => array('lend_user_id')
            ));
        
        //人別　貸し借り数の表示
        $records = array();
        foreach ($lend_info as $lend) {            
            if (!isset($records[$lend->borrow_user_id])) {
                $records[$lend->borrow_user_id] = array(
                                                    'lend'       => 0,
                                                    'borrow'     => 0,
                                                     'user_info' => $user_friends[$lend->borrow_user_id]
                                                   );
            }
            $records[$lend->borrow_user_id]['borrow']++;
        }
        
        foreach ($borrow_info as $borrow) {            
            if (!isset($records[$borrow->lend_user_id])) {
                $records[$borrow->lend_user_id] = array(
                                                    'lend'       => 0,
                                                    'borrow'     => 0,
                                                     'user_info' => $user_friends[$borrow->lend_user_id]
                                                   );
            }
            $records[$borrow->lend_user_id]['lend']++;
        }
                
        $this->view_data['records'] = $records;
        
        $this->viewWrap('top/index');
    }

}
