<?php


namespace app\index\validate;


use think\Validate;

class Vehicle extends Validate
{
    /**
     * 验证规则
     * @var array
     */
    protected $rule=[
        'carnum'=>'unique:vehicle|require|max:25',          /////
    ];

    /**
     * 错误提示信息
     * @var array
     */
    protected $message=[
        'carname.require'=>'车辆品牌不得为空！',
        'carnum.unique'=>'车辆牌照不得重复！',
        'carnum.require'=>'车辆牌照不得为空！',
    ];

    /**
     * 验证场景
     * @var array
     */
    protected $scene=[
        'add'=>['carname','carnum'],
        'edit'=>['carname','carnum'],
    ];
}