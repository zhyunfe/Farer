<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/24
 * Time: 10:44
 */

namespace app\index\controller;
use think\Controller;
class Notes extends Controller
{
    public function noList()
    {
        return $this->fetch();
    }

    public function noDetail()
    {
        return $this->fetch();
    }
    public  function writeNote()
    {
        return $this->fetch();
    }
}