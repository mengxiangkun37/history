<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
	<base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/common.css">
	<link rel="stylesheet" href="assets/css/login.css">
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

<div class="login" >
	<form action="<?php echo site_url("user/do_login")?>" method="post">
	<div class="login_one">账号：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name='name'  id="name"><br></div>
	<div class="login_two">密码：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name='pass' id="pass"><br></div>
    <input class="btn btn-primary" type="submit" value="用户登录" id="login_btn">
	</form>
</div>
	<script type="text/javascript" charset="utf-8">
		$(function(){
			$("#login_btn").on('click',function(){
				var name = $("#name").val();
				var pass = $("#pass").val();
				if(name!=''&&pass!=''){
					return true;
				}else{
					alert("请输入账号和密码！");
					return false;
				}
			})
			
			
		})
	</script>



</body>
</html>