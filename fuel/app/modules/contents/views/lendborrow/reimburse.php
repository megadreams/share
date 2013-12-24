    <header class="header float-area">
        <a class="non-decoration" href="<?php echo $view_data['base_url'] . 'lendborrow/list/'. $view_data['your_user_id']; ?>">
            <div class="header-back-btn float">
                リストへ
            </div>
        </a>
        <div class="head-title float">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="head-right-btn pre-btn float">
            戻る
        </div>
    </header>

    <div class="create-status">
        <span id="step1" class="index-status status-active">精算選択</span> ->
        <span id="step2" class="index-status">精算額入力</span> -> 
        <span id="step3" class="index-status">精算日</span> -> 
        <span id="step4" class="index-status">確認</span>
    </div>

    <form action="<?php echo $view_data['base_url'] . 'lendborrow/adjustment_register/';?>" method="POST">
        <div class="create-view">
            <section class="create-view page">
            <div class="balance-sheet">
                <span class="newline">
                    現在の精算額
                </span>
                <table class="adjustment-summary-text w100p">
                    <tr>
                        <th class="w20p">金額</th>
                        <td class="w30p"><span class="adjustment-money-summary">0</span>円</td>
                        <th class="w20p">点数</th>
                        <td class="w30p"><span class="adjustment-count-summary">0</span>点</td>
                    </tr>
                </table>
                <span class="adjustment-summary-text newline adjustment-status-summary">
                    精算額はありません
                </span>            
            </div>
                <?php $view = array('lend', 'borrow'); ?>
                <?php foreach ($view as $type): ?>
                    <?php if (count($view_data[$type]) > 0): ?>
                        <?php foreach ($view_data[$type] as $records): ?>
                            <?php if ($type === 'lend'):?>
                                <?php $class_name = 'color-green'; ?>
                            <?php elseif ($type === 'borrow'):?>
                                <?php $class_name = 'color-red'; ?>
                            <?php endif;?>

                            <label class="newline user-record float-area">
                                <div class="w20p float adjustment-check">                            
                                    <input class="adjustment-recode" type="checkbox" name="recode[]" value="<?php echo $records->id; ?>">
                                    <input class="recode-money<?php echo $records->id; ?>" type="hidden" value="<?php echo ($type === 'lend')?$records->money: -($records->money); ?>">
                                </div>
                                <div class="recode-left w60p float">
                                    <span class="newline">
                                        <?php echo date('Y年n月j日', $records->date); ?>
                                    </span>  
                                    <span class="newline <?php echo $class_name;?>">
                                        <?php echo $records->category_mst->category_name; ?>　:　<?php echo $records->money; ?>円
                                    </span>
                                    <span class="newline">
                                        <?php echo $records->memo; ?>
                                    </span>
                                </div>
                                <div class="recode-right w10p float adjustment-status">
                                    <span class="<?php echo $class_name;?>">
                                        <?php echo ($type === 'lend')? '貸' : '借'; ?>
                                    </span>
                                </div>
                            </label>

                        <?php endforeach; ?>
                    <?php else: ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <div class="float-area">
                <div class="float w50p">
                    <span class="pre-btn">前へ</span>
                </div>
                <div class="float w50p">
                    <span class="next-btn">次へ</span>
                </div>
            </div>              
        </section>
            
        <section class="create-view page non-display">                   
            <header>
                <h1>
                    精算額入力
                </h1>
            </header>
            <div>
                <span class="adjustment-count-summary">0</span>点
                <span class="adjustment-money-summary">0</span>円
                <span class="adjustment-status-summary"></span>
            </div>
            <div class="create-input-box">
                <div id="adjustment-input-money-view-on" class="input-box float-area">
                    <span class="w30p float adjustment-input-text">
                        受け取り金額
                    </span>
                    <input class="w60p text-right" type="tel" name="money" value="0">
                </div>
                <div id="adjustment-input-money-view-off" class="input-box float-area color-blue">
                    相殺されているため、<span class="newline">精算のみで支払いはありません。</span>
                </div>
            </div>
            <div class="float-area">
                <div class="float w50p">
                    <span class="pre-btn">前へ</span>
                </div>
                <div class="float w50p">
                    <span class="next-btn">次へ</span>
                </div>
            </div>          
        </section>
        <section class="create-view page non-display">
            <header>
                <h1>
                    精算日を選択してください
                </h1>
            </header>
            <div class="create-friend-list">
                <div class="input-box float-area">
                    <span class="w30p float">精算日</span>
                    <input class="w60p text-right" type="date" name="date" value="<?php echo date('Y-m-d');?>">                        
                </div>
            </div>
            <div class="float-area">
                <div class="float w50p">
                    <span class="pre-btn">前へ</span>
                </div>
                <div class="float w50p">
                    <span class="next-btn">次へ</span>
                </div>
            </div>                
        </section>
            
        <section class="create-view page non-display">                   
            <header>
                <h1>
                    精算確認
                </h1>
            </header>
            <table class="lendborrow-table">
                <tr>
                    <th>精算日</th>
                    <td>
                        <span class="adjustment-date-summary"></span>
                    </td>
                </tr>                
                <tr>
                    <th>精算点数</th>
                    <td>
                        <span class="adjustment-count-summary">0</span>点
                    </td>
                </tr>
                <tr>
                    <th>状態</th>
                    <td>
                        <span class="adjustment-status-summary">0</span>
                    </td>
                </tr>
                <tr>
                    <th>精算金額</th>
                    <td>
                        <span class="adjustment-money-summary">0</span>円
                    </td>
                </tr>
                <tr>
                    <th><span class="adjustment-input-text">金額</span></th>
                    <td>
                        <span class="adjustment-payment-summary">0</span>円
                    </td>
                </tr>                
            </table>
            <input type="hidden" name="receive_user_id" value="<?php echo $view_data['your_user_id'];?>";?>        
            <input class="regist-btn" type="submit" name="create" value="登録">
            <span class="newline">精算した際に、端数があれば端数差分を貸し借りに登録するか選択できる</span>
            
        </section>
            
    </div>            
    </form>
        

<script>
var total_money = 0;
var total_count = 0;

$(function() {

    
    
    $(".adjustment-recode").change(function() {
        var status_text;
        
        var price = Number($('.recode-money' + this.value).val());
        if ($(this).is(':checked')) {
            total_money += price;
            total_count++;
        } else {
            total_money -= price;
            total_count--;
        }
        if (0 < total_money) {
            // +
            $(".adjustment-summary-text").removeClass("color-red");
            $(".adjustment-summary-text").addClass("color-green");
            status_text = '返ってきます';


        } else if (0 > total_money) {
            // -
            $(".adjustment-summary-text").addClass("color-red");
            $(".adjustment-summary-text").removeClass("color-green");
            status_text = '返します';


        } else {
            $(".adjustment-summary-text").removeClass("color-red");
            $(".adjustment-summary-text").removeClass("color-green");
            if (total_count === 0) {
                status_text = '精算はありません';
            } else {
                status_text = '相殺されています。';            
            }

        }
        
        $(".adjustment-status-summary").text(status_text);
        $(".adjustment-count-summary").text(total_count);
        $(".adjustment-money-summary").text(Math.abs(total_money));
        $('input[name="money"]').val(Math.abs(total_money));

     });
     
 });
</script>
   
<script>

$(function() {

    //サーバからデータをもらいましょう！
    var category_info;
    var user_friends_info;
    
    var nowpage = 0;
    var page = $('.page');
    
    //１つ前に戻るボタンは、初期ページ以外で表示
    $('.pre-btn').css("visibility","hidden");
    
    
    //次のページへの遷移設定
    $(".next-btn").click(function() {
        // ページが変わる際には入力値チェックを行う
        if (validationCheck(nowpage) === false){
            alert("データを入力してください");
            return false;
        }        var tmp_page = nowpage;
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
    console.log("nextIindex");
    console.log(nextIindex);
    
    if (nextIindex === 1) {
        if (total_money === 0) {
            // 2ページ目表示 相殺のためエリア非表示
            $("#adjustment-input-money-view-on").hide();
            $("#adjustment-input-money-view-off").show();
            $(".adjustment-input-text").text("相殺金額");
        } else {
            // 2ページ目表示
            if (total_money > 0) {
                $(".adjustment-input-text").text("受取金額");
            } else {
                $(".adjustment-input-text").text("支払金額");
            }
            
            $("#adjustment-input-money-view-on").show();
            $("#adjustment-input-money-view-off").hide();
        }
        
    } else if (nextIindex === 2) {
        $(".adjustment-payment-summary").text($('input[name="money"]').val());
        
    } else if (nextIindex === 3) {
        //日付を確認画面へ
        $(".adjustment-date-summary").text($("[name=date]").val());
        
                
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
    // 精算リストの取得
    if (page === 0) {
        // 選択中の型がundefinedでなければ選んでいる
        if ($(".adjustment-recode:checked").length == 0) {
            return false;
        }
    // 精算額
    } else if (page === 1) {
        if (typeof　$('input[name="money"]').val() === "undefined") {
            return false;
        }
    // 精算日
    } else if (page === 2) {
        // 入力されていない場合
        if ($("[name=date]").val().length <= 0){
            return false;
        }
    }

}
</script>

    

