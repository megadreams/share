<?php
/*
 * @Contents
 */

namespace Contents;
class Lib_Modelwrap{

    private $user_id;

    public function call($model_name, $function_name, $arg1=null, $arg2=null){

        try {
            if($model_name === 'DB'){
                $model_data = \DB::query($arg1)->execute();
            }elseif($function_name === 'count'){
                if($arg1 === null){
                    $model_data = $model_name::$function_name();
                }else{
                    $model_data = $model_name::$function_name($arg1);
                
                }
            }else{
                if($arg2 === null){
                    $model_data = $model_name::$function_name($arg1);
                }else{
                    $model_data = $model_name::$function_name($arg1, $arg2);
                }
            }

            return $model_data;

        } catch (Exception $e) {
            \Log::debug($e->getMessage());
            /*
            if( ENVIRONMENT === ENVIRONMENT_TESTING || ENVIRONMENT === ENVIRONMENT_DEVELOPMENT) {
                    var_dump($e->getMessage());
                    exit;
            }
             */
            //$msg = 1;
            //Response::redirect(Uri::base(false) . Config::get('system_name') . '/err/show_system_errpage');
        }
    }

    public function getModelInstance($model_name, $arg){
        try {
            return new $model_name($arg);
        } catch (Exception $e) {
            return false;
        }
    }
}
