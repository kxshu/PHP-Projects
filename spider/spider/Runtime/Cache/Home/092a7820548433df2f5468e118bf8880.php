<?php if (!defined('THINK_PATH')) exit();?> <html>
 <head>
   <title>hello <?php echo ($name); ?></title>
 </head>
 <body>

    <table>
		 <tr>
		    <td>网站id:</td>
		    <td><?php echo ($data["id"]); ?></td>
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
		 </table>
 </body>
 </html>