<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/24
 * Time: 13:31
 */
namespace app\index\controller;
use think\Controller;
class Shopcar extends Controller
{

    //添加购物车

    public function show()
    {
        return $this->fetch();
    }

    //购物车结算

    public function suan()
    {
        return $this->fetch();
    }


}