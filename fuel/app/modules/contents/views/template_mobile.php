<!DOCTYPE html>
<html>
    <head>
        <meta charaset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
        <title>TOPページ</title>
        <?php echo Asset::css('common.css'); ?>
        <?php echo Asset::css('mobile/mainview.css'); ?>
    </head>
    <body>
        <header class="header ">
            <div class="head-title">
                <h1>TOP</h1>
            </div>
        </header>
        
        <?php echo $content; ?>
        <footer>
            <div class="float-area">
                <a href="">
                    <div class="footer-btn footer-active">
                            貸借
                    </div>
                </a>

                <a href="">
                    <div class="footer-btn">
                            なにか
                    </div>
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
