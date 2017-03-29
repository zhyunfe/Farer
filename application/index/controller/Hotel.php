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

    public function holist(HotelModel $hotel)
    {
        $province = input('post.s_province');
        $city     = input('post.s_city');
        if($province == '省份'){$province = "";}
        if($city == "地级市"){$city = "";}
        $pid = $province.$city;
        $result = $hotel->field(['id','location','header_image','name'])->where("pid like '%$pid%'")->select();
        $this->assign('result',$result);
        $this->assign('pid',$pid);
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
        $num     = input('post.num');
        $pid     = input('post.pid');
        switch ($num) {
            case 0:
                $order = "id";
                break;
            case 1:
                $order = "id";
                break;
            case 2:
                $order = "price";
                break;
            case 3:
                $order = "room.price desc";
                break;
        }
        if ($content == "") {

            $result = $hotel->field(['id','location','header_image','name'])->where("pid like '%$pid%'")->select();
            //查询每一个酒店对应的评论次数
//            foreach ($result as $key=>$value) {
//                $count = $comment->field(['id'])->order($order)->where(['target_id'=>$value->id,'type'=>1])->count();
//                $value->commentNum = $count;
//            }
//            $result = $hotel->comment()->select();
//            dump($result);
        } else {
            $result = $hotel->field(['id','location','header_image','name'])->where("name like '%$content%' and pid like '%$pid%'")->select();
        }
        $this->assign('result',$result);
        return $this->fetch();
    }
}