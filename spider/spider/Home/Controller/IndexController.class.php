<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    

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
}


