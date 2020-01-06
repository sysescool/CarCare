<?php


namespace app\index\controller;

use think\Controller;
use app\index\model\Owner as OwnerModel;
use think\Db;
use think\facade\Request;
class Owner extends Controller
{
    protected function initialize()
    {
        if(!session('id') || !session('name')){
            $this->error('您尚未登录系统',url('index/login/index'));
            //$this->redirect('index/login/index');
        }
    }


    public function lst(){
        //$project = new StaffModel();
        //$proinfo = OwnerModel::select();
        $proinfo = Db::query('uspor');
        //dump($proinfo);
        foreach($proinfo as $prosingle){
            unset($prosingle['ROW_NUMBER']);
        }
        $protitles = array("关系id","顾客姓名","顾客电话","车辆品牌","车辆牌照","操作");
        $this->assign('KWK','ownerid');
        $this->assign('titlename', '车主关系 - 车主浏览');
        $this->assign('tabletitles',  $protitles);
        $this->assign('contents', $proinfo);
        $this->assign('editurl','\\owner\\edit\\' );
        $this->assign('delurl','\\owner\\del\\' );
        return $this->fetch();
    }

    public function add(){


        $cate = new OwnerModel();       //////
        //  判断是否是POST提交数据
        if ($this->request->isPost()) {
            //  获得post提交过来的数据
            $data = Request::post();
            //  实例化验证器
            $flag1 = Db::table('vehicle')->where('carnum',$data["carnum"])->find();
            $flag2 = Db::table('customer')->where('cusphone',$data["cusphone"])->find();
            if($flag1==NULL){
                $this->error('添加车辆失败！, 检查车辆是否在库中, 请先向库中添加');
            }
            if($flag2==NULL){
                $this->error('添加顾客失败！, 检查顾客是否在库中, 请先向库中添加');
            }
            //  数据添加 返回 1 或者 0
            $savedata = [
                "ocarid"    =>      $flag1["carid"],
                "ocusid"    =>      $flag2["cusid"],
            ];
            $add = $cate->save($savedata);
            if ($add) {
                $this->success('添加关系成功！', url('index/owner/lst'));      ///
            } else {
                $this->error('添加关系失败！');
            }
        }
        //  对页面进行赋值
        $protitles = array("汽车牌照","顾客电话");
        $protitlekey = array("carnum","cusphone");
        $this->assign('titlename', '车主管理 - 添加关系');
        $this->assign('protitlekey', $protitlekey);
        $this->assign('tabletitles', $protitles);
        return $this->fetch();
    }

    public function edit()
    {
        $cate = new OwnerModel();                        //////
        if($this->request->isPost()){
            $data = Request::post();
            $vehicle = Db::table('vehicle')->where('carnum',$data["carnum"])->find();
            $customer = Db::table('customer')->where('cusphone',$data["cusphone"])->find();
            if($vehicle==NULL){
                $this->error('更改车辆失败！, 检查车辆是否在库中, 请先向库中添加');
            }
            if($customer==NULL){
                $this->error('更改顾客失败！, 检查顾客是否在库中, 请先向库中添加');
            }
            $savedata = [
                "ocarid"    =>      $vehicle["carid"],
                "ocusid"    =>      $customer["cusid"],
            ];
            $save = $cate->save($savedata, ['cusid' => Request::param('id') ]);            /////
            if ($save !== false) {
                $this->success('修改顾客成功！', url('index/customer/lst'));       /////
            } else {
                $this->error('修改顾客失败！');            /////
            }
            return;
        }
        $proinfo = $cate -> find(Request::param('id'));
        foreach($proinfo as $prosingle){
            unset($prosingle["ROW_NUMBER"]);
        }
        $protitles = array("顾客电话","车辆牌照");
        $protitlekey = array("cusphone","carnum");
        $vehicle = Db::table('vehicle')->where('carid',$proinfo["ocarid"])->find();
        $customer = Db::table('customer')->where('cusid',$proinfo["ocusid"])->find();
        $this->assign('val',array($customer["cusphone"], $vehicle["carnum"]));
        $this->assign('use',array(' ', ' '));
        $this->assign('titlename', '关系管理 - 编辑车主');
        $this->assign('protitlekey', $protitlekey);
        $this->assign('tabletitles', $protitles);
        return $this->fetch();
    }
    public function del()
    {
        //  通过ID去进行数据的删除
        $del = OwnerModel::get(Request::param('id'));
        try{ $bool = $del->delete(); }
        catch(\Exception $e){
            $this->error('删除关系失败！该关系有外键存在!');
        }
        if ($bool) {
            $this->success('删除关系成功！', url('index/owner/lst'));
        } else {
            $this->error('删除关系失败！');
        }
    }

}