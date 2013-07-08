<?php

/*
 * @Contents
 */

namespace Contents;

class Controller_Setting extends Controller_Common
{

    /**
     * The basic welcome message
     *
     * @access  public
     * @return  Response
     */
    public function action_index()
    {
        
        $this->viewWrap('setting/index', '設定');
    }

}
