<?php
namespace app\index\controller;
use think\Db;
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
        $info = Session::get('user');
        $id = $info['uid'];
        $user = UsersModel::get($id);
        if($this->checkLogin())
        {
            $this->assign('iflo', Session::get('user'));
            $this->assign('iflo1', $user);

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

    /**
     *
     */
    public function doChangePwd()
    {
        $oldpwd = input('post.oldpwd');
        $newpwd = input('post.newpwd');
        $regpwd = input('post.regpwd');

        $info = Session::get('user');
        $id = $info['uid'];
        $user = UsersModel::get($id);


        if($oldpwd == '' || $oldpwd == '' || $oldpwd == '' ){
            return json(['msg'=>'不能为空']);
        }else{

            if(strcmp(md5($oldpwd),$user->password) != 0)
            {

                return json(['msg'=>'请输入正确的密码']);
            }elseif($newpwd != $regpwd)
            {
                return json(['msg'=>'两次密码要一致']);
            }else{
                $user->password = md5($newpwd);
                $user->save();


                return json(['msg'=>'修改成功']);

            }
        }


    }


    // +----------------------------------------------------------------------
    // | 用户详细信息
    // +----------------------------------------------------------------------

    public function details()
    {
        $info = Session::get('user');
        $id = $info['uid'];
        $user = UsersModel::get($id);

        $this->assign('list',$user);
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 用户姓名
    // +----------------------------------------------------------------------

    public function realname()
    {
        return $this->fetch();
    }


    public function doRealname()
    {
        $info = Session::get('user');
        $id = $info['uid'];
        $user = UsersModel::get($id);

        $user->realname = input('post.realname');
        $user->save();


        return json(['msg'=>'修改成功']);

    }
    public function realphoto()
    {
        return $this->fetch();
    }
    public function realsex()
    {
        return $this->fetch();
    }
    public function doRealSex()
    {
        $info = Session::get('user');
        $id = $info['uid'];
        $user = UsersModel::get($id);
       if(input('post.realsex') == 'nan')
       {
           $user->sex = 1;
           $user->save();
       }else{
           $user->sex = 0;
           $user->save();
       }




        return json(['msg'=>'修改成功']);

    }

    //修改地址
    public function realaddr()
    {

        return $this->fetch();
    }

    public function doRealAddr()
    {
        $info = Session::get('user');
        $id = $info['uid'];
        $user = UsersModel::get($id);

        $user->addr = input('post.realaddr');
        $user->save();


        return json(['msg'=>'修改成功']);




    }
    //修改生日
    public function realbirth()
    {
        return $this->fetch();
    }
    public function doRealBirth()
    {
        $info = Session::get('user');
        $id = $info['uid'];
        $user = UsersModel::get($id);

        $user->birthday = input('post.realbirth');
        $user->save();


        return json(['msg'=>'修改成功']);




    }
    // +----------------------------------------------------------------------
    // | 用户签名
    // +----------------------------------------------------------------------

    public function signature()
    {
        return $this->fetch();
    }
    public function doRealTag()
    {

        $info = Session::get('user');
        $id = $info['uid'];
        $user = UsersModel::get($id);

        $user->tag = input('post.realtag');
        $user->save();


        return json(['msg'=>'修改成功']);




    }


    // +----------------------------------------------------------------------
    // | 每日签到得积分
    // +----------------------------------------------------------------------
    public function doqd(UsersModel $user)
    {

        $info = Session::get('user');
        $id = $info['uid'];
        $user = UsersModel::get($id);

        if(($user->logtime) == null)
        {

            $user->where("uid = $id")->update(['logtime' => time()]);
            $user->where("uid = $id")->update(['score' => 20]);
            return json(['msg'=>'新用户第一次签到成功,积分加300']);
        }else{

            $logtime = date('y-m-d',$user->logtime);

            if(strcmp($logtime, date('y-m-d',time())) != 0)
            {
                $user->where("uid = $id")->update(['score' => $user->score+=20]);
                return json(['msg'=>'签到成功,积分加20']);
            }else{
                return json(['msg'=>'今天已经签到了']);
            }
        }




    }
}
