<?php
namespace app\index\controller;
use app\index\model\Connect;
use think\Db;
use think\Session;
use think\Request;
use think\Controller;
use app\index\model\Users as UsersModel;
use app\index\controller\Auth;
use app\index\model\Notes;
use app\index\model\Purchase;
use app\index\model\Farercase_users;
class Users extends Auth
{
    /**
     * 首页
     *
     */
//需要session验证
    protected $is_check_login = ['writenote','collect','prolist','triplist','shopcar','notelist','tripcomment'];

    public function __construct()
    {
        parent::__construct();
    }


    public function zhifu()
    {
        $this->assign('title','zhifu');
       dump( $this->fetch());
    }







    public function orderList()
    {
        return $this->fetch();
    }

    //添加联系人
    public function addUser()
    {
        return $this->fetch();
    }
    public function doAddUser(Connect $connect)
    {
        $info = Session::get('user');
        $id = $info['uid'];
        $name = input('post.name');
        $phone = input('post.phone');
        $addr = input('post.addr');
        if(($name == '') || ($phone == '') || ($addr == ''))
        {
            return json(['msg'=>'gun']);
        }else{
            $date = [
              'name' => $name,
                'phone' => $phone,
                'addr'  => $addr,
                'uid'   => $id
            ];
            $connect->save($date);
            return json(['msg'=>'ok']);
        }

    }
    //修改联系人
    public function chgAddUser(Connect $connect)
    {

        $info = $connect->where(['cid' => input('param.id')])->find();
        $this->assign('list',$info);
       return $this->fetch();
    }


    public function doChgAddUser(Connect $connect)
    {

        $info = $connect->where(['cid' => input('param.id')])->find();
        $name = input('post.name');
        $phone = input('post.phone');
        $addr = input('post.addr');
        $info->name = $name;
        $info->phone = $phone;
        $info->addr = $addr;
        $info->save();
        return json(['msg'=>'ok']);
    }

    // +----------------------------------------------------------------------
    // | 用户的展示界面
    // +----------------------------------------------------------------------
    public function center()
    {
        $info = Session::get('user');
        $id = $info['uid'];
        $user = UsersModel::get($id);
        if($this->checkLogin())
        {
            $this->assign('iflo', Session::get('user'));
            $this->assign('iflo1', $user);

        }else{
            $this->assign('iflo',0);
        }
//        dump(Session::get('user'));
//        die;

        return $this->fetch();
    }

    // +----------------------------------------------------------------------
    // | 用户写游记
    // +----------------------------------------------------------------------
    public  function writeNote()
    {
        return $this->fetch();
    }

    // +----------------------------------------------------------------------
    // | 用户设置常用联系人
    // +----------------------------------------------------------------------
    public  function setUp()
    {
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 用户订单详情
    // +----------------------------------------------------------------------
    public  function orderDetails()
    {
        return $this->fetch();
    }
    public  function orderErDetails()
    {
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 用户常用联系人
    // +----------------------------------------------------------------------
    public  function lianXiRen()
    {
        $id = Session::get('user')['uid'];
        $info = UsersModel::get($id);
        $lxr = $info->connect;
        $this->assign('list',$lxr);
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 用户发表评论
    // +----------------------------------------------------------------------
    public  function giveComment()
    {
        return $this->fetch();
    }


    public  function collect()
    {
        $user = UsersModel::get(Session::get('user')['uid']);
        $fa = $user->farercase;
        $this->assign('farercase',$fa);
        return $this->fetch();
    }
    public  function proList()
    {
        return $this->fetch();
    }

    public  function tripList()
    {
        return $this->fetch();
    }
    public  function shopCar()
    {
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 用户发表的游记列表
    // +----------------------------------------------------------------------
    public  function noteList()
    {
        $id = Session::get('user')['uid'];
        $user = UsersModel::get($id);
        $notes = $user->notes;



        $this->assign('notes',$notes);
        return $this->fetch();
    }
    //用户删除游记
    public function delnote(Notes $notes)
    {

        $id = input('post.id');

        $fa=$notes->where("nid = $id")->find();

        $fa->delete();
    }


    // +----------------------------------------------------------------------
    // | 用户发表的游记评论列表
    // +----------------------------------------------------------------------
    public  function tripComment()
    {
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 用户发表的景区评论列表
    // +----------------------------------------------------------------------
    public  function placeComment()
    {
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 用户发表的酒店评论列表
    // +----------------------------------------------------------------------
    public  function hotelComment()
    {
        return $this->fetch();
    }

    // +----------------------------------------------------------------------
    // | 用户发表的攻略评论列表
    // +----------------------------------------------------------------------
    public  function farercaseComment()
    {
        return $this->fetch();
    }





























    // +----------------------------------------------------------------------
    // | 确认订单
    // +----------------------------------------------------------------------
    public function random1($length = 6 , $numeric = 0) {
        PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
        if($numeric) {
            $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
        } else {
            $hash = '';
            $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
            $max = strlen($chars) - 1;
            for($i = 0; $i < $length; $i++) {
                $hash .= $chars[mt_rand(0, $max)];
            }
        }
        return $hash;
    }
    public function sureOrder()
    {


        Session::set('code',$this->random1(6,1));
        $code = Session::get('code');


        $info = Purchase::get(input('param.id'));
        $this->assign('info',$info);
        $this->assign('code',$code);
        return $this->fetch();
    }


    public function yzm()
    {





        //请求数据到短信接口，检查环境是否 开启 curl init。
        function Post($curlPost,$url){
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_NOBODY, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
            $return_str = curl_exec($curl);
            curl_close($curl);
            return $return_str;
        }

        //将 xml数据转换为数组格式。
        function xml_to_array($xml){
            $reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
            if(preg_match_all($reg, $xml, $matches)){
                $count = count($matches[0]);
                for($i = 0; $i < $count; $i++){
                    $subxml= $matches[2][$i];
                    $key = $matches[1][$i];
                    if(preg_match( $reg, $subxml )){
                        $arr[$key] = xml_to_array( $subxml );
                    }else{
                        $arr[$key] = $subxml;
                    }
                }
            }
            return $arr;
        }

        //random() 函数返回随机整数。
        function random($length = 6 , $numeric = 0) {
            PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
            if($numeric) {
                $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
            } else {
                $hash = '';
                $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
                $max = strlen($chars) - 1;
                for($i = 0; $i < $length; $i++) {
                    $hash .= $chars[mt_rand(0, $max)];
                }
            }
            return $hash;
        }
        //短信接口地址
        $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
        //获取手机号
        $mobile = $_POST['mobile'];
        //获取验证码
        $send_code = $_POST['send_code'];
        //生成的随机数
        $mobile_code = random(4,1);
        if(empty($mobile)){
            exit('手机号码不能为空');
        }
        //防用户恶意请求
        if(empty(Session::get('code')) or $send_code!=Session::get('code')){
            exit('请求超时，请刷新页面后重试');
        }

        $post_data = "account=C85152163&password=438f7be3605288e525657ce86eada1d2&mobile=".$mobile."&content=".rawurlencode("您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。");
        //用户名请登录用户中心->验证码、通知短信->帐户及签名设置->APIID
        //查看密码请登录用户中心->验证码、通知短信->帐户及签名设置->APIKEY
        $gets =  xml_to_array(Post($post_data, $target));
        if($gets['SubmitResult']['code']==2){
            $_SESSION['mobile'] = $mobile;
            $_SESSION['mobile_code'] = $mobile_code;
        }
        echo $gets['SubmitResult']['msg'];

    }



    public function pd()
    {

            //echo '<pre>';print_r($_POST);print_r($_SESSION);
            if(input('mobile_code')!=Session::get('code')){
                exit('手机验证码输入错误。');
            }else{
                session('code',null);
                exit('注册成功。');
            }

    }




















    // +----------------------------------------------------------------------
    // | 修改密码
    // +----------------------------------------------------------------------

    public function changePwd()
    {
        return $this->fetch();
    }

    /**
     *
     */
    public function doChangePwd()
    {
        $oldpwd = input('post.oldpwd');
        $newpwd = input('post.newpwd');
        $regpwd = input('post.regpwd');

        $info = Session::get('user');
        $id = $info['uid'];
        $user = UsersModel::get($id);


        if($oldpwd == '' || $oldpwd == '' || $oldpwd == '' ){
            return json(['msg'=>'不能为空']);
        }else{

            if(strcmp(md5($oldpwd),$user->password) != 0)
            {

                return json(['msg'=>'请输入正确的密码']);
            }elseif($newpwd != $regpwd)
            {
                return json(['msg'=>'两次密码要一致']);
            }else{
                $user->password = md5($newpwd);
                $user->save();


                return json(['msg'=>'修改成功']);

            }
        }


    }


    // +----------------------------------------------------------------------
    // | 用户详细信息
    // +----------------------------------------------------------------------

    public function details()
    {
        $info = Session::get('user');
        $id = $info['uid'];
        $user = UsersModel::get($id);

        $this->assign('list',$user);
        return $this->fetch();
    }
    // +----------------------------------------------------------------------
    // | 用户姓名
    // +----------------------------------------------------------------------

    public function realname()
    {
        return $this->fetch();
    }


    public function doRealname()
    {
        $info = Session::get('user');
        $id = $info['uid'];
        $user = UsersModel::get($id);

        $user->realname = input('post.realname');
        $user->save();


        return json(['msg'=>'修改成功']);

    }
    public function realphoto()
    {
        return $this->fetch();
    }
    public function realsex()
    {
        return $this->fetch();
    }
    public function doRealSex()
    {
        $info = Session::get('user');
        $id = $info['uid'];
        $user = UsersModel::get($id);
       if(input('post.realsex') == 'nan')
       {
           $user->sex = 1;
           $user->save();
       }else{
           $user->sex = 0;
           $user->save();
       }




        return json(['msg'=>'修改成功']);

    }

    //修改地址
    public function realaddr()
    {

        return $this->fetch();
    }

    public function doRealAddr()
    {
        $info = Session::get('user');
        $id = $info['uid'];
        $user = UsersModel::get($id);

        $user->addr = input('post.realaddr');
        $user->save();


        return json(['msg'=>'修改成功']);




    }
    //修改生日
    public function realbirth()
    {
        return $this->fetch();
    }
    public function doRealBirth()
    {
        $info = Session::get('user');
        $id = $info['uid'];
        $user = UsersModel::get($id);

        $user->birthday = input('post.realbirth');
        $user->save();


        return json(['msg'=>'修改成功']);




    }
    // +----------------------------------------------------------------------
    // | 用户签名
    // +----------------------------------------------------------------------

    public function signature()
    {
        return $this->fetch();
    }
    public function doRealTag()
    {

        $info = Session::get('user');
        $id = $info['uid'];
        $user = UsersModel::get($id);

        $user->tag = input('post.realtag');
        $user->save();


        return json(['msg'=>'修改成功']);




    }


    // +----------------------------------------------------------------------
    // | 每日签到得积分
    // +----------------------------------------------------------------------
    public function doqd(UsersModel $user)
    {

        $info = Session::get('user');
        $id = $info['uid'];
        $user = UsersModel::get($id);

        if(($user->logtime) == null)
        {

            $user->where("uid = $id")->update(['logtime' => time()]);
            $user->where("uid = $id")->update(['score' => 20]);
            return json(['msg'=>'新用户第一次签到成功,积分加300']);
        }else{

            $logtime = date('y-m-d',$user->logtime);

            if(strcmp($logtime, date('y-m-d',time())) != 0)
            {
                $user->where("uid = $id")->update(['logtime' => time()]);
                $user->where("uid = $id")->update(['score' => $user->score+=20]);
                return json(['msg'=>'签到成功,积分加20']);
            }else{
                return json(['msg'=>'今天已经签到了']);
            }
        }




    }




    // +----------------------------------------------------------------------
    // | 提交游记
    // +----------------------------------------------------------------------
    public function upload(){
        $file = request()->file('image');
        $info = $file->move('uploads/purchase','');
        $file_path ="http://www.farer.com/uploads/purchase/".$info->getSaveName();

        if($info){
            return ['success'=>true,'msg'=>'上传成功','file_path'=>$file_path];
        }else{
            return ['success'=>false,'msg'=>'上传失败','file_path'=>$file_path];
        }
    }



    public function doChuanNote(Notes $notes,UsersModel $usersmodel){
        $file = request()->file('header_image');

        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/notes');
        $header_image = $info->getSaveName();


        $no = Notes::create([
            'title' => input('post.title'),
            'content' => input('post.content'),
            'user_id' => Session::get('user')['uid'],
            'header_image' => $header_image
        ]);

        $user = UsersModel::get(Session::get('user')['uid']);
        $user->note_id = $no->nid;
        $user->save();

    }


    //用户删除收藏
    public function delcol(Farercase_users $farercase_users)
    {

        $id = input('post.id');
        $uid = Session::get('user')['uid'];
        $fa=$farercase_users->where("farercaseid = $id and userid = $uid")->find();

        $fa->delete();
    }


    //手机验证
    public function tel()
    {
        return $this->fetch();
    }




}
