<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>show data</title>
</head>
<body>
	<hr/>
	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><table>
			 <tr>
			    <td>网站id:</td>
			    <td width="70%"><?php echo ($data["id"]); ?></td>
			    <td rowspan="5"><button>查看</button></td>
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
			 <hr/><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>