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
		}
		