<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
	<base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/common.css">
	<link rel="stylesheet" href="assets/css/reg.css">
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="top">
	<nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="user/index">历史文化</a>
    </div>
    <div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="user/index">首页</a></li>
            <li><a href="user/user">考证文物</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    历史朝代 <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <?php						
						foreach($index as $v){
					?>
                    <li><a href="user/lists?id=<?php  echo $v->cid;?>"><?php echo $v->cname;?></a></li>
                    <?php						
						}
					?>
                </ul>
            </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    资料分类 <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <?php						
						foreach($index_zl as $v){
					?>
                    <li><a href="user/lists?zid=<?php  echo $v->zid;?>"><?php echo $v->zname;?></a></li>
                    <?php						
						}
					?>
                </ul>
            </li>
        </ul> 
    </div>
   	    <ul class="nav navbar-nav navbar-right"> 
            <li><a href="user/reg"><span class="glyphicon glyphicon-user"></span> 注册</a></li> 
            <li><a href="user/login"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li> 
        </ul> 
	</div>
</nav>
</div>

<div class="reg">
	<form action="<?php echo site_url("user/do_reg")?>" method="post" >
	<div class="reg_one">账号：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" id="name1"><br></div>
    <div>姓名：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="zname"><br></div>
	<div>密码：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" id="p1" name="pass1"><br></div>
	<div class="reg_three">确认密码：<input type="password" id="p2" name="pass2"><br></div>
	<input class="btn btn-primary" type="submit" value="注册账号" id="reg_btn">
	</form>
</div>


	<script type="text/javascript" charset="utf-8">
		$(function(){
		$('#p2').blur(function(){
			
			var pass=$('#p1').val();
			console.log(pass);
			var rpass=$('#p2').val();
			if(pass!=rpass){
				var oSpan=$('<span style="font-size:11px;" id="s1">密码不一致</span>');
				$(this).after(oSpan);
			}
		});
		
		
		$('#p2').focus(function(){
			$('#s1').remove();
		});
		
		$('#name1').blur(function(){
			var name=$(this).val();
			if(name==""){
				var oSpan=$('<span style="font-size:11px;" id="u1">账号不能为空</span>');
				$('#name1').after(oSpan);
			}else{
					$.post('<?php echo site_url('user/check')?>','uemail='+name,function(data){				
				if(data=='success'){
					var oSpan=$('<span style="font-size:11px;" id="u1">该用户已注册</span>');
					$('#name1').after(oSpan);
				}			
			})
		
			}
		
		});
		 $('#name1').focus(function(){
			$('#u1').remove();
		 });
		
		
			$("#reg_btn").on("click",function(){
				var name=$("#name1").val();
				var pass=$('#p1').val();
				var rpass=$('#p2').val();
				if(pass!=""&&rpass!=""&&name!=""){
					return true;
				}else{
					alert('请填写完整注册信息！')
					return false;
				}
			})
	})
	</script>




</body>
</html>