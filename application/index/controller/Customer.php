<?php


namespace app\index\controller;


use think\Controller;
use app\index\model\Customer as CustomerModel;
use think\Db;
use think\facade\Request;

class Customer extends Controller
{
    protected function initialize()
    {
        if(!session('id') || !session('name')){
            $this->error('您尚未登录系统',url('index/login/index'));
            //$this->redirect('index/login/index');
        }
    }

    public function lst(){
        //$project = new CustomerModel();
        $proinfo = CustomerModel::select();
        //$proinfo = Db::table('customer')->select();
        foreach($proinfo as $prosingle){
            unset($prosingle['ROW_NUMBER']);
        }
        //dump($proinfo);

        $protitles = array("id","顾客名称","顾客性别","顾客电话","操作");
        $this->assign('KPP','cusid');
        $this->assign('titlename', '项目管理 - 项目浏览');
        $this->assign('tabletitles',  $protitles);
        //dump($protitles);
        $this->assign('contents', $proinfo);
        $this->assign('editurl','\\customer\\edit\\' );
        $this->assign('delurl','\\customer\\del\\' );
        //dump("!!!!");
        return $this->fetch();
    }

    public function add(){
        $cate = new CustomerModel();       //////
        //  判断是否是POST提交数据
        if ($this->request->isPost()) {
            //  获得post提交过来的数据
            $data = Request::post();
            //  实例化验证器
            $validate = new \app\index\validate\Customer;
            //  验证器验证
            if (!$validate->scene('add')->check($data)) {
                $this->error($validate->getError());
            }
            //  数据添加 返回 1 或者 0
            $add = $cate->save($data);
            if ($add) {
                $this->success('添加顾客成功！', url('index/customer/lst'));
            } else {
                $this->error('添加顾客失败！');
            }
        }
        //  对页面进行赋值
        $protitles = array("顾客姓名","顾客性别","顾客电话");
        $protitlekey = array("cusname","cusgender","cusphone");
        $this->assign('titlename', '顾客管理 - 添加顾客');
        $this->assign('protitlekey', $protitlekey);
        $this->assign('tabletitles', $protitles);
        return $this->fetch();
    }


    public function edit()
    {
        $cate = new CustomerModel();                        //////
        if($this->request->isPost()){
            $data = Request::post();
            dump($data);
            $validate = new \app\index\validate\Project;
            /*if (!$validate->scene('edit')->check($data)) {
                $this->error($validate->getError());
            }*/
            $save = $cate->save($data, ['cusid' => Request::param('id') ]);            /////
            dump($save);
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
        $protitles = array("顾客姓名","顾客电话");
        $protitlekey = array("cusname","cusphone");
        $this->assign('val',array($proinfo["cusname"], $proinfo["cusphone"]));
        $this->assign('use',array('disabled="disabled"', ' '));
        $this->assign('titlename', '顾客管理 - 编辑顾客');
        $this->assign('protitlekey', $protitlekey);
        $this->assign('tabletitles', $protitles);
        return $this->fetch();
    }

    public function del()
    {
        //  通过ID去进行数据的删除
        $del = CustomerModel::get(Request::param('id'));
        try{ $bool = $del->delete(); }
        catch(\Exception $e){
            $this->error('删除顾客失败！该顾客有外键存在!');
        }
        if ($bool) {
            $this->success('删除顾客成功！', url('index/customer/lst'));
        } else {
            $this->error('删除顾客失败！');
        }
    }
}