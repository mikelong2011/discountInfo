<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class AreaController extends Controller{
    // public function _initialize(){
    //     echo "<dir>Initializing...</div>";
    // }
    // public function _before_index(){
    //     echo 'Before index...';
    // }
    // public function _after_index(){
    //     echo 'after index ...';
    // }
    public function _empty(){
        $this ->error("非法操作...");
    }
    public function index(){
       
        $M　=　M("area");
        $result = $M->query("select * from ".C("DB_PREFIX")."area ");
        for($i=0;$i<count($result);$i++){
            $result[$i]['shortname'] = urlencode($result[$i]['shortname']);
        }
        $this -> assign('area_list',$result);
        $this -> display();

    }
    public function getProvince(){
        $provList = M('Area');
        $result = $provList -> where('level=1') -> select();
        $this -> assign('provinceList',$result);
        //var_dump($result);
        $this -> display();

    }
    //城市选择
    public function getCity($prov_id,$prov_name){
        // $cityList = new Model();
        // $sql="select * from zhekt_area where parentid in(SELECT id FROM `zhekt_area` where parentid='".$prov_id."')";
        // $result = $cityList ->query($sql);
        $_SESSION['prov_name'] =null;
        $_SESSION['city_name'] =null;
        $_SESSION['dist_name'] =null;
        $_SESSION['town_name'] =null;
        
        $_SESSION['prov_name'] = urldecode( $prov_name);
        $result = M("area") -> where("parentid='$prov_id'") -> select();
        $this->assign('cityList',$result);
        $this->display();
        
    }
    //区县选择
    public function getDist($city_id,$city_name){
        $_SESSION['city_name'] =urldecode($city_name);
        $result =M("area") -> where("parentid='$city_id'") -> select();
        $this->assign('distList',$result);
        $this->display();            
       
    }
    //乡镇选择
    public function getTown($dist_id,$dist_name){
        $_SESSION['dist_name'] = urldecode($dist_name);
        $townList = M("Area");
        $result = $townList ->where("parentid='$dist_id'")->select();
        $this->assign('townList',$result);
        $this->display();
    }

    //全部选完，设置地区参数
    public function setArea($town_id,$town_name){
        $_SESSION['town_name'] = urldecode($town_name);
        $this->assign("jumpUrl",__APP__);        
        $this->success('设置完成:'.$_SESSION['prov_name'].' '.$_SESSION['city_name'].' '.$_SESSION['dist_name'].' '.$_SESSION['town_name']);
    }

}
?>