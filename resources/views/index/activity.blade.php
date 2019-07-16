@extends('layout.main')
@section('content')
    <audio src="./images/bgmusic.mp3" id="au"></audio>
    {{--<img src="./images/music_off.png" id="music"/>--}}
	<div id="tip-box" class="container-alter" style="display:none">
        <div class="bg">
          <img src="./images/40.png" alt="" class="verse" >
          <img src="./images/close.png" alt="" class="close" >
        </div>
    </div>
    <div class="swiper-container" style="overflow: auto;">
        <div class="swiper-wrapper" style="height: auto">
            <div class="swiper-slide">
                @if(!auth()->user()->prize)
                    <div class="first" style="background-color: black;opacity: 0.7;width: 100%;height: 100%;position: absolute;z-index: 9">
                        <img src="./images/left-right.png" alt="" style="width: 100%;">
                    </div>
                @endif
                <div class="container">
                    <div class="box" style="position: relative">
                        <img src="./images/40.gif" alt="" class="main">
                        <img src="./images/fudai.gif" alt="" class="luck" data-id="40" style="left: 73%;bottom:20%">
                    </div>
                </div>
                
            </div>
            <div class="swiper-slide">
                <div class="container">
                    <div class="box" style="position: relative">
                        <img src="./images/50.gif" alt="" class="main">
                        <img src="./images/fudai.gif" alt="" class="luck" data-id="50" style="left: 60%;bottom:17%">
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container">
                    <div class="box" style="position: relative">
                        <img src="./images/60.gif" alt="" class="main">
                        <img src="./images/fudai.gif" alt="" class="luck" data-id="60" style="left: 13%;bottom:17%">
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container">
                    <div class="box" style="position: relative">
                        <img src="./images/70.gif" alt="" class="main">
                        <img src="./images/fudai.gif" alt="" class="luck" data-id="70" style="left: 43%;top:25%">
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container">
                    <div class="box" style="position: relative">
                        <img src="./images/80.gif" alt="" class="main">
                        <img src="./images/fudai.gif" alt="" class="luck" data-id="80" style="left: 38%;top:19%">
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container">
                    <div class="box" style="position: relative">
                        <img src="./images/90.gif" alt="" class="main">
                        <img src="./images/fudai.gif" alt="" class="luck" data-id="90" style="left: 73%;bottom:15%">
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container">
                    <div class="box" style="position: relative">
                        <img src="./images/100.gif" alt="" class="main">
                        <img src="./images/fudai.gif" alt="" class="luck" data-id="100" style="left: 53%;bottom:37%">
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container">
                    <div class="box" style="position: relative">
                        <img src="./images/110.gif" alt="" class="main">
                        <img src="./images/fudai.gif" alt="" class="luck" data-id="110" style="left: 53%;bottom:42%">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="info-dialog" style="display: none">
        <div class="weui-mask weui-mask--visible"></div>
        <div class="weui-dialog weui-dialog--visible">
            <div class="weui-dialog__hd"><strong class="weui-dialog__title">请填写获奖信息</strong></div>
            <div class="weui-dialog__bd"><p class="weui-prompt-text"></p>
                <input type="text" class="weui-input weui-prompt-input real_name" id="weui-prompt-username" value="" placeholder="输入姓名">
                <input type="number" class="weui-input weui-prompt-input mobile" id="weui-prompt-password" value="" placeholder="输入手机号">
                <input type="text" class="weui-input weui-prompt-input address" id="weui-prompt-password" value="" placeholder="请输入接受奖品地址">
            </div>
            <div class="weui-dialog__ft">
                <a href="javascript:;" class="weui-dialog__btn default">取消</a><a href="javascript:;" class="weui-dialog__btn primary">确定</a>
            </div>
        </div>
    </div>
    <div class="prize-dialog" style="display: none">
        <div class="weui-mask weui-mask--visible prize-div">
            <img src="./images/prize_1.png" alt="" class="prize_1 prize" style="width: 70%;display: none">
            <img src="./images/prize_2.png" alt="" class="prize_2 prize" style="width: 70%;display: none">
            <img src="./images/prize_3.png" alt="" class="prize_3 prize" style="width: 70%;display: none">
        </div>
    </div>
    <script src="https://cdn.bootcss.com/jquery/1.12.2/jquery.min.js"></script>
    <script src="./js/swiper.min.js"></script>
    <script src="./js/swiper.animate1.0.2.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="./js/wei.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            paginationClickable: true,
            onInit: function (swiper) { //Swiper2.x的初始化是onFirstInit
                swiperAnimateCache(swiper); //隐藏动画元素
                swiperAnimate(swiper); //初始化完成开始动画
            },
            onSlideChangeEnd: function (swiper) {
                swiperAnimate(swiper); //每个slide切换结束时也运行当前slide动画
                $('.container-alter').hide();
//		    if (swiper.activeIndex==0) {
//		    	$(".import").css('left','70%');
//		    }else{
//		    	$(".import").css('left','0%');
//		    }
            }
        });
        $(function () {
            $("#loading").fadeOut(1000)
            $('.swiper-wrapper').fadeIn(1000)
//            $('.luck').click(function () {
//                $(this).parents('.swiper-slide').find('.container-alter').show();
//            })
            $('.close').click(function () {
                $(this).parents().find('.container-alter').hide();
            })
            //点击大福袋填写用户信息
            $('.box .luck').click(function () {
                var type = swiper.activeIndex + 1;
                var that = this;
                axios.get('/luck?type=' + type).then(res => {
                    $.hideLoading();
                    if (res.data.status == 200) {
                        //$(that).parents('.swiper-slide').find('.container-alter').css('display', 'flex');
                      	var id = $(this).data("id");
                      	$('#tip-box .verse').attr("src","./images/"+id+".png");
                        $('#tip-box').show();
                    }else if (res.data.status == 300) {
                        $('.prize_' + res.data.data.prize).show().siblings('.prize').hide();
                        $('.prize-dialog').show();
                    }
                }).catch(error => {
                    $.hideLoading();
                    $.each(error.response.data.errors, function (idx, obj) {
                        $.toast(obj[0], "forbidden");
                        return false;
                    });
                })
            });

            //一二等奖 信息dialog
            $('.prize_1,.prize_2').click(function () {
                $('.info-dialog').show();
            })
            //三等奖
            $('.prize_3').click(function () {
                window.location.href = 'https://coupon.m.jd.com/coupons/show.action?key=3c7fb50feb45415e88597ef15941a1ca&roleId=20572156&to=zhangerga.jd.com';
            })
            //信息取消提交
            $('.default').click(function () {
                $('.info-dialog').hide();
            })
            //信息提交
            $('.primary').click(function () {
                var real_name = $('.real_name').val();
                var mobile = $('.mobile').val();
                var address = $('.address').val();
                var formdata = new FormData();
                formdata.append('real_name', real_name);
                formdata.append('mobile', mobile);
                formdata.append('address', address);
                formdata.append('_token', '{{csrf_token()}}');

                axios.post('/submit', formdata).then(res => {
                    $.hideLoading();
                    if (res.data.status == 200) {
                        $.toast("提交成功");
                        $('.info-dialog').hide();
                    } else {
                        $.toast(res.data.msg, "forbidden");
                    }
                }).catch(error => {
                    $.hideLoading();
                    $.each(error.response.data.errors, function (idx, obj) {
                        $.toast(obj[0], "forbidden");
                        return false;
                    });
                })
            })
            //关闭中奖dialog
            $('.prize-dialog').click(function () {
                $('.pirze').hide();
                $(this).hide();
            })
            $('.first').click(function () {
                $(this).hide();
            })
        })
    </script>
@endsection
