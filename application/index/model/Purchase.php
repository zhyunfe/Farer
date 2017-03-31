<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/21
 * Time: 23:26
 */
namespace app\index\model;
use think\Model;
class Purchase extends Model
{
    public function Comment()
    {
        return $this->hasMany('Comment','purchase_id','id');
    }
}