
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>未登录首页</title>
    <base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/common.css">
	<link rel="stylesheet" href="assets/css/banner.css">
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
						foreach($unindex as $v){
					?>
                    <li><a href="user/lists?id=<?php echo $v->cid;?>"><?php echo $v->cname;?></a></li>
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
            <li><a href="user/reg"><span class="glyphicon glyphicon-user"></span> 注册</a></li> 
            <li><a href="user/login"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li> 
        </ul> 
	</div>
</nav>
</div>

<div id="myCarousel" class="carousel slide">
    <!-- 轮播（Carousel）指标 -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>   
    <!-- 轮播（Carousel）项目 -->
    <div class="carousel-inner">
        <div class="item active">
            <a><img src="assets/images/s6.jpg" alt="First slide"></a>
            <div class="carousel-caption">山水图</div>
        </div>
        <div class="item">
           <a><img src="assets/images/s2.jpeg"  alt="Second slide"></a>
            <div class="carousel-caption">清明上河图</div>
        </div>
        <div class="item">
            <a><img src="assets/images/s1.jpg" alt="Third slide"></a>
            <div class="carousel-caption">名师古画</div>
        </div>
    </div>
    <!-- 轮播（Carousel）导航 -->
    <a class="carousel-control left" href="#myCarousel" 
        data-slide="prev">&lsaquo;
    </a>
    <a class="carousel-control right" href="#myCarousel" 
        data-slide="next">&rsaquo;
    </a>
</div>

<div class="container">
<div class="wrapper">
	<div class="con1">
	  	<h2>热门朝代</h2>
	  	<div>
	  		<div>
				<div class="content">
		<div class="tit">
			<h3>夏商西周</h3>
		</div>
		<div class="con">
			<ul>
				 <?php						
						foreach($wz1 as $wz){
					?>
					 <?php						
						foreach($wz->a1 as $a1){
					?>
				<li><a href="user/details?id=<?php  echo $wz->wid;?>"><?php  echo $a1->uname;?>：<?php  echo $wz->wtitle;?></a></li>
				   <?php						
						}
					?>
					 <?php						
						}
					?>
			</ul>
		</div>
	</div>
			</div>
				<div>
				<div class="content">
		<div class="tit">
			<h3>春秋战国</h3>
		</div>
		<div class="con">
			<ul>
				 <?php						
						foreach($wz2 as $wz){
					?>
					 <?php						
						foreach($wz->a2 as $a2){
					?>
				<li><a href="user/details?id=<?php  echo $wz->wid;?>"><?php  echo $a2->uname;?>：<?php  echo $wz->wtitle;?></a></li>
				   <?php						
						}
					?>
					 <?php						
						}
					?>
			</ul>
	</div>
	</div>
			</div>
			<div>
				<div class="content">
		<div class="tit">
			<h3>三国纷争</h3>
		</div>
		<div class="con">
			<ul>
				 <?php						
						foreach($wz3 as $wz){
					?>
					 <?php						
						foreach($wz->a3 as $a3){
					?>
				<li><a href="user/details?id=<?php  echo $wz->wid;?>"><?php  echo $a3->uname;?>：<?php  echo $wz->wtitle;?></a></li>
				   <?php						
						}
					?>
					 <?php						
						}
					?>
			</ul>
		</div>
	</div>
			</div>
		
			<div>
				<div class="content">
		<div class="tit">
			<h3>大唐盛世</h3>
		</div>
		<div class="con">
			<ul>
				 <?php						
						foreach($wz4 as $wz){
					?>
					 <?php						
						foreach($wz->a4 as $a4){
					?>
				<li><a href="user/details?id=<?php  echo $wz->wid;?>"><?php  echo $a4->uname;?>：<?php  echo $wz->wtitle;?></a></li>
				   <?php						
						}
					?>
					 <?php						
						}
					?>
			</ul>
	</div>
	</div>
			</div>
	  	</div>
	</div>
	<div class="con2">
	  <h2>图说历史</h2>
	  <?php 
	  	foreach ($tsls1 as $key) {
	  ?>
	  <div class="con2_img1">
	  	<div class="img1">
			<a href="user/details?id=<?php  echo $key->wid;?>"><img src="assets/images/<?php echo $key->wpic;?>" /></a>
		  </div>
		<p><?php  echo mb_strcut($key->wtitle,0,50,"utf-8");?></p>
	  </div>
	   <?php
		}
	  ?> 
	  <?php 
	  	foreach ($tsls as $key) {
	  ?>
	   <div class="con2_img2">
	  	<div class="img2">
			<a href="user/details?id=<?php  echo $key->wid;?>"><img src="assets/images/<?php echo $key->wpic;?>" /></a>
		  </div>
		<p><?php  echo mb_strcut($key->wtitle,0,40,"utf-8");?></p>
	  </div>
	  <?php
		}
	  ?> 
	</div>
	<div class="con3">
	  <h2>友情链接</h2>
	  <div class="con3_content">
		<ul>
			<li><a href="http://fo.lishichunqiu.com/">佛学春秋网</a></li>
			<li><a href="http://guoxue.lishichunqiu.com/">国学春秋网</a></li>
			<li><a href="http://zhongyi.lishichunqiu.com/">中医春秋网</a></li>
			<li><a href="http://www.lssdjt.com/">历史上的今天</a></li>
			<li><a href="http://www.ilishi.com/">爱历史</a></li>
			<li><a href="http://www.hxlsw.com/">浩学历史网</a></li>
			<li><a href="http://www.lsfyw.net/portal.php">历史风云网</a></li>
			<li><a href="http://www.shuhai.com/">书海小说网</a></li>
			<li><a href="http://www.lishichunqiu.com/">历史春秋网</a></li>
			<li><a href="http://www.lishi.net/">历史网</a></li>
		</ul>
	  </div>
	</div>
</div>	
</div>

<div class="footer">
			<div class="wrapperr">
				
			</div><br><br>
</div>

</body>
</html>