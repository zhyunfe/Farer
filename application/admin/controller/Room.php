<?php
/**
 * Created by PhpStorm.
 * User: zhyunfe
 * Date: 2017/3/25
 * Time: 下午2:09
 */
namespace app\admin\controller;

use think\View;
use app\admin\model\Room as RoomModel;

class Hotel extends Auth {
    protected $is_check_login = ['*'];

    public function addRoom(RoomModel $roomModel)
    {
        $this->fetch();
    }
}