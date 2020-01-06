<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------




use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');

Route::rule('/', 'index/index/index');
Route::rule('login', 'index/login/index');
Route::rule('verify', 'index/login/verify');
Route::rule('logout', 'index/login/logout');

//  栏目路由    这是第二章的内容了
Route::rule('cate/add','index/cate/add');
Route::rule('cate/edit/:id', 'index/cate/edit');
Route::rule('cate/del/:id', 'index/cate/del');
Route::rule('cate', 'index/cate/lst');

Route::rule('project/add','index/project/add');
Route::rule('project/edit/:id', 'index/project/edit');
Route::rule('project/del/:id', 'index/project/del');
Route::rule('project', 'index/project/lst');

Route::rule('staff/add','index/staff/add');
Route::rule('staff/edit/:id', 'index/staff/edit');
Route::rule('staff/del/:id', 'index/staff/del');
Route::rule('staff', 'index/staff/lst');

Route::rule('customer/add','index/customer/add');
Route::rule('customer/edit/:id', 'index/customer/edit');
Route::rule('customer/del/:id', 'index/customer/del');
Route::rule('customer', 'index/customer/lst');

Route::rule('vehicle/add','index/vehicle/add');
Route::rule('vehicle/edit/:id', 'index/vehicle/edit');
Route::rule('vehicle/del/:id', 'index/vehicle/del');
Route::rule('vehicle', 'index/vehicle/lst');

Route::rule('owner/add','index/owner/add');
Route::rule('owner/edit/:id', 'index/owner/edit');
Route::rule('owner/del/:id', 'index/owner/del');
Route::rule('owner', 'index/owner/lst');

Route::rule('order/add','index/order/add');
Route::rule('order/edit/:id', 'index/order/edit');
Route::rule('order/del/:id', 'index/order/del');
Route::rule('order', 'index/order/lst');

Route::group('user',[
    'add'   => ['index/user/add'],
    'edit'   => ['index/user/edit'],
    'find'   => ['index/user/findOne'],
    'del'   => ['index/user/del'],
    '' => ['index/user/lst']
]);

return [

];
