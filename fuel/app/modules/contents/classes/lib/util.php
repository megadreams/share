<?php
/*
 * @Contents
 */

namespace Contents;
class Lib_Util {
    
    public function getAgentList() {
        $data['browser'] = \Agent::browser();
        // バージョン
        $data['version'] = \Agent::version();
        // プラットフォーム名
        $data['platform'] = \Agent::platform();
        // モバイル判別
        $data['mobile'] = 'false';
        if (\Agent::is_mobiledevice())
        {
            $data['mobile'] = 'true';
        }
        
        // クローラ判別
        $data['robot'] = 'false';
        if (\Agent::is_robot())
        {
            $data['robot'] = 'true';
        }

        return $data;
    }
    
    //通知用アクセスキーの発行
    public function getViewAccessKey($mst_id, $user_profile_id) {
        $model_wrap = new Lib_Modelwrap();

    
        //通知用テーブルからURLがあるかどうかチェックする
         $access_key = $model_wrap->call('Model_Lend_And_Borrow_Sendurl','find','first',array(
            'where' => array(
                array('lend_and_borrow_mng_id', '=',$mst_id),
            ),
        ));   

         if (empty($access_key)) {

            //アクセスキーがかぶるようなら一度DBチェック後あれば最後尾に１桁追加する
            $insert_data = array(
                'lend_and_borrow_mng_id' => $mst_id,
                'access_key'             => $user_profile_id . time(),
            );
            $access_key = $model_wrap->getModelInstance('Model_Lend_And_Borrow_Sendurl',$insert_data);                 
            $access_key->save();
            
            
         } 
         return $access_key->access_key;

    }
    
    
    //通知アクセスキーからマスターIDを取得する
    public function getLendBorrowInfo($access_key) {
        //通知用テーブルからURLがあるかどうかチェックする
         $access_data = $model_wrap->call('Model_Lend_And_Borrow_Sendurl','find','first',array(
            'where' => array(
                array('access_key', '=', $access_key),
            ),
        ));
         if (empty($access_data)) {
             return null;
         }
         return $access_data->lend_and_borrow_mng_id;
    }
}