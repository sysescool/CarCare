<?php


namespace app\index\controller;


use think\Controller;
use app\index\model\Project as ProjectModel;
use think\facade\Request;

class Project extends Controller
{
    protected function initialize()
    {
        if(!session('id') || !session('name')){
            $this->error('您尚未登录系统',url('index/login/index'));
            //$this->redirect('index/login/index');
            /*if(session('role')!=0){
                dump(session('role'));
                dump(session('role'));
                dump(session('role'));
                dump(session('role'));
                dump(session('role'));
                $this->error('您没有权限查看此页面',url('index/index/index'));
            }*/
        }
    }


    public function lst(){
        //$project = new ProjectModel();
        $proinfo = ProjectModel::select();
        foreach($proinfo as $prosingle){
            unset($prosingle['ROW_NUMBER']);
        }
        $protitles = array("id","服务名称","服务价格","操作");
        $this->assign('QQQ','proid');
        $this->assign('titlename', '项目管理 - 项目浏览');
        $this->assign('tabletitles',  $protitles);
        $this->assign('contents', $proinfo);
        $this->assign('editurl','\\project\\edit\\' );
        $this->assign('delurl','\\project\\del\\' );
        return $this->fetch();
    }

    public function add(){


        $cate = new ProjectModel();
        //  判断是否是POST提交数据
        if ($this->request->isPost()) {
            //  获得post提交过来的数据
            $data = Request::post();
            //  实例化验证器
            $validate = new \app\index\validate\Project;
            //  验证器验证
            if (!$validate->scene('add')->check($data)) {
                $this->error($validate->getError());
            }
            //  数据添加 返回 1 或者 0
            $add = $cate->save($data);
            if ($add) {
                $this->success('添加栏目成功！', url('index/project/lst'));
            } else {
                $this->error('添加栏目失败！');
            }
        }
        //  对页面进行赋值
        $protitles = array("服务名称","服务价格");
        $protitlekey = array("proname","price");
        $this->assign('titlename', '项目管理 - 添加服务');
        $this->assign('protitlekey', $protitlekey);
        $this->assign('tabletitles', $protitles);
        return $this->fetch();
    }

    public function edit()
    {
        $cate = new ProjectModel();
        if($this->request->isPost()){
            $data = Request::post();
            dump($data);
            $validate = new \app\index\validate\Project;
            /*if (!$validate->scene('edit')->check($data)) {
                $this->error($validate->getError());
            }*/
            $save = $cate->save($data, ['proid' => Request::param('id') ]);            /////\
            dump($save);
            if ($save !== false) {
                $this->success('修改服务成功！', url('index/project/lst'));
            } else {
                $this->error('修改服务失败！');
            }
            return;
        }
        $proinfo = $cate -> find(Request::param('id'));
        foreach($proinfo as $prosingle){
            unset($prosingle["ROW_NUMBER"]);
        }
        $protitles = array("服务名称","服务价格");
        $protitlekey = array("proname","price");
        $this->assign('val',array($proinfo["proname"], $proinfo["price"]));
        $this->assign('titlename', '项目管理 - 编辑服务');
        $this->assign('protitlekey', $protitlekey);
        $this->assign('tabletitles', $protitles);
        return $this->fetch();
    }

    public function del()
    {
        //  通过ID去进行数据的删除
        $del = ProjectModel::get(Request::param('id'));
        try{ $bool = $del->delete(); }
        catch(\Exception $e){
            $this->error('删除服务项目失败！该服务项目有外键存在!');
        }
        if ($bool) {
            $this->success('删除服务项目成功！', url('index/project/lst'));
        } else {
            $this->error('删除服务项目失败！');
        }
    }
}