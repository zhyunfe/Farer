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

//    需要session验证
//    protected $is_check_login = ['*'];

    public function test()
    {
        echo 123;
    }
    public function center()
    {

       return $this->fetch();
    }

    public function orderList()
    {
        return $this->fetch();
    }

    //添加联系人
    public function addUser()
    {
        return $this->fetch();
    }
    public function zhifu()
    {
        return $this->fetch();
    }
}
