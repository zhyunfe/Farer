<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\admin\model\Farercase;
use app\admin\model\Users;
use app\admin\model\Hotel;
class Index extends Auth
{
    protected $is_check_login = ['*'];

    public function index(Farercase $caseModel,Users $users,Hotel $hotel)
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
                    $count = $hotel->withTrashed()->count('id');
                    if(isset($_POST['start'])) {
                        $start = $_POST['start'];
                    } else {
                        $start = 0;
                    }
                    $result = $hotel->withTrashed()->field(['id','pid','name','telephone','style'])->select();
                    foreach ($result as $value) {
                        $value->id += 20000;
                        $value->style = $this->getStatusTextAttr($value->style);
                    }
                    $this->assign('hotel',$result);
                    $list = $this->fetch(APP_PATH."/admin/view/hotel/list.html");
                    return ['tmp'=>$list,'pageCount'=>$count,'limit'=>10];
                break;
                case 'user':
                    $count = $users->withTrashed()->count('uid');
                    if(isset($_POST['start'])) {
                        $start = $_POST['start'];
                    } else {
                        $start = 0;
                    }
                    $result = $users->withTrashed()->field(['uid','username','photo','create_ip','create_time','update_time','delete_time'])->limit($start,25)->select();
                    foreach ($result as $value) {
                        $value->uid += 100000;
                    }
                    $this->assign('result',$result);
                    $tmp = $this->fetch(APP_PATH."/admin/view/index/user.html");
                    return ['tmp'=>$tmp,'pageCount'=>$count,'limit'=>25];
                break;
                case 'case':

                    $count = $caseModel->count('case_id');
                    if(isset($_POST['start'])) {
                        $start = $_POST['start'];
                    } else {
                        $start = 0;
                      }
                    $result = $caseModel->field(['case_id','title','header_image','location','href','create_time','user_star','seecount'])->limit($start,6)->select();
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
                case 'addPurchase':
                    $add = file_get_contents('../application/admin/view/purchase/addPurchase.html');
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
        $info = $file->move('uploads/public','');
        $file_path ="http://www.farer.com/uploads/".$info->getSaveName();
        if($info){
            return ['success'=>true,'msg'=>'上传成功','file_path'=>$file_path];
        }else{
            return ['success'=>false,'msg'=>'上传失败','file_path'=>$file_path];
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

    /**
     * 获取酒店类型
     * @param $value 酒店style标识
     * @return mixed 对应的酒店类型
     */
    public function getStatusTextAttr($value)
    {
        $status = [0=>'经济型',1=>'豪华型',2=>'主题型'];
        return $status[$value];
    }
}