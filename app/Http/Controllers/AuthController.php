<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //静默授权
    public function auth()
    {
        $appid = config('app.wx_appid');
        $url = route('home');
        $scope = 'snsapi_base';
        $state = '';
        return redirect("https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$url&response_type=code&scope=$scope&state=$state#wechat_redirect");
    }
    //非静默授权
    public function userAuth()
    {
        $appid = config('app.wx_appid');
        $url = route('auth.user');
        $scope = 'snsapi_userinfo';
        $state = '';
        return redirect("https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$url&response_type=code&scope=$scope&state=$state#wechat_redirect");
    }

    //授权登录
    public function index()
    {
        $appid = config('app.wx_appid');
        $secret = config('app.wx_secret');
        $code = request('code');
        $data = json_decode(file_get_contents("https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code"), true);
        if (!isset($data['openid']))
            abort(404);
        $openid = $data['openid'];
        $this->saveUser($openid);
        return redirect(route('index'));
    }

    private function saveUser($openid, $avatar, $nickname)
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
}
