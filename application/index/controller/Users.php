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

<<<<<<< HEAD
    public function test()
    {
        echo 123;
    }
    public function zhifu()
    {
        $this->assign('title','zhifu');
       dump( $this->fetch());
    }

=======
//    需要session验证
//    protected $is_check_login = ['*'];
>>>>>>> 74b6cfef6b92a2849222e98ac83121cf49fa8d5c

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

}
