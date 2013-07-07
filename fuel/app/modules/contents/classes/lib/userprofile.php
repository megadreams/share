<?php
/*
 * @Contents
 */

namespace Contents;
class Lib_Userprofile {

    private $model_wrap;
    private $user_id;
    
    
    
    public function __construct($model_wrap, $user_id) {

        $this->model_wrap = $model_wrap;
        $user_profile = $this->model_wrap->call('Model_User_Profile', 'find', 'first', array(
            'where' => array(
                array('id', '=', $user_id)
            )
        ));
        
        $this->user_id   = $user_id;

    }
    
    public function getFriends() {
        $sql  = ' SELECT up.id, up.user_name FROM user_friends uf';
        $sql .= ' INNER JOIN user_profile up on up.id = uf.friend_user_id';
        $sql .= ' WHERE ';
        $sql .= '  user_id = ' . $this->user_id;

        $user_friends = $this->model_wrap->call('DB', 'query', $sql);
        

        
        $frind_list = array();
        foreach ($user_friends as $friend) {
            $frind_list[$friend['id']] = $friend;
        }
        
        return $frind_list;
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