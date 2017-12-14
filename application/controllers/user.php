<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
		class User extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('user_model');
			 
		}
		/*注册*/
		public function reg(){
			$row=$this->user_model->get_index_zl();
			$rs3=$this->user_model->get_index();
			$arr['index']=$rs3;
			$arr['index_zl']=$row;
			$this->load->view("reg.php",$arr);
		}
		/*ajax查询重复用户名*/
		public function check(){
			header("Access-Control-Allow-Origin:*");
			$name=$this->input->post('uemail');
			$rs=$this->user_model->get_check($name);
			if($rs){
				echo "success";
			}
		}	
		public function do_reg(){
			$name=$this->input->post('name');
			$zname=$this->input->post('zname');
			$pass=$this->input->post('pass1');
			$rpass=$this->input->post('pass2');
			if($pass==$rpass){
				$rs=$this->user_model->checkname($name);
			if($rs){
				echo "<script>alert('用户名重名，请重新注册！');</script>";
				 header("Refresh:0;url=reg");
			}else{
				$rs=$this->user_model->set_insert($zname,$name,$pass);
				if($rs){
					echo "<script>alert('注册成功，为您跳转登录界面！');</script>";
				 	header("Refresh:0;url=login");
				}	
			}	
			}else{
				echo "<script>alert('注册失败！');</script>";
				 header("Refresh:0;url=reg");
			}	
		}
		/*登录*/
		public function login(){
			$row=$this->user_model->get_index_zl();
			$rs3=$this->user_model->get_index();
			$arr['index']=$rs3;
			$arr['index_zl']=$row;
			$this->load->view("login.php",$arr);
		}
		public function do_login(){
			$name=$this->input->post('name');
			$pass=$this->input->post('pass');
			$rs=$this->user_model->do_login($name,$pass);
			if($rs){
				$arr=array(
					'id'=>$rs->uid,
					'name'=>$rs->uemail,
					'logged_in' => TRUE,
				);
				$this->session->set_userdata($arr);
				 echo "<script>alert('登录成功！');</script>";
				 header("Refresh:0;url=index");
			}else{
				echo "<script>alert('登录失败，请重新登录！');</script>";
				 header("Refresh:0;url=login");
			}		
		}
		/*user.php*/
		public function user(){
			$uid=$this->session->userdata('id');
			$row=$this->user_model->get_index_zl();
			$rs=$this->user_model->get_user($uid);
			$rs1=$this->user_model->get_user1();
			$rs11=$this->user_model->get_user_fl();
			$rs2=$this->user_model->get_user2($uid);
			$rs3=$this->user_model->get_index();
			$rs4=$this->user_model->get_sx($uid);
			foreach ($rs4 as $key) {
				$key->a1=$this->user_model->get_user_sx($key->aid);	
			}
			$rs5=$this->user_model->do_pl_user($uid);
			foreach ($rs5 as $key) {
				$key->a2=$this->user_model->get_user_pl($key->wid);
				foreach ($key->a2 as $key1) {
				$key1->a3=$this->user_model->get_user_pl1($key1->uid);	
				}	
			}
			$arr['user']=$rs;
			$arr['index_zl']=$row;
			$arr['user1']=$rs1;
			$arr['user11']=$rs11;
			$arr['user2']=$rs2;
			$arr['index']=$rs3;
			$arr['sx']=$rs4;
			$arr['pl']=$rs5;
			$this->load->view("user.php",$arr);
		}
		/*修改资料*/
		public function do_user(){
			$uid=$this->session->userdata('id');
			$uname=$this->input->post('uname');
			$usex=$this->input->post('usex');
			$uage=$this->input->post('uage');
			$uaddress=$this->input->post('uaddress');
			$rs=$this->user_model->do_user($uid,$uname,$usex,$uage,$uaddress);
			if($rs){
				echo "<script>alert('修改成功！');</script>";
				 header("Refresh:0;url=user");
			}	
		}
		
		/*注销账号*/
		public function do_zhuxiao(){
			$uid=$this->input->post('uid');
			$rs=$this->user_model->do_zhuxiao($uid);
			if($rs){
				echo "success";
			}
		}
		
		/*修改密码*/
		public function check_pass(){
			header("Access-Control-Allow-Origin:*");
			$uid=$this->session->userdata('id');
			$pass=$this->input->post('upass');
			$rs=$this->user_model->get_check_pass($uid,$pass);
			if($rs){
				echo "success";
			}
		}	
		public function do_user_pass(){
			$uid=$this->session->userdata('id');
			$newpass=$this->input->post('newpass');
			$newrpass=$this->input->post('newrpass');
			if($newpass==$newrpass){
				$rs=$this->user_model->do_user_pass($uid,$newpass);
				if($rs){
					echo"<script>alert('密码更改成功，请重新登录！')</script>";
					header("Refresh:0;url=login");
				}
			}else{
				echo"<script>alert('两次密码不同，请重新输入！')</script>";
				header("Refresh:0;url=user");
			}		
		}
		/*上传*/
		public function do_upload(){
			$uid=$this->session->userdata('id');
			$wtitle=$this->input->post('wtitle');
			$cid=$this->input->post('cid');
			$zid=$this->input->post('zid');
			$wcont=$this->input->post('wcont');
			$file = $_FILES['file'];//得到传输的数据			
			$name = $file['name'];//得到文件名称	
			$type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
			$allow_type = array('jpg','jpeg','gif','png'); //判断文件类型是否被允许上传
			if(!in_array($type, $allow_type)){//如果不被允许，则直接停止程序运行
				echo "<script>alert('上传类型不正确');</script>";
			}
			$upload_path = 'C:/xampp/htdocs/history/assets/images/'; //上传文件的存放路径//开始移动文件到相应的文件夹
			if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
				$rs = $this->user_model->upload($wtitle,$cid,$wcont,$name,$uid,$zid);
				  echo "<script>alert('上传成功,请到我的文献中查看');</script>";
				if($rs){
					header("Refresh:0;url=user");
				}
			}else{
				 echo "<script>alert('上传失败！');</script>";
				 header("Refresh:0;url=user");
			}
		}
		/*删除文献*/
		public function do_delete(){
			header("Access-Control-Allow-Origin:*");
			$wid=$this->input->post('wid');
			$rs=$this->user_model->get_delete($wid);
			if($rs){
				echo "success";
			}
		}
		/*删除私信*/
		public function do_delete_sx(){
			header("Access-Control-Allow-Origin:*");
			$sid=$this->input->post('sid');
			$rs=$this->user_model->get_delete_sx($sid);
			if($rs){
				echo "success";
			}
		}
		//删除评论
		public function do_delete_pl(){
			header("Access-Control-Allow-Origin:*");
			$pid=$this->input->post('pid');
			$rs=$this->user_model->get_delete_pl($pid);
			if($rs){
				echo "success";
			}
		}
		
		
		/*unindex.php*/
		public function unindex(){
			$this->session->unset_userdata('name');       /*清除session*/
			$this->session->unset_userdata('id');
			$this->session->unset_userdata('logged_in');
			$rs=$this->user_model->get_index();         /*从cata表将数据提交到前台*/
			$row=$this->user_model->get_index_zl();		  /*从zcata表将数据提交到前台*/
			$rs1=$this->user_model->get_index_wz1();		/*夏商西周下的文献*/
			$tsls=$this->user_model->get_tushuolishi();			/*图说历史部分*/
			$tsls1=$this->user_model->get_tushuolishi_first();	
			foreach ($rs1 as $key) {
				$key->a1=$this->user_model->get_lists_user($key->uid);	
			}
			$rs2=$this->user_model->get_index_wz2();
			foreach ($rs2 as $key) {
				$key->a2=$this->user_model->get_lists_user($key->uid);	
			}
			$rs3=$this->user_model->get_index_wz3();
			foreach ($rs3 as $key) {
				$key->a3=$this->user_model->get_lists_user($key->uid);	
			}
			$rs4=$this->user_model->get_index_wz4();
			foreach ($rs4 as $key) {
				$key->a4=$this->user_model->get_lists_user($key->uid);	
			}
			$arr['unindex']=$rs;
			$arr['index_zl']=$row;
			$arr['wz1']=$rs1;
			$arr['wz2']=$rs2;
			$arr['wz3']=$rs3;
			$arr['wz4']=$rs4;
			$arr['tsls']=$tsls;
			$arr['tsls1']=$tsls1;
			$this->load->view("unindex.php",$arr);
		}
		/*index.php*/
		public function index(){
			$rs=$this->user_model->get_index();
			$row=$this->user_model->get_index_zl();
			$rs1=$this->user_model->get_index_wz1();
			$tsls=$this->user_model->get_tushuolishi();			/*图说历史部分*/
			$tsls1=$this->user_model->get_tushuolishi_first();	
			foreach ($rs1 as $key) {
				$key->a1=$this->user_model->get_lists_user($key->uid);	
			}
			$rs2=$this->user_model->get_index_wz2();
			foreach ($rs2 as $key) {
				$key->a2=$this->user_model->get_lists_user($key->uid);	
			}
			$rs3=$this->user_model->get_index_wz3();
			foreach ($rs3 as $key) {
				$key->a3=$this->user_model->get_lists_user($key->uid);	
			}
			$rs4=$this->user_model->get_index_wz4();
			foreach ($rs4 as $key) {
				$key->a4=$this->user_model->get_lists_user($key->uid);	
			}
			$arr['index']=$rs;
			$arr['index_zl']=$row;
			$arr['wz1']=$rs1;
			$arr['wz2']=$rs2;
			$arr['wz3']=$rs3;
			$arr['wz4']=$rs4;
			$arr['tsls']=$tsls;
			$arr['tsls1']=$tsls1;
			$this->load->view("index.php",$arr);
		}
		/*lists.php*/
		public function lists(){
			$rs3=$this->user_model->get_index();
			$rs2=$this->user_model->do_by_hits();
			$row=$this->user_model->get_index_zl();
			$cid=$this->input->get('id');
			$zid=$this->input->get('zid');
			if($cid){
				$rs=$this->user_model->get_lists_cid($cid);
				foreach ($rs as $key) {
					$key->aa=$this->user_model->get_lists_user($key->uid);	
				}
				$arr['goods']=$rs;
			}
			if($zid){
				$rs=$this->user_model->get_lists_zid($zid);
				foreach ($rs as $key) {
					$key->aa=$this->user_model->get_lists_user($key->uid);	
				}
				$arr['goods']=$rs;
			}
			$arr['index']=$rs3;
			$arr['hits']=$rs2;
			$arr['index_zl']=$row;
			$this->load->view("lists.php",$arr);
		}
		/*details。php*/
		public function details(){
			$rs3=$this->user_model->get_index();
			$row=$this->user_model->get_index_zl();
			$id=$this->input->get('id');
			if($id){
				$rs1=$this->user_model->do_hits($id);
			}
			$rs=$this->user_model->get_details($id);
			foreach ($rs as $key) {
				$key->aa=$this->user_model->get_details_user($key->uid);	
			}
			$rs1=$this->user_model->get_pl($id);
			foreach ($rs1 as $key1) {
				$key1->aaa=$this->user_model->get_pl_user($key1->uid);	
			}
			$arr['goods']=$rs;
			$arr['index']=$rs3;
			$arr['pl']=$rs1;
			$arr['index_zl']=$row;
			$this->load->view("details.php",$arr);
		}
		public function do_pl(){
			$id=$this->input->post('wid');
			$uid = $this->session->userdata('id');
			$pcont =$this->input->post('pcont');
			$ptime= date("Y-m-d");
			if($uid){
				if($pcont){
					$rs=$this->user_model->do_pl($id,$uid,$pcont,$ptime);
					if($rs){
						echo"<script>alert('评论成功！')</script>";
						header("Refresh:0;url=details?id=$id");
					}
				}else{
					 echo "<script>alert('请输入评论内容！');</script>";
					 header("Refresh:0;url=details?id=$id");
				}
			}else{
				 echo "<script>alert('请登录后评论！');</script>";
				 header("Refresh:0;url=login");
			}
		}
		/*搜索*/
		public function search(){
			$row=$this->user_model->get_index_zl();
			$search=$this->input->post('name');
			if($search){
				$rs_search=$this->user_model->get_search($search);
				foreach ($rs_search as $key) {
					$key->aa=$this->user_model->get_lists_user($key->uid);	
				}		
					$arr['goods']=$rs_search;
			}else{
				$rs1=$this->user_model->do_search();
				foreach ($rs1 as $key) {
					$key->aa=$this->user_model->get_lists_user($key->uid);	
				}
				$arr['goods']=$rs1;
			}
			$rs2=$this->user_model->do_by_hits();
			$rs3=$this->user_model->get_index();
			$arr['index']=$rs3;
			$arr['hits']=$rs2;
			$arr['index_zl']=$row;
			$this->load->view("search.php",$arr);
		}
		public function admin_login(){
			$rs3=$this->user_model->get_index();
			$arr['index']=$rs3;
			$this->load->view("admin_login.php",$arr);
		}
		public function do_admin_login(){
			$name=$this->input->post('aname');
			$pass=$this->input->post('apass');
			$rs=$this->user_model->do_admin_login($name,$pass);
			if($rs){
				$arr=array(
					'id'=>$rs->aid,
					'name'=>$rs->aemail,
					'logged_in' => TRUE,
				);
				$this->session->set_userdata($arr);
				redirect('user/admin_user');
			}else{
				redirect('user/admin_login');
			}	
		}
		public function admin_user(){
			$rs=$this->user_model->get_admin_user();
			$rs1=$this->user_model->get_admin_wz();
			foreach ($rs1 as $key) {
				$key->aa=$this->user_model->get_lists_user($key->uid);	
			}
			$arr['goods']=$rs1;
			$arr['user']=$rs;
			$this->load->view("admin_user.php",$arr);
		}
		public function do_delete_user(){
			header("Access-Control-Allow-Origin:*");
			$uid=$this->input->post('uid');
			$rs=$this->user_model->get_admin_delete_user($uid);
			if($rs){
				echo "success";
			}
		}
		public function do_delete_wz(){
			header("Access-Control-Allow-Origin:*");
			$wid=$this->input->post('wid');
			$rs=$this->user_model->get_admin_delete_wz($wid);
			if($rs){
				echo "success";
			}
		}
		
		public function admin_details(){
			$rs3=$this->user_model->get_index();
			$id=$this->input->get('id');
			if($id){
				$rs1=$this->user_model->do_hits($id);
			}
			$rs=$this->user_model->get_details($id);
			foreach ($rs as $key) {
				$key->aa=$this->user_model->get_details_user($key->uid);	
			}
			$rs1=$this->user_model->get_pl($id);
			foreach ($rs1 as $key1) {
				$key1->aaa=$this->user_model->get_pl_user($key1->uid);	
			}
			$arr['goods']=$rs;
			$arr['index']=$rs3;
			$arr['pl']=$rs1;
			$this->load->view("admin_details.php",$arr);
		} 
		public function admin_sx(){
			$uid=$this->input->get('id');
			$rs=$this->user_model->get_admin_sx($uid);
			$arr['admin_sx']=$rs;
			$this->load->view("admin_sx.php",$arr);
		}
		public function do_admin_sx(){
			$aid=$this->session->userdata('id');
			$uid=$this->input->post('uid');
			$scont=$this->input->post('scont');
			$stime= date("Y-m-d");
			if($scont){
				$rs=$this->user_model->do_admin_sx($aid,$uid,$scont,$stime);
				if($rs){
					 echo "<script>alert('发送成功！');</script>";
				 	 header("Refresh:0;url=admin_user");
				}
			}else{
				 echo "<script>alert('请输入内容！');</script>";
				 header("Refresh:0;url=admin_user");
			}
		}
		public function admin_search(){	
			$search=$this->input->post('name');
			if($search){
				$rs_search=$this->user_model->get_search($search);
				foreach ($rs_search as $key) {
					$key->aa=$this->user_model->get_lists_user($key->uid);	
				}		
					$arr['goods']=$rs_search;
			}else{
				$rs1=$this->user_model->do_search();
				foreach ($rs1 as $key) {
					$key->aa=$this->user_model->get_lists_user($key->uid);	
				}
				$arr['goods']=$rs1;
			}
			$rs2=$this->user_model->do_by_hits();
			$rs3=$this->user_model->get_index();
			$arr['index']=$rs3;
			$arr['hits']=$rs2;
			$this->load->view("admin_search.php",$arr);
		}
		
	
		
		
}
?>