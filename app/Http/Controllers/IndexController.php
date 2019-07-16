<?php

namespace App\Http\Controllers;


use App\Http\Requests\SubmitRequest;
use App\UserLuck;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function index()
    {
        if (!Cache::has('see_num')) {
            Cache::forever('see_num', 1);
        }else{
            Cache::increment('see_num',1);
        }
        return view('index.index');
    }

    public function activity()
    {
        return view('index.activity');
    }

    //中奖用户数据收集
    public function submit(SubmitRequest $request)
    {
        $data = $request->all(['mobile','real_name','address']);
        auth()->user()->update($data);
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
        if(auth()->user()->prize){
            return show(300,'中奖了',['prize' => auth()->user()->prize]);
        }
        if(request('type') == 8){
            auth()->user()->prize = 3;
            auth()->user()->save();
            return show(300,'中奖了',['prize' => 3]);
        }
        $random = rand(1,90);
        if($random % 10 == 0){
            auth()->user()->prize = 3;
            auth()->user()->save();
            return show(300,'中奖了',['prize' => 3]);
        }
        return show(200,'记录成功');
    }
}
