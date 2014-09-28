<?php


	function check_env(){
		$items = array(
			'os'      => array('操作系统', '不限制', '类Unix', PHP_OS, 'ok'),
			'php'     => array('PHP版本', '5.3', '5.3+', PHP_VERSION, 'ok'),
			//'mysql'   => array('MYSQL版本', '5.0', '5.0+', '未知', 'ok'), //PHP5.5不支持mysql版本检测
			'upload'  => array('附件上传', '不限制', '2M+', '未知', 'ok'),
			'gd'      => array('GD库', '2.0', '2.0+', '未知', 'ok'),
			'disk'    => array('磁盘空间', '5M', '不限制', '未知', 'ok'),
		);


		if($items['php'][3] < $items['php'][1]){
			$items['php'][4] = 'remove';
			session('error', true);
		}
		if(@ini_get('file_uploads')){
			$items['upload'][3] = ini_get('upload_max_filesize');
		}
		$tmp = function_exists('gd_info') ? gd_info() : array();
		if(empty($tmp['GD Version'])){
			$items['gd'][3] = '未安装';
			$items['gd'][4] = 'remove';
			session('error', true);
		} else {
			$items['gd'][3] = $tmp['GD Version'];
		}
		unset($tmp);

		//磁盘空间检测
		if(function_exists('disk_free_space')) {
			$items['disk'][3] = floor(disk_free_space(INSTALL_APP_PATH) / (1024*1024)).'M';
			//$items['disk'][4] = INSTALL_APP_PATH.'<br>'.APP_PATH ;
		}

		return $items;
	}


	function check_dirfile(){
		$items = array(
				array('file', '可写', 'ok', './index.php'),
			    array('file', '可写', 'ok', './config.inc.php'),
				array('dir',  '可写', 'ok', './Uploads/'),
				array('dir',  '可写', 'ok', './Blog/Runtime/'),
		);

		foreach ($items as &$val) {
			if('dir' == $val[0]){
				if(!is_writable(INSTALL_APP_PATH . $val[3])) {
					if(is_dir($items[1])) {
						$val[1] = '可读';
						$val[2] = 'remove';
						session('error', true);
					} else {
						$val[1] = '不存在';
						$val[2] = 'remove';
						session('error', true);
					}
				}
			} else {
				if(file_exists(INSTALL_APP_PATH . $val[3])) {
					if(!is_writable(INSTALL_APP_PATH . $val[3])) {
						$val[1] = '不可写';
						$val[2] = 'remove';
						session('error', true);
					}
				} else {
					if(!is_writable(dirname(INSTALL_APP_PATH . $val[3]))) {
						$val[1] = '不存在';
						$val[2] = 'remove';
						session('error', true);
					}
				}
			}
		}

		return $items;
	}


	function check_func(){
		$items = array(
			array('mysql_connect',     '支持', 'ok'),
			array('file_get_contents', '支持', 'ok'),
			array('fsockopen',         '支持', 'ok'),
			//array('mime_content_type', '支持', 'ok'), //该函数非必须
		);

		foreach ($items as &$val) {
			if(!function_exists($val[0])){
				$val[1] = '不支持';
				$val[2] = 'remove';
				$val[3] = '开启';
				session('error', true);
			}
		}

		return $items;
	}


