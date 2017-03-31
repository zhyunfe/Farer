<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/21
 * Time: 18:58
 */
namespace app\index\model;
use think\Model;
use traits\model\SoftDelete;

class Notes extends Model
{
    protected $autoWriteTimestamp = true;
    use SoftDelete;



    public function Users2()
    {
        return $this->belongsToMany('Users','tp_notes_users','usersid','notesid');
    }


    public function Users()
    {
        return $this->belongsToMany('Users','tp_dianzan_notes_users','usersid','notesid');
    }

    public function Users3()
    {
        return $this->belongsToMany('Users','tp_look_notes_users','usersid','notesid');
    }
    public function comment()
    {
        return $this->hasMany('Comment','notes_id','id');
    }

}