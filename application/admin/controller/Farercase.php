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

    /**
     * 新增攻略
     * @param FCase $case
     * @return string   返回错误信息
     */
    public function addCase(FCase $case)
    {
        //获取上传的封面图片，并将它移到/uploads/farercase中
        $header_image = null;
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/farercase');

        if($info){
            $header_image = $info->getSaveName();
            $obj = input('post.');
            $result = $case->save(['title'=>addslashes($obj['title']),
                'type'=>addslashes($obj['type']),'header_image'=>addslashes($header_image),
                'day'=>addslashes($obj['day']),'location'=>addslashes($obj['location']),
                'href'=>addslashes($obj['href']),'traffic'=>addslashes($obj['traffic']),
                'price'=>addslashes($obj['price']),
                'hotel'=>addslashes($obj['hotel'])]);
            if ($result) {
                return json_encode(['error'=>0,'msg'=>'添加成功']);
            } else {
                return json_encode(['error'=>30001,'msg'=>'添加失败']);
            }
        }else{
            return json_encode(['error'=>30002,'msg'=>$file->getError()]);
        }
    }
    public function lock(FCase $case)
    {
        $id    = $_POST['case_id'];
        $result = FCase::destroy($id);
        if ($result) {
            return ['error'=>0,'msg'=>'删除成功'];
        } else {
            return ['error'=>1,'msg'=>'删除失败'];
        }
    }
    public function unlock(FCase $case)
    {
        $id = $_POST['case_id'];
        $result = $case->withTrashed()->where(['case_id' => $id])->update(['delete_time'=>null]);
        if ($result) {
            return ['error'=>0,'msg'=>'恢复成功'];
        } else {
            return ['error'=>1,'msg'=>'恢复失败'];
        }
    }
    public function edit(FCase $case)
    {
        $case_id = input('post.case_id');
        $result = FCase::get($case_id);
        $this->assign('result',$result);
        return $this->fetch();
    }
    public function changePhoto(FCase $case)
    {
        $file = request()->file('file');
        $case_id  = input('post.case_id');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/farercase');
        $path = $info->getSaveName();
        $result = $case->save(['header_image'=>$path],['case_id'=>$case_id]);
        return ['path'=>$path];
    }
    public function caseSave(FCase $case)
    {

        $obj = input('post.');
        $result = $case->save(['title'=>addslashes($obj['title']),
            'type'=>addslashes($obj['type']),
            'day'=>addslashes($obj['day']),'location'=>addslashes($obj['location']),
            'href'=>addslashes($obj['href']),'traffic'=>addslashes($obj['traffic']),
            'price'=>addslashes($obj['price']),
            'hotel'=>addslashes($obj['hotel'])],['case_id'=>$obj['case_id']]);
        if ($result) {
            return json_encode(['error'=>0,'msg'=>'保存成功']);
        } else {
            return json_encode(['error'=>30002,'msg'=>'保存失败']);
        }
    }
}