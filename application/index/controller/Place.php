<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/26
 * Time: 11:37
 */
namespace app\index\controller;
use think\Controller;
class Place extends Controller
{




    public function show()
    {
        return $this->fetch();
    }



    public function details()
    {
        return $this->fetch();
    }

}