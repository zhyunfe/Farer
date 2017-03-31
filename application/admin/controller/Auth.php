<?php
/**
 * Created by PhpStorm.
 * User: zhyunfe
 * Date: 2017/3/20
 * Time: 下午2:22
 */
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Validate;
use app\admin\model\Users;

class Auth extends Controller
{
    //存储需要验证登录的模块
    protected $is_check_login = ['checkLogin','doLogin'];

    /**
     * 在初始化类的时候验证一下是否为要登录的界面
     * 如果没有登录，跳转到登录界面
     */

    public function __construct()
    {
        parent::__construct();

        if(!$this->checkLogin() && (in_array(Request::instance()->action(), $this->is_check_login) || $this->is_check_login[0] == '*')) {

            $this->login();

        }
    }

            /**
     * 判断是否登录
     * @return mixed   session('user')
     *      存在  : 表示已经登录    返回   true
     *      不存在: 表示还未登录  返回  false
     */
    public function checkLogin()
    {
        return session('?userAdmin');
    }

    /**
     * 展示登陆界面
     * @return mixed login.html
     */
    public function login()
    {
        $this->assign('title', '登陆|Farer后台管理系统');
        return $this->fetch();
    }

    /**
     * 登录处理
     * @param Users $users 依赖注入方式使用User对象
     * @return int         如果邮箱存在       返回true  不存在返回false
     *                     邮箱和密码输入正确  返回true  不存在返回false
     */
    public function doLogin(Users $users)
    {
        //检查email是否存在
        if ($_POST['type'] == 'email') {
            $email  = $_POST['email'];
            $result = $users->where('email', $email)->select();

            if ($result) {
                return true;
            } else {
                return false;
            }

        } else if ($_POST['type'] == 'submit') {
            $email    = $_POST['email'];
            $password = $_POST['password'];
            $pwd = $users->field('password')->where('email', $email)->find()['password'];

            if ($pwd == md5($password)) {
                Session::set('userAdmin',$email);
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * 退出登录
     * 清除session
     */
    public function logOut()
    {
        session_destroy();
    }
}