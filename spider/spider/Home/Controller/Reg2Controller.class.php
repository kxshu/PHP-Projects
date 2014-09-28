<?php
namespace Home\Controller;
use Think\Controller;
class Reg2Controller extends Controller {


	public function index(){
        $Form = M('Users');
        $data = $Form->order('id desc')->select();
        if($data){
            $this->data = $data;
            // $password=I($data[7]['password'],'','md5')
            // dump($password);
            //$this->assign('password',$password);
        }else{
            $this->error('数据错误');
        }

        $this->display('/reg2');
    }

    public function verify()
    {
        $config = array('fontSize' => 18, 'length' => 4, 'imageW' => 130, 'bg' => array(57, 179, 215), 'imageH' => 42, 'useCurve' => false, 'useNoise' => false);
        $Verify = new \Think\Verify();
		$Verify->entry();

    }

    public function checkUser($title='') {
        if (!empty($title)) {
            $Form = M("Form");
            if ($Form->getByTitle($title)) {
                $this->error('用户名已经存在');
            } else {
                $this->success('用户名可以使用!');
            }
        } else {
            $this->error('用户名必须');
        }
    }



    public function add(){
    	$Form = D('Users');

        if($PostData = $Form->create()) {
            $result =  $Form->add();
            if($result) {
                $lastData = $Form -> order('id desc') -> limit(1) -> find();
                $this->ajaxReturn($lastData);
                /*$this->success('注册成功！',__APP__.'/Home/index/show');*/
            }else{
                $this->error('注册失败！');
            }
        }else{
            $this->error($Form->getError());
        }
    }


    public function delete($id=0){
        $Form = M('Users');
         $result =  $Form->delete($id);
          if($result) {
                $this->ajaxReturn();
                // $this->success('操作成功！');
            }else{
                $this->error('删除失败！');
            }
    }

    public function update($id=0){
        $Form = D("Users"); 
        $data = $Form->create();
        //$a=$_GET['id'];
        //dump($data);
        if($Form->create()) {
            $result =  $Form->where('id='.$id)->save();
            if($result) {
                $this->ajaxReturn($data);
                //$this->success('更新成功！','../../index');
            }else{
                $this->ajaxReturn($data);
                //$this->error('更新失败！');
            }
        }else{
            $this->error($Form->getError());
        }

    }

}