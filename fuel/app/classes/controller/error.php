<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.6
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Error extends Controller_Template
{
    
    private $view_data;
    
    public function before() {
        $this->template = 'template';
        //親クラスのbeforeを呼び出して, $this->templateを使えるようにしてもらう
        parent::before();
   }
    
    /**
     * The basic welcome message
     *
     * @access  public
     * @return  Response
     */
    public function action_message($error_code)
    {

    $this->template->content = \View::forge('error/message',  array('view_data' => $this->view_data, 'title' => '報告'));        

    }
}
