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
<style>
    .swiper-container .container {
        width: 100%;
        height: 100%;
        position: relative;
        display: flex !important;
        display: -webkit-flex;
        justify-content: center;
        align-items: center;
    }
</style>
<div class="swiper-container" style="overflow:auto;">
    <div class="swiper-wrapper" style="height: auto">
        <div class="swiper-slide">
            <div class="container">
                <img src="./images/loading.gif" alt="" style="width: 100%" class="loding">
                <div class="start" style="display: none">
                    <img src="./images/zhuye.png" alt="" style="width: 100%">
                    <div style="width: 32%;position: absolute;top: 53%;left: 34%">
                        <a href="/activity" style="margin: 0 auto;display: block;text-align: center"><img src="./images/begain.png" alt="" style="width: 100%;"></a>
                        <div style="text-align: center;width: 100%;font-size: 12px;text-decoration: underline"><a href="/rule" style="color: #EFB0B0;">规则说明</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="display: none">
    <img src="./images/40.gif" alt="" class="cover">
    <img src="./images/50.gif" alt="" class="cover">
    <img src="./images/60.gif" alt="" class="cover">
    <img src="./images/70.gif" alt="" class="cover">
    <img src="./images/80.gif" alt="" class="cover">
    <img src="./images/90.gif" alt="" class="cover">
    <img src="./images/100.gif" alt="" class="cover">
    <img src="./images/110.gif" alt="" class="cover">
    <img src="./images/40.png" alt="" class="cover">
    <img src="./images/50.png" alt="" class="cover">
    <img src="./images/60.png" alt="" class="cover">
    <img src="./images/70.png" alt="" class="cover">
    <img src="./images/80.png" alt="" class="cover">
    <img src="./images/90.png" alt="" class="cover">
    <img src="./images/100.png" alt="" class="cover">
    <img src="./images/110.png" alt="" class="cover">
    <img src="./images/fudai.gif" alt="" class="cover">
    <img src="./images/close.png" alt="" class="cover">
    <img src="./images/music_off.png" alt="" class="cover">
    <audio src="./images/bgmusic.mp3"></audio>
</div>
</body>
<script src="https://cdn.bootcss.com/jquery/1.12.2/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        var t_img; // 定时器
        var isLoad = true; // 控制变量

        // 判断图片加载状况，加载完成后回调
        isImgLoad(function () {
            $('.start').fadeIn(500)
            $(".loding").fadeOut(500)
        });

        // 判断图片加载的函数
        function isImgLoad(callback) {
            // 注意我的图片类名都是cover，因为我只需要处理cover。其它图片可以不管。
            // 查找所有封面图，迭代处理
            $('.cover').each(function () {
                // 找到为0就将isLoad设为false，并退出each
                if (this.height === 0) {
                    isLoad = false;
                    return false;
                }
            });
            // 为true，没有发现为0的。加载完毕
            if (isLoad) {
                clearTimeout(t_img); // 清除定时器
                // 回调函数
                callback();
                // 为false，因为找到了没有加载完成的图，将调用定时器递归
            } else {
                isLoad = true;
                t_img = setTimeout(function () {
                    isImgLoad(callback); // 递归扫描
                }, 500); // 我这里设置的是500毫秒就扫描一次，可以自己调整
            }
        }
    })
</script>
</html>
