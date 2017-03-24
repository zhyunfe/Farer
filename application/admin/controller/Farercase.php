<?php
/**
 * Created by PhpStorm.
 * User: zhyunfe
 * Date: 2017/3/20
 * Time: 下午2:22
 */
namespace app\admin\controller;

use think\View;
use think\Request;
use think\Validate;
use app\admin\controller\Auth;
use app\admin\model\Farercase as FCase;

class Farercase extends Auth
{
    protected $is_check_login = ['*'];

    public function addCase(FCase $case)
    {
        $header_image = null;
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/farercase');
        if($info){
            $header_image = $info->getSaveName();
            $obj = input('post.');
            $result = $case->save(['pid'=>1,'title'=>addslashes($obj['title']),
                'type'=>addslashes($obj['type']),'header_image'=>addslashes($header_image),
                'day'=>addslashes($obj['day']),'location'=>addslashes($obj['location']),
                'href'=>addslashes($obj['href']),'traffic'=>addslashes($obj['traffic']),'hotel'=>addslashes($obj['hotel'])]);
            if ($result) {
                return json_encode(['error'=>0,'msg'=>'添加成功']);
            } else {
                return json_encode(['error'=>1,'msg'=>'添加失败']);
            }
        }else{
            return json_encode(['error'=>2,'msg'=>$file->getError()]);
        }
    }
}