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
        <div>
            <span class="newline">貸し借り管理を利用するためには、</span>
            <span class="newline">ログインする必要があります。</span>
        </div>
        <div>
            <a href="<?php echo $view_data['base_url'] . 'auth/login/facebook';?>">
                <?php echo \Asset::img('auth/facebook_login.gif'); ?>
            </a>
        </div>        
    </section>

