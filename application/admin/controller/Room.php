<?php
/**
 * Created by PhpStorm.
 * User: zhyunfe
 * Date: 2017/3/25
 * Time: 下午2:09
 */
namespace app\admin\controller;

use think\View;
use think\Request;
use app\admin\model\Room as RoomModel;

class Room extends Auth {
    protected $is_check_login = ['*'];

    public function addRoom(RoomModel $roomModel)
    {
        $obj = input('post.');
        $result = $roomModel->save(['pid'=>$obj['pid'],
                                    'description'=>$obj['description'],
                                    'number'=>$obj['number'],
                                    'is_cancle'=>$obj['is_cancle'],
                                    'room_type'=>$obj['room_type'],
                                    'price'=>$obj['price']]);
        $id = $roomModel->getLastInsID();
        if ($result) {
            return ['error'=>0,'msg'=>'添加成功','id'=>$id];
        } else {
            return ['error'=>20001,'msg'=>'添加失败'];
        }
    }
    public function addRoomPic()
    {
       return $this->fetch();
    }
    public function doAddPic(RoomModel $roomModel)
    {
        $id = input('id');
        $file = request()->file('pic');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/room');
        $header_image = '-'.$info->getSaveName();
        $sql = "UPDATE tp_room SET image = CONCAT(image,'$header_image') WHERE id = $id";
        $result = $roomModel->query($sql);
        return json_encode(['filename'=>$info->getSaveName()]);
    }
}