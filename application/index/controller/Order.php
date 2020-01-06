<?php


namespace app\index\controller;

use app\index\model\Order as OrderModel;
use think\Controller;
use think\Db;
use think\facade\Request;
class Order extends Controller
{
    protected function initialize()
    {
        if(!session('id') || !session('name')){
            $this->error('您尚未登录系统',url('index/login/index'));
            //$this->redirect('index/login/index');
        }


    }


    public function lst(){
        $proinfo = Db::query('USPORDER');
        foreach($proinfo as $prosingle){
            unset($prosingle['ROW_NUMBER']);
        }
        $protitles = array("订单id","顾客姓名","车辆品牌","车牌号码","服务项目","订单状态","订单金额","开单时间","操作");
        $this->assign('KWK','orderid');
        $this->assign('titlename', '项目管理 - 项目浏览');
        $this->assign('tabletitles',  $protitles);
        $this->assign('contents', $proinfo);
        $this->assign('editurl','\\order\\edit\\' );
        $this->assign('delurl','\\order\\del\\' );
        return $this->fetch();
    }

    public function add(){


        $cate = new OrderModel();       //////
        //  判断是否是POST提交数据
        if ($this->request->isPost()) {
            //  获得post提交过来的数据
            $data = Request::post();
            //  实例化验证器
            $vehicle = Db::table('vehicle')->where('carnum',$data["carnum"])->find();
            $customer = Db::table('customer')->where('cusphone',$data["cusphone"])->find();
            $project = Db::table('project')->where('proname',$data["proname"])->find();
            if($vehicle==NULL){
                $this->error('添加订单失败！, 请先向库中添加 车辆!!');
            }
            if($customer==NULL){
                $this->error('添加订单失败！, 请先向库中添加 顾客!!');
            }
            if($project==NULL){
                $this->error('添加订单失败！, 请先向库中添加新项目或检查拼写错误!!');
            }
            $flag = Db::table('owner')->where('ocarid', $vehicle["carid"])->where('ocusid',$customer["cusid"])->find();
            if($flag == NULL){
                $this->error('添加订单失败！, 请先向关系库中添加 关系!!');
            }
            //  数据添加 返回 1 或者 0
            $savedata = [
                'price'         =>      $data["price"],
                'oproid'        =>      $project["proid"],
                'ownerid'       =>      $flag["ownerid"],
                'paystate'      =>      $data["paystate"],
            ];
            $add = $cate->save($savedata);
            if ($add) {
                $this->success('添加关系成功！', url('index/order/lst'));      ///
            } else {
                $this->error('添加关系失败！');
            }
        }
        //  对页面进行赋值
        $protitles = array("服务名称","顾客电话","汽车牌照","支付状态","价格");
        $protitlekey = array("proname","cusphone","carnum","paystate","price");
        $this->assign('titlename', '订单管理 - 添加订单');
        $this->assign('protitlekey', $protitlekey);
        $this->assign('tabletitles', $protitles);
        return $this->fetch();

    }

    public function edit(){

        $cate = new OrderModel();                        //////
        if($this->request->isPost()){
            $data = Request::post();
            $save = $cate->save($data, ['orderid' => Request::param('id') ]);            /////
            if ($save !== false) {
                $this->success('修改订单成功！', url('index/order/lst'));       /////
            } else {
                $this->error('修改订单失败！');            /////
            }
            return;
        }
        $proinfo = $cate -> find(Request::param('id'));
        foreach($proinfo as $prosingle){
            unset($prosingle["ROW_NUMBER"]);
        }
        $protitles = array("订单状态");
        $protitlekey = array("paystate");
        $this->assign('val',array($proinfo["paystate"]));
        if($proinfo["paystate"]==1) $this->assign('use',array('disabled="disabled"'));
        else $this->assign('use',array(' '));
        $this->assign('titlename', '订单管理 - 编辑支付状态');
        $this->assign('protitlekey', $protitlekey);
        $this->assign('tabletitles', $protitles);
        return $this->fetch();
    }

    public function del()
    {
        //  通过ID去进行数据的删除
        $del = OrderModel::get(Request::param('id'));
        $bool = false;
        try{ $bool = $del->delete(); }
        catch(\Exception $e){
            $this->error('删除订单失败！该关系有外键存在!');
        }
        if ($bool) {
            $this->success('删除订单成功！', url('index/order/lst'));
        } else {
            $this->error('删除订单失败！');
        }
    }
}