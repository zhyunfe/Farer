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
    public function doRegister(Request $request,Users $user)
    {
//        dump($request->param());
//        dump(input(post.));

        $ip = $_SERVER['REMOTE_ADDR'] === '::1'? '127.0.0.1':$_SERVER['REMOTE_ADDR'];
        $validate = new Validate([
            //定义验证规则
            'username' => 'require|max:20',
            'email' => 'email',
            'password'=>'require|length:3,50',
        ]);
        $data = [
            'username' => input('post.username'),
            'email' => input('post.email'),
            'password'=>input('post.password'),
            'create_ip' => ip2long($ip)
        ];
        if (!$validate->check($data)) {

            return json(['status' => 0,'msg'=>$validate->getError()]);
        }else{
            $data['password'] = md5($data['password']);
            $user->data($data);
            $user->save();
            return json(['status' => 1,'url'=>'../../../application/index/view/success.html']);
        }
    }
    public function logOut()
    {

    }
}