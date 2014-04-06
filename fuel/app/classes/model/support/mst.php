<?php

class Model_Support_Mst extends \Orm\Model
{
    public static $_table_name = 'support_mst';
    
    protected static $_properties = array(
        'id',
        'support_id',
        'category',
        'mail_address',
        'user_name',
        'text',
        'status',       
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