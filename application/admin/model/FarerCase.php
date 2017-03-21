<?php
/**
 * Created by PhpStorm.
 * User: zhyunfe
 * Date: 2017/3/22
 * Time: 上午3:05
 */

namespace app\admin\model;
use think\Model;
use traits\model\SoftDelete;

class FarerCase
{
    protected $autoWriteTimestamp = true;
    use SoftDelete;
}