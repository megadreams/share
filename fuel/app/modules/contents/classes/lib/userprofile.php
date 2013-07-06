<?php
/*
 * @Contents
 */

namespace Contents;
class Lib_Userprofile {

    private $model_wrap;
    private $user_id;
    
    
    
    public function __construct($model_wrap, $user_id) {
        $test = new \stdClass();
        $test->id = $user_id;
        $test->user_name = '藤原　';
        return $test;
        
        $this->model_wrap = $model_wrap;

        $user_profile = $this->model_wrap->call('Model_User_Profile', 'find', 'first', array(
            'where' => array(
                array('id', '=', $user_id)
            )
        ));
        
        $user_profile->user_id = $user_id;
        return $user_profile;
    }
    
    

    /*
     * Facebookのユーザ情報を登録する
     */

    public function add_fb_user($model_wrap, $fb_id, $fb_name) {
        $insert_data = array(
            'fb_id' => $fb_id,
            'name' => $fb_name
        );

        $user_facebook = $model_wrap->getModelInstance('Model_User_Facebook', $insert_data);

        try {
            \DB::start_transaction();
            //DB登録
            $user_facebook->save();
            $user_profile = $model_wrap->getModelInstance('Model_User_Profile', array(
                'user_name' => $user_facebook->name,
                'user_facebook_id' => $user_facebook->id
                    ));
            $user_profile->save();
            \DB::commit_transaction();
        } catch (Exception $e) {
            \DB::rollback_transaction();
//            \Log::debug($e->getMessage());
            return false;
        }
        return $user_profile;
    }

}