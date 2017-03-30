<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/26
 * Time: 11:37
 */
namespace app\index\controller;
use think\config\driver\Json;
use think\Controller;
use app\index\model\Place as PlaceModel;
class Place extends Controller
{




    public function show()
    {
        return $this->fetch();
    }



    public function details(PlaceModel $place)
    {

        $info = $place->where(['id'=>input('param.id')])->find();
        $info->image = str_replace('\\','/',$info->image);
        $info->open_time = str_replace('-','/',$info->open_time);
        $info->open_time = str_replace(',','-',$info->open_time);
        $this->assign('list',$info);



        return $this->fetch();
    }

}