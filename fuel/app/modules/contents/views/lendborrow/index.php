    <header class="header ">
        <div class="head-left-btn float">
            　
        </div>
        <div class="head-title float">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="head-right-btn float">
            <a class="lendborrow-add-btn" href="<?php echo $view_data['base_url'] . 'lendborrow/create';?>">
                追加
            </a>
        </div>
    </header>

    <section>
        <?php if (count($view_data['records']) > 0): ?>
            <?php foreach ($view_data['records'] as $records): ?>
                <a href="<?php echo $view_data['base_url'] . 'lendborrow/list/' . $records['user_info']['id'];?>">
                    <div class="user-record float-area">
                        <div class="recode-left w20p float">
                            <img src="<?php echo $records['user_info']['img_url'];?>" alt="プロフィール画像">
                        </div>
                        <div class="recode-center w50p float">
                            <span><?php echo $records['user_info']['user_name']; ?></span>
                        </div>
                        <div class="recode-right w30p float">
                            <div class="status-view">
                                <?php if ($records['sum'] > 0): ?>
                                    <span class="color-green">貸</span>
                                <?php elseif ($records['sum'] < 0): ?>
                                    <span class="color-red">借</span>
                                <?php endif; ?>
                            </div>
                            <div class="status-view">
                                <?php if ($records['sum'] > 0): ?>
                                    <span class="color-green"><?php echo number_format($records['sum']);?>円</span>
                                <?php elseif ($records['sum'] < 0): ?>
                                    <span class="color-red"><?php echo number_format(abs($records['sum']));?>円</span>
                                <?php elseif ($records['lend'] != 0 && $records['borrow'] != 0): ?>
                                    <span class="newline expense-report-comment">精算処理待ち</span>
                                <?php else: ?>
                                    
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <div>
                現在、貸し借りしている情報はありません。
            </div>
        <?php endif;?>
    </section>
