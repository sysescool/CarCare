<?php


namespace app\index\controller;

use think\Controller;
use app\index\model\Staff as StaffModel;
use think\facade\Request;
use think\facade\Session;

class Staff extends Controller
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
        $proinfo = StaffModel::select();
        foreach($proinfo as $prosingle){
            unset($prosingle['ROW_NUMBER']);
        }
        $protitles = array("id","员工姓名","员工性别","角色权限","员工账户","员工电话","员工密码","建立时间","操作");
        $this->assign('KWK','staffid');
        $this->assign('titlename', '项目管理 - 项目浏览');
        $this->assign('tabletitles',  $protitles);
        $this->assign('contents', $proinfo);
        $this->assign('editurl','\\staff\\edit\\' );
        $this->assign('delurl','\\staff\\del\\' );
        return $this->fetch();
    }

    public function add(){


        $cate = new StaffModel();       //////
        //  判断是否是POST提交数据
        if ($this->request->isPost()) {
            //  获得post提交过来的数据
            $data = Request::post();
            //  实例化验证器
            $validate = new \app\index\validate\Staff;      /////
            //  验证器验证
            if (!$validate->scene('add')->check($data)) {
                $this->error($validate->getError());
            }
            //  数据添加 返回 1 或者 0
            $data["staffpsw"] = md5($data["staffpsw"]);             /////
            $add = $cate->save($data);
            if ($add) {
                $this->success('添加员工成功！', url('index/staff/lst'));      ///
            } else {
                $this->error('添加员工失败！');
            }
        }
        //  对页面进行赋值
        $protitles = array("员工姓名","员工性别","员工角色","员工账户","员工电话","员工密码");
        $protitlekey = array("staffname","staffgender","staffrole","staffaccount","staffphone","staffpsw");
        $this->assign('titlename', '项目管理 - 添加服务');
        $this->assign('protitlekey', $protitlekey);
        $this->assign('tabletitles', $protitles);
        return $this->fetch();
    }

    public function edit()
    {
        $cate = new StaffModel();                        //////
        if($this->request->isPost()){
            $data = Request::post();
            dump($data);
            $validate = new \app\index\validate\Project;
            /*if (!$validate->scene('edit')->check($data)) {
                $this->error($validate->getError());
            }*/
            $save = $cate->save($data, ['staffid' => Request::param('id') ]);            /////
            dump($save);
            if ($save !== false) {
                $this->success('修改员工成功！', url('index/staff/lst'));       /////
            } else {
                $this->error('修改员工失败！');            /////
            }
            return;
        }
        $proinfo = $cate -> find(Request::param('id'));
        foreach($proinfo as $prosingle){
            unset($prosingle["ROW_NUMBER"]);
        }
        $protitles = array("员工姓名","角色权限","员工电话","员工密码");
        $protitlekey = array("staffname","staffrole","staffphone","staffpsw");
        $this->assign('val',array($proinfo["staffname"], $proinfo["staffrole"],$proinfo["staffphone"],$proinfo["staffpsw"]));
        $this->assign('use',array('disabled="disabled"', ' ', ' ', ' '));
        $this->assign('titlename', '员工管理 - 编辑员工');
        $this->assign('protitlekey', $protitlekey);
        $this->assign('tabletitles', $protitles);
        return $this->fetch();
    }

    public function del()
    {
        //  通过ID去进行数据的删除
        $del = StaffModel::get(Request::param('id'));
        try{ $bool = $del->delete(); }
        catch(\Exception $e){
            $this->error('删除员工失败！该员工有外键存在!');
        }
        if ($bool) {
            $this->success('删除员工成功！', url('index/customer/lst'));
        } else {
            $this->error('删除员工失败！');
        }
    }
}