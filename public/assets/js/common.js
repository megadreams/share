$(function(){
    window.addEventListener('load',function(){
         window.scrollTo(0, 1);
    },false);

    setTimeout("window.scrollTo(0,1)",500);
    

});



//入力時にフォーカスを与える関数
function inputDefaultText(selector, defaultText) {
    $(selector).val(defaultText).css("color","#969696");   
    
    //フォーカス時にデフォルト文字だったら消す
    $(selector).focus(function() {
        $(this).css("background-color" , "#dbdbff");
        if(this.value == defaultText){ 
            $(this).val("").css("color","#000");   
        }
    });
    
    //フォーカスが外れた時にデフォルト文字じゃなかったら代入する
    $(selector).blur(function(){   
        $(this).css("background-color" , "#fff");
        if(this.value == ""){   
            $(this).val(defaultText).css("color","#969696");   
        }   
        if(this.value != defaultText){   
            $(this).css("color","#000");  
        }
    });
}


function modalInit() {
    $('a[rel*=leanModal]').leanModal({
            top: 0,                     // モーダルウィンドウの縦位置を指定
            overlay : 0.5,               // 背面の透明度 
            closeButton: ".modal_close"  // 閉じるボタンのCSS classを指定
    });
    
    
    $('#close').click(function(){
        //モーダルの削除
        $('#lean_overlay').click();
    });
}



/**
 * 
 * Ajaxによる通信エラーの際の処理
 */
function error_ajax(msg) {
    alert('申し訳ございません。サーバでエラーが発生しています。');
    console.log(msg);
    ingicater_end();
    return false;
}