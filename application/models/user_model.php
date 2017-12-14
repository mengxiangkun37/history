<?php  defined('BASEPATH') OR exit('No direct script access allowed');
	class User_model extends CI_Model {
			
		/*reg*/	
		public function get_check($name){			
			$query=$this->db->get_where('user',array('uemail'=>$name));
			return $query->row();
		}
		public function checkname($name){
			$arr=array(
				'uemail'=>$name,
			);
			$query=$this->db->get_where('user',$arr);
			return $query->row();	
		}
		public function set_insert($zname,$name,$pass){
			$arr=array(
				'uemail'=>$name,
				'uname'=>$zname,
				'upass'=>$pass,
			);
			$query=$this->db->insert('user',$arr);
			return $query;
		}
		/*login*/
		public function do_login($a,$b){
			$arr=array(
				'uemail'=>$a,
				'upass'=>$b,
			);
			$query=$this->db->get_where('user',$arr);
			return $query->row();
		}
		/*user*/
		public function get_user($uid){
			$query=$this->db->get_where('user',array('uid'=>$uid));
			return $query->result();
		}
		public function get_user1(){
			$query=$this->db->get('cata');
			return $query->result();
		}
		public function get_user_fl(){
			$query=$this->db->get('zcata');
			return $query->result();
		}
		public function get_user2($uid){
			$query=$this->db->get_where('wenzhang',array('uid'=>$uid));
			return $query->result();
		}
		/*注销*/
		public function do_zhuxiao($uid){
			$this->db->where('uid',$uid);
			$query=$this->db->delete('user');
			return $query;
		}
		
		public function do_user($uid,$uname,$usex,$uage,$uaddress){
			$arr=array(
				'uname'=>$uname,
				'usex'=>$usex,
				'uage'=>$uage,
				'uaddress'=>$uaddress,
			);
			$this->db->where('uid',$uid);
			$query=$this->db->update('user',$arr);
			return $query;
		}
		public function get_check_pass($uid,$pass){			
			$query=$this->db->get_where('user',array('uid'=>$uid,'upass'=>$pass));
			return $query->row();
		}
		public function do_user_pass($uid,$pass){			
			$arr=array(
				'upass'=>$pass,
			);
			$this->db->where('uid',$uid);
			$query=$this->db->update('user',$arr);
			return $query;
		}
		public function upload($wtitle,$cid,$wcont,$name,$uid,$zid){
			$arr=array(
				'wtitle'=>$wtitle,
				'cid'=>$cid,
				'wcont'=>$wcont,
				'wpic'=>$name,
				'uid'=>$uid,
				'zid'=>$zid
			);
			$query = $this->db->insert('wenzhang',$arr);
			return $query;
		}
		/*lists*/
		public function get_lists_cid($cid){
			$query=$this->db->get_where('wenzhang',array('cid'=>$cid));
			return $query->result();
		}
		public function get_lists_zid($zid){
			$query=$this->db->get_where('wenzhang',array('zid'=>$zid));
			return $query->result();
		}
		public function get_lists_user($uid){
			$query=$this->db->get_where('user',array("uid"=>$uid));
			return $query->result();
		}
		
		public function get_delete($wid){
			$tables = array('wenzhang', 'pl');
			$this->db->where('wid',$wid);
			$query=$this->db->delete($tables);
			return $query;
		}
		public function get_delete_sx($sid){
			$this->db->where('sid',$sid);
			$query=$this->db->delete('sx');
			return $query;
		}
		public function get_delete_pl($pid){
			$this->db->where('pid',$pid);
			$query=$this->db->delete('pl');
			return $query;
		}
		
		/*details*/
		public function get_details($id){
			$query=$this->db->get_where('wenzhang',array("wid"=>$id));
			return $query->result();
		}
		public function do_hits($id){
			$this->db->set('hits', 'hits+1', FALSE);
			$this->db->where('wid',$id);
			$query=$this->db->update('wenzhang');
			return $query;
		}
		public function do_by_hits(){
			$this->db->limit(10);
			$this->db->order_by('hits','DESC');
			$query=$this->db->get('wenzhang');
			return $query->result();
		}
		public function get_details_user($uid){
			$this->db->limit(5);
			$this->db->order_by('hits','DESC');
			$query=$this->db->get_where('wenzhang',array("uid"=>$uid));
			return $query->result();
		}
		public function do_pl($id,$uid,$pcont,$ptime){
			$arr=array(
				'wid'=>$id,
				'uid'=>$uid,
				'pcont'=>$pcont,
				'ptime'=>$ptime,
			);
			$query = $this->db->insert('pl',$arr);
			return $query;
		}
		public function get_pl_user($uid){
			$query=$this->db->get_where('user',array("uid"=>$uid));
			return $query->result();
		}
		public function get_pl($id){
			$query = $this->db->get_where('pl',array('wid'=>$id));
			return $query->result();
		}
	 	public function	get_sx($uid){
	 		$query = $this->db->get_where('sx',array('uid'=>$uid));
			return $query->result();
	 	}
		public function	get_user_sx($aid){
			$query = $this->db->get_where('admin',array('aid'=>$aid));
			return $query->result();
		}
		public function do_pl_user($id){
			$query = $this->db->get_where('wenzhang',array('uid'=>$id));
			return $query->result();
		}
		public function	get_user_pl($wid){
			$query = $this->db->get_where('pl',array('wid'=>$wid));
			return $query->result();
		}
		public function	get_user_pl1($uid){
			$query = $this->db->get_where('user',array('uid'=>$uid));
			return $query->result();
		}
		
		
		/*index  unindex*/
		/*查询cata表*/
		public function get_index(){
			$query=$this->db->get('cata');
			return $query->result();
		}
		/*查询zcata表*/
		public function get_index_zl(){
			$query=$this->db->get('zcata');
			return $query->result();
		}
		/*查询文献*/
		public function get_index_wz1(){
			$this->db->limit(5);
			$query=$this->db->get_where('wenzhang',array('cid'=>1));
			return $query->result();
		}
		public function get_index_wz2(){
			$this->db->limit(5);
			$query=$this->db->get_where('wenzhang',array('cid'=>2));
			return $query->result();
		}
		public function get_index_wz3(){
			$this->db->limit(5);
			$query=$this->db->get_where('wenzhang',array('cid'=>6));
			return $query->result();
		}
		public function get_index_wz4(){
			$this->db->limit(5);
			$query=$this->db->get_where('wenzhang',array('cid'=>10));
			return $query->result();
		}
		/*图说历史*/
		public function get_tushuolishi(){
			$this->db->limit(6);
			$this->db->order_by('hits','ASC');
			$query=$this->db->get('wenzhang');
			return $query->result();
		}
		public function get_tushuolishi_first(){
			$this->db->limit(1);
			$this->db->order_by('hits','DESC');
			$query=$this->db->get('wenzhang');
			return $query->result();
		}
		/*搜索*/
		public function get_search($search){
			$this->db->like('wtitle',$search);
			$query=$this->db->get('wenzhang');
			return $query->result();
		}
		public function do_search(){
			$this->db->limit(5);
			$this->db->order_by('hits','DESC');
			$query=$this->db->get('wenzhang');
			return $query->result();
		}

		public function do_admin_login($a,$b){
			$arr=array(
				'aemail'=>$a,
				'apass'=>$b,
			);
			$query=$this->db->get_where('admin',$arr);
			return $query->row();
		}
		public function get_admin_user(){
			$query=$this->db->get('user');
			return $query->result();
		}
		public function get_admin_wz(){
			$query=$this->db->get('wenzhang');
			return $query->result();
		}
		public function get_admin_delete_user($uid){
			$tables = array('user', 'wenzhang', 'pl');
			$this->db->where('uid',$uid);
			$query=$this->db->delete($tables);
			return $query;
		}
		public function get_admin_delete_wz($wid){
			$tables = array('wenzhang', 'pl');
			$this->db->where('wid',$wid);
			$query=$this->db->delete($tables);
			return $query;
		}
		
		public function get_admin_sx($uid){
			$query=$this->db->get_where('user',array('uid'=>$uid));
			return $query->row();
		}
		
		public function do_admin_sx($aid,$uid,$scont,$stime){
			$arr=array(
				'aid'=>$aid,
				'uid'=>$uid,
				'scont'=>$scont,
				'stime'=>$stime,
			);
			$query=$this->db->insert('sx',$arr);
			return $query;
		}

		
	}
	
	
?>