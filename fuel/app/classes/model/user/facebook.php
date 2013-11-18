<?php

class Model_User_Facebook extends \Orm\Model
{
    public static $_table_name = 'user_facebook';
    
    //ほかのテーブルで使用されている場合
    protected static $_has_many = array(
        'user_profile',
    );


    protected static $_properties = array(
        'id',
        'facebook_id',
        'user_profile_id',
        'created_at',
        'updated_at'
    );
 
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_save'),
            'mysql_timestamp' => false,
        ),
    );
}