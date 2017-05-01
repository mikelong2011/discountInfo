<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class BrandController extends Controller{
    public function _empty(){
        $this -> error("非法操作...");
    }

    public function index(){
        $Model = new Model();
        $sql="select a.*,b.type_name from ". C('DB_PREFIX')."brand as a left join ".C("DB_PREFIX")."goods_type as b on a.brand_type=b.id  where a.creator='".$_SESSION['member_id']."'  order by brand_type";
        //echo $sql;
        $result = $Model ->query($sql);
        //echo var_dump($result);
        if($result)
        {
            $this->assign('brand_list',$result);
            $this->assign("prefix",C('DB_PREFIX'));
            $this->display();
        }
        else{
            $this->display();
        }
    }

}



