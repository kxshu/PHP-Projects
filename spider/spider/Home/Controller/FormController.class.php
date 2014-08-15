<?php
namespace Home\Controller;
use Think\Controller;
class FormController extends Controller {
    

    public function insert(){
	    $Form = D('Sites');


        if($Form->create()) {
            $result =  $Form->add();
            if($result) {
                $this->success('操作成功！');
            }else{
                $this->error('写入错误！');
            }
        }else{

            dump($data);
            $this->error($Form->getError());
        }
	}

    public function index(){
        $this->display('/add');
    }

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


