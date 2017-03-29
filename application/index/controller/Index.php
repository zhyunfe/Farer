<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use app\index\model\Farercase;
use app\index\model\Purchase;
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
    public function index(Place $place,Farercase $farercase,Purchase $purchase)
    {
        //轮播展示四个景区
        $obj = $place->limit(4)->select();
        $this->assign('list',$obj);


        //下边展示3个热门景区
        $obj2 = $place->limit(1)->select();

        //截取景区简介在首页展示
        foreach ($obj2 as $valuse)
        {
            $valuse->description = substr($valuse->description,0,90) . '...';
        }
        $this->assign('list2',$obj2);


        //下边展示3个热门套餐
        $obj3 = $purchase->limit(1)->select();

        //截取套餐简介在首页展示
        foreach ($obj3 as $valuse)
        {
            $valuse->description = substr($valuse->description,0,90) . '...';
        }
        $this->assign('list2',$obj2);




        //下边展示2个攻略
        $obj3 = $farercase->limit(2)->select();
        $this->assign('list3',$obj3);

        return $this->fetch();
    }
    public function successLoad()
    {
        $this->assign('title','loadiing');
        return $this->fetch();
    }


}
