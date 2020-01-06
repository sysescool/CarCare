<?php


namespace app\index\model;
use app\index\controller\ResultCode;
use think\Model;
use think\facade\Session;

/*
class User extends Model
{
    /**
     * 登录操作
     * @param $username     $string 用户名
     * @param $password     $password 密码
     * @return int          $code 返回码
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
/*
    public function login($username,$password){
        $userData = User::where('username','eq',$username) ->find();

        //  如果查找到数据
        if ( $userData ){
            //  获取该用户信息对应的盐值
            $salt = $userData['salt'];
            //  将密码进行 MD5 加密，将其与数据库中的密码字符串作对比，看看匹不匹配
            $newPassword = md5($password.$salt);
            //dump($password);
            //$newPassword = $password.$salt;
            if ( $userData['password'] == $newPassword ){
                //  获得用户所在ID
                $id = $userData['id'];
                //  设置session，用于首页访问，不存在，则返回到登录页面
                Session::set('id',$id);
                Session::set('name',$username);
                return ResultCode::$LOGIN_SUCCESS;
                //return true;
                //$this->redirect('index/index/index');
            }else{
                return ResultCode::$PASSWORD_ERROR;    //  密码错误
            }
        }else{
            return ResultCode::$USER_DOES_NOT_EXIST;    //  该用户不存在
        }
    }
}
*/
/**
 * 用户模型表
 * Class User
 * @package app\index\owner
 */
class User extends Model
{
    /**
     * 查询用户信息
     * @return false|static[]
     * @throws \think\exception\DbException
     */
    public function getUsers(){
        $user = new User();
        $list = $user -> field('id,username') -> order('id desc') -> select();
        return $list;
    }

    /**
     * @param array $data 主要传过来 用户姓名、密码、随机生成的盐值
     * @return User
     */
    public function addUser($data){
        $result = User::create($data);
        return $result;
    }

    /**
     * 查询单个用户
     * @param integer $id
     * @return null|static
     * @throws \think\exception\DbException
     */
    public function findOne($id){
        $result = User::get($id);
        return $result;
    }

    /**
     * 用户信息编辑
     * @param $id
     * @param $data
     * @return static
     */
    public function edit($id,$data){
        $result = User::where('id',$id) -> update($data);
        return $result;
    }

    /**
     * 删除操作
     * @param $id
     * @return int
     * @throws \think\exception\DbException
     */
    public function del($id){
        $result = User::get($id) -> delete();
        return $result;
    }
}
