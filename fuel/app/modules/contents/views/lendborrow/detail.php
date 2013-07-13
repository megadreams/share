    <header class="header ">
        <a class="non-decoration" href="<?php echo $view_data['referer']; ?>">
            <div class="header-back-btn float">
                戻る
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
        <?php if (isset($view_data['send_info']) === false):?>
            <form action="<?php echo $view_data['base_url'] . 'lendborrow/send';?>" method="POST">        
                <input type="hidden" name="id"   value="<?php echo $view_data['lendborrow_data']['id'];?>">
                <input type="hidden" name="type" value="<?php echo $view_data['type'];?>">
                <button class="btn btn-green" type="submit" name="edit">今すぐ通知</button>
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
    </section>