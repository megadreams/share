$(function(){
    $(window).ready(function () {
        $("form").each(function() {
          this.reset();
        });        
    });
    
    $('input[type="submit"]').click(function() {
        // カテゴリの選択チェック
        var category = $('select[name="category"]').val();
        if (category === "0") {
            alert("カテゴリを選択して下さい。");
            goto('#box_category');
            return false;
        }

        // メールアドレスのチェック
        var mail_address = $('input[name="mail_address"]').val();
        var mail_address_confirmation = $('input[name="mail_address_confirmation"]').val();
        // @形式のメールアドレスになっているか？
        if (!mail_address.match(/^[A-Za-z0-9]+[\w-]+@[\w\.-]+\.\w{2,}$/)){
            alert("メールアドレスをご確認ください。");
            goto('#box_mail_address');
            return false;
        }
        if (!mail_address_confirmation.match(/^[A-Za-z0-9]+[\w-]+@[\w\.-]+\.\w{2,}$/)){
            alert("確認用メールアドレスをご確認ください。");
            goto('#box_mail_address_confirmation');
            return false;
        }

        // メールアドレスがあっているかチェック
        if (mail_address !== mail_address_confirmation) {
            alert("入力されたメールアドレスが違います。");
            goto('#box_mail_address');
            return false;
        }

        // 登録名の入力値チェック
        var user_name = $('input[name="user_name"]').val();

        // お問い合わせ詳細入力値チェック
        var text = $('textarea[name="text"]').val();
        text = text.replace(/^\s+|\s+$/g, "");
        text = text.replace(/(^\s+)|(\s+$)/g, "");
        if (text.length == 0) {
            alert("お問い合わせ内容を入力して下さい。");
            goto('#box_text');
            return false;
        }
        if (text.length > 1024) {
            alert("1024文字以内でお問い合わせ内容を入力して下さい。");
            goto('#box_text');
            return false;
        }
        
        if(!confirm("送信します。よろしいですか？")) {
            return false;                
        }
        return true;
    });
});

function goto(goto_id) {
    location.href = goto_id;
}