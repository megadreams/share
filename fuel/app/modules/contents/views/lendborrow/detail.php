    <header class="header ">
        <a class="non-decoration" href="<?php echo $view_data['referer']; ?>">
            <div class="header-back-btn float">
                TOPへ
            </div>
        </a>
        <div class="head-title float">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="header-pre-btn float">
            
        </div>
    </header>
    <section class="records detail">
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
                        <?php echo ($view_data['type'] === 'lend')?'貸している人':'借りている人' ?>
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
                        <input name="money" value="<?php echo $view_data['lendborrow_data']['money']; ?>">円                   
                    </td>
                </tr>
                <tr>
                    <th>
                        状態
                    </th>
                    <td>
                        <select name="status">
                            <?php foreach ($view_data['lendborrow_status'][$view_data['type']] as $key => $value): ?>
                                <?php $selected = ((int)$view_data['lendborrow_data']['status'] === (int)$key)? 'selected':''; ?>

                                <option value="<?php echo $key; ?>" <?php echo $selected;?>><?php echo $value; ?></option>
                            <?php endforeach;?>
                        </select>                    
                    </td>
                </tr>          
                <tr>
                    <th>
                        メモ
                    </th>
                    <td>
                        <textarea name="memo"><?php echo $view_data['lendborrow_data']['memo']; ?></textarea>                   
                    </td>
                </tr>
            </table>
            <div>
            <div>
                <input type="hidden" name="your_user_id"   value="<?php echo $view_data['lendborrow_data']['user_id'];?> ">
                <input type="hidden" name="id"   value="<?php echo $view_data['lendborrow_data']['id'];?>">
                <input type="hidden" name="type" value="<?php echo $view_data['type'];?>">
                <button class="btn btn-blue" type="submit" name="edit">変更</button>
                <button class="btn btn-red" type="submit" name="delete">削除</button>
            </div>
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
        
        <div class="message-area">
            上記内容を以下のアプリで通知できます。
            <div class="m10 p5">
                <script type="text/javascript" src="http://media.line.naver.jp/js/line-button.js?v=20130508" ></script>
                <script type="text/javascript">
                new jp.naver.line.media.LineButton({"pc":false,"lang":"ja","type":"a","text":"<?php echo $view_data['message'];?>","withUrl":false});
                </script>
            </div>
        </div>
        
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
    