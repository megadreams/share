<style>
.tutorial-top {
    background-image: url('/assets/img/logo.png');
    background-repeat: no-repeat;
    background-position: 50%;
    height: 150px;
    padding-top: 150px;
    font-weight: bold;
}
.tutorial-regist {
    width: 50px;    
    position: absolute;
    top: 45px;
    left: 79%;
    -webkit-animation: yajirushi-anime 1s cubic-bezier(0.0, 0.4, 0.5, 1.0) -2s infinite alternate;
}

@-webkit-keyframes yajirushi-anime {
    0%   {
        top: 45px;
        left: 79%;
    }
    100% {
        top: 70px;
        left: 79%;
    }
}

</style>

    <header class="header">        
        <div class="head-left-btn float">
            <a class="lendborrow-add-btn" href="<?php echo $view_data['base_url'] . 'setting/';?>">
                設定
            </a>
        </div>
        <div class="head-title float">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="head-right-btn float">
            <a class="lendborrow-add-btn" href="<?php echo $view_data['base_url'] . 'lendborrow/create';?>">
                ＋
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
            <div class="tutorial-top">
                登録データはありません。
            </div>
            <img class="tutorial-regist" src="/assets/img/common/yajirushi-ue.png">
            <div>
                <span class="newline">右上の＋ボタンを押して</span>
                <span class="newline">かしかり情報を登録して下さい</span>
            </div>
        <?php endif;?>
    </section>
