<?php

class Model_User_Friends extends \Orm\Model
{
    public static $_table_name = 'user_friends';    
    protected static $_properties = array(
        'id',
        'user_id',
        'friend_user_id',
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