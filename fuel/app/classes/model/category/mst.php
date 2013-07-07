<?php

class Model_Category_Mst extends \Orm\Model
{
    public static $_table_name = 'category_mst'; 
    
    //ほかのテーブルに参照されている場合
    protected static $_has_many = array(
        'lend_and_borrow_mng',
    );
        
    protected static $_properties = array(
        'id',
        'category_name',
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