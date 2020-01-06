<?php


namespace app\index\controller;

use think\Db;
use think\Controller;
use think\facade\Request;
class Table extends Controller
{
    protected function initialize()
    {
        if(!session('id') || !session('name')){
            $this->error('您尚未登录系统',url('index/login/index'));

            //$this->redirect('index/login/index');
        }
    }

    public function lst(){
        $this->assign('titlename', '报表管理 - 报表浏览');
        return $this->fetch();
    }
    public function mmpro(){
        if($this->request->isPost()){
            $data = Request::post();
            $datetime1 = $data["datetime1"];
            $datetime2 = $data["datetime2"];
            $str = "EXEC [dbo].USPMMPRO @data1='$datetime1', @data2='$datetime2' ";
            $proinfo = Db::query($str);
            foreach($proinfo as $prosingle){
                foreach($prosingle as $item2) {
                    unset($item2['proid']);
                }
            }
        }
        $this->assign('titlename', '报表管理 - 报表浏览');
        $protitles = array("服务项目","服务项目id","时间段内的消费次数");
        $this->assign('tabletitles',  $protitles);
        $this->assign('contents', $proinfo);
        //dump($proinfo);
        $this->assign('datetime1',  $datetime1);
        $this->assign('datetime2',  $datetime2);
        return $this->fetch();
    }

    public function yycus(){
        if($this->request->isPost()){
            $data = Request::post();
            $datetime1 = $data["datetime1"];
            $datetime2 = $data["datetime2"];
            $str = "EXEC [dbo].USPYYCUS @data1='$datetime1', @data2='$datetime2' ";
            $proinfo = Db::query($str);
        }
        $this->assign('titlename', '报表管理 - 报表浏览');
        $protitles = array("服务项目","服务项目id","电话","时间段内的消费次数");
        $this->assign('tabletitles',  $protitles);
        $this->assign('contents', $proinfo);
        $this->assign('datetime1',  $datetime1);
        $this->assign('datetime2',  $datetime2);
        return $this->fetch();
    }

    public function  mminc(){
        if($this->request->isPost()){
            $data = Request::post();
            $datetime1 = $data["datetime1"];
            $datetime2 = $data["datetime2"];
            $str = "EXEC [dbo].USPMMINC @data1='$datetime1', @data2='$datetime2' ";
            $proinfo = Db::query($str);
        }
        $this->assign('titlename', '报表管理 - 报表浏览');
        $protitles = array("金额");
        $this->assign('tabletitles',  $protitles);
        $this->assign('contents', $proinfo);
        $this->assign('datetime1',  $datetime1);
        $this->assign('datetime2',  $datetime2);
        return $this->fetch();
    }
}