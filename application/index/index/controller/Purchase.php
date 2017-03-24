<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/21
 * Time: 23:26
 */

namespace app\index\controller;
use think\Controller;
use think\Model\Purchzse as PurModel;
class Purchase extends Controller
{
    public function purList()
    {
        return $this->fetch();
    }



    public function purZhifu()
    {
        return $this->fetch();
    }


    public function purrealZhifu()
    {
        return $this->fetch();
    }


    public function purMoney()
    {
        return $this->fetch();
    }

    public function zhiFu()
    {
        return $this->fetch();
    }


    public function allList()
    {
        return $this->fetch();
    }
}