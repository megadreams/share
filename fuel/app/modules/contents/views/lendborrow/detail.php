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
            <div>
                日付　：　<?php echo date('Y年m月d日 H時i分s秒', $view_data['lendborrow_data']['date']); ?>
            </div>
            <div>
                <?php echo ($view_data['type'] === 'lend')?'貸している人':'借りている人' ?>　：　<?php echo $view_data['lendborrow_data']['user_name']; ?>さん
            </div>
            <div>
                <?php echo $view_data['lendborrow_data']['category_name']; ?>　：　<input name="money" value="<?php echo $view_data['lendborrow_data']['money']; ?>">円
            </div>
            <div>
                <span class="newline">
                    状態　：　
                    <select name="status">
                        <?php foreach ($view_data['lendborrow_status'][$view_data['type']] as $key => $value): ?>
                            <?php $selected = ((int)$view_data['lendborrow_data']['status'] === (int)$key)? 'selected':''; ?>

                            <option value="<?php echo $key; ?>" <?php echo $selected;?>><?php echo $value; ?></option>
                        <?php endforeach;?>
                    </select>
                </span>
                
            </div>
            <div>
                メモ　：　<textarea name="memo"><?php echo $view_data['lendborrow_data']['memo']; ?></textarea>
            </div>
            <div>
                <input type="hidden" name="your_user_id"   value="<?php echo $view_data['lendborrow_data']['user_id'];?> ">
                <input type="hidden" name="id"   value="<?php echo $view_data['lendborrow_data']['id'];?>">
                <input type="hidden" name="type" value="<?php echo $view_data['type'];?> ">
                <button type="submit" name="edit">変更</button>
                <button type="submit" name="delete">削除</button>
            </div>
        </form>
    </section>