<?php echo Asset::css('mobile/login/login.css'); ?>
<section class="first-view">
    <header class="header">
        <h1>かしかり管理</h1>
    </header>
    <div class="swiper-container" style="margin-top:20px;">
        <div class="swiper-wrapper">
            <section class="swiper-slide">
                <h1>ようこそ</h1>
                <div class="p10">
                    <?php echo Asset::img('logo.png'); ?>
                </div>
                <div class="p10">
                    <span class="newline">かしかり管理は</span>
                    <span class="newline">あなたのお金のやりとりを</span>
                    <span class="newline">円満に行う手助けをします</span>
                </div>
                <div class="p15">
                    <span class="newline">横にスライドすると詳しく見れます</span>
                </div>
            </section>
            <section class="swiper-slide">
                    <h1>こんな経験ありませんか？</h1>
                    <div class="p10">
                        <?php echo Asset::img('auth/login_descript1.png', array('width'=>'150px')); ?>
                    </div>
                    <div class="p10">
                        <span class="newline">貸したこと・借りたことが</span>
                        <span class="newline">曖昧になった</span>
                    </div>
                    <div class="p10">
                        <span class="newline">かしかり管理は、</span>
                        <span class="newline">借りた、貸したの情報を<span class="color-red">管理</span>します</span>
                    </div>                
            </section>
            <section class="swiper-slide">
                    <h1>こんな経験ありませんか？</h1>
                    <div class="p10">
                        <?php echo Asset::img('auth/login_descript2.png', array('width'=>'150px')); ?>
                    </div>
                    <div class="p10">
                        <span class="newline">貸したこと・借りたことを</span>
                        <span class="newline">相手が忘れるている</span>
                    </div>
                    <div class="p10">
                        <span class="newline">かしかり管理は、</span>
                        <span class="newline">借りた、貸したの情報を<span class="color-red">共有</span>します</span>
                    </div>                
            </section>
            <section class="swiper-slide">
                    <h1>こんな経験ありませんか？</h1>
                    <div class="p10">
                        <?php echo Asset::img('auth/login_descript3.png', array('width'=>'150px')); ?>
                    </div>
                    <div class="p10">
                        <span class="newline">貸したのに返ってこない</span>
                        <span class="newline">けど、言い辛いなぁ</span>
                    </div>
                    <div class="p10">
                        <span class="newline">かしかり管理は、</span>
                        <span class="newline">相手に貸し借りの情報を<span class="color-red">通知</span>します。</span>
                    </div>                
            </section>
            <section class="swiper-slide">
                    <h1>金の貸し借り不和の基</h1>
                    <div class="p10">
                        <?php echo Asset::img('auth/login_descript4.png', array('width'=>'150px')); ?>
                    </div>
                    <div class="p10">
                        <span class="newline">お金の貸し借りが、</span>
                        <span class="newline">人間関係のトラブルの始まりです。</span>
                    </div>
                    <div class="p10">
                        <span class="newline">かしかり管理は、</span>
                        <span class="newline color-red">あなたの人間関係をお守りします。</span>
                    </div>                
             </section>
       </div>
    </div>
    <div class="pagination"></div>
    <div class="start-area">
        <button class="start-btn btn-green">
            今すぐ開始
        </button>    
    </div>
</section>
<section class="login-view hide">    
    <header class="header">
        <h1>かしかり管理ログイン</h1>
    </header>
    <div class="couldnot-area">
        準　備　中
    </div>
        
    <!-- かしかり管理アカウント -->
    <section class="my-account">
        <div class="p10">
            <table class="login-table">
                <tr>
                    <th>メールアドレス</th>
                    <td>
                        <input type="text">
                    </td>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <td>
                        <input type="password">
                    </td>
                </tr>
            </table>
        </div>
        <div class="float-area">
            <div class="w50p float">
                <button class="btn w90p btn-gray">新規登録</button>
            </div>
            <div class="w50p float">
                <button class="btn w90p btn-orange">ログイン</button>                    
            </div>            
        </div>
        <div class="forgot-password">
            <a href="">パスワードを忘れたら</a>
        </div>
    </section>
    
    <!-- 外部SNS連携 -->
    <section class="sns-account">
        <h1>外部サービスのアカウントでログイン</h1>
        
        <div class="sns-select">
            <div class="float-area">
                <div class="w50p float sns-btn">
                    <a href="<?php echo $view_data['base_url'] . 'auth/login/facebook';?>">
                        <button class="w90p btn facebook-btn">
                            Facebook
                        </button>
                    </a>
                </div>
                <div class="w50p float sns-btn">
                        <button class="hide w90p btn twitter-btn">
                            Twitter
                        </button>
                </div>            
            </div>
            <div class="float-area hide">
                <div class="w50p float sns-btn">
                        <button class="w90p btn btn-gray">
                            Google
                        </button>
                </div>                     

                <div class="w50p float sns-btn">
                        <button class="w90p btn btn-gray">
                            Yahoo!
                        </button>
                </div>            
            </div>            
        </div>     
    </section>
    <fotter>
        <div class="about-kashikari">
            かしかり管理について        
        </div>
    </fotter>
</section>



<script>
  var mySwiper = new Swiper('.swiper-container',{
    pagination: '.pagination',
    loop:true,
    grabCursor: true,
    paginationClickable: true
  });
  
  $(function(){
      $('.about-kashikari').click(function(){
            $('.login-view').addClass('hide');
            $('.first-view').removeClass('hide');
      });
      $('.start-btn').click(function(){
            $('.login-view').removeClass('hide');
            $('.first-view').addClass('hide');
      });
      
  });
</script>