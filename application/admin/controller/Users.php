<?php
/**
 * Created by PhpStorm.
 * User: zhyunfe
 * Date: 2017/3/24
 * Time: 上午9:49
 */
namespace app\admin\controller;
use think\View;
use think\Request;
use app\admin\controller\Auth;
use app\admin\model\Users as UsersModel;

class Users extends Auth
{
    protected $is_check_login = ['*'];

    public function details(UsersModel $usersModel)
    {
        $uid    = $_POST['uid'] - 100000;
        $result = $usersModel->where(['uid'=>$uid])->find();
        $this->assign('result',$result);
        return $this->fetch();
    }
    public function lock(UsersModel $usersModel)
    {
        $uid    = $_POST['uid'] - 100000;
        dump($uid);
        $result = UsersModel::destroy($uid);
        return $result;
    }
}
