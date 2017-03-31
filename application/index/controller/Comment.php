<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/24
 * Time: 14:46
 */
namespace app\index\controller;
use think\Controller;
use app\index\model\Comment as ComModel;
use think\Session;

class Comment extends Controller
{
    public function toPurchase()
    {
        return $this->fetch();
    }

    public function givePlace()
    {

        $this->assign('id',input('param.id'));
        return $this->fetch();
    }

    public function givePurchase()
    {

        $this->assign('id',input('param.id'));
        return $this->fetch();
    }
    public function giveNotes()
    {

        $this->assign('id',input('param.id'));
        return $this->fetch();
    }

    public function doGivePlace(ComModel $comment)
    {
        $content = input('post.content');
        ComModel::create(
            ['type' => 3,
                'content' => $content,
                'place_id' => input('post.id'),
                'user_id'  => Session::get('user')['uid']

            ]


        );



        return json(['msg'=>'gun']);
    }

    public function doGivePurchase(ComModel $comment)
    {
        $content = input('post.content');
        ComModel::create(
            ['type' => 4,
                'content' => $content,
                'purchase_id' => input('post.id'),
                'user_id'  => Session::get('user')['uid']

            ]


        );



        return json(['msg'=>'gun']);
    }


    public function doGiveNotes(ComModel $comment)
    {
        $content = input('post.content');
        ComModel::create(
            ['type' => 1,
                'content' => $content,
                'notes_id' => input('post.id'),
                'user_id'  => Session::get('user')['uid']

            ]


        );



        return json(['msg'=>'gun']);
    }



}