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

    /**
     * 验证锁
     * Users constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 通过uid来筛选用户，显示用户详情
     * 传回来的id都是经过编码过的，需要减去100000
     * @param UsersModel $usersModel
     * @return mixed    返回用户详情的页面
     */
    public function details(UsersModel $usersModel)
    {
        $uid    = $_POST['uid'] - 100000;
        $result = $usersModel->where(['uid'=>$uid])->find();
        $this->assign('result',$result);
        return $this->fetch();
    }

    /**
     * 锁定用户
     * @param UsersModel $usersModel
     * @return array
     */
    public function lock(UsersModel $usersModel)
    {
        $uid    = $_POST['uid'] - 100000;
        $result = UsersModel::destroy($uid);
        if ($result) {
            return ['error'=>0,'msg'=>'删除成功'];
        } else {
            return ['error'=>100001,'msg'=>'删除失败'];
        }
    }

    /**
     * 解锁用户
     * @param UsersModel $usersModel
     * @return array
     */
    public function unlock(UsersModel $usersModel)
    {
        $uid = $_POST['uid'] - 100000;
        $result = $usersModel->withTrashed()->where(['uid' => $uid])->update(['delete_time'=>null]);
        if ($result) {
            return ['error'=>0,'msg'=>'恢复成功'];
        } else {
            return ['error'=>100002,'msg'=>'恢复失败'];
        }
    }

    /**
     * 修改用户信息
     * Ajax提交过来key，value，uid
     *      key   =  修改的哪一个属性
     *      value =  修改成什么值
     *      uid   =  给谁修改
     * @param UsersModel $usersModel
     */
    public function userModify(UsersModel $usersModel)
    {
        $key = input('post.key');
        $value = input('post.value');
        $uid = input('post.uid');
        $usersModel->save([$key=>$value],['uid'=>$uid]);
    }

    /**
     * 修改用户头像
     * Ajax提交过来file，uid
     *      将用户头像保存到uploads/users下
     * @param UsersModel $users
     * @return array      返回修改后的头像路径
     */
    public function changePhoto(UsersModel $users)
    {
        $file = request()->file('file');
        $uid  = input('post.uid');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/users');
        $path = $info->getSaveName();
        $users->save(['photo'=>$path],['uid'=>$uid]);
        return ['path'=>$path];
    }

    /**
     * 用户数据分析
     * 分析男女比例
     * @param UsersModel $users
     * @return string   返回json对象，进行数据展示
     */
    public function analyse(UsersModel $users)
    {
        $man = UsersModel::where('sex',1)->count();
        $woman = UsersModel::where('sex','0')->count();
        $null  = UsersModel::where('sex',null)->count();
        $arr =  ['man'=>$man,'woman'=>$woman,'null'=>$null];
        return json_encode($arr);
    }
}
