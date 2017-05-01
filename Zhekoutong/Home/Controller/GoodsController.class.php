<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
    public function _empty(){
        $this ->error("非法操作...");
    }    
    public function index(){
        $goods = M("goods");
        $type = $_REQUEST['type'];
        if($_REQUEST['brand']){
            //有品牌，首页链接进入
            $result = $goods ->where("brand='".$_REQUEST['brand']."'") ->select();
        }else{
            //用户id,是用户自己品牌
            if($_REQUEST['member']){
                $result = $goods -> where("member='".$_REQUEST['member']."'") ->select();
            }else{
               //分类id进入
               if($_REQUEST['type1']){
                    $type1 = $_REQUEST['type1'];
                    $result = $goods -> where("type1='$type1'") ->select();
               }else{
                    $result = $goods -> where("type2='$type'") ->select();
               }
            }
        }

        if($result){
            $this ->assign("goods_list",$result);
            $this -> display();
        }else{
            $this -> error("这里没有东东！");
        }

    }
    //取得推荐品牌列表
    public function get_recommend_brands(){
        $recomm_brands = array();
        
        $type =M("goods_type");
        $result =$type ->field('id') ->where("parent_id=0")->order('sort') ->limit(4)->select();
        $types=$result;
        //echo(var_dump($types));
        
        $rbs = M("brand");
        for($i=0;$i<count($types);$i++){
            $result = $rbs->query("select *from ".C("DB_PREFIX")."brand where brand_type in(select id from ".C("DB_PREFIX")."goods_type where parent_id=".$types[$i]['id'].") limit 6");
            array_push($recomm_brands, $result); 
            //echo(var_dump($result));
        }           
        
        $this -> ajaxReturn($recomm_brands);
    }

    //取得推荐商品列表
    public  function get_recommend_goods(){
        $rgs = M("goods");
        $result = $rgs -> where('recommend>0') ->limit(4) -> select();
        $this -> ajaxReturn($result);
        //echo json_encode($result);

    }
    //取得二级商品分类
    public function get_type2($type1=0){
        $type2 = M("goods_type");
        $result = $type2 ->query("select * from ".C('DB_PREFIX')."goods_type where parent_id in(select id from ".C('DB_PREFIX')."goods_type where type_name='$type1')");
        $this -> ajaxReturn($result);
    }
    //据分类取得品牌列表 
    public function get_brands_by_type($type=0){
        $brand = M("goods_type");
        $result = $brand -> query("select * from ".C("DB_PREFIX")."brand where brand_type in(select id brand_type from ".C("DB_PREFIX")."goods_type where type_name='$type')");
        echo json_encode($result);
    }

    //新增商品
    public function addgoods(){
        //非提交显示页面
        if(!IS_POST){
            $brand = M("goods_type");
            $result = $brand -> where('parent_id=0') -> select();
            $this -> assign('typeList',$result);

            $mid=$_SESSION['member_id'];
            $shop = M("shop");
            $result = $shop ->where("member='$mid'") ->select();
            $this -> assign('shopList',$result);

            $this->display();
        }else{
            //提交新商品
            $data['goods_name'] = I('post.goods_name');
            //替换类型码
            $result = M("goods_type") -> query("select id from ".C("DB_PREFIX")."goods_type where type_name in('".I('post.type1')."','".I('post.type2')."') order by id");
            $data['type1'] = $result[0]['id'];
            $data['type2'] = $result[1]['id'];

            //替换品牌码
            $result = M("brand") -> query("select id from ".C("DB_PREFIX")."brand where brand_name ='".I('post.brand')."'");
            $data['brand'] = $result[0]['id'];

            //替换商店码
            $result = M("brand") -> query("select id from ".C("DB_PREFIX")."shop where shop_name ='".I('post.shop')."'");

            $data['shop'] = $result[0]['id'];
            $data['member']     = $_SESSION['member_id'];
            $data['specific']   = I('post.specific');
            $data['desc']   = I('post.desc');            
            $data['unit']       = I('post.unit');
            $data['price']      = I('post.price');
            $data['old_price']  = I('post.old_price');
            $data['made_in']    = I('post.made_in');
            $data['made_time'] = date("Y-m-d H:m:s",time());

            //输入验证
            $rules = array(
                array('vcode',$_SESSION['code'],'验证码错误！',0,'confirm'),
            );
            $Goods = M("goods");
            //写入
            if (!$Goods->validate($rules)){
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error($Goods->getError());
            }else{
                // 验证通过 可以进行其他数据操作
                //die(var_dump($data));
                $Goods->create($data);
                $result = $Goods->add();
                if($result){
                    $this -> success('商品录入成功!');
                }
            }  

        }
    }

    //分类列表
    public function category(){
        $type = M("goods_type");
        $parent = $_REQUEST['parent'] != 0 ? $_REQUEST['parent'] : 0;
        $result = $type ->where("parent_id='$parent'") -> order('type_name') ->select();
        if($parent==0){
            $this -> assign("type_list",$result);
            $this -> display();
        }else{
            $this -> ajaxReturn($result);
        }
    }

    //商品列表
    public function get_goods_list(){
        $goods = M("goods");
        $type = I('post.type');

        $result = $goods ->where("type2='$type'") -> select();
        $this -> ajaxReturn($result);
    }

    //商品详情
    public function goods_detail(){
        $this->display();
    }

}
?>