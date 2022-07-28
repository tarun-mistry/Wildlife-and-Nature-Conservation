<?php
if(isset($_REQUEST['LOGIN']))
{
if(($_REQUEST['username']=="admin") AND ($_REQUEST['password']) =="admin123"){
  echo "<script>window.location='dashboard.php'</script>";	
}
else{
	echo "<script>alert('invalid username & password');	</script>";
}
}
?>