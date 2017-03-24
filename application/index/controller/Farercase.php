<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/21
 * Time: 21:23
 */
namespace app\index\controller;
use app\index\model\Farercase as FarercaseModel;
use app\index\model\Farerdiqu;
use think\Controller;
class Farercase extends Controller
{
    public function tripList()
    {





        $this->assign('title','攻略列表');
        return $this->fetch();
    }

    // +----------------------------------------------------------------------
    // | 攻略相关的景区列表
    // +----------------------------------------------------------------------
    public function regionsList()
    {
        $bgfc = [];
        $smfc = [];
        foreach (Farerdiqu::where(['ifcity' => 0])->select() as $value)
        {
            $bgfc[] = $value->toArray();
        }
        foreach (Farerdiqu::where('ifcity != 0')->select() as $value)
        {
            $smfc[] = $value->toArray();
        }
//        dump($smfc);
//        die;
        $this->assign('biglist',$bgfc);
        $this->assign('smllist',$smfc);
        return $this->fetch();
    }


    // +----------------------------------------------------------------------
    // |景区详情攻略
    // +----------------------------------------------------------------------
    public function regionDetail()
    {
        return $this->fetch();
    }

    // +----------------------------------------------------------------------
    // |所有攻略列表
    // +----------------------------------------------------------------------
    public function allList()
    {
        return $this->fetch();
    }

}