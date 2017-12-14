<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
	<base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/common.css">
	<link rel="stylesheet" href="assets/css/admin_sx.css">
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="top">
	<nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid">
    <div class="navbar-header">
    	<a class="navbar-brand" href="user/admin_user">历史文化</a> 
    </div>
    <div>
        <ul class="nav navbar-nav">
        </ul> 
    </div>
   	    <ul class="nav navbar-nav navbar-right"> 
            <li><a href="user/admin_user"><span class="glyphicon glyphicon-log-in">返回</span></a></li> 
        </ul> 
	</div>
</nav>
</div>
<div class="sx" >
	
	<form action="<?php echo site_url("user/do_admin_sx")?>" method="post">
			<span>发送内容：</span>
			<input type="hidden" name="uid" value="<?php echo $admin_sx->uid?>" id="some_name"/>
			<textarea name="scont" id="" cols="40" rows="8"></textarea>
			<input type="submit" name="some_name" value="发送" id="some_name"/>
	</form>
	
</div>




</body>
</html>