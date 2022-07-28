<?php
if(isset($_REQUEST['LOGIN']))
{
$password = $qury->password($_REQUEST['password']);

try {	
$count = $qury->countq("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_email='".$_REQUEST['username']."' AND ".$qury->mem_table."_password='".$password."'");
if($count == 0)
{
	throw new Exception("Invalid Username And Password");
}
try{
	
$fetch = $qury->selectfetch("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_type='2' AND ".$qury->mem_table."_status='1' AND ".$qury->mem_table."_email='".$_REQUEST['username']."' AND ".$qury->mem_table."_password='".$password."'");
if($fetch==null || $fetch=='')
{
throw new Exception("Pending For admin Approval");	
}
$_SESSION['casUser'] = $fetch['members_id'];
if(isset($_SESSION['po']))
{
echo "<script>window.location='shop.php?po=".$_SESSION['po']."'</script>";	
}
else if(isset($_SESSION['ao']))
{
echo "<script>window.location='shop.php?ao=".$_SESSION['ao']."'</script>";	
}
else if(isset($_SESSION['do'])){
echo "<script>window.location='shop.php?do=".$_SESSION['do']."'</script>";
}
elseif(isset($_SESSION['rj']))
{
echo "<script>window.location='shop1.php?rj=".$_SESSION['rj']."'</script>";
}
elseif(isset($_SESSION['co']))
{
echo "<script>window.location='coupon.php?co=".$_SESSION['co']."'</script>";	
}
elseif(isset($_SESSION['re']))
{
echo "<script>window.location='refer.php'</script>";	
}
else{
echo "<script>window.location='dashboard.php'</script>";	
}
}
catch(Exception $e)
{
	
echo $e->getMessage();
}
}
catch(Exception $e)
{
echo "<script>
alert('invalid username & password');	
</script>";
}
}

?>