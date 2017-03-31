<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/24
 * Time: 10:44
 */

namespace app\index\controller;
use think\Controller;
use app\index\controller\Auth;
use app\index\model\Users;
use app\index\model\Notes as NoteModel;
use app\index\model\Notes_users;
use app\index\model\Comment;
use app\index\model\Dianzan_notes_users;
use app\index\model\Look_notes_users;
use think\Session;
class Notes extends Auth
{
//    protected $is_check_login = ['writeNote'];





    // +----------------------------------------------------------------------
    // | 游记列表
    // +----------------------------------------------------------------------
    public function show(NoteModel $notesmodel)
    {
        $all = $notesmodel->select();
        foreach ($all as $value)
        {

            $info = $value->user_id;
            $us = Users::get($info)->username;
            $tx = Users::get($info)->photo;

            $value->uname = $us;
        }


        $this->assign('notes',$all);
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 游记详情
    // +----------------------------------------------------------------------
    public function details(NoteModel $notes,Dianzan_notes_users $dianzan_notes_users,Comment $comment)
    {
        $id = input('param.id');
        $info = NoteModel::get($id);
        $user = $info->user_id;
        $info->header_image = str_replace('\\','/',$info->header_image);
        $us = Users::get($user)->username;
        $tx = Users::get($user)->photo;
        $info->num = $us;

        $cishu = $dianzan_notes_users->where(['notesid'=>$id])->count();
        $pinlun = $comment->where("type = 1 and notes_id = $id")->count();
        $info->cishu = $cishu;
        $info->pinlun = $pinlun;

        $this->assign('note',$info);
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 游记关联用户
    // +----------------------------------------------------------------------

    public function docollect(NoteModel $notes,Notes_users $notes_users)
    {
        $id = input('post.id');
        $info1 = Session::get('user');
        $id2 = $info1['uid'];

        $info = $notes->find($id);

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

                'usersid' => Session::get('user')['uid'],

                'notesid'   => $id,



            ]];
            $notes_users->saveAll($data);
            return json(['msg'=>'收藏成功']);
        }else{
            return json(['msg'=>'已经收藏']);
        }

    }




    public function dianzan(NoteModel $notes,Dianzan_notes_users $dianzan_notes_users)
    {
        $id = input('post.id');
        $info1 = Session::get('user');
        $id2 = $info1['uid'];

        $info = $notes->find($id);

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

                'usersid' => Session::get('user')['uid'],

                'notesid'   => $id,



            ]];
            $dianzan_notes_users->saveAll($data);
            return json(['msg'=>'点赞成功']);
        }else{
            return json(['msg'=>'已经点赞']);
        }

    }

    public function notecomment()
    {
        $id = input('param.id');
        $info = NoteModel::get($id);
        $com = $info->comment;

        $arr = [];
        foreach ($com as $value)
        {
            if($value->type == 1)
            {
                $arr[] = $value;
            }
        }



        foreach ($arr as $value)
        {
            $has = $value->user_id;

            $user = Users::get($has);
            $value->uname = $user->username;
            $value->image = $user->photo;
        }

        $this->assign('comment',$arr);
        $this->assign('id',$id);
        return $this->fetch();
    }








}