<section>
    <header class="header">
        <div class="head-title float">
            <h1><?php echo $title; ?></h1>
        </div>
    </header>    

    <div>
        <p>    
            何かお問い合わせのかる方は、下記フォームより入力ください。
        </p>
        <form>
            <div>
                <p>
                    お問い合わせカテゴリを下記より選択ください。                 
                </p>
                <select name="">
                    <option value="">このアプリについて</option>
                    <option value="">アプリからの通知について</option>
                    <option value="">機能のご要望について</option>
                    <option value="">その他</option>
                </select>
            </div>
            <div>                
                <p>
                    返信用のメールアドレスをご記入ください。                 
                </p>
                <input type="eail" name="mail-address">
            </div>
            
            <div>
                <p>
                    お問い合わせ内容をご記入ください。
                </p>
                <textarea name="report" cols="30" rows="5"></textarea>
            </div>
            <input class="btn btn-blue" type="submit" value="送信">
        </form>
    </div>    
</section>