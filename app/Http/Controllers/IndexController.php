<?php

namespace App\Http\Controllers;


use App\UserLuck;

class IndexController extends Controller
{
    public function index()
    {
        return view('index.index');
    }

    public function activity()
    {
        return view('index.activity');
    }

    //中奖用户数据收集
    public function submit()
    {
        return show(200,'提交成功');
    }

    //记录用户开福袋 8个触发抽奖
    public function luck()
    {
        $data = [
            'user_id' => auth()->id(),
            'type' => request('type'),
        ];
        UserLuck::updateOrCreate($data);
        if(request('type') == 8){
            return show(300,'中奖了',['prize' => 3]);
        }
        $random = rand(1,90);
        if($random % 10 == 0){
            return show(300,'中奖了',['prize' => 3]);
        }
        return show(200,'记录成功');
    }
}
