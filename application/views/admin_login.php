<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员登录</title>
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
    	<a class="navbar-brand">历史文化</a>
    </div>
    <div>
        <ul class="nav navbar-nav">
          
        </ul> 
    </div>
   	    <ul class="nav navbar-nav navbar-right"> 
            
        </ul> 
	</div>
</nav>
</div>

<div class="login">
	<form action="<?php echo site_url("user/do_admin_login")?>" method="post">
	<div class="login_one">账号：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="aname" ><br></div>
	<div class="login_two">密码：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="apass"><br></div>
    <input class="btn btn-primary" type="submit" value="管理员登录" id="login_btn1">
	</form>
</div>




</body>
</html>