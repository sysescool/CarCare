<?php


namespace app\index\controller;

header("Access-Control-Allow-Origin: *");

use think\Controller;

/**
 * 公共控制器
 * Class Common
 * @package app\index\controller
 */
class Common extends Controller
{
    // 前置方法
    protected function initialize()
    {
        if(!session('id') || !session('name')){
            //$this->error('您尚未登录系统',url('index/login/index'));
            $this->redirect('index/login/index');
        }
    }

    /**
     * 头部控制器 - 显示页面
     */
    public function header(){
        $this->fetch();
    }


    /**
     * 底部控制器 - 显示页面
     */
    public function footer(){
        $this->fetch();
    }

}