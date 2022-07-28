<?php session_start();
date_default_timezone_set('Asia/Kolkata');
ini_set('memory_limit', '-1');
ini_set('max_execution_time', '12000');
class cashfunct{
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "wnc";
	public $prefix = "wnc_";
	public $mem_table = "register";
	public $adopt_table = "adoption";
	public $animal_table = "animal";
	public $blog_table = "blog";
	public $city_table = "city";
	public $com_table = "comment";
	public $comp_table = "complaint";
	public $event_table ="events";
	public $img_table ="events_image";
	public $state_table ="state";
	public $vol_table ="volunteer";
	
	//date('Ymdhis', strtotime($date));
	var $succes_msg = [];
	var $error_msg = []; 	
	
	// call automatically when site open and connect to server and select database
	function __construct() {
		$conn = $this->connect();
		if(!empty($conn)) {
			$this->selectdb($conn);
		}
	}
	
	function get()
	{
		return $this->error_msg;
	}
	
	// for connect to server and database
	function connect() {
		$conn = @mysql_connect($this->host,$this->user,$this->password);
		return $conn;
	}
	
	// for select db
	function selectdb($conn) {
		mysql_select_db($this->database,$conn);
	}
	
	function siteurl() {
		
		return "localhost/demo";
	}
	
	
	// for data insertion in database by looping method 
	function insertr($table,$data)
	{
		try{
	$fields="";
	$values = "";
	foreach($data as $key => $val)
	{
		$fields.=$key.',';
		$values.="'".$val."',";
	}
	$fields = substr($fields,0,strlen($fields)-1);
	$values = substr($values,0,strlen($values)-1);
	
	$q = mysql_query("insert into $table ($fields) values($values)");
	if(mysql_errno() > 0)
	{
		throw new Exception(mysql_error());
	}
	return mysql_insert_id();
	}
		catch(Exception $e)
		{
			array_push($this->error_msg,$e->getMessage());
			return false;
		}
	}
	
	//update function for update data in database with or without condition
	function update($table,$data,$condition="")
	{
		try{
	$fields="";
	$values = "";
	foreach($data as $key => $val)
	{
		$fields.=$key."='".$val."',";
	}
	$fields = substr($fields,0,strlen($fields)-1);
	//echo "update $table set $fields $condition";
	$q = mysql_query("update $table set $fields $condition");
	if(mysql_errno() >0 )
	{
		throw new Exception("Data do not updated");
		}
		return $q;
		}
	catch(Exception $e)
	{
	array_push($this->error_msg,$e->getMessage());
			return false;	
	}	
	}

	//delete data from database 
 	function delete($table,$condition=""){
	 $query ="delete from $table $condition";
	 if($n=mysql_query($query)){
	  }
	  else{
        echo"Error.".mysql_error();
	  }
	  return $n;
	}
	//select data from database for mulitiple row by 
	function selectr($fields,$table,$condition="")
	{
		//echo "select $fields from $table $condition";
		
		try{
		$resultset = array();	
	$q = mysql_query("select $fields from $table $condition");
	if(mysql_errno() > 0)
	{
		throw new Exception("Invalid Parameter Passes");
	}
	while($r = mysql_fetch_array($q))
	{
		@$resultset[] = $r;
	}
	return $resultset;
	}
	catch(Exception $e){
		array_push($this->error_msg,$e->getMessage());
		return false;
	}
	}
	
	//fetch one row from table
	function selectfetch($fields="*",$table,$condition="")
	{
		//echo "select $fields from $table $condition";
	try{
		
	$q = mysql_query("select $fields from $table $condition");
	if(mysql_errno() > 0)
	{
		throw new Exception("Invalid Parameter Passes");
	}	
	$r = mysql_fetch_array($q);
	return $r;
	}
	catch(Exception $e)
	{
		array_push($this->error_msg,$e->getMessage());
		return false;
	}
		}
	
	// two table join query	
	function two_join($table1, $table2, $col1, $col2, $join="INNER JOIN", $condition="")
	{
		$set = array();
		$q = mysql_query("SELECT a.*,b.* FROM ".$this->prefix.$table1." as a $join ".$this->prefix.$table2." as b ON a.$col1=b.$col2 $condition");
		while($r = mysql_fetch_array($q))
		{
			$set[] = $r;
		}
		return $set;
	}	
	// select numbers of rows
	function countq($fields,$table,$condition="")
	{
		//echo "select count( $fields ) from $table $condition ";
	$count=mysql_fetch_row(mysql_query("select count( $fields ) from $table $condition "));
	return $count[0];
	}
	
	
	
	//for password encryption
	function password($pass)
	{
	$var = md5($pass.'a5d785e0cc5ttf');	
	$pass = sha1(md5(str_rot13($var)));
	$pass = $var.$pass;
	return $pass;	
	}
	
	
	// for generate password
	function generate_password()
	{
		$arr1 = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
		$arr2 = array("1","2","3","4","5","6","7","8","9"); 
		$arr3 = array("@","#","$","&","(",")","-",">","<");
		$arr = array_merge($arr1,$arr2,$arr3);
		
shuffle($arr);
$d ='';
$arr = array_slice($arr,0,10);
foreach ($arr as $a)
{
	$d .=	$a; 
}
return $d;
	}
	
	
	//encryption decryption method for parameter
	function encrypt_decrypt($key,$val)
	{
	switch($key){
	case "encrypt":
	$return = $this->encode($val);
	return $return;
	break;

	case "decrypt":
	$return = $this->decode($val);
	return $return;
	break;
	}	
	
	}
	// for string encryption
	function encode($val)
	{
	$data = convert_uuencode($val);
	$res =strrev($data);	
	$encode = $this->rot(base64_encode($res));
	return $encode;	
	}
	
	// for string decryption
	function decode($val)
	{
	$data = base64_decode($this->rot($val));
	$res = strrev($data);
	$decode = convert_uudecode($res);	
	return $decode;	
	}
	
	
	function rot($eval)
	{	
	$rot = str_rot13($eval);
	return $rot;	
	}

	function website_setting($id=1)
	{
		$fetch = $this->selectfetch("*",$this->prefix.$this->set_table," WHERE ".$this->set_table."_id='".$id."'");
		return $fetch;
	}
	
	function user_name($id=1)
	{
		$fetch = $this->selectfetch("*",$this->prefix.$this->mem_table," WHERE ".$this->mem_table."_id='".$id."'");
		return ucwords($fetch[$this->mem_table.'_name']);
	}
	
	function web_parent($table='',$id='')
	{
		$parent = $this->selectfetch("*",$this->prefix.$table," WHERE ".$table."_id='".$id."'");
			return ucwords($parent[$table.'_name']);
	}
	
	function title($table='',$id)
	{
	$parent = $this->selectfetch("*",$this->prefix.$table," WHERE ".$table."_id='".$id."'");
			return ucwords($parent[$table.'_title']);	
	}
	
	function change_status($table='',$id,$status)
	{
	$id = $this->encrypt_decrypt('decrypt',$id);
	switch($status)
	{
	case 'active':
	$sta = 1;
		break;
	
		case 'block':
		$sta = 2;
		break;
		
		case 'pending':
		$sta = 3;
		break;
	}
	$data = array(
	$table.'_status' => $sta
	);
	$this->update($this->prefix.$table,$data," WHERE ".$table."_id='".$id."'");
	return;
	}
	
	function delete_data($table,$id)
	{
	$id = $this->encrypt_decrypt('decrypt',$id);
	$this->delete($this->prefix.$table," WHERE ".$table."_id='".$id."'");
	return;
	}
	
	function all_blog_user($id)
	{
		$count = $this->countq("*",$this->prefix.$this->blg_table," WHERE ".$this->blg_table."_members='".$id."' AND ".$this->blg_table."_status='1'");
		return $count;
	}
	
	function month_blog_user($id)
	{
		
		 $year=date("Y", strtotime("-1 month"));
		 $month = date("m",strtotime("-1 month"));
		
		$count = $this->countq("*",$this->prefix.$this->blg_table," WHERE ".$this->blg_table."_members='".$id."' AND ".$this->blg_table."_status='1' AND YEAR(".$this->blg_table."_date".")='".$year."' AND MONTH(".$this->blg_table."_date".")='".$month."'");
		return $count;
	}
	function week_blog_user($id)
	{
		$today= date("Y-m-d H:i:s");
		$week=date("Y-m-d H:i:s", strtotime("-7 days"));

		$count = $this->countq("*",$this->prefix.$this->blg_table," WHERE ".$this->blg_table."_members='".$id."' AND ".$this->blg_table."_status='1' AND ".$this->blg_table."_date BETWEEN '".$week ."' AND '".$today."'");
		return $count;
	}
	function all_comment_user($id)
	{
		$count = $this->countq("*",$this->prefix.$this->cmnt_table," WHERE ".$this->cmnt_table."_members='".$id."' AND ".$this->cmnt_table."_status='1'");
		return $count;
	}
	function week_comment_user($id)
	{
		$today= date("Y-m-d H:i:s");
		$week=date("Y-m-d H:i:s", strtotime("-7 days"));
		
		$count = $this->countq("*",$this->prefix.$this->cmnt_table," WHERE ".$this->cmnt_table."_members='".$id."' AND ".$this->cmnt_table."_status='1' AND ".$this->cmnt_table."_date BETWEEN '".$week ."' AND '".$today."'");
		return $count;
	}
	
	function month_comment_user($id)
	{
		$year=date("Y", strtotime("-1 month"));
		$month = date("m",strtotime("-1 month"));
		$count = $this->countq("*",$this->prefix.$this->cmnt_table," WHERE ".$this->cmnt_table."_members='".$id."' AND ".$this->cmnt_table."_status='1' AND YEAR(".$this->cmnt_table."_date".")='".$year."' AND MONTH(".$this->cmnt_table."_date".")='".$month."'");
		return $count;
	}
	
	function check_category($name)
	{
		$count = $this->countq("*",$this->prefix.$this->cat_table," WHERE ".$this->cat_table."_name='".$name."'");
		return $count;
	}
	
	function companies($id)
	{
		$select = $this->selectfetch("*",$this->prefix.$this->com_table," WHERE ".$this->com_table."_id='".$id."'");
		return $select[$this->com_table.'_name'];
	}
	
	function selected($val1,$val2)
{
	if($val1 == $val2)
	{
		return 'selected';
	}	
}

	function count_product($cat)
	{
		$count = $this->countq("*",$this->prefix.$this->prd_table," WHERE ".$this->prd_table."_category LIKE '".$cat."' AND ".$this->prd_table."_stock='1' AND ".$this->prd_table."_status='1'");
		return $count;
	}
	
	function sum_product($cat)
	{
		$sum = $this->selectfetch("SUM(".$this->prd_table."_sellingPrice) as sumprice",$this->prefix.$this->prd_table," WHERE ".$this->prd_table."_category LIKE '".$cat."' AND ".$this->prd_table."_stock='1' AND ".$this->prd_table."_status='1'");
		return $sum['sumprice'];
	}
	
	function sum_cashback($uid,$st)
	{
		
		$sum = $this->selectfetch("SUM(".$this->trans_table."_amount) as pend",$this->prefix.$this->trans_table." WHERE ".$this->trans_table."_user='".$uid."' AND ".$this->trans_table."_status='".$st."'");
		return $sum['pend'];
	}
	
	function pending_amount($uid)
	{
		
		$psum = $this->selectfetch("SUM(".$this->cash_table."_amount) as pamt",$this->prefix.$this->cash_table." WHERE ".$this->cash_table."_user='".$uid."' AND ".$this->cash_table."_status='1'");
		return $psum['pamt'];
	}
	
	function confirm_amount($uid)
	{
		
		$psum = $this->selectfetch("SUM(".$this->cash_table."_amount) as pamt",$this->prefix.$this->cash_table." WHERE ".$this->cash_table."_user='".$uid."' AND ".$this->cash_table."_status='2'");
		return $psum['pamt'];
	}
	
	function paid_amount($uid)
	{
		
		$psum = $this->selectfetch("SUM(".$this->cash_table."_amount) as pamt",$this->prefix.$this->cash_table." WHERE ".$this->cash_table."_user='".$uid."' AND ".$this->cash_table."_status='4'");
		return $psum['pamt'];
	}

function pagination($col_id,$table,$num_rows,$page,$condition="",$querystring="")
{
 	
$q = mysql_query("select COUNT(".$col_id.") from ".$this->prefix.$table. $condition) or die("Select Query Error.".mysql_error());
$row = mysql_fetch_row($q);	
$rows = $row[0];
$page_rows = $num_rows;
$last=ceil($rows/$page_rows);
if($last<1) {
	$last=1;
	}
	$pagenum=1;
	
	if(isset($_GET['pn'])){
$pagenum=preg_replace('#[^0-9]#','',$_GET['pn']);		
		}
		if($pagenum<1) {
			$pagenum=1;
		}
		elseif($pagenum > $last) {
$pagenum=$last;
		}
		
		 $limit ='LIMIT'.' '.($pagenum-1)*$page_rows.','.$page_rows;
		$logos1="LOGOS(<b>$rows</b>)";
		$logos2="PAGE <b>$pagenum</b> of <b>$last</b>";
		$paginationCtrls = '';
	
		if($last != 1){
			if ($pagenum > 1) { $previous = $pagenum - 1; $paginationCtrls .= '<li><a href="'.$page.'?pn='.$previous.$querystring.'">Previous</a></li> &nbsp; &nbsp; ';
			for($i = $pagenum-4; $i < $pagenum; $i++){ if($i > 0){ $paginationCtrls .= '<li><a href="'.$page.'?pn='.$i.$querystring.'">'.$i.'</a></li> &nbsp; '; } } }
		$paginationCtrls .= '<li class="active"><a href="#">'.$pagenum.'</a></li> &nbsp; ';
		for($i = $pagenum+1; $i <= $last; $i++){ $paginationCtrls .= '<li><a href="'.$page.'?pn='.$i.$querystring.'" >'.$i.'</a></li> &nbsp; '; if($i >= $pagenum+4){ break; } }

if ($pagenum != $last) { $next = $pagenum + 1; $paginationCtrls .= ' &nbsp; &nbsp; <li><a href="'.$page.'?pn='.$next.$querystring.'">Next</a></li> '; } } $list = '';
return array($limit,$paginationCtrls);

}
	
	// for disclose the connection
	function __destruct()
	{
		$conn = $this->connect();
		mysql_close($conn);
		}
	
}
?>