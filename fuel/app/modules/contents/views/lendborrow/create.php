<style>
.status-select {
    position:absolute;
    width:50%;
    height:440px;
}
.borrow-area {
    left : 0%;
}
.lend-area {
    left : 50%;
    
}
.tutorial-top {
    height: 80px;
    padding-top: 80px;
}
.small {
    font-size:50%;
}
.number-btn {
width: 60px;
height: 60px;
border-radius: 30px;
box-shadow: 2px 2px 1px #808080;
display: block;
margin: 3px;
line-height: 68px;
background: -webkit-gradient(linear, left top, left bottom, color-stop(0.00, #efe457), color-stop(1.00, #feae31));
background: -webkit-linear-gradient(#efe457, #feae31);
background: -moz-linear-gradient(#efe457, #feae31);
background: -o-linear-gradient(#efe457, #feae31);
background: -ms-linear-gradient(#efe457, #feae31);
background: linear-gradient(#efe457, #feae31);

color:black;
}
.btn-string {
    width: 65px;
    height: 50px;
    border-radius: 22px;
    box-shadow: 2px 2px 1px #808080;
    display: block;
    margin: 10px 0px;
    line-height: 54px;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0.00, #efe457), color-stop(1.00, #feae31));
    background: -webkit-linear-gradient(#efe457, #feae31);
    background: -moz-linear-gradient(#efe457, #feae31);
    background: -o-linear-gradient(#efe457, #feae31);
    background: -ms-linear-gradient(#efe457, #feae31);
    background: linear-gradient(#efe457, #feae31);

    color:black;
    
}
.input-label {
    font-size: 20px;
    padding-top: 5px;    
}
.input-element {
    font-size: 20px;
    color:black;
    text-align: right;
}
.picker__button--clear {
    visibility: hidden;
}
</style>
<?php echo Asset::css('picker/default.css'); ?>
<?php echo Asset::css('picker/default.date.css'); ?>
<?php echo Asset::css('picker/default.time.css'); ?>
<?php echo Asset::js('picker/picker.js'); ?> 
<?php echo Asset::js('picker/picker.date.js'); ?> 
<?php echo Asset::js('picker/picker.time.js'); ?> 

<header class="header float-area">
        <div class="head-left-btn cansel-btn float">
            キャンセル
        </div>
        <div class="head-title float">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="head-right-btn pre-btn float">
            戻る
        </div>
    </header>
    <div class="float-area"></div>
    <div class="create-status">
        <span id="step1" class="index-status status-active">貸借</span> ->
        <span id="step2" class="index-status">お相手</span> -> 
        <span id="step3" class="index-status">金額</span> -> 
        <span id="step4" class="index-status">日付</span> -> 
        <span id="step5" class="index-status">期限</span> -> 
        <span id="step6" class="index-status">確認</span>
    </div>
    <form action="" method="POST">
        <div class="create-view">
            <section class="create-view page">
                <h1 class="p10">状況を選択してください</h1>
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
                    <div class="status-select borrow-area"></div>
                    <div class="status-select lend-area"></div>
                    <?php echo Asset::img('create/lendborrow.gif');?>
                </div>
                <div class="float-area">
                    <div class="float w50p">
                        　
                    </div>
                    <div class="float w50p">
                        <span class="next-btn btn btn-gray">次へ</span>
                    </div>
                </div>
            </section>


            <section class="create-view page non-display">                   
                <header>
                    <h1 class="p10">
                        誰に<span class="type-text"></span>いますか？
                    </h1>
                </header>
                <input type="hidden" name="user_friend_add_pf" value="default">
                
                <div id="user-friends" class="">
                    <?php if (count($view_data['user_friends']) > 0): ?>
                        <?php foreach($view_data['user_friends'] as $user_friends): ?>
                            <label>
                                <div class="create-record float-area">
                                    <div class="w10p float">
                                        <input class="next-btn" type="radio" name="your_user_id" value="<?php echo $user_friends['id'];?>">
                                        <input id="your-user-name<?php echo $user_friends['id'];?>"type="hidden"  value="<?php echo $user_friends['user_name'];?>">
                                    </div>
                                    <div class="w20p record-img float">
                                        <img src="<?php echo $user_friends['img_url'];?>" width="50px;" alt="プロフィール画像">
                                    </div>

                                    <div class="w70p text-left float">
                                        <?php echo $user_friends['user_name']; ?>
                                    </div>
                                </div>
                            </label>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="tutorial-top">
                            ユーザがいません
                        </div>
                        <div>
                            <span class="newline">
                                外部サービスを利用して
                            </span>
                            <span class="newline">
                                友達を検索して下さい。                            
                            </span>
                        </div>                
                    <?php endif;?>
                </div>
                <div class="add-friend-area">
                    <a href="#modal-view" rel="leanModal" class="btn btn-blue">
                        友達を探す
                    </a>                
                </div>
                <div class="float-area">
                    <div class="float w50p">
                        <span class="pre-btn btn btn-gray">前へ</span>
                    </div>
                    <div class="float w50p">
                        <span class="next-btn btn btn-gray">次へ</span>
                    </div>
                </div>                
            </section>


            <section class="create-view page non-display">
                <header>
                    <h1 class="p10">
                        <span class="type-text"></span>いる金額を入力して下さい
                    </h1>
                </header>
                <div class="create-friend-list hide">
                    <?php foreach($view_data['category'] as $category): ?>
                        <label>
                            <div class="create-record float-area">
                                <div class="w10p float">
<!--                                    <input class="next-btn" type="radio" name="category_mst_id" value="<?php echo $category['id'];?>" checked> -->
                                    <input type="radio" name="category_mst_id" value="<?php echo $category['id'];?>" checked>
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
                <div class="create-input-box">
                    <div class="input-box float-area">
                        <span class="w30p float input-label">金額</span>
                        <input class="w60p input-element" type="text" name="money" value="0" readonly="readonly">
                    </div>
                    <div style="margin-left: 15%;">
                        <div class="float-area">
                            <div class="w30p float">
                                <span class="number-btn">7</span>
                            </div>
                            <div class="w30p float">
                                <span class="number-btn">8</span>
                            </div>
                            <div class="w30p float">
                                <span class="number-btn">9</span>
                            </div>
                        </div>
                        <div class="float-area">
                            <div class="w30p float">
                                <span class="number-btn">4</span>
                            </div>
                            <div class="w30p float">
                                <span class="number-btn">5</span>
                            </div>
                            <div class="w30p float">
                                <span class="number-btn">6</span>
                            </div>
                        </div>                        
                        <div class="float-area">
                            <div class="w30p float">
                                <span class="number-btn">1</span>
                            </div>
                            <div class="w30p float">
                                <span class="number-btn">2</span>
                            </div>
                            <div class="w30p float">
                                <span class="number-btn">3</span>
                            </div>
                        </div>                       
                        <div class="float-area">
                            <div class="w30p float">
                                <span class="number-btn">0</span>
                            </div>
                            <div class="w30p float">
                                <span class="btn-string number-clear">clear</span>
                            </div>
                            <div class="w30p float">
                                <span class="btn-string number-regist">登録</span>
                            </div>
                        </div>                        
                    </div>
               </div> 
               <div class="float-area">
                    <div class="float w50p">
                        <span class="pre-btn btn btn-gray">前へ</span>
                    </div>
                    <div class="float w50p">
                        <span class="next-btn btn btn-gray">次へ</span>
                    </div>
               </div>                
            </section>
            
            <section class="create-view page non-display">
                <header>
                    <h1 class="p10">
                        貸し借りした日付を選択してください
                    </h1>
                </header>
                <div class="create-friend-list m10" style="margin: 20px 5px;">
                    <div class="input-box float-area">
                        <span class="w30p input-label">貸借日</span>
                        <input class="w60p text-right datepicker-day input-element" type="date" name="date" value="">
                    </div>
                </div>
                <div class="float-area m10">
                    <div class="float w50p">
                        <span class="pre-btn btn btn-gray">前へ</span>
                    </div>
                    <div class="float w50p">
                        <span class="next-btn btn btn-gray">次へ</span>
                    </div>
                </div>                    
            </section>
            <section class="create-view page non-display">
                <header>
                    <h1 class="p10">
                        貸し借り期限を設定しますか？
                    </h1>
                </header>
                <div class="create-friend-list m10" style="padding:10px;">
                    <div class="float w50p">
                        <label>
                            はい
                            <input type="radio" name="limit-flg" value="yes">
                        </label>
                    </div>
                    <div class="float w50p">
                        <label>
                            <input type="radio" name="limit-flg" value="no" checked>
                            いいえ
                        </label>
                    </div>
                </div>                
                <div class="create-friend-list m10 limit-area hide"  style="margin: 20px 5px;">
                    <span class="w30p input-label">期　限</span>
                    <input class="w60p text-right datepicker-limit input-element" type="date" name="limit" value="">
                </div>
                <div class="float-area m10">
                    <div class="float w50p">
                        <span class="pre-btn btn btn-gray">前へ</span>
                    </div>
                    <div class="float w50p">
                        <span class="next-btn btn btn-gray">次へ</span>
                    </div>
                </div>                    
            </section>                
            
            <!-- 確認画面 -->
            <section class="create-view page non-display">
                <header>
                    <h1 class="m10">
                        登録確認
                    </h1>
                </header>
                <table class="lendborrow-table">
                    <tr>
                        <th>日付</th>
                        <td>
                            <span class="date-text"></span>
                        </td>
                    </tr>
                    <tr>
                        <th><span class="type-text"></span>いる人</th>
                        <td>
                            <span class="user-text"></span>さん
                        </td>
                    </tr>
                    <tr>
                        <th>金額</th>
                        <td>
                            <span class="money-text"></span>円
                        </td>
                    </tr>
                    <tr>
                        <th>状態</th>
                        <td>
                            <span class="type-text"></span>いる
                        </td>
                    </tr>                       
                    <tr>
                        <th>返却期限</th>
                        <td>
                            <span class="limit-text"></span>
                        </td>
                    </tr>                       
                    <tr>
                        <th>メモ</th>
                        <td>
                            <textarea class="w90p" name="memo" rows="3" cols="30" maxlength="20"></textarea>                        
                        </td>
                    </tr>                       
                </table>        
                                
                <div class="m15">                    
                    <input type="hidden" name="add_your_user_name" value="">
                    <input class="regist-btn btn btn-orange" type="submit" name="create" value="登録">
                </div>
                <div class="float-area">
                    <div class="float w50p">
                        <span class="pre-btn btn btn-gray">前へ</span>
                    </div>
                    <div class="float w50p">
                        　
                    </div>
                </div>               
            </section>
        </div>
    </form>
    
    <div id="modal-view" class="display-none">
        <h2>友達を探す</h2>
        
        <div>
            <span class="newline">外部サービスから</span>
            <span class="newline">友達リストを取得します</span>
        </div>
        <div class="sns-select m10">
            <div class="float-area">
                <div class="w50p float sns-btn">
                    <button class="add-friends btn-info w90p btn facebook-btn" value="facebook">
                        Facebook
                    </button>
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
        <div class="m10">
            <span class="newline">既存の友達を取得します</span>
            <span class="newline small">最初はこちらの友達リストが表示されています。</span>
            <button class="add-friends btn-info btn btn-green" value="default">
                既存アプリ
            </button>
        </div>

        <div>
            <button id="close" class="btn btn-gray">閉じる</button>        
        </div>
    </div>
    
<script>


$(function() {
    $( '.datepicker-day' ).pickadate({
        monthsFull: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
        weekdaysShort: ['日', '月', '火', '水', '木', '金', '土'],
        today: '本日',
        clear: 'キャンセル',
        format: 'yyyy/mm/dd',
        formatSubmit: 'yyyy/mm/dd',
        max: true
    });
    $( '.datepicker-limit' ).pickadate({
        monthsFull: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
        weekdaysShort: ['日', '月', '火', '水', '木', '金', '土'],
        today: '本日',
        clear: 'キャンセル',
        format: 'yyyy/mm/dd',
        formatSubmit: 'yyyy/mm/dd',
    });
    
    // 初期値を空にするため1秒後に実行
    setTimeout(function(){
        dd = new Date();
        yy = dd.getYear();
        mm = dd.getMonth() + 1;
        dd = dd.getDate();
        if (yy < 2000) { yy += 1900; }
        if (mm < 10) { mm = "0" + mm; }
        if (dd < 10) { dd = "0" + dd; }
        $( '.datepicker-day' ).val(yy + "/" + mm + "/" + dd);
        $( '.datepicker-limit' ).val(yy + "/" + mm + "/" + dd);
        $( '.datepicker-day' ).attr("placeholder", yy + "/" + mm + "/" + dd);
        $( '.datepicker-limit' ).attr("placeholder", yy + "/" + mm + "/" + dd);
    }, 1);

    //サーバからデータをもらいましょう！
    var category_info;
    var user_friends_info;
    
    var nowpage = 0;
    var page = $('.page');
    
    //１つ前に戻るボタンは、初期ページ以外で表示
    $('.pre-btn').css("visibility","hidden");
    
    $('.status-select').click(function(){
        if ($(this).hasClass('borrow-area')) {
            $('input[name=type]').val(['borrow']);
        } else if ($(this).hasClass('lend-area')) {
            $('input[name=type]').val(['lend']);
        } else {
            
        }
        $('input[name=type]:checked').trigger('click');        
    });
    
    $('input[name=limit-flg]').click(function(){
        if ($(this).val() === 'yes') {
            $('.limit-area').show();            
        } else {
            $('.limit-area').hide();
        }
    });
        
    



    //次のページへの遷移設定
    $(".next-btn").click(function() {
        // ページが変わる際には入力値チェックを行う
        if (validationCheck(nowpage) === false){
            alert("データを入力してください");
            return false;
        }
        var tmp_page = nowpage;
        nowpage++;
        changePage(tmp_page, nowpage);
    });

    $('.index-status').click(function(){
        
       var next_page = Number(this.id.split('step').join('')) - 1;

       // 今よりも先のページに行く場合は、入力値チェック
       if ((next_page - nowpage) > 0) {
           
           // 複数ページ先に行く場合には、１ページずつ入力内容をチェックする必要がある
           // 入力が必要な際には、そのページに強制的に移動する
           for (var i=nowpage; i < next_page; i++) {
                // ページが変わる際には入力値チェックを行う
                if (validationCheck(i) === false){
                    alert("データを入力してください");
                    var pre_page = nowpage;
                    nowpage = i;
                    changePage(pre_page, nowpage);       
                    return false;
                }               
           }
        }
 
       var tmp_pre_page = nowpage;       
       nowpage = next_page;
       changePage(tmp_pre_page, nowpage);        
    });


    //戻るボタン
    $(".pre-btn").click(function () {
        if (nowpage === 0) {
            return;
        }
        var tmp_page = nowpage;
        nowpage--;
        changePage(tmp_page, nowpage);
    });
    
    //キャンセルボタン
    $('.cansel-btn').click(function() {
        if (confirm('登録をやめますか？')) {
            location.href ="<?php echo $view_data['base_url'] . 'lendborrow/top'; ?>";
        }
        return ;
    });
    
    // 登録ボタン
    $("[name=create]").click(function(){
        if (!confirm("登録してよろしいですか？")) {
            return false;
        }
    });

    //フォーカス時に文字を削除する
    inputDefaultText('input[name="date"]', '<?php echo date('Y/m/d H');?>');
    inputDefaultText('input[name="money"]', '金額を入力');
    
    //モーダルの初期化
    modalInit();
    
    
    // 金額入力時の処理
    $('.number-btn').bind('touchend',function() {
        var num = Number($(this).text());
        
        var text_num = $('input[name=money]').val();
        if (text_num.length > 6) {
            alert("これ以上は入力できません。");
            return ;
        }
        
        var money = Number(text_num);
        if (!isFinite(money) || money === 0) {
            money = '';
        }
        money = money + num.toString();
        $('input[name=money]').val(money);
    });
    $('.number-clear').bind('touchend',function(){
        inputDefaultText('input[name="money"]', '金額を入力');
    });
    $('.number-regist').bind('touchend',function() {
        $($(".next-btn")[5]).trigger('click');
    });



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
                                         <img src="' + data['data'][i]['img_url'] + '" width="50px" alt="プロフィール画像">\
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
                    // ページが変わる際には入力値チェックを行う
                    if (validationCheck(nowpage) === false){
                        alert("データを入力してください");
                        return false;
                    }                    
                    var tmp_page = nowpage;
                    nowpage++;
                    changePage(tmp_page, nowpage);        
                });
//            ingicater_end();
            },
            error: error_ajax
        }); 
    });
});




function changePage(nowIndex,nextIindex) {
    //ステータス変更
    $('.index-status').each(function(i, item){
        if ($(item).hasClass("status-active") === true) {
            $(item).removeClass("status-active");
        }
        
        if (nextIindex === i) {
            $(item).addClass("status-active");
        }
    });
    
    if (nextIindex === 1) {
        var type = $('input[name="type"]').filter(':checked').val();
        var text = '';
        if (type === 'lend') {
            text = '貸して';
        } else if (type === 'borrow') {
            text = '借りて';
        }
        console.log(text);
        $('.type-text').text(text);
    } else if (nextIindex === 2) {
        //ユーザ名の取得
        var yourUserId = $('input[name="your_user_id"]').filter(':checked').val();
        var yourUserName = $('#your-user-name'+yourUserId).val();        
        $('.user-text').text(yourUserName);
        
        $('input[name="add_your_user_name"]').val(yourUserName);
        
        
    } else if (nextIindex === 3) {
        //カテゴリ名の取得
        var categoryId = $('input[name="category_mst_id"]').filter(':checked').val();
        var categoryName = $('#category-name'+categoryId).val();        
        $('.category-text').text(categoryName);
    } else if (nextIindex === 5) {
        // 金額の取得
        var money_text = $('input[name=money]').val();
        $('.money-text').text(money_text);
        
        // 貸借日の取得
        var date_text = $('input[name=date]').val();
        $('.date-text').text(date_text);

        // 返却期限の有無
        var limit_text = '設定なし';
        if ($('input[name=limit-flg]:checked').val() === 'yes') {
            var limit_text = $('input[name=limit]').val();
        }
        $('.limit-text').text(limit_text);
        
    }
    
    // nowPageを隠す
    console.log($('.page')[nowIndex]);
    console.log($('.page')[nextIindex]);


    // 今のページが非表示じゃなかったら非表示にする
    if ($($('.page')[nowIndex]).hasClass('non-display') === false) {
        $($('.page')[nowIndex]).addClass('non-display');
    }
    
    // 次のページが非表示なら表示にする
    if ($($('.page')[nextIindex]).hasClass('non-display') === true) {
        $($('.page')[nextIindex]).removeClass('non-display');
    }
    
    // nextPageを表示する
    
    if (nextIindex === 0) {
        //最初を表示
        
//        var p = $(".page").height() * nextIindex - $('.header').height();
        
        //１つ前に戻るボタンは、初期ページ以外で表示
        $('.pre-btn').css("visibility","hidden");
        
    } else {
        //スクロールする部分の高さ * ページ数 + ステータス表示領域 - ヘッダーの高さ
//        var p = $(".page").height() * nextIindex + ($('.create-status').height() - $('.header').height());
        
        //１つ前に戻るボタンの表示
        $('.pre-btn').css("visibility","visible");        
    }
    
    
//    $('.create-view').animate({ scrollTop: p }, 'fast');
    return false;
    
}
/**
 * 入力値チェックを行うメソッド
 * そのページで必要な内容が入力されていない場合は、次のページには行けない
 * 
 * @pram page ページ番号
 * @return true  入力値チェックで問題ない
 *         false 入力内容が不正
 */
function validationCheck(page) {
    // 貸借選択
    if (page === 0) {
        // 選択中の型がundefinedでなければ選んでいる
        if (typeof　$("[name=type]:checked").val() === "undefined") {
            return false;
        }
    // お相手選択
    } else if (page === 1) {
        if (typeof　$("[name=your_user_id]:checked").val() === "undefined") {
            return false;
        }
    // カテゴリ選択
    } else if (page === 2) {
        // カテゴリ選択
        if (typeof　$("[name=category_mst_id]:checked").val() === "undefined") {
            return false;
        }
        // 金額入力 数値のみ受付
        if ($.isNumeric($("[name=money]").val()) === false) {
            return false;
        }
    // 日付選択
    } else if (page === 3) {
        // 入力されていない場合
        if ($("[name=date]").val().length <= 0){
            return false;
        }
    // 期限選択
    } else if (page === 4) {
        // 入力されていない場合
        if ($("[name=limit-flg]:checked").val() === 'yes') {
            if ($("[name=limit]").val().length <= 0){
                return false;
            }
        }
    }

}
</script>

    