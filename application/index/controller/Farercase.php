<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/21
 * Time: 21:23
 */
namespace app\index\controller;
use app\index\model\Farercase as FarercaseModel;
use think\Controller;
class Farercase extends Controller
{
    public function triplist()
    {
        $this->assign('title','攻略列表');
        return $this->fetch();
    }
}