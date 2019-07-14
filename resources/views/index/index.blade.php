<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>张二嘎</title>
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="css/erga.css"/>
    <link rel="stylesheet" type="text/css" href="css/animate.min.css"/>
</head>
<body>
    <div id="loading">
        <img src="./images/loading.gif" alt="" style="width: 100%">
    </div>
    <div class="swiper-container" style="display: none">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="./images/zhuye.png" alt="" class="ani" swiper-animate-effect="fadeIn" swiper-animate-duration="1s" style="width: 100%">
                <a href="/activity"><img src="./images/begain.png" alt="" style="width: 32%;position: absolute;top: 55%;left: 34%"></a>
                <span style="position: absolute;text-align: center;top:61%;width: 100%;font-size: 12px;text-decoration: underline"><a href="/rule" style="color: #EFB0B0;">规则说明</a></span>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.bootcss.com/jquery/1.12.2/jquery.min.js"></script>
<script type="text/javascript">
    setTimeout(function () {
        $("#loading").fadeOut(1000)
        $('.swiper-container').fadeIn(1000)
    },2000)
</script>
</html>
