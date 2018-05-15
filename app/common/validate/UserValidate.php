<?php
// | Author: wulimei < 897520112@qq.com>
// +----------------------------------------------------------------------
namespace app\common\validate;

use think\Validate;

class UserValidate extends Validate
{
    protected $regex = [ 'phone' => '^((13[0-9])|(14[5,7,9])|(15[^4])|(18[0-9])|(17[0,1,3,5,6,7,8]))\d{8}$'];

    protected $rule = [
        'user_login' => 'require|unique:user,user_login',
        'user_pass'  => 'require',
        'mobile' => 'require|regex:phone|unique:user,mobile',
    ];
    protected $message = [
        'user_login.require' => '用户名不能为空',
        'user_login.unique'  => '用户名已存在',
        'user_pass.require'  => '密码不能为空',
        'mobile.require' => '手机不能为空',
        'mobile.regex'   => '手机格式不正确',
        'mobile.unique'  => '手机已经存在',
    ];

    protected $scene = [
        'add'  => ['user_login', 'user_pass', 'mobile'],
        'edit' => ['user_login', 'mobile'],
    ];
}