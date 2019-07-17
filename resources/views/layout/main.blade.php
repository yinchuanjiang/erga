<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>张二嘎</title>

    <meta property="og:type" content="website" />
    <meta property="og:title" content="张二嘎">
    <meta property="og:image" content="{{config('app.url')}}images/share.png">
    <meta property="og:url" content="{{config('app.url')}}">

    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="css/erga.css"/>
    <link rel="stylesheet" type="text/css" href="css/animate.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- head 中 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.3/style/weui.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/jquery-weui/1.2.1/css/jquery-weui.min.css">
    <script src="https://cdn.bootcss.com/jquery/1.12.2/jquery.min.js"></script>
    {{--<script src="http://res.wx.qq.com/open/js/jweixin-1.4.0.js"></script>--}}
    <script src="https://cdn.bootcss.com/axios/0.19.0/axios.min.js"></script>
    <script>
        {{--wx.config({--}}
            {{--debug: false,--}}
            {{--appId: "{{$signPackage['appid']}}", // 必填，公众号的唯一标识--}}
            {{--timestamp: "{{$signPackage['timestamp']}}", // 必填，生成签名的时间戳--}}
            {{--nonceStr: "{{$signPackage['noncestr']}}", // 必填，生成签名的随机串--}}
            {{--signature: "{{$signPackage['signature']}}", // 必填，签名，见附录1--}}
            {{--jsApiList: [--}}
                {{--'previewImage',--}}
                {{--'hideAllNonBaseMenuItem',--}}
                {{--'showMenuItems',--}}
                {{--'onMenuShareTimeline',--}}
                {{--'onMenuShareAppMessage',--}}
                {{--'chooseWXPay'--}}
            {{--] // 必填，需要使用的 JS 接口列表，所有JS接口列表见附录2--}}
        {{--})--}}
        {{--wx.ready(() => {--}}
            {{--const share_title = "{{$signPackage['title']}}";--}}
            {{--const share_desc = "{{$signPackage['desc']}}";--}}
            {{--const share_link = "{{$signPackage['url']}}";--}}
            {{--const share_img = "{{$signPackage['img_url']}}";--}}
            {{--wx.showOptionMenu()--}}
            {{--wx.onMenuShareTimeline({--}}
                {{--title: share_title, // 分享标题--}}
                {{--link: share_link, // 分享链接--}}
                {{--imgUrl: share_img, // 分享图标--}}
            {{--})--}}
            {{--wx.onMenuShareAppMessage({--}}
                {{--title: share_title, // 分享标题--}}
                {{--desc: share_desc, // 分享描述--}}
                {{--link: share_link, // 分享链接--}}
                {{--imgUrl: share_img, // 分享图标--}}
            {{--})--}}
        {{--})--}}
    </script>
</head>
<body>
    <p style="display: none;">
        <img src="./images/share.png" style="position: absolute; visibility: hidden" alt="">
    </p>
    @yield("content")
</body>
<!-- body 最后 -->
<script src="https://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.1/js/jquery-weui.min.js"></script>
<!-- 如果使用了某些拓展插件还需要额外的JS -->
<script src="https://cdn.bootcss.com/jquery-weui/1.2.1/js/swiper.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.1/js/city-picker.min.js"></script>
</html>
