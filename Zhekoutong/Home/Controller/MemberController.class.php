<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends Controller{
    public function _empty(){
        $this -> error("非法操作……");
    }
    public function index(){
        if(I('session.member_name')){
            $member = M("member");
            $result = $member->where("name='".I('session.member_name')."'")->select();
            $this -> assign('member',$result[0]);
            //die($result[0]['image']);
            $this -> display();
        }else{
            $this -> success("转向登录页面...",'member/login');
        }
        
    }
    //*******************登录*********************
    public function login(){
        $name=I('post.name');
        $password=I('post.password');

        if(!IS_POST){
            $this->display();
        }else{
            //Login checking...
            $Member=M("Member");
            $data = $Member->where("name='$name' and password='$password'")->select();
            //where 可以使用数组条件
            // $map['name'] = $name;
            // $map['password'] = $password;
            // $data = $Member -> where($map) -> select();
            //echo var_dump($data);

             if($data){
                $_SESSION['member_name']=$name;
                $_SESSION['member_id']=$data[0]['id'];
                $data['logon_time'] = date('Y-m-d H:m:s',time());
                $Member ->where("name='$name' and password='$password'")->save($data);
                //...other fields
                $home_url= U('index');
                //header("Location:".$home_url);
                $this->assign('jumpUrl',$home_url);
                $this->success("登录成功!");
            }else{
                $this->error('登录失败,请检查用户名和密码！');
            }

        }
        
    }
    //**********登出****************
    public function logout(){
        $_SESSION['member_name'] = null;
        $_SESSION['member_id'] = null;
        $this->assign("jumpUrl",__APP__);
        $this->success('退出登录!');
    }

    //*******************************
    //用户注册
    //*******************************
    public function regist(){
        if(!IS_POST){
            $this->display();
        }else{
            //新增用户
            //先获取表单的数据
            $name = I('post.name');
            $password1 = I('post.password1');
            $password2 = I('post.password2');
            $vcode=I('post.vcode');

            $Member=M("Member");
            $data['name'] = $name;
            $data['password'] = $password1;        
            $data['regist_time'] = date("Y-m-d H:m:s",time());
            $data['logon_time'] = date("Y-m-d H:m:s",time());

            //*************验证***************ＴＰ的验证时灵时不灵的，晕死**********
            if($vcode != $_SESSION['code']){
                $this -> error("验证码错误!");
            }
            if($password1 != $password2){
                $this -> error("两次密码错误!");
            }
            //********************************
            $rules = array(
                array('name','require','用户名必须填写！'),                      // 用户名必须
                array('name','','帐号已经存在！',0,'unique',1),              // 验证用户名是否已经存在
            );
 
            if (!$Member->validate($rules)->create($data)){
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error($Member->getError());
            }else{
                // 验证通过 可以进行其他数据操作
                $result = $Member->add();
                if($result){
                    $_SESSION['member_name']= $name;
                    $_SESSION['member_id']=$result;
                    $this -> assign("jumpUrl",C("HOME_PATH"));
                    $this -> success('注册成功!');
                }
            }        
        //echo $result;//result是最后一条id(自动增长型) 

        //可以指定字段$Member->fields('name','password')，这样其它未指定的输入直接过滤
        //如果不想对数据对象进行其它的操作，比如验证，修改之类，就可以用data方法
        //$Member->data($data)->add();

        // class UserModel extends Model{
        //     protected $insertFields = 'name,email'; // 新增数据的时候允许写入name和email字段
        //     protected $updateFields = 'email'; // 编辑数据的时候只允许写入email字段
        // }
        // 批量添加数据
        //$dataList[] = array('name'=>'thinkphp','password'=>'thinkphp@gamil.com');
        //$dataList[] = array('name'=>'onethink','password'=>'onethink@gamil.com');
        //$Member -> addAll($dataList);
        //该功能需要3.2.3以上版本，3
    
        }
        
    }

    //***********************更新用户资料*******************
    public function member_update(){
        $M= M("member");
        $id       = $_SESSION['member_id'];
        if(!IS_POST){
            $result = $M -> where("id='$id'") ->select();
            $this -> assign('member_data',$result[0]);
            $this -> display();
        }else{
            $data['vcode']    = I('post.vcode');
            $data['nic_name'] = I('post.nic_name');
            $data['desc']     = I('post.desc');
            $data['qq']       = I('post.qq');
            $data['weixin']   = I('post.weixin');
            $data['mobile']   = I('post.mobile');
            $data['email']    = I('post.email');

            //动态验证规则
            $rules = array(
                array('vcode',$_SESSION['code'],'验证码错误！',0,'equal'),
                array('nic_name','require','你需要一个呢称！'),                     // 用户名必须
                array('qq','number','QQ号码只能是数字!'),      //QQ号码
                array('mobile','number','手机号码只能是数字!'),      //QQ号码
                array('email','email','Email地址格式不正确'),
            );
            if(!$M ->validate($rules) ->create($data)){
                $this -> error($M->getError());
            }else{
                $M -> where('id='.$id) -> save($data);
                $this -> assign("jumpUrl",U('member/index'));
                $this -> success('更新成功!');                
            }
        }
    }

    public function upload_photo(){
        $upload = new \Think\Upload();                              // 实例化上传类
        $upload->maxSize   = 300000 ;                          // 设置附件上传大小
        $upload->exts      = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  = './public/uploads/';               // 设置附件上传根目录
        $upload->savePath  = 'member_photo/';                   // 设置附件上传（子）目录
        $upload->autoSub   = true;
        $upload->subName   = $_SESSION['member_id'];  
        $upload->replace   = true;     
        // 上传文件 
        $info   =   $upload->upload();
        if(!$info) {        // 上传错误提示错误信息
            $this->error($upload->getError());
        }else{              // 上传成功 获取上传文件信息
            foreach($info as $file){
                $member = M("member");
                $mid = $_SESSION['member_id'];
                $data['image'] = $file['savename'];
                $member -> where("id='$mid'") -> save($data);
                $this ->success("头像修改成功！");
                //echo $file['savepath'].$file['savename'];
            }
        }
    }

}

?>