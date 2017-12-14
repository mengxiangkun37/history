<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>详情页面</title>
	 <base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/common.css">
	<link rel="stylesheet" href="assets/css/admin_details.css">
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
             <li><a href="user/admin_user"><span class="glyphicon glyphicon-log-in"></span>[返回]</a></li> 
        </ul> 
	</div>
</nav>
</div>

<div class="content">
<div class="container">
	<?php
		foreach ($goods as $key) {
	?>
	<div class="left_con">
		<div class="l_title">
			<h3 align="center"><b><?php echo $key->wtitle?></b></h3>
		</div>
		<div class="l_img">
			<img src="assets/images/<?php echo $key->wpic?>" alt="">
		</div>
		<div class="l_con">
			<p>
				<?php echo $key->wcont?>
			</p>		
		</div>
		<hr>
		<div class="user_pl">
			<h3 align="center">用户评论区</h3>
			<?php
				foreach ($pl as $pl) {
			?>
			<?php
				foreach ($pl->aaa as $pl1) {
			?>
			<span>评论人：</span>
			<span><?php echo $pl1->uname?></span><br>
			<?php
				}
			?>
			<span>评论时间：</span>
			<span><?php echo $pl->ptime?></span><br>
			<span>评论内容：</span>
			<span><?php echo $pl->pcont?></span><br>
			<br><br>
			<?php
				}
			?>
		</div>	
</div>
</div>
<?php
	}
?>
	
</div>




</body>
</html>
