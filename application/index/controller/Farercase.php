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
    // +----------------------------------------------------------------------
    // | 攻略列表
    // +----------------------------------------------------------------------
    public function show(FarercaseModel $farercase)
    {
        $info = $farercase->all();
        $this->assign('list',$info);
        foreach ($info as $value)
        {
            
        }
        return $this->fetch();
    }


    // +----------------------------------------------------------------------
    // | 攻略详情
    // +----------------------------------------------------------------------
    public function details()
    {

        return $this->fetch();
    }











}