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

class Farercase extends Model
{
    use SoftDelete;

    public function getTypeAttr($value)
    {
        $type = [1=>'自由行攻略',0=>'景区攻略'];
        return $type[$value];
    }


    public function Users2()
    {
        return $this->belongsToMany('Users','tp_farercase_users','userid','farercaseid');
    }


    public function Users()
    {
        return $this->belongsToMany('Users','tp_dianzan_farercase_users','userid','faercaseid');
    }

    public function Users3()
    {
        return $this->belongsToMany('Users','tp_look_farercase_users','userid','farercaseid');
    }
//select a.rno  from (select rno from borrow where bno =112266) as a, (select rno from borrow where bno=449901) as b  where a.rno = b.rno;
}

