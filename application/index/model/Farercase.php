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

class Farercase extends Model
{
    use SoftDelete;
    public function getTypeAttr($value)
    {
        $type = [1=>'自由行攻略',0=>'景区攻略'];
        return $type[$value];
    }
}