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
                    array('status', '=', 0),
                ),
            ));
 
        //借りている情報
        $borrow_info = $this->model_wrap->call('Model_Lend_And_Borrow_Mng','find','all',array(
                'where' => array(
                    array('borrow_user_id', '=', $this->user_profile_id),
                    array('status', '=', 0),
                ),
            ));
        
        //人別　貸し借り数の表示
        $records = array();
        // 貸している情報を取得
        foreach ($lend_info as $lend) {
            if (!isset($records[$lend->borrow_user_id])) {
                $records[$lend->borrow_user_id] = array(
                                                    'sum'        => 0,
                                                    'user_info' => $user_friends[$lend->borrow_user_id]
                                                   );
            }
            $records[$lend->borrow_user_id]['sum'] += (int)$lend->money;
        }

        //　借りている情報を取得
        foreach ($borrow_info as $borrow) {  
            if (!isset($records[$borrow->lend_user_id])) {
                $records[$borrow->lend_user_id] = array(
                                                     'sum'        => 0,
                                                     'user_info' => $user_friends[$borrow->lend_user_id]
                                                   );
            }
            $records[$borrow->lend_user_id]['sum'] -= (int)$borrow->money;
        }
        
        $this->view_data['records'] = $records;
        $this->viewWrap('lendborrow/index', '貸し借りリスト');
    }
    
    /**
     * 貸し借りしている人の中でどんな貸し借りをしているかのリストを表示する
     */
    public function action_list($your_user_id, $status = 0)
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
//                    array('status', '=', $status),
                ),
                'order_by' => array(
                    array('date', 'DESC')
                ),
                'related' => array('category_mst'),
            ));
        
        
        //借りている情報
        $borrow_info = $this->model_wrap->call('Model_Lend_And_Borrow_Mng','find','all',array(
                'where' => array(
                    array('lend_user_id', '=', $your_user_id),
                    array('borrow_user_id', '=', $this->user_profile_id),
//                    array('status', '=', $status),
                ),
                'order_by' => array(
                    array('date', 'DESC')
                ),
                'related' => array('category_mst'),
            ));
        
        //状態を取得
        $this->view_data['lendborrow_status'] = \Config::get('lendborrow_status');

        
        // 合計で貸しているのか借りているのかを表示する
        $lend_and_borrow_summary = array(
                            'lend'   => 0,
                            'borrow' => 0,
                            'sum'    => 0,
        );
        // 貸している情報をまとめる
        foreach ($lend_info as $recode) {
            // 返金されていないデータのみ取得
            if ($recode->status == 0) {
                $lend_and_borrow_summary['lend'] += (int)$recode->money;
            }
        }
        // 借りている情報をまとめる
        foreach ($borrow_info as $recode) {
            // 返金されていないデータのみ取得
            if ($recode->status == 0) {
                $lend_and_borrow_summary['borrow'] += (int)$recode->money;
            }
        }
        // 合計値の算出  (-の場合借金、+の場合貸している)
        $lend_and_borrow_summary['sum'] = $lend_and_borrow_summary['lend'] - $lend_and_borrow_summary['borrow'];
        
        //その人への貸し借り情報別表示
        $records = array();
        $records['lend']   = $lend_info;
        $records['borrow'] = $borrow_info;
        
        $this->view_data['records'] = $records;
        $this->view_data['lend_and_borrow_summary'] = $lend_and_borrow_summary;
        $this->view_data['your_user_id'] = $your_user_id;

        $this->viewWrap('lendborrow/list', $your_user_prfile->user_name . 'さんへ');                
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

        
        //LINEで送る
        $access_key = $this->lib_util->getViewAccessKey($lendborrow_mst_id, $this->user_profile_id);       
        $url       = \Uri::base() . "lendborrow/check/" . $access_key;
        $message = '【貸借管理】：' . $this->user_profile->user_name . 'さんが' . $this->view_data['lendborrow_data']['user_name'] . 'さんへの貸し借り情報を登録しました。詳細はこちら。' . $url;
        $this->view_data['message'] = $message;
        

        $this->viewWrap('lendborrow/detail');          
    }
    
    public function action_edit() {
        
        $edit         = \Input::post('edit');
        $delete       = \Input::post('delete');
        $your_user_id = \Input::post('your_user_id');
        $mst_id   = \Input::post('id');
        
     

        if (isset($edit) === true){
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
        $post = \Input::post();
        $create         = \Input::post('create');
        
        if ($create !== null) {
            $type         = \Input::post('type');
            $your_user_id = \Input::post('your_user_id');
            $category     = \Input::post('category_mst_id');
            $date         = \Input::post('date');
            $money        = \Input::post('money');
            $limit        = \Input::post('limit');
            $memo         = \Input::post('memo');
            $add_your_user_name = \Input::post('add_your_user_name');
            $user_friend_add_pf = \Input::post('user_friend_add_pf'); 
            
            
            //友達リストが他PFからの取得の場合その友達ユーザの登録を行う
            if ($user_friend_add_pf !== 'default') {
                //FacebookIDが既に登録されているか？
                $other_user = $this->model_wrap->call('Model_User_Facebook','find','first', array(
                    'where' => array(
                        array('facebook_id', '=', $your_user_id),
                    ),
                ));
                
                if (empty($other_user)) {
                    //FB用とユーザ用の２つ登録
                    $facebook_ins_data = array(
                        'facebook_id' => $your_user_id,
                    );
                    $user_ins_data = array(                    
                        'user_name'        => $add_your_user_name,
                        'img_url'          => 'https://graph.facebook.com/' . $your_user_id . '/picture',
                    );
                    
                    $user_data     = $this->model_wrap->getModelInstance('Model_User_Profile', $user_ins_data);
                    $facebook_data = $this->model_wrap->getModelInstance('Model_User_Facebook',$facebook_ins_data);
                    
                    
                    $user_data->save();
                    $facebook_data->user_profile_id = $user_data->id;
                    $facebook_data->save();
                
                   
                    $your_user_id = $user_data->id;
                    
                    //友達登録するか？
                    $friend_ins_data = array(
                        'user_id' => $this->user_profile_id,
                        'friend_user_id' => $your_user_id
                    );
                    $friend_data1 = $this->model_wrap->getModelInstance('Model_User_Friends',$friend_ins_data);
                    
                    $friend_ins_data = array(
                        'user_id' => $your_user_id,
                        'friend_user_id' => $this->user_profile_id
                    );
                    $friend_data2 = $this->model_wrap->getModelInstance('Model_User_Friends',$friend_ins_data);
                    
                    $friend_data1->save();
                    $friend_data2->save();
                    
                    
                } else {
                    $your_user_id = $other_user->id;
                }
            }
            $ins_data = array();
            if ($type === 'lend') {
                $ins_data['lend_user_id']   = $this->user_profile_id;
                $ins_data['borrow_user_id'] = $your_user_id;
                
            
            } else if ($type === 'borrow') {
                $ins_data['lend_user_id']   = $your_user_id;                
                $ins_data['borrow_user_id'] = $this->user_profile_id;
            }
            $ins_data['category_mst_id'] = $category;
            $ins_data['date']     = strtotime($date);
            $ins_data['money']    = $money;
            $ins_data['limit']    = $limit;
            $ins_data['memo']     = $memo;
            $ins_data['status']   = 0;
            
            $mng = $this->model_wrap->getModelInstance('Model_Lend_And_Borrow_Mng', $ins_data);
            $mng->save();
            
            //リダイレクト
            \Response::redirect($this->view_data['base_url'] . 'lendborrow/list/' .$your_user_id);
            
        }
        //友達情報の取得
        //友達情報を取得する
        $this->view_data['user_friends'] = $this->user_profile->getFriends();
        
        
        //カテゴリーを取得する
        $this->view_data['category'] = $this->model_wrap->call('Model_Category_Mst', 'find', 'all');        

        $this->viewWrap('lendborrow/create', '新規登録');    
        
    }
    
    
    
    /*
     * 以下開発中
     */
    
    public function action_send($platform) {
        $mst_id  = \Input::post('id');
        
        //送る人のタイプ
        $type    = \Input::post('type');
        
        if ($type === 'lend') {
            //相手は借りている人
            $colm = 'borrow_user_id';
        } else {
            //相手は借りている人
            $colm = 'lend_user_id';
        }
        
        
        //貸し借り情報を取得
        $sql  = ' SELECT lb.*, up.user_name as your_user_name from lend_and_borrow_mng lb';
        $sql .= ' INNER JOIN user_profile up on lb.' . $colm .' = up.id'; 
        $sql .= ' WHERE lb.id = ' . $mst_id; 
        $send_data = $this->model_wrap->call('DB','sql',$sql);
        
        foreach ($send_data as $data) {
            $mst_data = $data;
        }
        

        //通知用URLの発行
        $access_key = $this->lib_util->getViewAccessKey($mst_id, $this->user_profile_id);       
        $this->view_data['url']       = \Uri::base() . "lendborrow/check/" . $access_key;
        $this->view_data['send_info'] = true;

        $this->strategy = \Lib_Strategy::getInstance($platform);
        
        
        
        $message = $this->user_profile->user_name . 'さんが' . $mst_data['your_user_name'] . 'さんへの貸し借り情報を登録しました。詳細はこちら。<a href="' . $this->view_data['url'] . '">' . $this->view_data['url'] . '</a>';
var_dump($message);
exit();
$login_url = $this->strategy->sendMessage($message, $this->view_data['url']);

        
        $this->action_detail($type, $mst_id);
        return ;
    }
    
}
