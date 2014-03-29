<header class="header ">
        <a class="non-decoration" href="<?php echo $view_data['base_url'] . 'lendborrow/list/' . $view_data['your_user_id']; ?>">
            <div class="header-back-btn float">
                
            </div>
        </a>
        <div class="head-title float">
            <h1>かしかり管理</h1>
        </div>
        <div class="header-pre-btn float">
            
        </div>
    </header>
    <section class=" detail">
        <header style="padding:20px 0px">
            柏原 祐希さんが中村　恵さんへの<br>
            かしかり情報を登録しました。
            
        </header>
        <form action="<?php echo $view_data['base_url'] . 'lendborrow/edit';?>" method="POST">
            <table class="lendborrow-table">
                <tr>
                    <th>
                        日付
                    </th>
                    <td>
                        <?php echo date('Y年n月d日', $view_data['lendborrow_data']['date']); ?>                    
                    </td>
                </tr>
                <tr>
                    <th>
                        借りている人
                    </th>
                    <td>
                        <?php echo $view_data['lendborrow_data']['user_name']; ?>さん                    
                    </td>
                </tr>
                <tr>
                    <th>
                        <?php echo $view_data['lendborrow_data']['category_name']; ?>
                    </th>
                    <td>
                        <?php /*
                        
                        <?php if ($view_data['lendborrow_data']['status'] == 0): ?>                        
                            <input name="money" value="<?php echo $view_data['lendborrow_data']['money']; ?>">円                   
                        <?php else: ?>
                            <?php echo $view_data['lendborrow_data']['money']; ?>円
                        <?php endif; ?>                            
                         */?>
                            <?php echo $view_data['lendborrow_data']['money']; ?>円
                    </td>
                </tr>
                <tr>
                    <th>
                        状態
                    </th>
                    <td>
                        借りている
                    </td>
                </tr>
                <tr>
                    <th>返却期限</th>
                    <td>
                        <?php /*
                        <?php if ($view_data['lendborrow_data']['limit'] == 0): ?>
                            設定なし
                        <?php else:?>
                            <?php echo $view_data['lendborrow_data']['limit'];?>
                        <?php endif;?>
                         */ ?>
                        2014年4月17日
                    </td>
                </tr>                                       
                <tr>
                    <th>
                        メモ
                    </th>
                    <td>
                        <?php /*
                        <?php if ($view_data['lendborrow_data']['status'] == 0): ?>
                            <textarea name="memo" maxlength="20"><?php echo $view_data['lendborrow_data']['memo']; ?></textarea>                   
                        <?php else: ?>
                            <?php echo $view_data['lendborrow_data']['memo']; ?>
                        <?php endif; ?>
                        */ ?>
                            <?php echo $view_data['lendborrow_data']['memo']; ?>
                    </td>
                </tr>
            </table>
            <div style="padding:20px 0px;font-size:80%;">
                こちらは、『かしかり管理』アプリで登録された内容です。<br>
                詳細を見るためには、下記URLよりアクセスしてください。<br>
            </div>
            <div style="padding:20px 0px;">
                <button class="w50p btn btn-green">かしかり管理へ</button>
                <br>
                <br>
                <br>
                <a href="" style="color:blue;border-bottom:1px solid blue;">かしかりとは？</a>
                
            </div>
                
        <!--
                
            <div class="m10">
                <input type="hidden" name="your_user_id"   value="<?php echo $view_data['lendborrow_data']['user_id'];?> ">
                <input type="hidden" name="id"   value="<?php echo $view_data['lendborrow_data']['id'];?>">
                <input type="hidden" name="type" value="<?php echo $view_data['type'];?>">
                <?php if ($view_data['lendborrow_data']['status'] == 0): ?>
                    <button class="btn btn-blue w40p" type="submit" name="edit">変更</button>
                    <button class="btn btn-red w40p" type="submit" name="delete">削除</button>
                <?php endif; ?>
            </div>
        -->
        </form>
        <?php /*
            <?php if (isset($view_data['send_info']) === false):?>
                <form action="<?php echo $view_data['base_url'] . 'lendborrow/send/facebook';?>" method="POST">        
                    <input type="hidden" name="id"   value="<?php echo $view_data['lendborrow_data']['id'];?>">
                    <input type="hidden" name="type" value="<?php echo $view_data['type'];?>">
                    <button class="btn btn-green" type="submit" name="send">今すぐ通知</button>
                </form>
            <?php else:?>
                <div class="message">
                    <?php echo $view_data['lendborrow_data']['user_name']; ?>さんに通知しました。
                    <span class="newline">
                        下記URLの内容が送信されました。
                        <a href="<?php echo $view_data['url'];?>" target="_blank"><?php echo $view_data['url'];?></a>
                    </span>
                </div>
            <?php endif;?>
         */ ?>
        <!--
        <div class="message-area">
            上記内容を以下のアプリで通知できます。
            <div class="m10 p5">
                <script type="text/javascript" src="http://media.line.naver.jp/js/line-button.js?v=20130508" ></script>
                <script type="text/javascript">
                new jp.naver.line.media.LineButton({"pc":false,"lang":"ja","type":"a","text":"<?php echo $view_data['message'];?>","withUrl":false});
                </script>
            </div>
        </div>
        -->
        
    </section>


<script>
$(function(){
    $('.btn').click(function() {

        var name = this.name;
        var text = '';

        if (name === 'edit') {
            text = '変更してよろしいですか？';
        } else if (name === 'delete') {
            text = '本当に削除してもよろしいですか？';
        } else {
            text = 'Facebookでタイムラインに投稿いたします。よろしいですか？';
        }
        
        if (confirm(text)) {
            return true;
        } else {
            return false;
        }
        return false;
    });
});    
</script>
    