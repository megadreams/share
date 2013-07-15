<?php

/// 参考　http://core-tech.jp/gijutsublog/2013/05/15/1525
if (ENVIRONMENT === ENVIRONMENT_DEVELOPMENT) {
    return array(
        'facebook' => array(
            'init' => array(
                'appId'  => '356745474452557',
                'secret' => 'a008d355891125eca7d62fb4931d7f6d',
            ),
            'login' => array(
                    'redirect_uri' => \Uri::create('contents/auth/res/facebook'),
                    'scope' => 'publish_stream,manage_pages'
                    ),
            'logout' => array(
                'next' => \Uri::create('contents/auth'),
            ),
            //画像URL
            'user_picture' => 'https://graph.facebook.com/[@user_id]/picture',
        ),
    );

   
//本番環境    
} else {
    return array(
        'facebook' => array(
            'init' => array(
                'appId'  => '487412064669365',
                'secret' => '359ce5dc8bbfcb7ce72bd6e9e70a6a23',
            ),
            'login' => array(
                    'redirect_uri' => \Uri::create('contents/auth/res/facebook'),
                    'scope' => 'publish_stream,manage_pages'
                    ),
            'logout' => array(
                'next' => \Uri::create('contents/auth'),
            ),
            //画像URL
            'user_picture' => 'https://graph.facebook.com/[@user_id]/picture',
        ),
    );
}