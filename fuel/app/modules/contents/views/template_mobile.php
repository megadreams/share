<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charaset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
        <title>貸し借り管理</title>
        <?php echo Asset::css('common.css'); ?>
        <?php echo Asset::css('mobile/mainview.css'); ?>
        <?php echo Asset::js('jquery.min.js'); ?>
    </head>
    <body>
        <?php echo $content; ?>
        <footer>
            <div class="float-area">
                <a href="<?php echo \Uri::Base() . 'contents/' . 'lendborrow/top/'?>">
                    <div class="footer-btn footer-active">
                            貸借
                    </div>
                </a>

                <a href="">
                    <div class="footer-btn">
                            なにか
                    </div
                </a>

                <a href="">
                    <div class="footer-btn">
                            通
                    </div>
                </a>

                <a href="">
                    <div class="footer-btn">
                            設定
                    </div>
                </a>
            </div>
        </footer>
    </body>
</html>
