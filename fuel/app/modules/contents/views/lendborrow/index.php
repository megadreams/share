    <header class="header ">
        <div class="head-left-btn float">
            　
        </div>
        <div class="head-title float">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="head-right-btn float">
            <a href="<?php echo $view_data['base_url'] . 'lendborrow/create';?>">
                <?php echo \Asset::img('vender/png/32x32/Plus.png'); ?>
            </a>
        </div>
    </header>

    <section class="records">
        <?php if (count($view_data['records']) > 0): ?>
            <?php foreach ($view_data['records'] as $records): ?>
                <a href="<?php echo $view_data['base_url'] . 'lendborrow/list/' . $records['user_info']['id'];?>">
                    <div class="user-record float-area">
                        <div class="recode-left w20p float">
                            <img src="<?php echo $records['user_info']['img_url'];?>" alt="プロフィール画像">
                        </div>
                        <div class="recode-center w60p float">
                            <span><?php echo $records['user_info']['user_name']; ?></span>
                        </div>
                        <div class="recode-right w20p float">
                            <div class="status-view">
                                貸　<span class="<?php echo ($records['lend'] > 0)? 'status-on':'status-off'; ?>"><?php echo $records['lend']; ?></span>
                            </div>
                            <div class="status-view">
                                借　<span class="<?php echo ($records['borrow'] > 0)? 'status-on':'status-off'; ?>"><?php echo $records['borrow']; ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <div>
                現在、貸し借りしている情報はありません。
            </div>
     
            <br>
            ・FBフィードもしくはメッセージの送信
            <br>
            ・リンクで参照可能な貸し借りペーじ
            <br>
            ・セッションの細かい設定
            <br>
            ・全体的なデザイン
            <br>
            ・ツイッターログイン

            
            
        <?php endif;?>
    </section>
