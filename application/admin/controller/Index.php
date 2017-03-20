<?php
namespace app\admin\controller;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $this->assign('title','首页');
        return $this->fetch();
    }
    public function user()
    {
        $this->assign('title','用户管理');
        return $this->fetch();
    }
}