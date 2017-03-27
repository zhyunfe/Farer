<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/21
 * Time: 23:22
 */
namespace app\index\controller;
use think\Controller;
class Hotel extends Controller
{
    public function choose()
    {
        return $this->fetch();
    }



    public function holist()
    {
        return $this->fetch();
    }


    public function hodetail()
    {
        return $this->fetch();
    }
}