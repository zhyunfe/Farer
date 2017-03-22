<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/21
 * Time: 21:23
 */
namespace app\index\controller;
use app\index\model\Farercase as FarercaseModel;
use think\Controller;
class Farercase extends Controller
{
    public function triplist()
    {
        $diqu = array(
            '北京','上海','天津','重庆',
            '石家庄','唐山','秦皇岛','邯郸',
            '邢台','保定','张家口','承德',
            '沧州','廊坊','衡水','太原',
            '大同','阳泉','长治','晋城',
            '朔州','晋中','运城','忻州',
            '临汾','吕梁','呼和浩特','包头',
            '乌海','赤峰','通辽','鄂尔多斯',
            '呼伦贝尔','巴彦淖尔','乌兰察布','兴安',
            '锡林郭勒','阿拉善','沈阳','大连',
            '鞍山','抚顺','本溪','丹东',
            '锦州','营口','阜新','辽阳',
            '盘锦','铁岭','朝阳','葫芦岛',
            '长春','吉林','四平','辽源',
            '通化','白山','松原','白城',
            '延边','哈尔滨','齐齐哈尔','鸡西',
            '鹤岗','双鸭山','大庆','伊春',
            '佳木斯','七台河','牡丹江','黑河',
            '绥化','大兴安岭','南京','无锡',
            '徐州','常州','苏州','南通',
            '连云港','淮安','盐城','扬州',
            '镇江','泰州','宿迁','杭州',
            '宁波','温州','嘉兴','湖州',
            '绍兴','金华','衡州','舟山',
            '台州','丽水','合肥','芜湖',
        );



        $this->assign('diqu',$diqu);
        $this->assign('title','攻略列表');
        return $this->fetch();
    }


    public function Regionslist()
    {
        return $this->fetch();
    }


}