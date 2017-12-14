<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员页面</title>
	 <base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/common.css">
	<link rel="stylesheet" href="assets/css/admin_user.css">
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
     <div id='search'>
        <form class="navbar-form navbar-left search" role="search"  method="post" action="<?php echo site_url("user/admin_search")?>">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
        </form>
   	 </div>
   	    <ul class="nav navbar-nav navbar-right"> 
            <li><a href="user/admin_user"><span class="glyphicon glyphicon-user"><?php echo $this->session->userdata('name')?></span></a></li> 
            <li><a href="user/admin_login"><span class="glyphicon glyphicon-log-in"></span>[退出]</a></li> 
        </ul> 
	</div>
</nav>
</div>

<div class="content">
<div class="container">
	<div class="left_con">
		<ul id="menu">
        <li>
            <h3>用户管理</h3>
            <ul class="sub-menu">
                <li id="l1"><p>用户信息</p></li>
            </ul>
        </li>
        <li>
            <h3>文献管理</h3>
            <ul class="sub-menu">
                <li id="l4"><p>文献审核</p></li>
            </ul>
        </li>
   	 </ul>

	</div>

	<div class="right_con">
		<div id="d1">
			<?php						
				foreach($user as $v){
			?>
			<div class='d1'>
				<span>用户：</span>
				<span><?php echo $v->uemail;?></span><br>
				<span>姓名：</span>
				<span><?php echo $v->uname;?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span>性别：</span>
				<span><?php echo $v->usex;?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span>年龄：</span>
				<span><?php echo $v->uage;?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span>住址：</span>
				<span><?php echo $v->uaddress;?></span>
				<a href="user/admin_sx?id=<?php echo $v->uid;?>" class='a1'><span>[发送消息]</span></a>
				<a href="user/admin_user"  data='<?php echo $v->uid;?>' class='delete_user'><span>[删除用户]</span></a>
			</div>
			 <?php						
				}
			 ?>
		</div>
		<div id="d4" >
			<?php						
				foreach($goods as $v){
			?>
			 <div>
	            <div class="x_con">
	            <div class="img_div">
	                <a href=""><img src="assets/images/<?php echo $v->wpic;?>" alt=""></a>
	            </div>
	            <div class="cont">
	                <div class="c_title">
	                    <a href="#"><?php echo $v->wtitle;?></a>
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
	                    <span id='span'>内容：<?php echo $v->wcont?></span>
	                </div>
	                <div class="c_foot">
	                    <a href="user/admin_details?id=<?php echo $v->wid;?>">[查看全文...]</a>
	                    <a href="user/admin_user"  data='<?php echo $v->wid;?>' class='delete_wz'><span>[删除文献]</span></a>
	                </div>
            	</div>  
       		 </div>
			</div> 
			 <?php						
				}
			 ?>
	</div>
	
</div>
	
</div>


<script>
	  	var oL1 = document.getElementById('l1');      
        var oL4 = document.getElementById('l4');
        var oD1 = document.getElementById('d1');      
        var oD4 = document.getElementById('d4');      
        	oL1.className = 'li';
            oD1.className = '';      
            oD4.className = 'selected';
            oL1.onclick =function () {
            	oL1.className = 'li';
            	oL4.className = '';
            	oD1.className = '';            	
            	oD4.className = 'selected';
            }            
            oL4.onclick =function () {
            	oL1.className = '';
            	oL4.className = 'li';
            	oD1.className = 'selected';
            	oD4.className = '';
            }
</script>
<script type="text/javascript" charset="utf-8">
		$(function(){
			$(".delete_user").on("click",function(){
				var aa =$(this).attr("data");
				$.post('<?php echo site_url('user/do_delete_user')?>','uid='+aa,function(data){				
				if(data=='success'){
					alert('用户删除成功！');
				}	
				})
			})
			
			$(".delete_wz").on("click",function(){
				var aa =$(this).attr("data");
				$.post('<?php echo site_url('user/do_delete_wz')?>','wid='+aa,function(data){				
				if(data=='success'){
					alert('文献删除成功！');
				}	
				})
			})
			
		})
	
</script>

</body>
</html>