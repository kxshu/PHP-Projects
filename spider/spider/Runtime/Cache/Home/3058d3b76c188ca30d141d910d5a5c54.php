<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>update users</title>
</head>
<body>

	<a href="/spider/index.php/Home/Users/show">【查看用户】</a>
	<hr/>
	<form method="post" action="/spider/index.php/Home/Users/update/id/<?php echo ($_GET['id']); ?>">
		<table>
			<tr>
				<td><label for="#">用户昵称：</label></td>
				<td><input name="NickName" type="text"></td>
			</tr>
			<tr>
				<td><label for="#">用户密码：</label></td>
				<td><input name="Password" type="text"></td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit">提交</button></td>
			</tr>
		</table>
	</form>
</body>
</html>