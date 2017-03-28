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

        foreach ($info as $value)
        {

            $value->header_image = str_replace('\\\\','/',$value->header_image);

        }
        $this->assign('list',$info);
        return $this->fetch();

    }


    // +----------------------------------------------------------------------
    // | 攻略详情
    // +----------------------------------------------------------------------
    public function details(FarercaseModel $farercase)
    {
        $info = $farercase->where(['case_id'=>input('param.id')])->find();
        $info->header_image = str_replace('\\\\','/',$info->header_image);

        $this->assign('list2',$info);
        return $this->fetch();
    }











}