<?php
namespace app\admin\controller;
use think\Controller;

class Index extends Controller
{
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
            }
        } else {
            $this->assign('title','首页 - Farer后台管理系统');
            return $this->fetch();
        }

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