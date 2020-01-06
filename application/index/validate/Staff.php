<?php


namespace app\index\validate;


use think\Validate;

class Staff extends Validate
{
    /**
     * 验证规则
     * @var array
     */
    protected $rule=[
        'staffaccount'=>'unique:staff|require|max:25',          /////
    ];

    /**
     * 错误提示信息
     * @var array
     */
    protected $message=[
        'staffaccount.require'=>'员工账户不得为空！',
        'staffname.require'=>'员工姓名不得为空！',
        'staffgender.require'=>'员工性别不得为空！',
        'staffaccount.unique'=>'员工账户不得重复！',
        'staffaphone.require'=>'员工电话不得为空！',
    ];

    /**
     * 验证场景
     * @var array
     */
    protected $scene=[
        'add'=>['staffname','staffgender','staffrole','staffaccount','staffphone','staffpsw'],
        'edit'=>['staffname','staffgender','staffrole','staffaccount','staffphone','staffpsw'],
    ];
}