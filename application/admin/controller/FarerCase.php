<?php
/**
 * Created by PhpStorm.
 * User: zhyunfe
 * Date: 2017/3/20
 * Time: 下午2:22
 */
namespace app\admin\controller;

use think\View;
use think\Request;
use think\Validate;
use app\admin\controller\Auth;
use app\admin\model\FarerCase as FCase;

class FarerCase extends Auth
{
    protected $is_check_login = ['*'];

    public function addCase(FCase $case)
    {
        var_dump($_FILES);
        var_dump(input('post.'));
//        $obj = $_POST['obj'];
//        var_dump($obj);
//        $case->data(['pid'    =>1,'title'=>$obj['title'],
//                    'seecount'=>1,'day'  =>$obj['num'],
//                    'price'=>$obj['price'],
//                    'href'=>$obj['trail'],
//                    'location'=>$obj['location'],
//                    'traffic'=>$obj['traffic'],
//                    'hotel'   =>$obj['hotel']]);
//        $result = $case->save();
//        if($result) {
//            return true;
//        } else {
//            return false;
//        }
    }
}