<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use app\index\model\Farercase;
use app\index\model\Purchase;
use app\index\model\Notes;
//use think\Session;
use app\index\model\Place;
class Index extends Auth
{
    /**
     * 首页
     *
     */
    // +----------------------------------------------------------------------
    // | 处理首页逻辑
    // +----------------------------------------------------------------------
    public function index(Place $place,Farercase $farercase,Purchase $purchase,Notes $notes)
    {
        //轮播展示四个景区
        $obj = $place->limit(4)->select();



        //下边展示3个热门景区
        $obj2 = $place->limit(1)->select();

        //截取景区简介在首页展示
        foreach ($obj2 as $valuse)
        {
            $valuse->description = substr($valuse->description,0,90) . '...';
        }



        //下边展示3个热门套餐
        $obj4= $purchase->limit(1)->select();

        //截取套餐简介在首页展示
        foreach ($obj4 as $valuse)
        {
            $valuse->description = substr($valuse->description,0,90) . '...';
        }






        //下边展示2个攻略
        $obj3 = $farercase->limit(2)->select();


        //展示两篇游记
        $obj5 = $notes->limit(2)->select();
        $this->assign('list3',$obj3);
        $this->assign('list4',$obj4);
        $this->assign('list2',$obj2);
        $this->assign('list',$obj);
        $this->assign('list5',$obj5);
        return $this->fetch();
    }
    public function successLoad()
    {
        $this->assign('title','loadiing');
        return $this->fetch();
    }


}
