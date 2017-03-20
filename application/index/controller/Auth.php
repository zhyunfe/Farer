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
use think\Validate;
use app\index\model\Users;
//use think\session;
class Auth extends Controller
{

    public function login()
    {
        $this->assign('title','登陆');
        return $this->fetch();
    }
    public function doLogin()
    {

    }
    public function register()
    {
        $this->assign('title','注册');
        return $this->fetch();
    }

    /**
     *   这是一个后台处理注册逻辑的方法，结合前台的ajax提交，当数据进来的时候先定义验证规则，在去获取ajax
     * 提交的数据，并用定义好的规则去匹配，如果全部匹配的话就去数据库插入数据，需要注意的是把数据库没有的
     * 字段过滤掉
     * @param Request $request
     * @param Users $user
     * @return \think\response\Json
     */
    public function doRegister(Request $request,Users $user)
    {
//        dump($request->param());
//        dump(input('post.ifpassword'));
//        die;
        $ip = $_SERVER['REMOTE_ADDR'] === '::1'? '127.0.0.1':$_SERVER['REMOTE_ADDR'];

        $validate = new Validate([
            //定义验证规则
            'username' => 'require|max:20',
            'email' => 'email',
            'password'=>'require|length:3,50',
            'ifpassword'=>'require|length:3,50',
        ]);
        $data = [
            'username' => input('post.username'),
            'email' => input('post.email'),
            'password'=>input('post.password'),
            'create_ip' => ip2long($ip),
            'ifpassword' => input('post.ifpassword')
        ];
        if (!$validate->check($data)) {
            return json(['status' => 0,'msg'=>$validate->getError()]);

        }else{
            $data['password'] = md5($data['password']);
            $userb = new Users($data);

//            $user->data($data);
            $userb->allowField(true)->save();


            return json(['status' => 1]);


        }
//        Session::init([
//            'prefix' => '',
//            'type' => '',
//            'auto_start' => true,
//        ]);
//        $neid = $user->getLastInsId();
//        $chz_user = $user->where("uid = $neid")->select();
//        $chz_user = $chz_user->toArray();
//        Session::set('user',$chz_user);


    }

    /**
     * 处理邮箱和用户名的即时验证是否在数据库中存在
     * @param Users $user
     * @return \think\response\Json
     */
    public function doUser(Users $user)
    {

        if($user->where(['username' => input('post.username')] )->find())
        {
            return json(['status' => 1,'msg'=>'用户名重复了']);
        }else{
            return json(['status' => 0]);
        }

    }
    public function doEmail(Users $user)
    {

        if($user->where(['email' => input('post.username')] )->find())
        {
            return json(['status' => 1,'msg'=>'邮箱重复了']);
        }else{
            return json(['status' => 0]);
        }

    }

    public function logOut()
    {

    }
}