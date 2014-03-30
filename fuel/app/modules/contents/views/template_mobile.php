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
        <?php echo Asset::css('idangerous.swiper.css'); ?>
        <?php echo Asset::js('jquery.min.js'); ?>
        <?php echo Asset::js('leanModal.min.js'); ?>
        <?php echo Asset::js('common.js'); ?>
        <?php echo Asset::js('idangerous.swiper-2.1.min.js'); ?> 
    </head>
    <body>
        <?php echo $content; ?>
        <?php // echo $footer; ?>

    </body>
    <!--
    <footer>
        <iframe src="http://rcm-fe.amazon-adsystem.com/e/cm?t=megadreams14-22&o=9&p=288&l=ur1&category=special_deal&f=ifr" width="320" height="50" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>

    </footer>    
    -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-37618383-2', 'kashikari.asia');
  ga('send', 'pageview');

</script>
</html>
