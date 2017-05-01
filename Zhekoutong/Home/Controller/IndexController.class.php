<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function _empty(){
        $this-> error('非法操作,稍后返回首页!');
        index();
    }
    public function index($name = 'thinkphp'){
       $type =M("goods_type");
       $result = $type -> where("parent_id=0") -> order('sort') ->select();
       $this -> assign('typeList',$result);
       $this->display();
    }

}