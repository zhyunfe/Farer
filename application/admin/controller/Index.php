<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;

class Index extends Auth
{
    protected $is_check_login = ['*'];

    public function index()
    {
        if (isset($_POST['type'])) {
            switch ($_POST['type']) {
                case 'index':
                    return '这个是首页';
                break;
                case 'data':
                    return '这个是数据页面';
                break;
                case 'hotel':
                    return '这个是酒店管理';
                break;
                case 'user':
                    $user = file_get_contents("../application/admin/view/index/user.html");
                    return $user;
                break;
                case 'case':
                    $case = file_get_contents("../application/admin/view/index/case.html");
                    return $case;
                break;
                case 'note':
                    return '游记管理界面';
                break;
                case 'addCase':
                    $add = file_get_contents('../application/admin/view/index/addCase.html');
                    return $add;
                    break;
                case 'addNote':
                    return '添加游记';
                    break;
            }
        } else {
            $this->assign('title','首页 - Farer后台管理系统');
            return $this->fetch();
        }

    }

    public function upload(){
        $file = request()->file('image');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
//            echo $info->getExtension();
//            echo $info->getFilename();
            return true;
        }else{
//            echo $file->getError();
            return false;
        }
    }
    public function caseUpload(){
        var_dump('传入图片');
    }
    public function user()
    {
        $this->assign('title','用户管理');
        return $this->fetch();
    }
    public function test()
    {
        $this->assign('title','测试界面');
        var_dump($this->fetch());
    }
}