<?php

/*
 * @Contents
 */

namespace Contents;

class Controller_lendborrow extends Controller_Common
{

    /**
     * 貸し借り管理を人別に表示する
     */
    public function action_top()
    {
        //友達情報を取得する
        $user_friends = $this->user_profile->getFriends();
        
        //貸している情報
        $lend_info = $this->model_wrap->call('Model_Lend_And_Borrow_Mng','find','all',array(
                'where' => array(
                    array('lend_user_id', '=', $this->user_profile_id),
                ),
            ));
        
        
        //借りている情報
        $borrow_info = $this->model_wrap->call('Model_Lend_And_Borrow_Mng','find','all',array(
                'where' => array(
                    array('borrow_user_id', '=', $this->user_profile_id),
                ),
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
            $records[$lend->borrow_user_id]['lend']++;
        }
        
        foreach ($borrow_info as $borrow) {  
            if (!isset($records[$borrow->lend_user_id])) {
                $records[$borrow->lend_user_id] = array(
                                                    'lend'       => 0,
                                                    'borrow'     => 0,
                                                     'user_info' => $user_friends[$borrow->lend_user_id]
                                                   );
            }
            $records[$borrow->lend_user_id]['borrow']++;
        }
                
        $this->view_data['records'] = $records;
        
        $this->viewWrap('lendborrow/index', 'TOP');
    }
    
    /**
     * 貸し借りしている人の中でどんな貸し借りをしているかのリストを表示する
     */
    public function action_list($your_user_id)
    {
        
        //相手の情報を取得
        $your_user_prfile = $this->model_wrap->call('Model_User_Profile','find','first',array(
                'where' => array(
                    array('id', '=', $your_user_id),
                ),
            ));
        
        //貸している情報
        $lend_info = $this->model_wrap->call('Model_Lend_And_Borrow_Mng','find','all',array(
                'where' => array(
                    array('lend_user_id', '=', $this->user_profile_id),
                    array('borrow_user_id', '=', $your_user_id),
                ),
                'related' => array('category_mst'),
            ));
        
        
        //借りている情報
        $borrow_info = $this->model_wrap->call('Model_Lend_And_Borrow_Mng','find','all',array(
                'where' => array(
                    array('lend_user_id', '=', $your_user_id),
                    array('borrow_user_id', '=', $this->user_profile_id),
                ),
                'related' => array('category_mst'),
            ));
        
        //状態を取得
        $this->view_data['lendborrow_status'] = \Config::get('lendborrow_status');

        //その人への貸し借り情報別表示
        $records = array();
        $records['lend']   = $lend_info;
        $records['borrow'] = $borrow_info;
                
        $this->view_data['records'] = $records;

        $this->viewWrap('lendborrow/list', $your_user_prfile->user_name . 'さん');                
    }
    
    /**
     * 貸し借り詳細
     */
    public function action_detail($type, $lendborrow_mst_id)
    {
        
        if ($type === 'lend') {
            $your_user_text = 'borrow_user_id';
        } else if ($type === 'borrow') {
            $your_user_text = 'lend_user_id';            
        } else {
            //エラーページへ
            
            echo 'エラー';
            exit();
        }
        
         //貸している情報
        $sql  = ' SELECT mng.*, up.user_name, up.id as user_id, ca.category_name FROM lend_and_borrow_mng mng';
        $sql .= ' INNER JOIN user_profile up ON up.id = mng.' .  $your_user_text;
        $sql .= ' INNER JOIN category_mst ca ON ca.id = mng.category_mst_id';
        $sql .= ' WHERE ';
        $sql .= '  mng.id = ' . $lendborrow_mst_id;
        
        $lendborrow_data = $this->model_wrap->call('DB','query',$sql);
        
        $this->view_data['lendborrow_data'] = null;
        foreach ($lendborrow_data as $data) {
            $this->view_data['lendborrow_data'] = $data;
        }
        $this->view_data['type'] = $type;
        //状態を取得
        $this->view_data['lendborrow_status'] = \Config::get('lendborrow_status');
        

        $this->viewWrap('lendborrow/detail');          
    }
    
    public function action_edit() {
        
        $edit         = \Input::post('edit');
        $delete       = \Input::post('delete');
        $your_user_id = \Input::post('your_user_id');
        
     

        if (isset($edit) === true){
            $mst_id   = \Input::post('id');
            $status   = \Input::post('status');
            $memo    = \Input::post('memo');
            $money    = \Input::post('money');
            $limit    = \Input::post('limit');
            
            
            //貸している情報
            $edit_data = $this->model_wrap->call('Model_Lend_And_Borrow_Mng','find','first',array(
                    'where' => array(
                        array('id', '=', $mst_id),
                    ),
                ));
            
            $edit_data->status = (int)$status;
            $edit_data->memo   = $memo;
            $edit_data->money   = $money;
            $edit_data->limit  = (int)$limit;
            
            try {
                $edit_data->save();
            } catch(\Exception $e) {

            }
            
        } else if (isset($delete) === true) {
            $mst_id   = \Input::post('id');
            $sql  = 'DELETE FROM `lend_and_borrow_mng` WHERE `id` = ' . (int)$mst_id;

            try {
                $delete = $this->model_wrap->call('DB', 'query', $sql);
            } catch (\Exception $e) {
                var_dump($e->getMessage());
                exit();
            }
        } else {
            
        }
        
        \Response::redirect($this->view_data['base_url'] . 'lendborrow/list/' .$your_user_id);
    }
            
    
    /*
     * 新規登録画面
     */
    public function action_create() {
        $create         = \Input::post('create');
        
        if ($create !== null) {
            $type         = \Input::post('type');
            $your_user_id = \Input::post('your_user_id');
            $category     = \Input::post('category_mst_id');
            $date         = \Input::post('date');
            $money        = \Input::post('money');
            $limit        = \Input::post('limit');
            $memo         = \Input::post('memo');     
            
            $ins_data = array();
            if ($type === 'lend') {
                $ins_data['lend_user_id']   = $this->user_profile_id;
                $ins_data['borrow_user_id'] = $your_user_id;
                
            
            } else if ($type === 'borrow') {
                $ins_data['lend_user_id']   = $your_user_id;                
                $ins_data['borrow_user_id'] = $this->user_profile_id;
            }
            $ins_data['category_mst_id'] = $category;
            $ins_data['date']     = $date;
            $ins_data['money']    = $money;
            $ins_data['limit']    = $limit;
            $ins_data['memo']     = $memo;
            $ins_data['status']   = 0;
            
            $mng = $this->model_wrap->getModelInstance('Model_Lend_And_Borrow_Mng', $ins_data);
            $mng->save();
            
            //リダイレクト
            \Response::redirect($this->view_data['base_url'] . 'lendborrow/list/' .$your_user_id);
            
        }
        

        $this->viewWrap('lendborrow/create', '新規登録');    
        
    }
}
