<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/21
 * Time: 23:26
 */

namespace app\index\controller;
use think\Controller;
use app\index\model\Purchase as PurModel;
class Purchase extends Controller
{

    // +----------------------------------------------------------------------
    // | 套餐列表
    // +----------------------------------------------------------------------


    public function show(PurModel $purmodel)
    {
        $purmodel->all();
        $this->assign('purchase',$purmodel);
        return $this->fetch();
    }

    // +----------------------------------------------------------------------
    // | 套餐详情
    // +----------------------------------------------------------------------

    public function details()
    {
        return $this->fetch();
    }





}