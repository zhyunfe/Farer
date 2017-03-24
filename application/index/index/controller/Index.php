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
//        dump(Session::get('user'));
//        die;
        $far = Farercase::all();

        $arr = [];
        foreach ($far as $value)
        {
            $arr[] = $value->toArray();
        }




        $this->assign('title','首页');
        $this->assign('content',$arr);
        return $this->fetch();
    }

    public function successLoad()
    {
        $this->assign('title','loadiing');
        return $this->fetch();
    }


}
