<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小夏 < 449134904@qq.com>
// +----------------------------------------------------------------------
namespace app\portal\validate;

use app\admin\model\RouteModel;
use think\Validate;
use app\portal\model\UserModel;
use app\portal\model\PortalCategoryModel;

class PortalCategoryValidate extends Validate
{
    protected $rule = [
        'name'  => 'require|checkUnique',
        'alias' => 'checkAlias',
    ];
    protected $message = [
        'name.require' => '分类名称不能为空',
        'name.checkUnique' => '分类名称已存在',
    ];

    protected $scene = [
//        'add'  => ['user_login,user_pass,user_email'],
//        'edit' => ['user_login,user_email'],
    ];

    // 自定义验证规则
    protected function checkAlias($value, $rule, $data)
    {
        if (empty($value)) {
            return true;
        }

        $routeModel = new RouteModel();
        if (isset($data['id']) && $data['id'] > 0){
            $fullUrl    = $routeModel->buildFullUrl('portal/List/index', ['id' => $data['id']]);
        }else{
            $fullUrl    = $routeModel->getFullUrlByUrl($data['alias']);
        }
        if (!$routeModel->exists($value, $fullUrl)) {
            return true;
        } else {
            return "别名已经存在!";
        }

    }

    /**
     * 判断分类是否存在，每个分类下的名称要唯一
     * @param  [type] $value [description]
     * @param  [type] $rule  [description]
     * @param  [type] $data  [description]
     * @return [type]        [description]
     */
    protected function checkUnique($value,$rule,$data){
        if(!isset($data['type'])){
            $data['type'] = 1;
        }
        $category_model = new PortalCategoryModel();
        $cate_info = $category_model->where(['name'=>$value,'type'=>$data['type']])->find();
        if(empty($cate_info)){
            return true;
        }
        return false;
    }
}