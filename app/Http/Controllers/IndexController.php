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
        return show(200,'记录成功');
    }
    //
    public function prize()
    {
        //触发抽奖
        if(UserLuck::where('user_id',auth()->id())->count() == 8){
            if(auth()->user()->prize)
                return show(200,'触发抽奖',['prize' => auth()->user()->prize]);
            $random = rand(1,300000);
            if($random % 30000 == 0){
                $prize = 1;
            }else if($random % 150 == 0){
                $prize = 2;
            }else{
                $prize = 3;
            }
            $prize = 3;
            auth()->user()->prize = $prize;
            auth()->user()->save();
            return show(200,'触发抽奖',['prize' => $prize]);
        }
    }
}
