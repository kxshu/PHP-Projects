<?php
namespace Install\Controller;
use Think\Controller;
use Think\Db;


class InstallController extends Controller{

	public function step1(){
		session('error', false);
		
		$env = check_env();
		$dirfile = check_dirfile();
		$func = check_func();

		session('step', 1);

		$this->env = $env;
		$this->dirfile = $dirfile;
		$this->func = $func;
		$this->display('/step1');
	}

	public function step2($db = null, $admin = null){
		$this->display('/step2');
	}


}

