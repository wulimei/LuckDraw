<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Powerless < wzxaini9@gmail.com>
// +----------------------------------------------------------------------
namespace app\turntable\model;

use think\Db;
use think\Model;

class PrizeLevelModel extends Model
{
    protected $table = 'cmf_turntable_level';
    public function list(){

    }

    /**
     * 添加等级
     * @param $data
     * @return bool
     */
    public function addPrizeLevel($data)
    {
        $result = true;
        self::startTrans();
        try {
            $this->allowField(true)->save($data);
            self::commit();
        } catch (\Exception $e) {
            self::rollback();
            $result = false;
        }

        return $result;
    }

    /**
     * 编辑等级
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function editPrizeLevel($data)
    {
        $result = true;
        $id          = intval($data['id']);
        if (empty($id) ) {
            $result = false;
        } else {
            $this->isUpdate(true)->allowField(true)->save($data, ['id' => $id]);
        }

        return $result;
    }
}