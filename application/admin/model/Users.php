<?php

/**
 * Created by PhpStorm.
 * User: zhyunfe
 * Date: 2017/3/20
 * Time: 下午4:37
 */
namespace app\admin\model;
use think\Model;
use traits\model\SoftDelete;
class Users extends Model
{
    protected $autoWriteTimestamp = true;
    use SoftDelete;
}