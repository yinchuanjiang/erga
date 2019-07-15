<?php

namespace App\Http\Controllers;


use App\UserLuck;

class IndexController extends BaseController
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
        //触发抽奖
        if(UserLuck::where('user_id',auth()->id())->count() == 8){
            return show(300,'触发抽奖',['prize' => rand(1,3)]);
        }
        return show(200,'记录成功');
    }
}
