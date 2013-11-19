    <header class="header ">
        <a class="non-decoration" href="<?php echo $view_data['base_url'] . 'lendborrow/top/'; ?>">
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

    <section class="records">
        <section>
            <header>
                <h1>ユーザ情報</h1>
            </header>
            <div class="float-area m10">
                <div class="w30p float">
                    <img src="<?php echo $view_data['user_info']['img_url'];?>" alt="プロフィール画像">
                </div>
                <div class="w50p float">
                    <div>
                        名前：<?php echo $view_data['user_info']['user_name'];?>
                    </div>
                </div>
            </div>
            <div>
                通知設定<br>
                通知を受け取る、受け取らない<br>
                受け取る場合の媒体を選択
                <ul>
                    <li>メール</li>
                    <li>Facebook</li>
                    <li>Twitter</li>                        
                </ul>
            </div>
        </section>
        
        <section>
            <header>
                <h1>アカウント設定</h1>
            </header>
            <div>
                複数のアカウントとこのユーザをひもづける場合は、下記SNSよりログインして下さい。
            </div>
            <ul>
                <li>Facebook</li>
                <li>Twitter</li>
                <li>Google</li>                
                <li>gitHub</li>
            </ul>
        </section>
        
        <section>
            <header>
                <h1>ログアウト</h1>
            </header>
            <div>
                <a href="<?php echo $view_data['base_url'] . 'auth/logout/facebook';?>">
                    ログアウト
                </a>
            </div>        
        </section>              
    </section>

