<?php require_once 'dbfunction.php';
require_once 'php_validation.php';
require_once 'projectclass.php'; 
$qury= new cashfunct();
$valid = new validation();
$project = new project();


 if(isset($_REQUEST['register']))
 {
	  $password = $qury->password($_REQUEST['password']); 
	 $count = $qury->countq("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_status='1' AND ".$qury->mem_table."_email='".$_REQUEST['email']."'");
if($count > 0)
{
  echo "<script>alert('User Already Registered , Try with another Email');</script>";
      }
else{
	$name = $_REQUEST['fname'];
	   $username= 'user'.$name ; 
	 $data = array(
$qury->mem_table.'_fname' => $_REQUEST['fname'],
$qury->mem_table.'_lname' => $_REQUEST['lname'],
$qury->mem_table.'_email' => $_REQUEST['email'],
$qury->mem_table.'_username' => $username,
$qury->mem_table.'_password' => $password,
$qury->mem_table.'_status' => 1
);
$ins = $qury->insertr($qury->prefix.$qury->mem_table,$data);
if($ins)
{
$fetch = $qury->selectfetch("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_email='".$_REQUEST['email']."' ");
$_SESSION['casUser'] = $fetch['register_id'];
echo "<script>window.location='dashboard.php'</script>";
}
   else{  		 
		 echo "error ";
	 }
 }
 } //----------------------Registration Done--------------------------
 
if(isset($_REQUEST['LOGIN']))
{
$password2 = $qury->password($_REQUEST['password2']);

$count = $qury->countq("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_status='1' AND ".$qury->mem_table."_email='".$_REQUEST['username']."' AND ".$qury->mem_table."_password='".$password2."'");
if($count == 0)
{ echo "<script>alert('Invalid Username And Password');</script>";
echo "<script>window.location='index.php'</script>";
}
else{
$fetch = $qury->selectfetch("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_status='1' AND ".$qury->mem_table."_email='".$_REQUEST['username']."' AND ".$qury->mem_table."_password='".$password2."'");
$_SESSION['casUser'] = $fetch['register_id'];
echo "<script>window.location='dashboard.php'</script>";
}
}
	?>