<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>add</title>
</head>
<body>
	<form method="post" action="/spider/index.php/Home/Form/insert">
		<table>
			<tr>
				<td><label for="#">网站名：</label></td>
				<td><input name="Name" type="text"></td>
			</tr>
			<tr>
				<td><label for="#">网站地址：</label></td>
				<td><input name="URL" type="text"></td>
			</tr>
			<tr>
				<td><label for="#">网站描述：</label></td>
				<td><textarea name="Description" id="" cols="30" rows="5"></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit">提交</button></td>
			</tr>
		</table>
	</form>
</body>
</html>