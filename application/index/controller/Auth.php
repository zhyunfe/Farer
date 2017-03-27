<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/19
 * Time: 12:27
 */
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Validate;
use app\index\model\Users;
use think\Cookie;

class Auth extends Controller
{

    // +----------------------------------------------------------------------
    // | 判断该类名是否需要用户登录
    // +----------------------------------------------------------------------
    protected $is_check_login = [''];

    public function __construct()
    {
        parent::__construct();

        if(!$this->checkLogin() && (in_array(Request::instance()->action(), $this->is_check_login) || $this->is_check_login[0] == '*'))
        {

                $this->assign('aurl',"javascript:location=history.go(-1);");
                $this->error();


        }
    }

    public function checkLogin()
    {
        // if(session('?user'))
        // {
        // 	return true;
        // }else{
        // 	return false;
        // }

        return Session::get('user');
    }


    // +----------------------------------------------------------------------
    // | 用户登录的逻辑处理
    // +----------------------------------------------------------------------


    public function login()
    {


      if(!empty(Cookie::get('email'))) {

          $this->assign('ifa',0);
          $this->assign('user',Cookie::get('email'));
          $this->assign('pwd',Cookie::get('password'));
      }else{
          $this->assign('ifa',1);
      }
        //判断是否有cookie

        $this->assign('title', '登陆');
        Session::set('url',$_SERVER['HTTP_REFERER']);
//        dump(Session::get('url'));
//        die;
        return $this->fetch();
    }

    public function doLogin()
    {
        $str = Session::get('url');
        if(input('post.remeberpwd') == 'on')
        {
            Cookie::set('email',input('post.email'),3600);
            Cookie::set('password',input('post.password'),3600);
        }else{

            cookie('email',null);

        }

            $info =  Users::where(['email' => input('post.email'),'password' => md5(input('post.password'))])->find();
            Session::set('today',time());

            if(!empty($info))
            {
//           dump(Session::get('url'));
//           die;

                $this->assign('title','登录成功');
//           dump($str);
//           die;
                Session::set('user',$info->toArray());
                $this->assign('aurl',$str);

                $this->success();
            }else{
                $this->assign('title','登录失败');
                $this->assign('aurl',$str);

                $this->error();
            }


    }

    public function doLogEmail(Users $user)
    {

        if(empty(input('post.email')))
        {
            return json(['msg' => '用户名不能为空','status'=>0]);
        }elseif ($user->where(['email' => input('post.email')])->find())
        {
            return json(['msg' => '用户名正确','status'=>1]);
        }else{
            return json(['msg' => '用户名不正确','status'=>2]);
        }


    }

    public function doLogPwd(Users $user)
    {

        if(empty(input('post.pwd')))
        {
            return json(['msg' => '密码不能为空','status'=>0]);
        }elseif ($user->where(['email' => input('post.email'),'password' => md5(input('post.pwd'))])->find())
        {
            return json(['msg' => '密码正确','status'=>1]);
        }else{
            return json(['msg' => '用户名和密码不匹配','status'=>2]);
        }


    }



    // +----------------------------------------------------------------------
    // | 用户注册的逻辑处理
    // +----------------------------------------------------------------------
    public function register()
    {
        $this->assign('title', '注册');
        return $this->fetch();
    }

    /**
     *   这是一个后台处理注册逻辑的方法，结合前台的ajax提交，当数据进来的时候先定义验证规则，在去获取ajax
     * 提交的数据，并用定义好的规则去匹配，如果全部匹配的话就去数据库插入数据，需要注意的是把数据库没有的
     * 字段过滤掉,直接获取到最新的id并查出数据进行toArray处理并存入到session里
     * @param Request $request
     * @param Users $user
     * @return \think\response\Json
     */
    public function doRegister(Request $request, Users $user)
    {

        $ip = $_SERVER['REMOTE_ADDR'] === '::1' ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];
        $validate = new Validate([
            //定义验证规则
            'username'   => 'require|max:20',
            'email'      => 'email',
            'password'   =>'require|length:3,50',
            'ifpassword' =>'require|length:3,50',
        ]);
        $data = [
            'username'   => input('post.username'),
            'email'      => input('post.email'),
            'password'   =>input('post.password'),
            'create_ip'  => ip2long($ip),
            'ifpassword' => input('post.ifpassword')
        ];
        if (!$validate->check($data)) {
            return json(['status' => 0,'msg'=>$validate->getError()]);
        }else{
            $data['password'] = md5($data['password']);

            $userb = new Users($data);
            $userb->allowField(true)->save();
            $userc = Users::find($user->getLastInsID());
            Session::set('user',$userc->toArray());
            Session::set('today',time());
            return json(['status' => 1]);
        }
    }

    /**
     * 处理邮箱和用户名的即时验证是否在数据库中存在
     * @param Users $user
     * @return \think\response\Json
     */
    public function doUser(Users $user)
    {
        if ($user->where(['username' => input('post.username')])->find()) {
            return json(['status' => 1, 'msg' => '用户名重复了']);
        } else {
            return json(['status' => 0]);
        }
    }

    public function doEmail(Users $user)
    {
        if($user->where(['email'  => input('post.username')] )->find())
        {
            return json(['status' => 1,'msg'=>'邮箱重复了']);
        }else{
            return json(['status' => 0]);
        }
    }
    // +----------------------------------------------------------------------
    // | 用户退出
    // +----------------------------------------------------------------------
    public function logOut()
    {
        session(null);
        $this->assign('title','退出成功');
        $this->assign('aurl','http://www.farer.com');
        $this->success();
    }



}