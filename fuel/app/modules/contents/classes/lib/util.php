<?php
/*
 * @Contents
 */

namespace Contents;
class Lib_Util {
    
    public function getAgentList() {
        $data['browser'] = \Agent::browser();
        // バージョン
        $data['version'] = \Agent::version();
        // プラットフォーム名
        $data['platform'] = \Agent::platform();
        // モバイル判別
        $data['mobile'] = 'false';
        if (\Agent::is_mobiledevice())
        {
            $data['mobile'] = 'true';
        }
        
        // クローラ判別
        $data['robot'] = 'false';
        if (\Agent::is_robot())
        {
            $data['robot'] = 'true';
        }

        return $data;
    }
}