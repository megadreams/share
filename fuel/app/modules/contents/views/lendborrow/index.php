    <header class="header ">
        <div class="header-back-btn float">
            　
        </div>
        <div class="head-title float">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="header-pre-btn float">
            
        </div>
    </header>

    <section class="records">
        <?php if (count($view_data['records']) > 0): ?>
            <?php foreach ($view_data['records'] as $records): ?>
                <a href="<?php echo $view_data['base_url'] . 'lendborrow/list/' . $records['user_info']['id'];?>">
                    <div class="user-record float-area">
                        <div class="recode-left float">
                            <img src="<?php echo $records['user_info']['img_url'];?>" alt="プロフィール画像">
                        </div>
                        <div class="recode-center float">
                            <span><?php echo $records['user_info']['user_name']; ?></span>
                        </div>
                        <div class="recode-right float">
                            <div class="status-view <?php echo ($records['lend'] > 0)? 'status-on':'status-off'; ?>">
                                貸　<span><?php echo $records['lend']; ?></span>
                            </div>
                            <div class="status-view <?php echo ($records['borrow'] > 0)? 'status-on':'status-off'; ?>">
                                借　<span><?php echo $records['borrow']; ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            現在、貸し借りしている情報はありません。
            <div>
                <a href="<?php echo $view_data['base_url'] . 'lendborrow/create';?>">
                    新規登録
                </a>
            </div>            
        <?php endif;?>
    </section>

            <div>
                <a href="<?php echo $view_data['base_url'] . 'lendborrow/create';?>">
                    新規登録
                </a>
            </div>            
