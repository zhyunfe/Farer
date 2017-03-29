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
use app\index\model\Users;
use app\index\model\Farercase_users;
use app\index\model\Dianzan_farercase_users;
use app\index\controller\Auth;
use think\Session;

class Farercase extends Auth
{
    protected $is_check_login = ['docollect'];

    public function __construct()
    {
        parent::__construct();
    }










    // +----------------------------------------------------------------------
    // | 攻略列表
    // +----------------------------------------------------------------------
    public function show(FarercaseModel $farercase,Dianzan_farercase_users $dianzan_farercase_users)
    {
        $info = $farercase->all();
        foreach ($info as $value) {
            $value->header_image = str_replace('\\\\', '/', $value->header_image);
            $id = $value->case_id;
//            $cishu = $dianzan_farercase_users->where(['faercaseid'=>$id])->select()->count();
            $cishu = FarercaseModel::withCount('users')->select($id);

            foreach ($cishu as $value) {
                echo $value->users_count.'<br>';
            }

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
        $user = Session::get('user');
        $this->assign('user',$user);
        $this->assign('list2',$info);
        return $this->fetch();
    }


    public function docollect(FarercaseModel $farercase,Farercase_users $farercase_users)
    {
        $id = input('post.id');
        $info1 = Session::get('user');
        $id2 = $info1['uid'];

        $info = $farercase->find($id);

        $has = $info->users2;
        $flag = true;
        foreach ($has as $value)
        {
            if($value->uid == $id2)
            {
                $flag = false;
            }
        }


        if($flag)
        {
            $data=[[

                'userid' => Session::get('user')['uid'],

                'farercaseid'   => $id,



            ]];
            $farercase_users->saveAll($data);
            return json(['msg'=>'收藏成功']);
        }else{
            return json(['msg'=>'已经收藏']);
        }

    }




    public function dianzan(FarercaseModel $farercase,Dianzan_farercase_users $dianzan_farercase_users)
    {
        $id = input('post.id');
        $info1 = Session::get('user');
        $id2 = $info1['uid'];

        $info = $farercase->find($id);

        $has = $info->users;
        $flag = true;
        foreach ($has as $value)
        {
            if($value->uid == $id2)
            {
                $flag = false;
            }
        }


        if($flag)
        {
            $data=[[

                'userid' => Session::get('user')['uid'],

                'faercaseid'   => $id,



            ]];
            $dianzan_farercase_users->saveAll($data);
            return json(['msg'=>'点赞成功']);
        }else{
            return json(['msg'=>'已经点赞']);
        }

    }











}