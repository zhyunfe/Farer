<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\admin\model\Farercase;
use app\admin\model\Users;
class Index extends Auth
{
    protected $is_check_login = ['*'];

    public function index(Farercase $caseModel,Users $users)
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
                    $count = $users->withTrashed()->count('uid');
                    if(isset($_POST['start'])) {
                        $start = $_POST['start'];
                    } else {
                        $start = 0;
                    }
                    $result = $users->withTrashed()->field(['uid','username','photo','create_ip','create_time','update_time','delete_time'])->limit($start,3)->select();
                    foreach ($result as $value) {
                        $value->uid += 100000;
                    }
                    $this->assign('result',$result);
                    $tmp = $this->fetch(APP_PATH."/admin/view/index/user.html");
                    return ['tmp'=>$tmp,'pageCount'=>$count,'limit'=>3];
                break;
                case 'case':

                    $count = $caseModel->count('case_id');
                    if(isset($_POST['start'])) {
                        $start = $_POST['start'];
                    } else {
                        $start = 0;
                      }
                    $result = $caseModel->field(['case_id','pid','title','header_image','location','href','create_time','user_star','seecount'])->limit($start,6)->select();
                    $this->assign('result',$result);
                    $tmp = $this->fetch(APP_PATH.'/admin/view/index/case.html');
                    return ['tmp'=>$tmp,'pageCount'=>$count,'limit'=>6];
                break;
                case 'note':
                    return '游记管理界面';
                break;
                case 'addCase':
                    $add = file_get_contents('../application/admin/view/index/addCase.html');
                    return $add;
                    break;
                case 'addPlace':
                    $add = file_get_contents('../application/admin/view/place/addPlace.html');
                    return $add;
                    break;
                case 'addRoom':
                    $add = file_get_contents('../application/admin/view/room/addRoom.html');
                    return $add;
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
            return true;
        }else{
            return false;
        }
    }
    public function caseUpload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            return '/uploads/'.$info->getSaveName();
        }else{
        // 上传失败获取错误信息
            echo $file->getError();
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