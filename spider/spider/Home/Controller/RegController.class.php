<?php
namespace Home\Controller;
use Think\Controller;
class RegController extends Controller {


	public function index(){
        $this->display('/reg');
    }

    public function verify()
    {
        $config = array('fontSize' => 18, 'length' => 4, 'imageW' => 130, 'bg' => array(57, 179, 215), 'imageH' => 42, 'useCurve' => false, 'useNoise' => false);
        $Verify = new \Think\Verify();
		$Verify->entry();

    }
    public function add(){
    	$Form = D('Users');

        if($Form->create()) {
            $result =  $Form->add();
            if($result) {
                $this->success('注册成功！',__APP__.'/Home/index/show');
            }else{
                $this->error('注册失败！');
            }
        }else{
            $this->error($Form->getError());
        }
    }

}