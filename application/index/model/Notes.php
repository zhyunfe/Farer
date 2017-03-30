<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/21
 * Time: 18:58
 */
namespace app\index\model;
use think\Model;
use traits\model\SoftDelete;

class Notes extends Model
{
    protected $autoWriteTimestamp = true;
    use SoftDelete;


}