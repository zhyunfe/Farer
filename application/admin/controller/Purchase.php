<?php
/**
 * Created by PhpStorm.
 * User: zhyunfe
 * Date: 2017/3/27
 * Time: 下午10:01
 */
namespace app\admin\controller;
use think\Request;
use think\view;
use app\admin\model\Purchase as PurchaseModel;


class Purchase extends Auth
{
    protected $is_check_login = ['*'];
    public function step2()
    {
        return $this->fetch();
    }
    public function step3()
    {
        return $this->fetch();
    }
    public function addPurchase()
    {
        return json_encode(['error'=>0,'msg'=>'添加成功']);
    }
    public function upload()
    {
        $file = request()->file('image');
        $info = $file->move('uploads/purchase','');
        if($info){
            return true;
        }else{
            return false;
        }
    }
}