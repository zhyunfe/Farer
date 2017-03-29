<?php
/**
 * Created by PhpStorm.
 * User: 11870
 * Date: 2017/3/19
 * Time: 12:24
 */
namespace app\index\model;
use think\Model;
use traits\model\SoftDelete;
class Users extends Model
{
    protected $autoWriteTimestamp = true;
    use SoftDelete;
    public function getSexAttr($value)
    {
        $sex = [1=>'男',0=>'女'];
        return $sex[$value];
    }
    public function comment()
    {
        return $this->hasMany('Comment','user_id','uid');
    }


    public function connect()
    {
        return $this->hasMany('Connect','uid','uid');
    }



    public function farercase()
    {
        return $this->belongsToMany('Farercase','tp_farercase_users','farercase_id','user_id');
    }

}