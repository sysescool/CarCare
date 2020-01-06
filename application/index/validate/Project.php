<?php


namespace app\index\validate;


use think\Validate;

class Project extends Validate
{
    /**
     * 验证规则
     * @var array
     */
    protected $rule=[
        'proname'=>'unique:project|require|max:25',
    ];

    /**
     * 错误提示信息
     * @var array
     */
    protected $message=[
        'proname.require'=>'服务名称不得为空！',
    ];

    /**
     * 验证场景
     * @var array
     */
    protected $scene=[
        'add'=>['proname','proprice'],
        'edit'=>['proname','proprice'],
    ];
}