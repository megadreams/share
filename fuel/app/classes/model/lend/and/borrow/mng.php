<?php

class Model_Lend_And_Borrow_Mng extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'lend_user_id',
        'borrow_user_id',
        'category_mst_id',
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