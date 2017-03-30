<?php
/**
 * Created by PhpStorm.
 * User: zhyunfe
 * Date: 2017/3/23
 * Time: 上午11:38
 */
namespace app\admin\controller;

use think\View;
use app\admin\model\Hotel as HotelModel;

class Hotel extends Auth {
    protected $is_check_login = ['*'];

    /**
     * 新增酒店数据
     * 通过ajax提交formdata形式的数据
     *
     * @param HotelModel $hotel 依赖注入方式操作数据可以
     * @return array            判断文件上传是否成功
     *                          文件上传成功后获取到图片的保存名称
     *                                      将数据插入到数据库
     */
    public function addHotel(HotelModel $hotel)
    {
        $header_image = '';
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/hotel');
        if($info){
            $header_image = $info->getSaveName();
            $obj = input('post.');


            // +----------------------------------------------------------------------
            // | 通过province（省份）city（城市）确认酒店的pid
            // +----------------------------------------------------------------------


            $location = $obj['province'].$obj['city'].$obj['county'].$obj['location'];
            $pid      = $obj['province'].$obj['city'];
            $service  = rtrim($obj['service'],',');
            $result   = $hotel->save(['pid'        =>$pid,
                                      'name'        =>$obj['name'],
                                      'header_image'=>$header_image,
                                      'location'    =>$obj['location'],
                                      'style'       =>$obj['type'],
                                      'introduce'   =>$obj['desc'],
                                      'telephone'   =>$obj['phone'],
                                      'gl'          =>$obj['gl'],
                                      'service'     =>$service
            ]);
            if ($result) {
                //插入成功返回错误号和错误信息
                return json_encode(['error'=>0,'msg'=>'添加成功']);
            } else {
                return json_encode(['error'=>1,'msg'=>'添加失败']);
            }
        }else{
            //文件上传失败的话返回错误号和错误信息
            return json_encode(['error'=>2,'msg'=>$file->getError()]);
        }
    }
    public function find(HotelModel $hotel)
    {
        $pid    = input('post.pid');
        $style  = input('post.type');
        $result = $hotel->field(['id','name'])->where(['pid'=>$pid,'style'=>$style])->select();
        return $result;
    }

    /**
     * ajax查询酒店
     * @param HotelModel $hotel
     * @return array
     */
    public function listFind(HotelModel $hotel)
    {
        $where = "";

        $pid = input('post.pid');
        $style = input('post.type');

        //如果没有选择酒店类型
        if ($style != -1) {
            //如果选择了地区和酒店类型执行下面的语句
            if ($pid != "") {
                $where = "pid like '$pid%' and style=$style";
            } else {
                //如果没有选择区域，执行下面的语句
                $where = "style = $style";
            }
        } else {
            $where = "pid like '%$pid%'";
        }
        //查询出一共有多少条数据
        $count = $hotel->withTrashed()->where($where)->count('id');
        if(isset($_POST['start'])) {
            $start = $_POST['start'];
        } else {
            $start = 0;
        }
        $result = $hotel->withTrashed()->field(['id','pid','name','telephone','style'])->where($where)->limit($start,5)->select();
        //设置酒店编号和酒店类型
        foreach ($result as $value) {
            $value->id += 200000;
            $value->style = $this->getStatusTextAttr($value->style);
        }
        //分配变量渲染模板
        $this->assign('hotel',$result);
        $list = $this->fetch(APP_PATH."/admin/view/hotel/listFind.html");
        return ['tmp'=>$list,'pageCount'=>$count,'limit'=>5];
    }
    public function getStatusTextAttr($value)
    {
        $status = [0=>'经济型',1=>'豪华型',2=>'主题型'];
        return $status[$value];
    }
}