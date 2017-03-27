<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/24
 * Time: 14:46
 */
namespace app\index\controller;
use think\Controller;
class Comment extends Controller
{
    public function toPurchase()
    {
        return $this->fetch();
    }
}