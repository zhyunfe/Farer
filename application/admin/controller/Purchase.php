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

    /**
     * 验证锁
     * Purchase constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 展示添加商品第二步
     * @return mixed
     */
    public function step2()
    {
        return $this->fetch();
    }

    /**
     * 展示添加商品第三步
     * @return mixed
     */
    public function step3()
    {
        return $this->fetch();
    }

    /**
     * 处理添加商品
     * Ajax提交数据 formData
     * 将图片放到uploads/purchse下
     * @param PurchaseModel $purchase
     * @return string
     */
    public function addPurchase(PurchaseModel $purchase)
    {

        //获取上传的封面图片，并将它移到/uploads/purchase
        $header_image = null;
        $file = request()->file('header_image');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/purchase');

        if($info){
            $header_image = $info->getSaveName();
            $obj = input('post.');
            $result = $purchase->save(['pid'=>addslashes($obj['pid']),
                'price'=>addslashes($obj['price']),'header_image'=>addslashes($header_image),
                'product_desc'=>addslashes($obj['product_desc']),'use_desc'=>addslashes($obj['use_desc']),
                'title'=>addslashes($obj['title'])]);
            if ($result) {
                return json_encode(['error'=>0,'msg'=>'添加成功']);
            } else {
                return json_encode(['error'=>40001,'msg'=>'添加失败']);
            }
        }else{
            return json_encode(['error'=>40002,'msg'=>$file->getError()]);
        }

    }

    /**
     * 富文本编辑器上传图片信息
     * 将商品富文本编辑器中的图片添加到upload/purchase下面   原名保存
     * @return array
     */
    public function upload()
    {
        $file = request()->file('image');
        $info = $file->move('uploads/purchase','');
        $file_path ="http://www.farer.com/uploads/purchase/".$info->getSaveName();
        if($info){
            return ['success'=>true,'msg'=>'上传成功','file_path'=>$file_path];
        }else{
            return ['success'=>true,'msg'=>'上传成功','file_path'=>$file_path];
        }
    }

    /**
     * 商品数据分析
     * @return string
     */
    public function analyse()
    {
        $nobuy = PurchaseModel::where('buynum',0)->count();
        $hot   = PurchaseModel::where('buynum','>',20)->count();
        $buy1  = PurchaseModel::where('buynum' < 20)->count();
        $cood  = $buy1 - $nobuy;
        return json_encode(['hot'=>$hot,'cood'=>$cood,'nobuy'=>$nobuy]);
    }
}