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
        $result = UsersModel::destroy($uid);
        if ($result) {
            return ['error'=>0,'msg'=>'删除成功'];
        } else {
            return ['error'=>1,'msg'=>'删除失败'];
        }
    }
    public function unlock(UsersModel $usersModel)
    {
        $uid = $_POST['uid'] - 100000;
        $result = $usersModel->withTrashed()->where(['uid' => $uid])->update(['delete_time'=>null]);
        if ($result) {
            return ['error'=>0,'msg'=>'恢复成功'];
        } else {
            return ['error'=>1,'msg'=>'恢复失败'];
        }
    }
    public function userModify(UsersModel $usersModel)
    {
        $key = input('post.key');
        $value = input('post.value');
        $uid = input('post.uid');
        dump($value);
        $usersModel->save([$key=>$value],['uid'=>$uid]);
//        dump($usersModel->getLastSql());
    }
    public function changePhoto(UsersModel $users)
    {
        $file = request()->file('file');
        $uid  = input('post.uid');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/users');
        $path = $info->getSaveName();
        $users->save(['photo'=>$path],['uid'=>$uid]);
        return ['path'=>$path];
    }
}
