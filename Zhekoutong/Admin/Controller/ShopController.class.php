<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
class ShopController extends Controller{
    public function _empty(){
        $this -> error("非法操作...");
    }

    public function index($member=1){
        if($_REQUEST['member']!=1){
            $member = $_REQUEST['member'];
        }
        $Model = new Model();
        $sql="select * from ". C('DB_PREFIX')."shop  where member='".$member."'  order by shop_name";
        $result = $Model ->query($sql);
        //echo var_dump($result);
        if($result)
        {
            $this->assign('shop_list',$result);
            $this->assign("prefix",C('DB_PREFIX'));
            $this->display();
        }
        else{
            $this->display();
        }
    }

    //新门店注册
    public function add_shop(){
        if($_SESSION['member_id']==null){
            $this ->assign('jumpUrl',C('HOME_PATH').'/home/member/login');
            $this ->error("哈，你还没登录呢！");
        }

        if(!IS_POST){
            //未提交
            $this->display();
        }else{
            //表单提交
            //先检查是否有重复名称
            if($_POST['vcode']!=$_SESSION['code']){
                $this -> error("验证码错误！");
            }
            $shop= M("shop");
            $shop_name =addslashes($_POST['shop_name']);
            $result = $shop->where("shop_name='$shop_name'") -> select();
            if($result){
                $this->error('品牌已存在...');
            }

            //写入
            $data['member'] =$_SESSION['member_id'];
            $data['shop_name'] = ($shop_name);
            $data['desc'] = $_POST['desc'];
            $data['address'] = $_POST['address'];
            $data['tel'] = $_POST['tel'];
            $data['regist_time'] = date("Y-m-d h:i:s",time());

            $shop -> create($data);
            if($shop -> add()){
                $this -> assign("jumpUrl", C("HOME_PATH")."/admin/shop/index/member/".$data['member']);                
                $this->success('门店注册成功，等待审核!');
            }else{
                $this -> error($shop->getError());
            }

        }
    }

    public function shop_update(){
        $shop = M("shop");
        $shop_id = $_REQUEST['shop_id'];
        if(!IS_POST){
            $result = $shop -> where("id = $shop_id") ->select();
            //die(var_dump($result));
            $this ->assign('shop_info',$result);
            $this -> display();
        }else{
            //$data['id']         = $_POST['shop_id'];
            $data['vcode']      = $_POST['vcode'];
            $data['shop_name']  = $_POST['shop_name'];
            $data['desc']       = $_POST['desc'];
            $data['address']    = $_POST['address'];
            $data['tel']        = $_POST['tel'];
            $lnglat =$_POST['lnglat'];
            $data['lng'] = substr($lnglat,0,strpos($lnglat,',',0));
            $data['lat'] = substr($lnglat,strpos($lnglat,',',0)+1);

            //动态验证规则
            $rules = array(
                array('vcode',$_SESSION['code'],'验证码错误！',0,'equal'),
                array('shop_name','require','你需要一个店名！'),                     // 用户名必须
                array('tel','number','tel号码只能是数字!'),      //QQ号码
            );
            if(!$shop ->validate($rules) ->create($data)){
                $this -> error($shop->getError());
            }else{
                $shop -> where("id='$shop_id'") -> save($data);
                $this -> assign("jumpUrl",C("HOME_PATH")."/home/member/index");
                $this -> success('更新成功!');                
            }            
        }
    }

    public function upload_shop_image(){
        $upload = new \Think\Upload();                              // 实例化上传类
        $upload->maxSize   = 1000000 ;                          // 设置附件上传大小
        $upload->exts      = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  = './public/uploads/';              // 设置附件上传根目录
        $upload->savePath  = 'shop_photo/';                    // 设置附件上传（子）目录
        $upload->autoSub   = true;
        $upload->subName   = $_POST['shop_id'];
        $upload->replace   = true;  

        $shop_id = $_POST['shop_id'];

        // 上传文件 
        $info = $upload->upload();
        if(!$info) {        // 上传错误提示错误信息
            $this->error($upload->getError());
        }else{              // 上传成功 获取上传文件信息
            $sm = M("shop_image");
            //遍历文件数组
            foreach($info as $file){
                $flag = 1;
                $data['shop']  = $shop_id;
                $data['image'] = $file['savename'];
                $data['show'] =1;
                if($sm ->create($data)){
                    $sm -> add();
                }else{
                    $flag = 0;
                }
                //echo $file['savepath'].$file['savename'];
            }
            if($flag){
                $shop = M("shop");
                $n_arr = array_values($info);           
                $shop -> image = $n_arr[0]['savename'];
                $shop -> where("id = '$shop_id'") ->save();
                $url = (U('/admin/shop/index/member/'.$_SESSION['member_id']));
                //die($url);
                $this ->assign("jumpUrl",$url);
                $this ->success("上传成功!");
            }else{
                $this ->error("上传失败");
            }
        }
    }    

}



