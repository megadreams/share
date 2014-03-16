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

    <section>
        <section>
            <header>
                <h1 class="p10">ユーザ情報</h1>
            </header>
            <div class="float-area m10">
                <div class="w30p float">
                    <img src="<?php echo $view_data['user_info']['img_url'];?>" alt="プロフィール画像">
                </div>
                <div class="w50p float text-left">
                    <span class="newline">
                        名　前：<?php echo $view_data['user_info']['user_name'];?>
                    </span>
                    <span class="newline">
                        メール：未登録
                    </span>
                </div>
            </div>
            <!--
            <div>
                通知設定<br>
                通知を受け取る、受け取らない<br>
                受け取る場合の媒体を選択
                <ul>
                    <li>メール</li>
                    <li>Facebook</li>
                </ul>
            </div>
            -->
        </section>
        
        <section>
            <header>
                <h1 class="p10">外部アカウントとヒモ付</h1>
            </header>
            <table class="w90p mauto">
                <tr>
                    <th>Facebook</th>
                    <td>認証済み</td>
                </tr>
                <tr>
                    <th>Twitter</th>
                    <td>準備中</td>
                </tr>
                <tr>
                    <th>Google</th>
                    <td>準備中</td>
                </tr>
                <tr>
                    <th>Yahoo!</th>
                    <td>準備中</td>
                </tr>
            </table>
        </section>
        
        <section>
            <header>
                <h1 class="p10">ログアウト</h1>
            </header>
            <div>
                <a href="<?php echo $view_data['base_url'] . 'auth/logout/facebook';?>" class="btn btn-red">
                    ログアウト
                </a>
            </div>        
        </section>              
    </section>

