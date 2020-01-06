<?php


namespace app\index\controller;

use think\Controller;
use app\index\model\Vehicle as VehicleModel;
use think\facade\Request;
class Vehicle extends Controller
{
    protected function initialize()
    {
        if(!session('id') || !session('name')){
            $this->error('您尚未登录系统',url('index/login/index'));
            //$this->redirect('index/login/index');
        }
    }


    public function lst()
    {
        //$project = new StaffModel();
        $proinfo = VehicleModel::select();
        foreach ($proinfo as $prosingle) {
            unset($prosingle['ROW_NUMBER']);
        }
        $protitles = array("id", "汽车名字", "汽车牌照","操作");
        $this->assign('KWK', 'carid');
        $this->assign('titlename', '车辆管理 - 车辆浏览');
        $this->assign('tabletitles', $protitles);
        $this->assign('contents', $proinfo);
        $this->assign('editurl', '\\vehicle\\edit\\');
        $this->assign('delurl', '\\vehicle\\del\\');
        return $this->fetch();
    }

    public function add(){


        $cate = new VehicleModel();       //////
        //  判断是否是POST提交数据
        if ($this->request->isPost()) {
            //  获得post提交过来的数据
            $data = Request::post();
            //  实例化验证器
            $validate = new \app\index\validate\Vehicle;      /////
            //  验证器验证
            if (!$validate->scene('add')->check($data)) {
                $this->error($validate->getError());
            }
            //  数据添加 返回 1 或者 0
            $add = $cate->save($data);
            if ($add) {
                $this->success('添加车辆成功！', url('index/vehicle/lst'));  ////
            } else {
                $this->error('添加车辆失败！');
            }
        }
        //  对页面进行赋值
        $protitles = array("汽车品牌","汽车牌照");
        $protitlekey = array("carname","carnum");
        $this->assign('titlename', '车辆管理 - 添加车辆');
        $this->assign('protitlekey', $protitlekey);
        $this->assign('tabletitles', $protitles);
        return $this->fetch();

    }




    public function edit()
    {
        $cate = new VehicleModel();                        //////
        if($this->request->isPost()){
            $data = Request::post();
            dump($data);
            $validate = new \app\index\validate\Project;
            /*if (!$validate->scene('edit')->check($data)) {
                $this->error($validate->getError());
            }*/
            $save = $cate->save($data, ['carid' => Request::param('id') ]);            /////
            dump($save);
            if ($save !== false) {
                $this->success('修改车辆信息成功！', url('index/vehicle/lst'));       /////
            } else {
                $this->error('修改车辆信息失败！');            /////
            }
            return;
        }
        $proinfo = $cate -> find(Request::param('id'));
        foreach($proinfo as $prosingle){
            unset($prosingle["ROW_NUMBER"]);
        }
        $protitles = array("汽车品牌","汽车牌照");
        $protitlekey = array("carname","carnum");
        $this->assign('val',array($proinfo["carname"], $proinfo["carnum"]));
        $this->assign('use',array(' ', ' '));
        $this->assign('titlename', '车辆管理 - 编辑车辆');
        $this->assign('protitlekey', $protitlekey);
        $this->assign('tabletitles', $protitles);
        return $this->fetch();
    }

    public function del()
    {
        //  通过ID去进行数据的删除
        $del = VehicleModel::get(Request::param('id'));
        try{ $bool = $del->delete(); }
        catch(\Exception $e){
            $this->error('删除车辆失败！该车辆有外键存在!');
        }
        if ($bool) {
            $this->success('删除车辆成功！', url('index/vehicle/lst'));
        } else {
            $this->error('删除车辆失败！');
        }
    }
}