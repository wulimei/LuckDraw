<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: wulimei < 897520112@qq.com>
// +----------------------------------------------------------------------
namespace app\turntable\validate;

use think\Validate;

class TurntableValidate extends Validate
{
    protected $rule = [
        'content' => 'require',
        'start_time' => 'require',
        'end_time' => 'require',
        'id' => 'require|egt:1',
    ];
    protected $message = [
        'content.require' => '游戏规则不能为空',
        'start_time.require'=>'游戏开始时间不能为空',
        'end_time.require'=>'游戏结束时间不能为空',
        'id.require'=>'缺少id',
        'id.egt'=>'id值必须大于0'
    ];

    protected $scene = [
        'add'  => ['name','start_time','end_time'],
        'edit' => ['id','name','start_time','end_time'],
    ];
}