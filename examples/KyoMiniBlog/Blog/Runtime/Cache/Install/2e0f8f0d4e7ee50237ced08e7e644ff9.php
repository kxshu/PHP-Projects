<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>KYOMINI 安裝程序 SHANGHAI,CHINA</title>
<style>

body{margin:0;padding:0}.top{height:10px;background:#63d2cb;width:100%;margin-top:-3px}h1{font-family:"微軟雅黑";text-align:center;margin-top:50px;margin-bottom:50px;font-weight:normal;font-size:30px}h1 span{color:#2f96b4}h2{font-family:"微軟雅黑";font-size:16px;border-bottom:#CCC solid 1px;padding-bottom:12px}h2 img{margin-right:10px}hr{border-top:#CCC solid 1px;border-bottom:#FFF solid 1px;border-left:none;border-right:0;width:70%;margin-bottom:30px}.content{width:60%;height:auto;margin:auto}.btn-info{color:#fff;background-color:#49afcd;*background-color:#2f96b4;background-repeat:repeat-x}.btn-info:hover,.btn-info:focus,.btn-info:active,.btn-info.active,.btn-info.disabled,.btn-info[disabled]{color:#fff;background-color:#2f96b4;*background-color:#2a85a0}.btn-info:active,.btn-info.active{background-color:#24748c 9}.btn{padding:10px 20px;text-decoration:none;font-size:14px;margin:auto;border:0}.btnn{text-align:center}.boom{margin-top:40px;margin-bottom:90px}.ico-success,.ico-error{vertical-align:-1px;*vertical-align:middle;margin-right:6px;display:inline-block;width:16px;height:16px;line-height:9;overflow:hidden}.ico-success{background:url(/examples/kyominiblog/Blog/Install/Style/img/ok.png) no-repeat 0 0}.ico-error{background:url(/examples/kyominiblog/Blog/Install/Style/img/error.png) no-repeat 0 0}.install-database{font-family:"微軟雅黑";padding:30px;border:#CCC dotted 1px;margin-bottom:20px}</style>
<script type="text/javascript" src="/examples/kyominiblog/Blog/Install/Style/js/jquery-1.11.0.min.js"></script>

</head>

    <h1><span>第二步：</span>正在安裝中</h1>
     <hr>
         <div class="content">
    <div id="show-list" class="install-database">
    </div>
    <script type="text/javascript">
        var list   = document.getElementById('show-list');
        function showmsg(msg, classname){
            var li = document.createElement('p'); 
            li.innerHTML = msg;
            classname && li.setAttribute('class', classname);
            list.appendChild(li);
            document.scrollTop += 30;
        }
    </script>
</div>
     <div class="btnn">

      

    <button class="btn btn-info">正在安裝，請稍後...</button>  </div>
 <hr class="boom">

</body>
</html>