<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>详情页面</title>
	 <base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/common.css">
	<link rel="stylesheet" href="assets/css/details.css">
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
            <?php
				if($this->session->userdata('logged_in') == 'TRUE'){
					echo '<li><a href="user/user"><span class="glyphicon glyphicon-user">'.$this->session->userdata('name').'</span></a></li>' ;
           			echo '<li><a href="user/unindex"><span class="glyphicon glyphicon-log-in">[退出]</span></a></li>';
           		}else{
           			echo '<li><a href="user/reg"><span class="glyphicon glyphicon-user">注册</span></a></li>' ;
           			echo '<li><a href="user/login"><span class="glyphicon glyphicon-log-in">登录</span></a></li>';
           		}	
			?>
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
		<hr>

		<div class="pl">
			<form action="<?php echo site_url("user/do_pl")?>" method='post'>
				<h3>点评：</h3>
				<input type="hidden" name="wid" value="<?php echo $key->wid?>" id="wid"/>
				<textarea name="pcont" id="pcont" cols="40" rows="8"></textarea>
				<input type="submit" id='p_btn' value="提交评论">
			</form>
		</div>
</div>


	<div class="right_con">
		<div class="r_con">
		<div class="tm">
			<span>本文作者文章</span>
		</div>
			<div class="r_wrapper">
				<ul>
					<?php
						foreach ($key->aa as $aaa) {
					?>
					<li><div><?php echo $aaa->hits?></div><a href="user/details?id=<?php echo $aaa->wid;?>">[图文]<?php echo $aaa->wtitle?></a></li>
					<?php
						}
					?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php
	}
?>
	
</div>

	<script type="text/javascript" charset="utf-8">
		$(function(){
			$("#p_btn").on("click",function(){
				var name = $("#pcont").val();
				if(name!=''){
					return true;
				}else{
					alert("请输入评论信息！");
					return false;
				}
			})
		})
	</script>


</body>
</html>
