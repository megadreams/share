<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="apple-touch-startup-image" href="startup.png">
        <title>貸し借り管理</title>
        <?php echo Asset::css('common.css'); ?>
        <?php echo Asset::css('mobile/mainview.css'); ?>
        <?php echo Asset::js('jquery.min.js'); ?>
        <?php echo Asset::js('leanModal.min.js'); ?>
        <?php echo Asset::js('common.js'); ?>
    </head>
    <body>
        <?php echo $content; ?>
        <?php echo $footer; ?>

    </body>
</html>
