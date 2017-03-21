<?php
/**
 * Created by PhpStorm.
 * User: zhyunfe
 * Date: 2017/3/22
 * Time: 上午3:05
 */
/**
 * Created by PhpStorm.
 * User: zhyunfe
 * Date: 2017/3/20
 * Time: 下午2:22
 */
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Validate;
use app\admin\model\FarerCase;
class FarerCase extends Controller
{
    public function addCase(FarerCase $case)
    {
        var_dump($_POST);
    }
}