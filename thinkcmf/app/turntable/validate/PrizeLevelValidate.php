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

class PrizeLevelValidate extends Validate
{
    protected $rule = [
        'name' => 'require|length:2,8|unique:turntable_level',
        'winner_number' => 'require|egt:1',
        'id' => 'require|egt:1',
    ];
    protected $message = [
        'name.require' => '等级名称不能为空',
        'name.length' => '名称长度在3~8个字符之间',
        'name.unique' => '等级名称已存在',
        'winner_number.require'=>'获奖人数必填',
        'winner_number.egt'=>'获奖人数至少1人',
        'id.require'=>'缺少id',
        'id.egt'=>'id值必须大于0'
    ];

    protected $scene = [
        'add'  => ['name','winner_number'],
        'edit' => ['id','name','winner_number'],
    ];
}