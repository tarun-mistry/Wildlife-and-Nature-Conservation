<?php
if(isset($_REQUEST['LOGIN']))
{
 $password = $ca->password($_REQUEST['password']);
 
 
// exit;

try {	
$count = $ca->countq("*",$ca->prefix.$ca->mem_table," WHERE ".$ca->mem_table."_type='1' AND ".$ca->mem_table."_status='1' AND ".$ca->mem_table."_username='".$_REQUEST['username']."' AND ".$ca->mem_table."_password='".$password."'");
if($count == 0)
{
	throw new Exception("Invalid Username And Password");
}
try{
	
$fetch = $ca->selectfetch("*",$ca->prefix.$ca->mem_table," WHERE ".$ca->mem_table."_type='1' AND ".$ca->mem_table."_status='1' AND ".$ca->mem_table."_username='".$_REQUEST['username']."' AND ".$ca->mem_table."_password='".$password."'");
if($fetch==null || $fetch=='')
{
throw new Exception("Pending For admin Approval");	
}
$_SESSION['casAdmin'] = $fetch['members_id'];
echo "<script>window.location='dashboard.php'</script>";	
}
catch(Exception $e)
{
	
echo $e->getMessage();
}
}
catch(Exception $e)
{
	
echo $e->getMessage();
}
}

?>