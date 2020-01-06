<?php


namespace app\index\validate;


use think\Validate;

class Customer extends Validate
{

    /**
     * 验证规则
     * @var array
     */
    protected $rule=[
        'cusphone'=>'unique:customer|require|max:25',
    ];

    /**
     * 错误提示信息
     * @var array
     */
    protected $message=[
        'cusname.require'=>'顾客名称不得为空！',
        'cusgender.require'=>'顾客性别不得为空！',
        'cusphone.require'=>'顾客电话不得为空！',
        'cusphone.uniquee'=>'顾客电话不得重复! ',
    ];

    /**
     * 验证场景
     * @var array
     */
    protected $scene=[
        'add'=>['cusname','cusgender','cusphone'],
        'edit'=>['cusname','cusphone'],
    ];
}