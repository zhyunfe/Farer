<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/24
 * Time: 10:44
 */

namespace app\index\controller;
use think\Controller;
use app\index\controller\Auth;
class Notes extends Auth
{
//    protected $is_check_login = ['writeNote'];


    public function noList()
    {
        return $this->fetch();
    }

    public function noDetail()
    {
        return $this->fetch();
    }

}