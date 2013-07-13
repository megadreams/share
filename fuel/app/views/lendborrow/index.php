<section>
    <header class="header">
        <div class="head-title float">
            <h1><?php echo $title; ?></h1>
        </div>
    </header>    
    <h2>
        <span class="newline">
            <?php echo $view_data['your_user_profile']->user_name;?>さんから
        </span>
        <span class="newline">
            <?php echo $view_data['lendborrow']['category_mst']->category_name; ?>を借りています</h1>
        </span>
    </h2>
    <table class="lendborrow-table">
        <tr>
            <th>日付</th>
            <td>
                <?php echo date('Y年n月d日', $view_data['lendborrow']['date']); ?>
            </td>
        </tr>
        <tr>
            <th>カテゴリ</th>
            <td>
                <?php echo $view_data['lendborrow']['category_mst']->category_name; ?>
            </td>
        </tr>
        <tr>
            <th>金額</th>
            <td>
                <?php echo number_format($view_data['lendborrow']['money']); ?>
            </td>
        </tr>
        <tr>
            <th>返却期限</th>
            <td>
                <?php echo ((int)$view_data['lendborrow']['limit'] === 0)?'なし':date('Y年n月d日', $view_data['lendborrow']['limit'] ); ?>
            </td>
        </tr>
        <tr>
            <th>状態</th>
            <td>
                <?php echo $view_data['lendborrow_status'][$view_data['type']][$view_data['lendborrow']['status']]; ?>
            </td>
        </tr>
        <tr>
            <th>メモ</th>
            <td>
                <?php echo $view_data['lendborrow']['memo']; ?>
            </td>
        </tr>
    </table>
    <div class="to-login">
        <span class="newline">
            貸借管理アプリにログインして詳細を確認     
        </span>
        <div>
            <a href="<?php echo Uri::base() . 'contents/auth/';?>">ログイン画面へ</a>
        </div>
    </div>    

    <div class="attention">
        <span class="newline">        
            こちらのデータは、<?php echo $view_data['your_user_profile']->user_name;?>さんが登録した情報です。
        </span>
        <span class="newline">        
            こちらの内容に心当たりがない場合は、お手数ですが<a href="<?php echo Uri::base() . 'help/';?>">問い合わせ</a>にてご連絡ください。
        </span>
    </div>
    
</section>