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
    public function details(NoteModel $notes)
    {
        $id = input('param.id');
        $info = NoteModel::get($id);
        $user = $info->user_id;
        $info->header_image = str_replace('\\','/',$info->header_image);
        $us = Users::get($user)->username;
        $tx = Users::get($user)->photo;
        $info->num = $us;

        $this->assign('note',$info);
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 游记关联用户
    // +----------------------------------------------------------------------




}