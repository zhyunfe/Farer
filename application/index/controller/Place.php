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
use app\index\model\Farercase;
use app\index\model\Users;
class Place extends Controller
{




    public function show(PlaceModel $place)
    {
        $info = PlaceModel::all();

        $this->assign('place',$info);


        return $this->fetch();
    }



    public function details(PlaceModel $place,Farercase $farercase)
    {

        $info = $place->where(['id'=>input('param.id')])->find();
        $info->image = str_replace('\\','/',$info->image);
        $info->open_time = str_replace('-','/',$info->open_time);
        $info->open_time = str_replace(',','-',$info->open_time);
        $this->assign('list',$info);

        $pid = $info->pid;
        $fa = $farercase->where(['location'  => $pid])->limit(4)->select();

        $has = $info->comment;
        $arr = [];
        foreach ($has as $value)
        {
            if($value->type == 3)
            {
                $arr[] = $value;
            }
        }


        foreach ($arr as $value)
        {
            $info = Users::get($value->user_id);
            $value->uname = $info->username;
        }


        $this->assign('comment',$arr);

        $this->assign('farercase',$fa);

        return $this->fetch();
    }

}