    <header class="header float-area">
        <div class="head-left-btn cansel-btn float">
            キャンセル
        </div>
        <div class="head-title float">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="head-right-btn create-pre-btn float">
            戻る
        </div>
    </header>
    <div class="float-area"></div>
    <div class="create-status">
        <span id="step1" class="index-status status-active">貸借</span> ->
        <span id="step2" class="index-status">お相手</span> -> 
        <span id="step3" class="index-status">カテゴリ</span> -> 
        <span id="step4" class="index-status">詳細</span>
    </div>
    <form action="" method="POST">
        <div class="create-view">
            <section class="create-view page">
                <h1>選択してください</h1>
                <div class="float-area">
                    <div class="float w50p">
                        <label>
                            借りている
                            <input class="next-btn" type="radio" name="type" value="borrow">
                        </label>
                    </div>
                    <div class="float w50p">
                        <label>
                            <input class="next-btn" type="radio" name="type" value="lend">
                            貸している                    
                        </label>
                    </div>
                </div>
                <div style="zoom: 0.5;">
                    <?php echo Asset::img('create/lendborrow.gif');?>
                </div>
            </section>


            <section class="create-view page">
                <header>
                    <h1>
                        誰に<span class="type-text"></span>いますか？
                    </h1>
                </header>
                <input type="hidden" name="user_friend_add_pf" value="default">
                
                <div id="user-friends" class="create-friend-list">
                    <?php if (count($view_data['user_friends']) > 0): ?>
                        <?php foreach($view_data['user_friends'] as $user_friends): ?>
                            <label>
                                <div class="create-record float-area">
                                    <div class="w10p float">
                                        <input class="next-btn" type="radio" name="your_user_id" value="<?php echo $user_friends['id'];?>">
                                        <input id="your-user-name<?php echo $user_friends['id'];?>"type="hidden"  value="<?php echo $user_friends['user_name'];?>">
                                    </div>
                                    <div class="w20p record-img float">
                                        <img src="<?php echo $user_friends['img_url'];?>" alt="プロフィール画像">
                                    </div>

                                    <div class="w70p text-left float">
                                        <?php echo $user_friends['user_name']; ?>
                                    </div>
                                </div>
                            </label>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div>
                            <span class="newline">
                                現在アプリ内の友達はおりません。
                            </span>
                            <span class="newline">
                                右上の友達を捜すボタンより検索してください。                            
                            </span>
                        </div>                
                    <?php endif;?>
                </div>
                <div class="add-friend-area">
                    <a href="#modal-view" rel="leanModal">
                        友達を探す
                    </a>                
                </div>
            </section>


            <section class="create-view page">
                <header>
                    <h1>
                        <span class="type-text"></span>いるものを選択してください
                    </h1>
                </header>
                <div class="create-friend-list">
                    <?php foreach($view_data['category'] as $category): ?>
                        <label>
                            <div class="create-record float-area">
                                <div class="w10p float">
                                    <input class="next-btn" type="radio" name="category_mst_id" value="<?php echo $category['id'];?>">
                                    <input id="category-name<?php echo $category['id'];?>"type="hidden"  value="<?php echo $category['category_name'];?>">
                                </div>
                                <div class="w20p record-img float">
                                    <?php echo Asset::img('category/' . $category['id'] . '.png'); ?>
                                </div>

                                <div class="w70p text-left float">
                                    <?php echo $category['category_name']; ?>
                                </div>
                            </div>
                        </label>
                    <?php endforeach; ?>
                </div>
            </section>


            <section class="create-view page">
                <header>
                    <h1>
                        <span class="newline">
                            <span class="user-text"></span>さんに
                        </span>
                        <span class="newline">
                            <span class="category-text"></span>を<span class="type-text"></span>いる
                        </span>
                    </h1>
                </header>                
                <div class="create-input-box">
                    <div class="input-box float-area">
                        <span class="w30p float">貸借日</span>
                        <input class="w60p text-right" type="date" name="date" value="<?php echo date('Y/m/d');?>">                        
                    </div>
                    <div class="input-box float-area">
                        <span class="w30p float">金額</span>
                        <input class="w60p text-right" type="tel" name="money" value="0">
                    </div>
               </div>
                    
                <div class="create-input-box">
                   <span class="text-left">オプション</span>
                    <div class="input-box float-area">
                        <span class="w30p float">期限</span>
                        <input class="w60p text-right" type="date" name="limit" value="0">
                    </div>
                    <div class="input-box float-area">
                        <span class="w30p float">メモ</span>
                        <textarea class="w60p" name="memo"></textarea>
                    </div>
                </div>
                <input type="hidden" name="add_your_user_name" value="">
                <input type="submit" name="create" value="登録">                    
            </section>
        </div>
    </form>
    
    <div id="modal-view" class="display-none">
        <h2>友達を探す</h2>
        
        <div>
            <span class="newline"> 
                Facebookから友達リストを取得します。
            </span>
            <button class="add-friends btn-info" value="facebook">
                Facebook
            </button>
        </div>
        <div>
            <span class="newline"> 
                貸し借り管理アプリの友達を取得します。（デフォルトでは、こちらの友達リストが表示されています。）
            </span>
            <button class="add-friends btn-info" value="default">
                既存アプリ
            </button>
        </div>

        <div>
            <button id="close">clocse</button>        
        </div>
    </div>
    
<script>


                

                
$(function() {

    //サーバからデータをもらいましょう！
    var category_info;
    var user_friends_info;
    
    var nowpage = 0;
    var page = $('.page');
    
    
    //次のページへの遷移設定
    $(".next-btn").click(function() {
        nowpage++;
        
        changePage(nowpage);        
    });

    $('.index-status').click(function(){
        nowpage = Number(this.id.split('step').join('')) - 1;
        changePage(nowpage);        
    });


    //戻るボタン
    $(".create-pre-btn").click(function () {
        if (nowpage === 0) {
            return;
        }
        nowpage--;
        changePage(nowpage);
    });
    
    //キャンセルボタン
    $('.cansel-btn').click(function() {
        if (confirm('登録をやめますか？')) {
            location.href ="<?php echo $view_data['base_url'] . 'lendborrow/top'; ?>";
        }
        return ;
    });

    //フォーカス時に文字を削除する
    inputDefaultText('input[name="date"]', '<?php echo date('Y/m/d H');?>');
    inputDefaultText('input[name="money"]', '金額を入力');
    
    //モーダルの初期化
    modalInit();
    



    $('.add-friends').click(function(){
        var platform = $(this).val();
        //同じ場合何もしない
        if ($('input[name="user_friend_add_pf"]').val() == platform) {
            
            alert('既に取得しています');
            return;
        }
        
        
            
        $.ajax({
            dataType: 'json',
            url: '<?php echo $view_data['base_url'];?>' + 'api/lendborrow/pf_friends/' + platform + '/' + '<?php echo $view_data['user_profile_id'];?>' + '.json',
            success: function(data) {
                
                $('#user-friends').empty();
                $.each(data['data'], function(i){
        
                    var template = 
                         '\
                             <label>\
                                 <div class="create-record float-area">\
                                     <div class="w10p float">\
                                         <input class="next-btn" type="radio" name="your_user_id" value="' + data['data'][i]['id'] + '">\
                                         <input id="your-user-name' + data['data'][i]['id'] + '"type="hidden"  value="' + data['data'][i]['name'] + '">\
                                     </div>\
                                     <div class="w20p record-img float">\
                                         <img src="' + data['data'][i]['img_url'] + '" alt="プロフィール画像">\
                                     </div>\
                                     <div class="w70p text-left float">\
                                         ' + data['data'][i]['name'] + '\
                                     </div>\
                                 </div>\
                             </label>\
                         ';
                    $('#user-friends').append(template);
                });
                
                $('input[name="user_friend_add_pf"]').val(data['platform']);;
                $('#lean_overlay').click();
                //クリックイベントの追加
                $('#user-friends .next-btn').click(function(){
                    nowpage++;
                    changePage(nowpage);        
                });
//            ingicater_end();
            },
            error: error_ajax
        }); 
    });
});




function changePage(index) {
    //ステータス変更
    $('.index-status').each(function(i, item){
        if ($(item).hasClass("status-active") === true) {
            $(item).removeClass("status-active");
        }
        
        if (index === i) {
            $(item).addClass("status-active");
        }
    });
    
    if (index === 1) {
        var type = $('input[name="type"]').filter(':checked').val();
        var text = '';
        if (type === 'lend') {
            text = '貸して';
        } else if (type === 'borrow') {
            text = '借りて';
        }
        console.log(text);
        $('.type-text').text(text);
    } else if (index === 2) {
        //ユーザ名の取得
        var yourUserId = $('input[name="your_user_id"]').filter(':checked').val();
        var yourUserName = $('#your-user-name'+yourUserId).val();        
        $('.user-text').text(yourUserName);
        
        $('input[name="add_your_user_name"]').val(yourUserName);
        
        
    } else if (index === 3) {
        //カテゴリ名の取得
        var categoryId = $('input[name="category_mst_id"]').filter(':checked').val();
        var categoryName = $('#category-name'+categoryId).val();        
        $('.category-text').text(categoryName);
        
    } 
    
    
    
    if (index === 0) {
        //最初は、ステータス領域の差分はいらない
        var p = $(".page").height() * index - $('.header').height();
        
        //１つ前に戻るボタンは、初期ページ以外で表示
        $('.create-pre-btn').css("visibility","hidden");
        
    } else {
        //スクロールする部分の高さ * ページ数 + ステータス表示領域 - ヘッダーの高さ
        var p = $(".page").height() * index + ($('.create-status').height() - $('.header').height());
        
        //１つ前に戻るボタンの表示
        $('.create-pre-btn').css("visibility","visible");        
    }
    
    
    $('.create-view').animate({ scrollTop: p }, 'fast');
    return false;
    
}

</script>

    