<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use app\index\model\Farercase;
//use think\Session;

class Index extends Auth
{
    /**
     * 首页
     *
     */
    // +----------------------------------------------------------------------
    // | 处理首页逻辑
    // +----------------------------------------------------------------------
    public function index(Farercase $farercase)
    {

        return $this->fetch();
    }







    public function successLoad()
    {
        $this->assign('title','loadiing');
        return $this->fetch();
    }


}
