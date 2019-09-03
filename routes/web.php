<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//自定义全局函数返回接口数据
if (! function_exists('show')) {
    /**
     * @param $status
     * @param string $msg
     * @param array $data
     * @return array
     */
    function show($status = 200, $msg = '',$data = [])
    {
        return new \Illuminate\Http\JsonResponse(compact('status','msg','data'));
    }
}
//Route::get('/auth', 'AuthController@auth')->name('login');
//Route::get('/home', 'AuthController@authUser')->name('login');
Route::get('/', 'IndexController@activity')->name('login');
Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/luck', 'IndexController@luck')->name('luck');
    Route::get('/prize', 'IndexController@prize')->name('prize');
    Route::post('/submit', 'IndexController@submit')->name('submit');
});
Route::get('/rule', function () {
    return view('index.rule');
});
