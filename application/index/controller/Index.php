<?php
namespace app\index\controller;
use think\Controller;

//use think\Session;

class Index extends Auth
{
    /**
     * 首页
     *
     */
    public function index()
    {
        $this->assign('title','首页');
        return $this->fetch();
    }

    public function successLoad()
    {
        $this->assign('title','loadiing');
        return $this->fetch();
    }


}
