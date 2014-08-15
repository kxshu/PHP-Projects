<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    

    public function show(){
	    $Form = M('Sites');
	    //读取数据
	    $data = $Form->select();
	    if($data) {
	        $this->data = $data;//模板变量赋值
	    }else{
	        $this->error('数据错误');
	    }
	    $this->display('/index');
	 }
}