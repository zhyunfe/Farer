<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\User as UsersModel;
use app\index\controller\Auth;
class Users extends Auth
{
    /**
     * 首页
     *
     */
//    private $is_check_login = [];
    protected $is_check_login = ['*'];

    public function test()
    {
        echo 123;
    }
    public function zhifu()
    {
        $this->assign('title','zhifu');
       dump( $this->fetch());
    }



}
