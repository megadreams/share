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
                                    貸
                                <?php elseif ($records['sum'] < 0): ?>
                                    借
                                <?php endif; ?>
                            </div>
                            <div class="status-view">
                                <?php if ($records['sum'] > 0): ?>
                                    <span><?php echo number_format($records['sum']);?>円</span>
                                <?php elseif ($records['sum'] < 0): ?>
                                    <span><?php echo number_format(abs($records['sum']));?>円</span>
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
