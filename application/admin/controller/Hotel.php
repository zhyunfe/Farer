<?php
/**
 * Created by PhpStorm.
 * User: zhyunfe
 * Date: 2017/3/23
 * Time: 上午11:38
 */
namespace app\admin\controller;

use think\View;
use app\admin\model\Hotel as HotelModel;

class Hotel extends Auth {
    protected $is_check_login = ['*'];

    /**
     * 新增酒店数据
     * 通过ajax提交formdata形式的数据
     *
     * @param HotelModel $hotel 依赖注入方式操作数据可以
     * @return array            判断文件上传是否成功
     *                          文件上传成功后获取到图片的保存名称
     *                                      将数据插入到数据库
     */
    public function addHotel(HotelModel $hotel)
    {
        $header_image = '';
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/hotel');
        if($info){
            $header_image = $info->getSaveName();
            $obj = input('post.');


            // +----------------------------------------------------------------------
            // | 未完成： 通过city（省份）county（城市）确认酒店的pid
            // +----------------------------------------------------------------------


            $location = $obj['city'].$obj['county'].$obj['location'];
            $service = rtrim($obj['service'],',');
            $result = $hotel->save(['pid'=>1,'name'=>$obj['name'],
                'header_image'=>$header_image,'location'=>$location,
                'style'=>$obj['type'],'introduce'=>$obj['desc'],
                'telephone'=>$obj['phone'],'gl'=>$obj['gl'],
                'service'=>$service
               ]);
            if ($result) {
                //插入成功返回错误号和错误信息
                return json_encode(['error'=>0,'msg'=>'添加成功']);
            } else {
                return json_encode(['error'=>1,'msg'=>'添加失败']);
            }
        }else{
            //文件上传失败的话返回错误号和错误信息
            return json_encode(['error'=>2,'msg'=>$file->getError()]);
        }
    }
}