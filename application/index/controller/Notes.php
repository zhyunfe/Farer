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





    // +----------------------------------------------------------------------
    // | 游记列表
    // +----------------------------------------------------------------------
    public function show()
    {
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 游记详情
    // +----------------------------------------------------------------------
    public function details()
    {
        return $this->fetch();
    }

}