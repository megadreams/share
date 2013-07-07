    <header class="header float-area">
        <div class="header-cansel float">
            キャンセル
        </div>
        <div class="head-title float">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="header-pre-btn float">
            戻る
        </div>
    </header>
        <div class="create-status">
            <span class="index-status status-active">貸借登録</span> -> 
            <span class="index-status">お相手登録</span> -> 
            <span class="index-status">カテゴリ登録</span> -> 
            <span class="index-status">詳細登録</span>
        </div>
    <form action="" method="POST">
        <div class="create-view">
            <section class="create-view page">
                <div>
                    <label>
                        <input class="next-btn" type="radio" name="type" value="lend">
                        貸している                    
                    </label>
                </div>
                <header>
                    <h1>貸しているか　借りているか　選択してください</h1>
                </header>
                <div>
                    <label>
                        借りている
                        <input class="next-btn" type="radio" name="type" value="borrow">
                    </label>
                </div>
            </section>


            <section class="create-view page">
                <header>
                    <h1>
                        誰に<span class="type-text"></span>いますか？
                    </h1>
                </header>
                <?php if (true): ?>
                    <label>
                        <div class="user-record float-area">
                            <div class="recode-right float">
                                <input class="next-btn" type="radio" name="your_user_id" value="2">
                            </div>
                            <div class="recode-left float">
                                アイコン
                            </div>

                            <div class="recode-center float">
                                名前
                            </div>
                        </div>
                    </label>
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

            </section>


            <section class="create-view page">
                <header>
                    <h1>
                        <span class="type-text"></span>いるカテゴリを選択してください
                    </h1>
                </header>
                <?php foreach(array(1,2) as $category): ?>
                    <label>
                        <div class="user-record float-area">
                            <div class="recode-right float">
                                <input class="next-btn" type="radio" name="category_mst_id" value="1">
                            </div>
                            <div class="recode-left float">
                                アイコン
                            </div>

                            <div class="recode-center float">
                                カテゴリ名
                            </div>
                        </div>
                    </label>
                <?php endforeach; ?>
            </section>


            <section class="create-view page">
                <header>
                    <h1><span class="user-text"></span>さんに<span class="category-text"></span>を<span class="type-text"></span>いる</h1>
                </header>                
                <div>
                    日付:<input name="date" value="0">
                </div>
                <div>
                    金額:<input name="money" value="0">
                </div>
                
                オプション
                <div>
                    期限:<input name="limit" value="0">
                </div>
                <div>
                    メモ:<textarea name="limit"></textarea>
                </div>

                <input type="submit" name="create" value="登録">
            </section>
        </div>
    </form>
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
    


    //戻るボタン
    $(".header-pre-btn").click(function () {
        if (nowpage === 0) {
            return;
        }
        nowpage--;
        changePage(nowpage);
    });
    
    //キャンセルボタン
    $('.header-cansel').click(function() {
        if (confirm('登録をやめますか？')) {
            location.href ="<?php echo $view_data['base_url'] . 'lendborrow/top'; ?>";
        }
        return ;
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
        var userText = $('input[name="your_user_id"]').filter(':checked').val();
        $('.user-text').text(userText);
        
    } else if (index === 3) {
        //カテゴリ名の取得
        var userText = $('input[name="category_mst_id"]').filter(':checked').text();
        $('.category-text').text(userText);
        
    } 
    
    
    
    if (index === 0) {
        //最初は、ステータス領域の差分はいらない
        var p = $(".page").height() * index - $('.header').height();
        
        //１つ前に戻るボタンは、初期ページ以外で表示
        $('.header-pre-btn').css("visibility","hidden");
        
    } else {
        //スクロールする部分の高さ * ページ数 + ステータス表示領域 - ヘッダーの高さ
        var p = $(".page").height() * index + ($('.create-status').height() - $('.header').height());
        
        //１つ前に戻るボタンの表示
        $('.header-pre-btn').css("visibility","visible");        
    }
    
    
    $('.create-view').animate({ scrollTop: p }, 'fast');
    return false;
    
}
    
</script>

    