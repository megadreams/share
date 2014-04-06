<?php
/*
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Support extends Controller_Template
{
    
    private $view_data;

    public function action_sendmail()
    {
        // お問い合わせ受付        
        $category     = \Input::post('category');
        $mail_address = \Input::post('mail_address');
        $mail_address_confirmation = \Input::post('mail_address_confirmation');
        $user_name  = \Input::post('user_name');
        $text       = \Input::post('text');
        
        // 入力値チェック
        if (empty($category)) {
            $this->validate_error('category', 0);
        }
        if (empty($mail_address) || empty($mail_address_confirmation)) {
            $this->validate_error('mail_address', 0);
        }
        if ($mail_address !== $mail_address_confirmation) {
            $this->validate_error('mail_address', 1);
        }
        // 形式チェック
        /*
        if ($mail_address) {
            $this->validate_error('mail_address', 2);
        }
        if ($mail_address_confirmation) {
            $this->validate_error('mail_address_confirmation', 2);
        }
        */
        // 文字数制限
        if (strlen($text) == 0 || strlen($text) >= 1024) {
            $this->validate_error('text', 3);
        }
        
        
        // DBにお問い合わせ登録
        $model_wrap       = new Lib_Modelwrap();
        
        // 現在の
        $insert_data = array(
            'support_id'   => date('Ymd'),
            'category'     => $category,
            'mail_address' => $mail_address,
            'user_name'    => $user_name,
            'text'         => $text,
            'status'       => 'new',
        );
        $support_mst = $model_wrap->getModelInstance('Model_Support_Mst', $insert_data);

        try {
            \DB::start_transaction();
            //DB登録
            // このロジックもっといいのないかな？
            $support_mst->save();            
            $support_mst->support_id = $support_mst->support_id . '_' .  $support_mst->id;
            $support_mst->save();
            \DB::commit_transaction();
            $support_id = $support_mst->support_id;
            
        } catch (Exception $e) {
            \DB::rollback_transaction();
//            \Log::debug($e->getMessage());
            $support_id = null;
        }

        // リダイレクトさせる
        Response::redirect(\Uri::base() . 'support/success/' . $support_id, 'refresh', 200);

        
    }
    public function action_validate_error($selector, $error_code) {
        echo "入力値チェックエラー";
        exit();
        return Response::forge(View::forge('support/success', array('support_num' => 100)));        
    }
    
    public function action_success($support_id = null)
    {
        return Response::forge(View::forge('support/success', array('support_num' => $support_id)));
    }
}
