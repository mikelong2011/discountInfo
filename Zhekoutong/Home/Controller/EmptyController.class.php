<?php
namespace Home\Controller;
use Think\Controller;
class EmptyController extends Controller{

    public function index(){
        //根据当前控制器名来判断要执行那个城市的操作
        $msg = CONTROLLER_NAME;
        $this->show($msg);
    }
    //注意 show方法 本身是 protected 方法
    protected function show($name){
        //和$name这个城市相关的处理
        $this -> assign('jumpUrl',C('HOME_PATH'));
        $this -> error('非法控制器:' . $name.',倒计时后返回主页！');
    }
}

