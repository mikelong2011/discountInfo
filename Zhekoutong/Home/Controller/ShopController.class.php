<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class ShopController extends Controller{
    public function _empty(){
        $this -> error("非法操作...");
    }

    public function index(){
        $shop = M("shop");

        $result = $shop -> where('status=1') -> select();
        //die(var_dump($result));
        if($result)
        {
            $this->assign('shop_list',$result);
            $this->display();
        }
        else{
            $this->display();
        }
    }

    public function shop_map(){
        $shop = M("shop");
        $result = $shop ->find($_REQUEST['shop_id']);
        $this -> assign('shop_info',($result));
        $this ->display();
    }

    public function get_shop_images(){
        $shop = M("shop_image");
        $shop_id = $_REQUEST['shop_id'];
        $result = $shop ->where("shop='$shop_id'") -> select();
        //die(var_dump($result));
        $this -> ajaxReturn($result);
    }


}



