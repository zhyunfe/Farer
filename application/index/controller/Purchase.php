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
    public function Purlist()
    {
        return $this->fetch();
    }



    public function Purzhifu()
    {
        return $this->fetch();
    }


    public function Purrealzhifu()
    {
        return $this->fetch();
    }


    public function Purmoney()
    {
        return $this->fetch();
    }

}