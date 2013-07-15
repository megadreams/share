<?php

interface Lib_Strategy_interface {
    public function getLoginUrl();
    public function getLogoutUrl();
    public function getUserProfile();
    public function getuserImage($user_id);
    public function getUserFriends();
    public function sendMessage($message, $url);    
}

class Lib_Strategy {

    static function getInstance($auth_platform) {
        $class_name =  'Lib_'.ucfirst($auth_platform).'_Strategy';
        if (class_exists($class_name)) {
            return new $class_name();
        } else {
            return new Lib_Strategy();
        }
    }

    public function getLoginUrl() {
        return \Uri::base() . 'contents/top';
    }

    public function getLogoutUrl() {
        return null;
    }
    public function getUserProfile() {
        return null;
    }
    public function getuserImage($user_id) {
        return null;
    }
    public function getUserFriends() {
        return array();
    }
    public function sendMessage($message, $url) {
        return false;
    }  
}
