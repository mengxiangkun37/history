<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>各朝各代</title>
	 <base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/common.css">
	<link rel="stylesheet" href="assets/css/search.css">
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
     <div>
        <form class="navbar-form navbar-left search" role="search" method="post" action="<?php echo site_url("user/search")?>">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
        </form>
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
	<div class="left_con">
		<?php
			foreach ($goods as $v) {
		?>
		<div class="x_con">
			<div class="img_div">
				<a href="user/details?id=<?php echo $v->wid;?>"><img src="assets/images/<?php echo $v->wpic;?>" alt=""></a>
			</div>
			<div class="cont">
				<div class="c_title">
					<a href="user/details?id=<?php echo $v->wid;?>"><?php echo $v->wtitle;?></a>
				</div>
				<?php
					foreach ($v->aa as $vv) {
				?>
				<div class="c_sum">
					<span>作者：<?php echo $vv->uname;?></span>
				</div>
				<?php
					}
				?>
				<div class="c_sum">
					<span>内容：<?php echo $v->wcont?></span>
				</div>
				<div class="c_foot">
					<a href="user/details?id=<?php echo $v->wid;?>">[查看全文...]</a>
				</div>
			</div>
		</div>
		<?php
			}
		?>
	</div>

	<div class="right_con">
		<div class="r_con">
		<div class="tm">
			<span>最受欢迎文章</span>
		</div>
			<div class="r_wrapper">
				<ul>
				<?php
					foreach ($hits as $key) {
				?>
					<li><div><?php echo $key->hits;?></div><a href="user/details?id=<?php echo $key->wid;?>">[图文]<?php echo $key->wtitle?></a></li>
				<?php
					}
				?>
				</ul>
			</div>
		</div>
	</div>
</div>
	
</div>




</body>
</html>
