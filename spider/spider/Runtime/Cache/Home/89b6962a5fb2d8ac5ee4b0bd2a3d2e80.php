<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>reg for ajax</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link href="http://flat-ui.com/bootstrap/css/bootstrap.css" rel="stylesheet"> -->
	<link href="http://cdn.bootcss.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
	<!-- <link href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" rel="stylesheet"> -->
	<link href="http://flat-ui.com/css/flat-ui.css" rel="stylesheet">
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
					<div class="span12">
						<h1>User Info</h1>
					</div>
					<hr/>
			</div>
		</div>
	</header>
	<div class="navbar-fixed-bottom alert btn-large btn-inverse">
		<div class="container">	
			<div class="row">
				
				<form id="addUser" method="post" action="/spider/index.php/Home/Reg2/add">
					<div class="span3">
						<input class="span3" type="text"  id="RegName" name="Name" placeholder="Enter Username">
					</div>
					<div class="span3">
						<input class="span3" type="text" id="RegNickName" name="NickName" placeholder="Enter Nickname">
					</div>
					<div class="span3">
						<input class="span3" type="password" id="RegPassword" name="Password" placeholder="Enter Password">
					</div>
					<div class="span3 pull-right">
						<button class="btn btn-large btn-block btn-primary" type="submit">submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
		
			
	
	<div class="container">	
		<div class="row">
			
				<div class="span12">
					
						<table class="table table-condensed">
							<thead>
								<tr>
									<th>#</th>
									<th>User Name</th>
									<th>Nick Name</th>
									<th>Password</th>
									<th>Create Time</th>
									<th>Operation</th>
								</tr>
							</thead>
							<tbody id="userInfo">
								<form id="userInfoDetails" action="#">
									<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
										<td><?php echo ($data["id"]); ?></td>
										<td><?php echo ($data["name"]); ?></td>
										<td><?php echo ($data["nickname"]); ?></td>
										<td><?php echo ($data["password"]); ?></td>
										<td><?php echo ($data["createtime"]); ?></td>
										<td>
											<a class="edit btn btn-default" data-url="/spider/index.php/Home/Reg2/update/id/<?php echo ($data["id"]); ?>" href="#editModal" role="button" data-toggle="modal">Edit</a>&nbsp;<a class="btn btn-danger del" data-url="/spider/index.php/Home/Reg2/delete/id/<?php echo ($data["id"]); ?>" href="#conform" role="button" data-toggle="modal">Delete</a>
										</td>
									</tr><?php endforeach; endif; else: echo "" ;endif; ?>
								</form>
							</tbody>
						</table>
					
				</div>

			
		</div>
	</div>

<!-- Form Modal -->
<div id="editModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="editModalLabel">Update User Info</h3>
  </div>
  <div class="modal-body">
    <form id="updateUserInfo" action="#" method="post">
    	<div class="form-control">
			<p id="updateFormUserID">ID:#id</p>
    	</div>
    	<div class="form-control">
    		<label for="NickName">Update Nickname</label>
    		<input type="text" name="NickName" id="NickName" placeholder="Enter Nickname">
    	</div>
    	<div class="form-control">
    		<label for="Password">Update Password</label>
    		<input type="password" name="Password" id="Password" placeholder="Enter Password">
    	</div>
    </form>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button id="saveUserInfoBtn" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Save changes</button>
  </div>
</div>

<!-- Conform Modal -->
<div id="conform" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="ConformLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="ConformLabel">Delete it?</h3>
  </div>
  <div class="modal-body">
    <p>If you conform,it will be deleted!</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button id="conformBtn" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">OK</button>
  </div>
</div>
<br/><br/><br/><br/><br/><br/>

	<script src="http://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/jquery.form/3.50/jquery.form.min.js"></script>
	<script src="http://cdn.bootcss.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	<script>
		(function(){
		
			
	        $('#addUser').submit(function(){ 
	        	var t = null;
	        	var options = { 
		            beforeSubmit:  checkForm,  //提交前处理
		            success:       complete,  //处理完成
		            dataType:  'json', 
		        }; 
	        	
	            $(this).ajaxSubmit(options); 
	            
	            


	            function checkForm(){
		            if( '' == $.trim($('#RegName').val())){
		            	var msg = '<div class="span12 msg-box">'+
										'<p class="btn btn-warning btn-block" id="result" data-dismiss="alert">标题不能为空</p>'+
										'<br/>'+
								  '</div>';
						if(!$('.msg-box')){
							$('#addUser').parent().prepend(msg);
							
							//clearTimeout(t);
						}else{
							$("#result").alert('close');
							$('#addUser').parent().prepend(msg);
							
							//clearTimeout(t);
							
						}
		                //$('#result').html('标题不能为空').toggleClass('hide');
		                

		                return false;
		            }

		        }
		        function complete(data){
		        	if(data.status==0){
			        	var msg = '<div class="span12 msg-box">'+
										'<p class="btn btn-warning btn-block" id="result" data-dismiss="alert">'+data.info+'</p>'+
										'<br/>'+
								  '</div>';
		        		if(!$('.msg-box')){
							$('#addUser').parent().prepend(msg);
							//t=setTimeout('$("#result").alert("close")',3000);
							//clearTimeout(t);
						}else{
							$("#result").alert('close');
							$('#addUser').parent().prepend(msg);
							//t=setTimeout('$("#result").alert("close")',3000);
							//clearTimeout(t);
						}

			        	//$('#result').html(data.info).show();
		        	}else{
		        		var msg = '<div class="span12 msg-box">'+
										'<p class="btn btn-success btn-block" id="result" data-dismiss="alert">注册成功</p>'+
										'<br/>'+
								  '</div>';
		        		if(!$('.msg-box')){
							$('#addUser').parent().prepend(msg);
							//t=setTimeout('$("#result").alert("close")',3000);
							//clearTimeout(t);
						}else{
							$("#result").alert('close');
							$('#addUser').parent().prepend(msg);
							//t=setTimeout('$("#result").alert("close")',3000);
							//clearTimeout(t);
						}

		        		var userInfo='<tr>'+
		        					 '<td>'+data.id+'</td>'+
									 '<td>'+data.name+'</td>'+
									 '<td>'+data.nickname+'</td>'+
									 '<td>'+data.password+'</td>'+
									 '<td>'+data.createtime+'</td>'+
									 '<td>'+
										 '<a class="edit btn btn-default" href="#editModal" role="button" data-toggle="modal">Edit</a>&nbsp;'+
										 '<a data-url="/spider/index.php/Home/Reg2/delete/id/'+data.id+'" href="#Conform" role="button" data-toggle="modal" class="btn btn-danger del">Delete</a>'+
									 '</td>'+
									 '</tr>'
						$('#userInfo').prepend(userInfo);
		        	}
		        }
	            
	            return false;
	        }); 

	        
	        $("#userInfo").on('click','.del', function(){
	        
	        	
	        	var _this=$(this);
	        	var _url=_this.attr('data-url');
				
				$("#conformBtn").unbind('click');
	        	$('#conformBtn').click(function(){
	        		

	        		var options = { 
			            success:       removeDone(_this),  
			            url:           _url,
			            dataType:      'json', 
			        }; 

		            $('#userInfoDetails').ajaxSubmit(options); 

	        	});

	        }); 

	        $("#userInfo").on('click','.edit', function(){
	        	
	        	var _this=$(this);
	        	var _url=_this.attr('data-url');

        		$('#NickName').val(_this.parent().prevAll().eq(2).text());
        		$('#updateFormUserID').text('ID:'+_this.parent().prevAll().eq(4).text());
        		
	        	$("#saveUserInfoBtn").unbind('click');
	        	$('#saveUserInfoBtn').click(function(){
	        		var options = { 
			            success:       updateDone,  
			            url:           _url,
			            dataType:      'json', 
			            clearForm:     true,
			            resetForm:     true,
			        };
			        
			        $('#updateUserInfo').ajaxSubmit(options); 
	        	});
	        	
	        	function updateDone(data){
					_this.parent().prevAll().eq(2).text(data.NickName);
					_this.parent().prevAll().eq(1).text(data.Password);
					_this.parent().prevAll().eq(0).text(data.CreateTime);
				}
	        });
	        
		})();


		



		function removeDone(_this){

			$("#conform").on('hidden',function(){ 
				_this.parent().parent().remove();
			}); 
			
		}

		function closeTips(){
			$("#result").alert("close");
		}

		
        	
       
	</script>
</body>
</html>