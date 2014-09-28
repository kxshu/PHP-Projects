<?php
namespace Home\Controller;
use Think\Controller;
class UsersController extends Controller {

	public function index(){
		$Form = M('Users');
        $data = $Form->select();
        if($data) {
            $this->data = $data;
       		// $password=I($data[7]['password'],'','md5')
       		// dump($password);
            //$this->assign('password',$password);
        }else{
            $this->error('数据错误');
        }
        $this->display('/users');
	}
	public function delete($id){
        $Form = M('Users');
         $result =  $Form->delete($id);
          if($result) {
                $this->success('操作成功！');
            }else{
                $this->error('删除失败！');
            }
    }

    public function updateForm(){
        $Form = M('Users');
        $data = $Form->select();
        if($data) {
            $this->data = $data;
        }else{
            $this->error('数据错误');
        }
        $this->display('/update-users');
    }

    public function update($id){
        $Form = D("Users"); 
        $data = $Form->create();
        $a=$_GET['id'];
        dump($a);
        if($Form->create()) {
            $result =  $Form->save();

           
            if($result) {
                $this->success('更新成功！','../../index');
            }else{
                $this->error('更新失败！');
            }
        }else{
            $this->error($Form->getError());
        }

    }
}