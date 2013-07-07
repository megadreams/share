<?php

class Model_User_Profile extends \Orm\Model
{
    public static $_table_name = 'user_profile';
    
    //ほかのテーブルで使用されている場合
    protected static $_has_many = array(
//        'lend_and_borrow_mng',
    );


    protected static $_properties = array(
        'id',
        'user_name',
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