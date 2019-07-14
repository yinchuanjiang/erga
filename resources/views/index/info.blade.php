@extends('layout.main')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- head 中 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.3/style/weui.min.css">
    <div class="weui-tab">
        <div class="weui-cells weui-cells_form" id="form">
            <div class="weui-cells weui-cells_form">
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label for="" class="weui-label" style="color: #00cc99;font-size: 12px;font-weight: 400">*姓名</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" name="real_name" value="" placeholder="请输入姓名">
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label for="" class="weui-label" style="color: #00cc99;font-size: 12px;font-weight: 400">*手机号</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="number" name="mobile" pattern="[0-9]*" value="" placeholder="请输入手机号">
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <textarea class="weui-textarea address" placeholder="*请输入接受奖品地址" rows="4"></textarea>
                        <div class="weui-textarea-counter"><span class="text-num">0</span>/100</div>
                    </div>
                </div>
            </div>
            <button class="weui-btn" style="width: 60%;background-color: #00cc99;color: white">提交</button>
        </div>
    </div>
    <script src="https://cdn.bootcss.com/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/axios/0.19.0/axios.min.js"></script>
    <script>
        $(function () {
            var address = '';
            //文本输入
            $('.address').keyup(function () {
                if (address.length > 100) {
                    $.alert("接受奖品地址最多100个字符");
                    $(this).val(address);
                }
                address = $(this).val();
                $('.text-num').html(address.length)
            })
        })
    </script>
@endsection