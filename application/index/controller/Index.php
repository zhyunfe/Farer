<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use app\index\model\Farercase;
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
    public function index(Place $place)
    {

        $obj = $place->limit(4)->select();

        $this->assign('list',$obj);


        return $this->fetch();
    }







    public function successLoad()
    {
        $this->assign('title','loadiing');
        return $this->fetch();
    }


}
