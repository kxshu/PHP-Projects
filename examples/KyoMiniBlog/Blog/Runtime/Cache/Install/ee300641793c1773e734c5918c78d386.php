<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>KYOMINI 安裝程序 SHANGHAI,CHINA</title>
<style>
body{margin:0;padding:0}.top{height:10px;background:#63d2cb;width:100%;margin-top:-3px}h1{font-family:"微軟雅黑";text-align:center;margin-top:50px;margin-bottom:50px;font-weight:normal;font-size:30px}h1 span{color:#2f96b4}h2{font-family:"微軟雅黑";font-size:16px;border-bottom:#CCC solid 1px;padding-bottom:12px}h2 img{margin-right:10px}hr{border-top:#CCC solid 1px;border-bottom:#FFF solid 1px;border-left:none;border-right:0;width:70%;margin-bottom:30px}.content{width:60%;height:auto;margin:auto}table{max-width:100%;background-color:transparent;border-collapse:collapse;border-spacing:0}.table{width:100%;margin-bottom:25px;font-size:14px;border-bottom:#CCC solid 1px}.table th,.table td{padding:8px;line-height:20px;text-align:left;vertical-align:top;border-top:1px solid #ddd}.table th{font-weight:bold}.table thead th{vertical-align:bottom}.table caption+thead tr:first-child th,.table caption+thead tr:first-child td,.table colgroup+thead tr:first-child th,.table colgroup+thead tr:first-child td,.table thead:first-child tr:first-child th,.table thead:first-child tr:first-child td{border-top:0}.table tbody+tbody{border-top:2px solid #ddd}.table .table{background-color:#fff}.table-condensed th,.table-condensed td{padding:4px 5px}.table-bordered{border:1px solid #ddd;border-collapse:separate;*border-collapse:collapse;border-left:0;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px}.table-bordered th,.table-bordered td{border-left:1px solid #ddd}.table-striped tbody>tr:nth-child(odd)>td,.table-striped tbody>tr:nth-child(odd)>th{background-color:#f9f9f9}.table-hover tbody tr:hover>td,.table-hover tbody tr:hover>th{background-color:#f5f5f5}table td[class*="span"],table th[class*="span"],.row-fluid table td[class*="span"],.row-fluid table th[class*="span"]{display:table-cell;float:none;margin-left:0}.table-hover tbody tr:hover>td,.table-hover tbody tr:hover>th{background-color:#f5f5f5}.btn-info{color:#fff;background-color:#49afcd;*background-color:#2f96b4;background-repeat:repeat-x}.btn-info:hover,.btn-info:focus,.btn-info:active,.btn-info.active,.btn-info.disabled,.btn-info[disabled]{color:#fff;background-color:#2f96b4;*background-color:#2a85a0}.btn-info:active,.btn-info.active{background-color:#24748c 9}.btn{padding:10px 20px;text-decoration:none;font-size:14px;margin:auto;border:0}.btnn{text-align:center}.boom{margin-top:40px;margin-bottom:90px}.ico-success,.ico-error{vertical-align:-1px;*vertical-align:middle;margin-right:6px;display:inline-block;width:16px;height:16px;line-height:9;overflow:hidden}.ico-success{background:url(/examples/kyominiblog/Blog/Install/Style/img/ok.png) no-repeat 0 0}.ico-error{background:url(/examples/kyominiblog/Blog/Install/Style/img/error.png) no-repeat 0 0}select,input{width:200px;height:26px;border:#CCC solid 1px;font-family:"微軟雅黑";font-size:14px}input{padding:0 0 0 10px}
</style>
<script type="text/javascript" src="/examples/kyominiblog/Blog/Install/Style/js/jquery-1.11.0.min.js"></script>
</head>

<div class="top"></div>
<h1><span>第一步：</span>創建數據庫</h1>
<hr>
<div class="content">
  <form action="/examples/kyominiblog/index.php/install/step2" method="post">
    <table class="table table-hover">
      <h2><img src="/examples/kyominiblog/Blog/Install/Style/img/dian.jpg" >數據庫連接信息 :</h2>
      <thead>
        <tr>
          <th width="36%">配置</th>
          <th width="30%">說明</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><select name="db[]">
              <option>mysql</option>
              <option>mysqli</option>
            </select></td>
          <td> 數據庫連接類型，服務器支持的情況下建議使用mysqli</td>
        </tr>
        <tr>
          <td><input type="text" name="db[]" value="127.0.0.1"></td>
          <td>數據庫服務器，數據庫服務器IP，一般爲127.0.0.1</td>
        </tr>
        <tr>
          <td><input type="text" name="db[]" value="mini"></td>
          <td> 數據庫名</td>
        </tr>
        <tr>
          <td><input type="text" name="db[]" value=""></td>
          <td> 數據庫用戶名</td>
        </tr>
        <tr>
          <td><input type="password" name="db[]" value=""></td>
          <td> 數據庫密碼</td>
        </tr>
        <tr>
          <td><input type="text" name="db[]" value="3306"></td>
          <td> 數據庫端口，數據庫服務連接端口，一般爲3306</td>
        </tr>
        <tr>
          <td><input type="text" name="db[]" value="Mi_"></td>
          <td> 數據表前綴，同一個數據庫運行多個系統時請修改爲不同的前綴</td>
        </tr>
      </tbody>
    </table>
   
    
  </form>
</div>
<div class="btnn"> <a class="btn btn-info" href="<?php echo U('/Install/step1');?>">上一步</a>
  <button id="submit" class="btn btn-info">下一步</button id="submit">
  <script type="text/javascript">
    $("#submit").click(function(){$("form").submit()});
    </script> 
</div>
<hr class="boom">
</body></html>