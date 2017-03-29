<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/21
 * Time: 23:22
 */
namespace app\index\model;
use think\Model;
class Hotel extends Model
{
    public function comment()
    {
        return $this->hasMany('Comment','id','pid');
    }
}