<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/27
 * Time: 16:25
 */
namespace app\index\model;
use think\Model;
class Place extends Model
{
    public function Comment()
    {
        return $this->hasMany('Comment','place_id','id');
    }
}