<?php
	if($this->session->userdata('logged_in') != 'TRUE'){
		 echo "<script>alert('请登录！');</script>";
		 header("Refresh:0;url=login");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人页面</title>
	 <base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/common.css">
	<link rel="stylesheet" href="assets/css/user.css">
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
            <li><a href="user/user"><span class="glyphicon glyphicon-user"></span><?php echo $this->session->userdata('name')?></a></li> 
            <li><a href="user/unindex"><span class="glyphicon glyphicon-log-in"></span>[退出]</a></li> 
        </ul> 
	</div>
</nav>
</div>

<div class="content">
<div class="container">
	<div class="left_con">
		<ul id="menu">
        <li>
            <h3>个人信息</h3>
            <ul class="sub-menu">
                <li id="l1"><p>修改资料</p></li>
                <li id="l2"><p>修改密码</p></li>
                <li id="l5"><p>系统消息</p></li>
                <li id="l7"><p>注销账户</p></li>
            </ul>
        </li>
        <li>
            <h3>文献管理</h3>
            <ul class="sub-menu">
                <li id="l3"><p>上传文献</p></li>
                <li id="l4"><p>我的文献</p></li>
                <li id="l6"><p>评论管理</p></li>
            </ul>
        </li>
   	 </ul>

	</div>

	<div class="right_con">
		<div id="d1">
			<?php						
			foreach($user as $v){
			?>
			<form action="<?php echo site_url("user/do_user")?>" method="post">
				<span>姓名：</span>
				<input type="text" name="uname" value="<?php echo $v->uname;?>"><br>
				<span>性别：</span>
				<input type="text" name="usex" value="<?php echo $v->usex;?>"><br>
				<span>年龄：</span>
				<input type="text" name="uage" value="<?php echo $v->uage;?>"><br>
				<span>住址：</span>
				<input type="text" name="uaddress" value="<?php echo $v->uaddress;?>"><br>
				<input type="submit" value="修改" class="sub">
			</form>
			<?php						
			}
			?>
		</div>
		<div id="d2">
			<form action="<?php echo site_url("user/do_user_pass")?>" method="post">
				<span>旧密码：&nbsp;&nbsp;&nbsp;</span>
				<input type="password" name="oldpass" id='oldpass'><br>
				<span>更改密码：</span>
				<input type="password" name="newpass" id='newpass'><br>
				<span>确认密码：</span>
				<input type="password" name="newrpass" id='newrpass'>
				<input type="submit" value="修改" class="sub" id="sub">
			</form>
		</div>
		<div id="d3">
			<form action="<?php echo site_url("user/do_upload")?>" method="post" enctype="multipart/form-data" >
				<span>标题：</span>
				<input type="text" name="wtitle" id="wtitle" ><br>
				<span>朝代：</span>
				<select name="cid">
					<?php						
						foreach($user1 as $v){
					?>
 					 <option value ="<?php echo $v->cid;?>"><?php echo $v->cname;?></option>
 					 <?php						
						}
					?>
				</select><br>
				<span>分类：</span>
				<select name="zid">
					<?php						
						foreach($user11 as $v){
					?>
 					 <option value ="<?php echo $v->zid;?>"><?php echo $v->zname;?></option>
 					 <?php						
						}
					?>
				</select><br>
				<span>文件：</span>
				<input type="file" name="file" value="" id="c_pic"  /><br>
				<span>内容：</span><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="wcont" id="wcont" cols="40" rows="8"></textarea><br>
				<input type="submit" value="上传" class="sub" id="shangchuan">
			</form>
		</div>

		<div id="d4" >
			<?php						
					foreach($user2 as $v){
			?>
			<div>
			  <div class="x_con">
			<div class="img_div">
				<a href="user/details?id=<?php echo $v->wid;?>"><img src="assets/images/<?php echo $v->wpic;?>" alt=""></a>
			</div>
			<div class="cont">
				<br>
				<div class="c_title">
					<a href="user/details?id=<?php echo $v->wid;?>"><?php echo $v->wtitle;?></a>
				</div>
				<br><br>
				<div class="c_sum">
					<span><?php echo $v->wcont;?></span>
				</div>
				
				<div class="c_foot">
					<a href="user/details?id=<?php echo $v->wid;?>">[查看全文...]</a>
					<a href="user/user"  data='<?php echo $v->wid;?>' class='delete'>[删除文献]</a>
				</div>
			</div>
		</div>
			</div>
			<?php						
				}
			?>	
		</div> 
		
		<div id="d5">
			<?php						
					foreach($sx as $v){
			?>
			<div class="d5">
				<span>发送者：</span>
				<?php						
					foreach($v->a1 as $vv){
				?>
				<span><?php echo $vv->aname;?></span>|
				<?php						
					}
				?>	
				<span>发送时间：</span>
				<span><?php echo $v->stime;?></span><br>
				<span>内容：</span>
				<span><?php echo $v->scont;?></span><br>
				<span><a href="user/user"  data='<?php echo $v->sid;?>' class='delete_sx'>[删除消息]</a></span>			
			</div>
			<?php						
				}
			?>	
		</div>
		<div id="d6">
			<?php						
				foreach($pl as $v){
			?>
			<?php						
				foreach($v->a2 as $vv){
			?>
			<div class="d6">
				<span>文章：</span>
				<span><?php echo $v->wtitle;?></span>|	
				<?php						
					foreach($vv->a3 as $vvv){
				?>
				<span>评论人：</span>
				<span><?php echo $vvv->uname;?></span>|
				<?php						
					}
				?>	
				<span>评论时间：</span>
				<span><?php echo $vv->ptime;?></span><br>
				<span>评论内容：</span>
				<span><?php echo $vv->pcont;?></span><br>
				<span><a href="user/user"  data='<?php echo $vv->pid;?>' class='delete_pl'>[删除评论]</a></span>			
			</div>
			<?php						
				}
			?>	
			<?php						
				}
			?>
		</div>
		<div id="d7">
			<?php						
			foreach($user as $v){
			?>
				<span>姓名：</span>
				<span><?php echo $v->uname;?></span><br>
				<span>性别：</span>
				<span><?php echo $v->usex;?></span><br>
				<span>年龄：</span>
				<span><?php echo $v->uage;?></span><br>
				<span>住址：</span>
				<span><?php echo $v->uaddress;?></span><br>
				<a href="user/unindex" data="<?php echo $v->uid;?>" id="zhuxiao">注销账号</a>
			<?php						
			}
			?>
		</div>
	</div>
	
</div>
	
</div>


<script>
	  	var oL1 = document.getElementById('l1');
        var oL2 = document.getElementById('l2');
        var oL3 = document.getElementById('l3');
        var oL4 = document.getElementById('l4');
        var oL5 = document.getElementById('l5');
        var oL6 = document.getElementById('l6');
        var oL7 = document.getElementById('l7');
        
        var oD1 = document.getElementById('d1');
        var oD2 = document.getElementById('d2');
        var oD3 = document.getElementById('d3');
        var oD4 = document.getElementById('d4');
        var oD5 = document.getElementById('d5');
        var oD6 = document.getElementById('d6');
        var oD7 = document.getElementById('d7');
        	oL1.className = 'li';
            oD1.className = '';
            oD2.className = 'selected';
            oD3.className = 'selected';
            oD4.className = 'selected';
            oD5.className = 'selected';
            oD6.className = 'selected';
            oD7.className = 'selected';

            oL1.onclick =function () {
            	oL1.className = 'li';
            	oL2.className = '';
            	oL3.className = '';
            	oL4.className = '';
            	oL5.className = '';
            	oL6.className = '';
            	oD1.className = '';
            	oL7.className = '';
            	oD2.className = 'selected';
           		oD3.className = 'selected';
            	oD4.className = 'selected';
            	oD5.className = 'selected';
            	oD6.className = 'selected';
            	oD7.className = 'selected';
            }
            oL2.onclick =function () {
            	oL1.className = '';
            	oL2.className = 'li';
            	oL3.className = '';
            	oL4.className = '';
            	oL5.className = '';
            	oL6.className = '';
            	oL7.className = '';
            	oD1.className = 'selected';
            	oD2.className = '';
           		oD3.className = 'selected';
            	oD4.className = 'selected';
            	oD5.className = 'selected';
            	oD6.className = 'selected';
            	oD7.className = 'selected';
            }
            oL3.onclick =function () {
            	oL1.className = '';
            	oL2.className = '';
            	oL3.className = 'li';
            	oL4.className = '';
            	oL5.className = '';
            	oL6.className = '';
            	oL7.className = '';
            	oD1.className = 'selected';
            	oD2.className = 'selected';
           		oD3.className = '';
            	oD4.className = 'selected';
            	oD5.className = 'selected';
            	oD6.className = 'selected';
            	oD7.className = 'selected';
            }
            oL4.onclick =function () {
            	oL1.className = '';
            	oL2.className = '';
            	oL3.className = '';
            	oL4.className = 'li';
            	oL5.className = '';
            	oL6.className = '';
            	oL7.className = '';
            	oD1.className = 'selected';
            	oD2.className = 'selected';
           		oD3.className = 'selected';
            	oD4.className = '';
            	oD5.className = 'selected';
            	oD6.className = 'selected';
            	oD7.className = 'selected';
            }
             oL5.onclick =function () {
            	oL1.className = '';
            	oL2.className = '';
            	oL3.className = '';
            	oL4.className = '';
            	oL5.className = 'li';
            	oL6.className = '';
            	oL7.className = '';
            	oD1.className = 'selected';
            	oD2.className = 'selected';
           		oD3.className = 'selected';
            	oD4.className = 'selected';
            	oD5.className = '';
            	oD6.className = 'selected';
            	oD7.className = 'selected';
            }
              oL6.onclick =function () {
            	oL1.className = '';
            	oL2.className = '';
            	oL3.className = '';
            	oL4.className = '';
            	oL5.className = '';
            	oL6.className = 'li';
            	oL7.className = '';
            	oD1.className = 'selected';
            	oD2.className = 'selected';
           		oD3.className = 'selected';
            	oD4.className = 'selected';
            	oD5.className = 'selected';
            	oD6.className = '';
            	oD7.className = 'selected';
            }
             oL7.onclick =function () {
            	oL1.className = '';
            	oL2.className = '';
            	oL3.className = '';
            	oL4.className = '';
            	oL5.className = '';
            	oL6.className = '';
            	oL7.className = 'li';
            	oD1.className = 'selected';
            	oD2.className = 'selected';
           		oD3.className = 'selected';
            	oD4.className = 'selected';
            	oD5.className = 'selected';
            	oD6.className = 'selected';
            	oD7.className = '';
            }
</script>
<script type="text/javascript" charset="utf-8">
		$(function(){
			$('#newrpass').blur(function(){
			var pass=$('#newpass').val();
			console.log(pass);
			var rpass=$('#newrpass').val();
			if(pass!=rpass){
				var oSpan=$('<span style="font-size:11px;" id="s1">密码不一致</span>');
				$(this).after(oSpan);
			}
		});
		$('#newrpass').focus(function(){
			$('#s1').remove();
		});
		$('#oldpass').blur(function(){
			var name=$(this).val();
			if(name==""){
				var oSpan=$('<span style="font-size:11px;" id="u1">请输入密码！</span>');
				$('#oldpass').after(oSpan);
			}else{
					$.post('<?php echo site_url('user/check_pass')?>','upass='+name,function(data){				
				if(data!='success'){	
					var oSpan=$('<span style="font-size:11px;" id="u1">密码输入错误！</span>');
					$('#oldpass').after(oSpan);
				}		
			})
		
			}
		
		});
		 $('#oldpass').focus(function(){
			$('#u1').remove();
		 });
		$("#sub").on("click",function(){
				var name=$("#oldpass").val();
				var pass=$('#newpass').val();
				var rpass=$('#newrpass').val();
				if(pass!=""&&rpass!=""&&name!=""){
					return true;
				}else{
					alert('请输入修改信息！')
					return false;
				}
			})
			$("#shangchuan").on("click",function(){
				var name=$("#wtitle").val();
				var pass=$('#c_pic').val();
				var rpass=$('#wcont').val();
				if(pass!=""&&rpass!=""&&name!=""){
					return true;
				}else{
					alert('请输入完整信息！')
					return false;
				}
			})
			
			$(".delete").on("click",function(){
				var aa =$(this).attr("data");
				$.post('<?php echo site_url('user/do_delete')?>','wid='+aa,function(data){				
				if(data=='success'){
					alert('删除成功！');
				}	
				})
			})
			
			$(".delete_sx").on("click",function(){
				var aa =$(this).attr("data");
				$.post('<?php echo site_url('user/do_delete_sx')?>','sid='+aa,function(data){				
				if(data=='success'){
					alert('删除成功！');
				}	
				})
			})
			
			$(".delete_pl").on("click",function(){
				var aa =$(this).attr("data");
				$.post('<?php echo site_url('user/do_delete_pl')?>','pid='+aa,function(data){				
				if(data=='success'){
					alert('删除成功！');
				}	
				})
			})
			$("#zhuxiao").on("click",function(){
				var aa =$(this).attr("data");
				$.post('<?php echo site_url('user/do_zhuxiao')?>','uid='+aa,function(data){				
				if(data=='success'){
					alert('注销账号成功！');
				}	
				})
			})
			
		})
	
</script>

</body>
</html>