<?php
namespace Home\Controller;
use Think\Controller;
class FormController extends Controller {
    

    public function insert(){
	    $Form = D('Sites');

        if($Form->create()) {
            $result =  $Form->add();
            if($result) {
                $this->success('操作成功！','show');
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
        $data = $Form->select();
        if($data) {
            $this->data = $data;
        }else{
            $this->error('数据错误');
        }
        $this->display('/index');
     }
    public function delete($id){
        $Form = M('Sites');
         $result =  $Form->delete($id);
          if($result) {
                $this->success('操作成功！');
            }else{
                $this->error('删除失败！');
            }
    }
    public function updateForm(){
        $Form = M('Sites');
        $data = $Form->select();
        if($data) {
            $this->data = $data;
        }else{
            $this->error('数据错误');
        }
        $this->display('/update');
    }
    public function update($id){
        $Form = D("Sites"); 
         $data = $Form->create();
        if($Form->create()) {
            $result =  $Form->save();
            if($result) {
                $this->success('更新成功！','../../show');
            }else{
                dump($data);
                $this->error('更新失败！');
            }
        }else{

            dump($data);
            $this->error($Form->getError());
        }

    }
}


