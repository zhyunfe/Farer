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
use app\index\model\Users;
class Purchase extends Controller
{

    // +----------------------------------------------------------------------
    // | 套餐列表
    // +----------------------------------------------------------------------


    public function show(PurModel $purmodel)
    {

        $pur = $purmodel->all();
        $this->assign('purchase',$pur);
        return $this->fetch();
    }

    // +----------------------------------------------------------------------
    // | 套餐详情
    // +----------------------------------------------------------------------

    public function details(PurModel $purchase)
    {

        $id = input('param.id');
        $info = PurModel::get($id);

        $has = $info->comment;

        $arr = [];
        foreach ($has as $value)
        {
            if($value->type == 4)
            {
                $arr[] = $value;
            }
        }


        foreach ($arr as $value)
        {
            $info2 = Users::get($value->user_id);
            $value->uname = $info2->username;
        }



        $this->assign('comment',$arr);
        $this->assign('purchase',$info);
        return $this->fetch();
    }





}