<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
class BrandController extends Controller{
    public function _empty(){
        $this -> error("非法操作...");
    }

    public function index($member=1){
        if($_REQUEST['member']!=1){
            $member=$_REQUEST['member'];
        }

        $Model = new Model();
        $sql="select a.*,b.type_name from ". C('DB_PREFIX')."brand as a left join ".C("DB_PREFIX")."goods_type as b on a.brand_type=b.id where a.creator='$member'   order by brand_type";
        //echo $sql;
        $result = $Model ->query($sql);
        //echo var_dump($result);
        if($result)
        {
            $this->assign('brand_list',$result);
            $this->assign("prefix",C('DB_PREFIX'));
        }
         $this->display();

    }

    public function addBrand(){
        if($_SESSION['member_id']==null){
            $this ->assign('jumpUrl',C('HOME_PATH').'/home/member/login');
            $this ->error("哈，你还没登录呢！");
        }

        if(!IS_POST){
            //未提交
            $type =M("goods_type");
            $result = $type -> where("parent_id=0")-> select();
            $this-> assign('typeList',json_encode($result));
            $this->display();
        }else{
            //表单提交
            $brand_name = $_POST['brand_name'];
            $type2 = $_POST['type2'];

            $brand= M("brand");
            
            //先检查是否有重复名称
            $result = $brand->where("brand_name='$brand_name'") -> find();
            if($result){
                $this->error('品牌已存在...');
            }
            $type=M("goods_type");
            $result = $type ->where("type_name='$type2'") -> find();
            //写入
            $data['brand_type'] = $result['id'];
            $data['brand_name'] = $brand_name;
            $data['create_date'] = date("Y-m-d h:i:s",time());
            $data['creator'] = $_SESSION['member_id'];
            $brand -> create($data);
            if($brand -> add()){
                $this -> assign("jumpUrl",__APP__."/home/member/index");                
                $this->success('品牌新增成功.');
            }else{
                $this -> error($brand->getError());
            }

        }
    }
    public function set_recommend(){
        $brand_id=$_GET['id'];
        $recommend=$_GET['recommend']?0:1;

        if($brand_id){
            $Model = M();
            $sql="update ".C('DB_PREFIX')."brand set recommend ='$recommend' where id='$brand_id'";
            $result = $Model -> execute($sql);

            if($result){
                $this->success("设置成功!");
            }else{
                $this->error("设置失败!");
            }
        }else{
            $this->error("操作失败!");
        }
    }
    
}