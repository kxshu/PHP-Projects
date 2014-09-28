<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SETUP STEP 1</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link href="http://flat-ui.com/bootstrap/css/bootstrap.css" rel="stylesheet"> -->
	<link href="http://cdn.bootcss.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
	<!-- <link href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" rel="stylesheet"> -->
	<link href="http://flat-ui.com/css/flat-ui.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="span12">
				<h1>SETUP STEP 1</h1>
				<hr>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="span12">
				<h3>運行環境檢查 :</h3>
			</div>
			<div class="span12">
				<table class="table table-condensed">
					 <thead>
				            <tr>
				                <th width="36%">項目</th>
				                <th width="30%">所需配置</th>
				                <th width="34%">當前配置</th>
				            </tr>
				        </thead>
					<tbody>
				            <?php if(is_array($env)): $i = 0; $__LIST__ = $env;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
				                    <td><?php echo ($item[0]); ?></td>
				                    <td><?php echo ($item[1]); ?></td>
				                    <td><i class="icon-<?php echo ($item[4]); ?>"></i>&nbsp;<?php echo ($item[3]); ?></td>       
				                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
				        </tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<h3>目錄、文件權限檢查 :</h3>
			</div>
			<div class="span12">
				<table class="table table-condensed">
					 <thead>
			            <tr>
			                <th width="36%">目錄/文件</th>
			                <th width="30%">所需狀態</th>
			                <th width="34%">當前狀態</th>
			            </tr>
			        </thead>
					<tbody>
			            <?php if(is_array($dirfile)): $i = 0; $__LIST__ = $dirfile;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
			                    <td><?php echo ($item[0]); ?></td>
			                    <td><?php echo ($item[1]); ?></td>
			                    <td><i class="icon-<?php echo ($item[2]); ?>"></i>&nbsp;<?php echo ($item[3]); ?></td>       
			                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
			        </tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<h3>函數依賴性檢查 :</h3>
			</div>
			<div class="span12">
				<table class="table table-condensed">
					 <thead>
			            <tr>
			                <th>函數名稱</th>
			                <th>檢查結果</th>
			            </tr>
			        </thead>
			        <tbody>
			            <?php if(is_array($func)): $i = 0; $__LIST__ = $func;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
			                    <td><?php echo ($item[0]); ?>()</td>
			                    <td><i class="icon-<?php echo ($item[2]); ?>"></i>&nbsp;<?php echo ($item[1]); ?></td>
			                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
			        </tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="span12 text-center">
				<a href="step2" class="btn btn-primary">NEXT...</a>
			</div>
		</div>
	</div>

	
</body>
</html>