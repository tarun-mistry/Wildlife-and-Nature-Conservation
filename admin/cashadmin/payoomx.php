  <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Create Coupon </h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Coupon </li>
                        </ol>
                    </div>
                </div><!-- /.header-content -->
		<div id="askform">	 
				 <article class="grid_8">
                        <div >
                           	<section>				
							 <form class="wpcf7" role="form" action="" method="POST" enctype="multipart/form-data">
							 <fieldset>
                                    <label> Upload CSV File :</label>
                                   <input type="file" class="wpcf7-text" name="img">
                                </fieldset>						
                                 <input type="submit" class="wpcf7-submit2 btn btn-primary" value="Submit" name="submitq"/>
                            </form><!-- wpcf7 end -->
 </section> </div>
                </article>
       </div>       
    
 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "csvtest";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

    if(isset($_POST['submitq']))
    {
		$file_name=$_FILES['img']['name'];
        $file_tmp=$_FILES['img']['tmp_name'];
        $ext=explode(".",$file_name);
        $ext=end($ext);
        $f_name=uniqid().'.'.$ext;
        $store="csvfile/".$f_name;
		
		  if(move_uploaded_file($file_tmp,$store))
            {
         $sql= "INSERT INTO cashback_filetbl(file_name) VALUES('".$f_name."')";
		  if (mysqli_query($conn, $sql)) {
			  // path where your CSV file is located
define('CSV_PATH','D:/Dhruvi/Work_deadDEc/Left/IT/Part-6-13.2GB/Develop/Php/wamp64/www/csv/csvfile/');

// Name of your CSV file
$csv_file = CSV_PATH . "$f_name"; 
if (($handle = fopen($csv_file, "r")) !== FALSE) {
   fgetcsv($handle);   
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        for ($c=0; $c < $num; $c++) {
          $col[$c] = $data[$c];
        }

 $poffer_id = $col[0];
 $pcampaign = $col[1];
 $pcoupon_title= $col[2];
 $pcoupon_code = $col[3];
 $pstart_date = $col[4];
 $pend_date = $col[5];
 $planding_page = $col[6];
 
 
   
// SQL Query to insert data into DataBase
$query = "INSERT INTO cashback_payoom(poffer_id, pcampaign, pcoupon_title, pcoupon_code, pstart_date, pend_date,planding_page) VALUES('".$poffer_id."','".$pcampaign."','".$pcoupon_title."', '".$pcoupon_code."', '".$pstart_date."', '".$pend_date."', '".$planding_page."')";
$s= mysqli_query($conn, $query);
   }
	
 $se1 ="SELECT * FROM cashback_payoom";
  $re1 = $conn->query($se1);
	if ($re1->num_rows >= 1) {
	     while($ro1 = $re1->fetch_assoc()) {
			$poffer_id2 = $ro1['poffer_id'];
            $pcampaign2 = $ro1['pcampaign'];
			$pcoupon_title2= $ro1['pcoupon_title'];
			$pcoupon_code2 = $ro1['pcoupon_code'];
			$pstart_date2 = $ro1['pstart_date'];
			$pend_date2 = $ro1['pend_date'];
			$planding_page2 = $ro1['planding_page'];
			
$se2 = "SELECT * FROM cashback_c2 WHERE coupons_title='$pcoupon_title2' && coupons_code='$pcoupon_code2'";
$re2 = $conn->query($se2);
if ($re2->num_rows >= 1) {
      echo "<script>alert('Coupons alreday Exists.!!');</script>";
}
else
{
    $coupon_type= "coupon";
	$se3="INSERT INTO cashback_c2 (coupons_offer_id,coupons_offer_name,coupons_title,coupons_type, coupons_code,coupons_link,coupons_date,coupons_expiry,coupons_storelink ) VALUES('".$poffer_id2."','".$pcampaign2."','".$pcoupon_title2."','".$coupon_type."'  ,'".$pcoupon_code2."' ,'".$planding_page2."','".$pstart_date2."' ,'".$pend_date2."','".$planding_page2."' ) ";
	 if (mysqli_query($conn, $se3)) {
	 echo "<script>alert('New coupons inserted.!!');</script>";
	}
  }
 }
}
 }
    fclose($handle);
   }

		  }
		 else{
			  echo "<script>alert('Move uploaded file error..!!');</script>";
		 }
	}	
?>
