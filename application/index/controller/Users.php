<?php
namespace app\index\controller;
use think\Session;
use think\Request;
use think\Controller;
use app\index\model\User as UsersModel;
use app\index\controller\Auth;
class Users extends Auth
{
    /**
     * 首页
     *
     */
//需要session验证
    protected $is_check_login = ['writenote','collect','prolist','triplist','shopcar','notelist','tripcomment'];

    public function __construct()
    {
        parent::__construct();
    }


    public function zhifu()
    {
        $this->assign('title','zhifu');
       dump( $this->fetch());
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


    // +----------------------------------------------------------------------
    // | 用户的展示界面
    // +----------------------------------------------------------------------
    public function center()
    {
        if($this->checkLogin())
        {
            $this->assign('iflo',1);
        }else{
            $this->assign('iflo',0);
        }



        $this->assign('info', Session::get('user'));
        return $this->fetch();
    }

    // +----------------------------------------------------------------------
    // | 用户写游记
    // +----------------------------------------------------------------------
    public  function writeNote()
    {
        return $this->fetch();
    }

    // +----------------------------------------------------------------------
    // | 用户写游记
    // +----------------------------------------------------------------------
    public  function setUp()
    {
        return $this->fetch();
    }


    public  function collect()
    {
        return $this->fetch();
    }
    public  function proList()
    {
        return $this->fetch();
    }

    public  function tripList()
    {
        return $this->fetch();
    }
    public  function shopCar()
    {
        return $this->fetch();
    }

    public  function noteList()
    {
        return $this->fetch();
    }

    public  function tripComment()
    {
        return $this->fetch();
    }

}
