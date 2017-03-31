<?php
/**
 * Created by PhpStorm.
 * User: zhyunfe
 * Date: 2017/3/27
 * Time: 下午2:28
 */
/**
 * Created by PhpStorm.
 * User: zhyunfe
 * Date: 2017/3/25
 * Time: 下午2:09
 */
namespace app\admin\controller;

use think\View;
use think\Request;
use app\admin\model\Place as PlaceModel;

class Place extends Auth {
    protected $is_check_login = ['*'];

    /**
     * 验证锁
     * Place constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 添加景区处理
     * Ajax提交formData
     *
     * 将门面图片保存到upload/place下
     * @param PlaceModel $placeModel
     * @return string
     */
    public function addPlace(PlaceModel $placeModel)
    {
        $file = request()->file('image');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/place');
        if($info){
            $image = $info->getSaveName();
            $obj = input('post.');
            $result = $placeModel->save(['title'      =>$obj['title'],      'pid'  =>$obj['pid'],
                                         'description'=>$obj['description'],'image'=>$image,
                                         'addr'       =>$obj['addr'],       'price'=>$obj['price'],
                                         'open_time'  =>$obj['open_time']
            ]);
            if ($result) {
                return json_encode(['error'=>0,'msg'=>'添加成功']);
            } else {
                return json_encode(['error'=>30001,'msg'=>'添加失败']);
            }
        }else{
            return json_encode(['error'=>30002,'msg'=>$file->getError()]);
        }
    }
}