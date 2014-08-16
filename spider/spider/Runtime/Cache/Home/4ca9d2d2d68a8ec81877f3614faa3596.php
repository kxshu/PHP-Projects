<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>show data</title>
</head>
<body>
	<a href="/spider/index.php/Home/Form/index">+新增数据</a>
	<hr/>

	
		<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><form method="post" action="/spider/index.php/Home/Form/delete/id/<?php echo ($data["id"]); ?>">
		    <table>
				 <tr>
				    <td>网站id:</td>
				    <td width="70%"><?php echo ($data["id"]); ?></td>
				    <td rowspan="5"><a href="/spider/index.php/Home/Form/updateform/id/<?php echo ($data["id"]); ?>">编辑</a></td>
				    <td rowspan="5"><button type="submit">删除</button></td>
				 </tr>
				 <tr>
				    <td>网站名称：</td>
				    <td><?php echo ($data["name"]); ?></td>
				 </tr>
				 <tr>
				    <td>网站地址：</td>
				    <td><?php echo ($data["url"]); ?></td>
				 </tr>
				 <tr>
				    <td>网站描述：</td>
				    <td><?php echo ($data["description"]); ?></td>
				 </tr>
				 <tr>
				    <td>创建时间：</td>
				    <td><?php echo ($data["createtime"]); ?></td>
				 </tr>
				 </table>
				 <hr/>

	</form><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>