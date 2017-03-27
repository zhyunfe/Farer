<?php
namespace app\index\controller;
use think\Session;
use think\Request;
use think\Controller;
use app\index\model\Users as UsersModel;
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
            $this->assign('iflo', Session::get('user'));

        }else{
            $this->assign('iflo',0);
        }
//        dump(Session::get('user'));
//        die;
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
    // | 用户设置常用联系人
    // +----------------------------------------------------------------------
    public  function setUp()
    {
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 用户订单详情
    // +----------------------------------------------------------------------
    public  function orderDetails()
    {
        return $this->fetch();
    }
    public  function orderErDetails()
    {
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 用户常用联系人
    // +----------------------------------------------------------------------
    public  function lianXiRen()
    {
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 用户发表评论
    // +----------------------------------------------------------------------
    public  function giveComment()
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
    // +----------------------------------------------------------------------
    // | 用户发表的游记列表
    // +----------------------------------------------------------------------
    public  function noteList()
    {
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 用户发表的游记列表草稿箱
    // +----------------------------------------------------------------------
    public  function noteLikelist()
    {
        return $this->fetch();
    }


    // +----------------------------------------------------------------------
    // | 用户发表的游记评论列表
    // +----------------------------------------------------------------------
    public  function tripComment()
    {
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 用户发表的景区评论列表
    // +----------------------------------------------------------------------
    public  function placeComment()
    {
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 用户发表的酒店评论列表
    // +----------------------------------------------------------------------
    public  function hotelComment()
    {
        return $this->fetch();
    }

    // +----------------------------------------------------------------------
    // | 用户发表的攻略评论列表
    // +----------------------------------------------------------------------
    public  function farercaseComment()
    {
        return $this->fetch();
    }



    // +----------------------------------------------------------------------
    // | 确认订单
    // +----------------------------------------------------------------------

    public function sureOrder()
    {
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 修改密码
    // +----------------------------------------------------------------------

    public function changePwd()
    {
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 用户详细信息
    // +----------------------------------------------------------------------

    public function details()
    {
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 用户姓名
    // +----------------------------------------------------------------------

    public function realname()
    {
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 用户签名
    // +----------------------------------------------------------------------

    public function signature()
    {
        return $this->fetch();
    }

    // +----------------------------------------------------------------------
    // | 每日签到得积分
    // +----------------------------------------------------------------------
    public function doqd(UsersModel $user)
    {
        if(time() - Session::get('today') < 86400)
        {
            return json(['status'=>1]);
        }else{
            $score = Session::get('user')['score']+20;
            $user->data(['score'=>$score]);
            $user->save();
            return json(['status'=>2]);
        }



    }
}
