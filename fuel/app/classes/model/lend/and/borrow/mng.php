<?php

class Model_Lend_And_Borrow_Mng extends \Orm\Model
{
    public static $_table_name = 'lend_and_borrow_mng';
    
    //ほかのテーブルの情報を参照している場合
    protected static $_belongs_to = array('category_mst');
    
    //ほかのテーブルに参照されている場合
    protected static $_has_many = array(
//        'user_profile',
    );
    
    protected static $_properties = array(
        'id',
        'lend_user_id',
        'borrow_user_id',
        'category_mst_id',
        'money',
        'date',
        'memo',
        'status',
        'limit',        
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