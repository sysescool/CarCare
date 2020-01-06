<?php


namespace app\index\model;

use app\index\controller\ResultCode;
use think\Model;
use think\facade\Session;


class Staff extends Model
{
    protected $pk = 'staffid';

    /**
     * 登录操作
     * @param $username     $string 用户名
     * @param $password     $password 密码
     * @return int          $code 返回码
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */

    public function login($username,$password){
        $userData = Staff::where('staffaccount','eq',$username) ->find();

        //  如果查找到数据
        if ( $userData ){
            $newPassword = md5($password);
            if ( $userData['staffpsw'] == $newPassword ){
                //  获得用户所在ID
                $id = $userData['staffid'];
                //  设置session，用于首页访问，不存在，则返回到登录页面
                $username = $userData['staffname'];
                $userrole = $userData['staffrole'];
                Session::set('id',$id);
                Session::set('name',$username);
                Session::set('role',$userrole);                 /////////////////////
                return ResultCode::$LOGIN_SUCCESS;
            }else{
                return ResultCode::$PASSWORD_ERROR;    //  密码错误
            }
        }else{
            return ResultCode::$USER_DOES_NOT_EXIST;    //  该用户不存在
        }
    }
}