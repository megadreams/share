<?php

class Model_Adjustment_report extends \Orm\Model
{
    public static $_table_name = 'adjustment_report'; 
    
    //ほかのテーブルの情報を参照している場合
    protected static $_belongs_to = array('lend_and_borrow_mng');
        
    protected static $_properties = array(
        'id',
        'lend_and_borrow_mng_id',
        'register_user_id',
        'receive_user_id',
        'adjustment_diff_record_id',
        'adjustment_price',
        'payment_price',
        'date',
        'memo',
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