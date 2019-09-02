<?php

namespace App\Http\Controllers;


use App\Http\Requests\SubmitRequest;
use App\User;
use App\UserLuck;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function index()
    {
        if (!Cache::has('see_num')) {
            Cache::forever('see_num', 1);
        } else {
            Cache::increment('see_num', 1);
        }
        return view('index.index');
    }

    public function activity()
    {
        if (!Cache::has('see_num')) {
            Cache::forever('see_num', 1);
        } else {
            Cache::increment('see_num', 1);
        }
        if (!Auth::id()) {
            $this->saveUser(Str::uuid());
        }
        return view('index.activity');
    }

    //中奖用户数据收集
    public function submit(SubmitRequest $request)
    {
        $data = $request->all(['mobile', 'real_name', 'address']);
        auth()->user()->update($data);
        return show(200, '提交成功');
    }

    //记录用户开福袋 8个触发抽奖
    public function luck()
    {
        $data = [
            'user_id' => auth()->id(),
            'type' => request('type'),
        ];
        UserLuck::updateOrCreate($data);
        if(request('type') < 5){
            return show(200, '记录成功');
        }
        if (auth()->user()->prize) {
            return show(300, '中奖了', ['prize' => auth()->user()->prize]);
        }
        $prize = 3;
        if (request('type') == 8) {
            auth()->user()->prize = $prize;
            auth()->user()->save();
            return show(300, '中奖了', ['prize' => $prize]);
        }
        $random = rand(1, 90);
        if ($random % 10 == 0) {
            auth()->user()->prize = $prize;
            auth()->user()->save();
            return show(300, '中奖了', ['prize' => $prize]);
        }
        return show(200, '记录成功');
    }

    private function saveUser($openid, $avatar = '', $nickname = '')
    {
        $user = User::where('openid', $openid)->first();
        if (!$user) {
            $user = new User();
            $user->openid = $openid;
            $user->avatar = $avatar;
            $user->nickname = $nickname;
            $user->save();
        }
        Auth::guard('web')->login($user);
    }

    public function getPrize()
    {
//        $total = User::count();
        $total = rand(1,4000000);
        $first = User::where('prize',1)->count();
        $second = User::where('prize',2)->count();
        $prize = $this->draw($total, $first, 200000);
        if(!$prize) {
            $prize = $this->draw($total, $second, 10000);
        }else{
            $prize = 1;
        }
        if(!$prize) {
            $prize = 3;
        }else{
            $prize = 2;
        }
        dd(compact('prize','total'));
    }

    /**
     * @param $total
     * @param $first
     * @param $base
     */
    private function draw($total, $first, $base)
    {
        $first = $first + 1;
        $chance = $total > $first * $base ? $total % ($first * $base) : 0;
        dump(compact('chance'));
        $draw = rand(1, $base);
        if ($draw < $chance)
            return true;
        return false;
    }
}
