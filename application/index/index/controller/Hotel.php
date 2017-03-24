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


    public function hoList()
    {
        return $this->fetch();
    }


    public function hoDetail()
    {
        return $this->fetch();
    }


    public function zhiFu()
    {
        return $this->fetch();
    }

}