<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/21
 * Time: 23:22
 */
namespace app\index\controller;
use think\Controller;
use think\Request;
use app\index\model\Hotel as HotelModel;
use app\index\model\Comment as CommentModel;
class Hotel extends Controller
{
    public function choose()
    {
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 订酒店的页面
    // +----------------------------------------------------------------------
    public function reservation()
    {
        return $this->fetch();
    }

    public function holist()
    {
        return $this->fetch();
    }
    public function getLocation()
    {
        // +----------------------------------------------------------------------
        // | http://api.map.baidu.com/geocoder/v2/?callback=renderReverse&location=39.983424,116.322987&output=json&pois=1&ak=您的ak
        // +----------------------------------------------------------------------
        $url = 'http://api.map.baidu.com/geocoder/v2/?callback=renderReverse&location='.input('post.longitude').','.input('post.latitude').'&output=json&pois=1'.'&ak=xDBFGIWD1ehGfHyrtEWv2WgMg5yOhm1F';
        $location = file_get_contents($url);
        return $location;
    }
    public function hotel_sel(HotelModel $hotel,CommentModel $comment)
    {
        $content = input('post.content');
        $order   = input('post.order');
        if ($content == "") {
            $hotel->field(['id','location','header_image'])->select();
            foreach ($hotel as $value) {

            }
        } else {

        }
    }
}