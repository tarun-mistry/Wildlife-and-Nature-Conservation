<?php require_once 'header.php';?>
<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Payoom Coupons </h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Coupon </li>
                        </ol>
                    </div>
                </div><!-- /.header-content -->
                <!--/ End page header -->

                <!-- Start body content -->
                <div class="body-content animated fadeIn">
					<div class="row">
						<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
						<div class="panel panel-theme">
				<div class="panel-heading">
				<h2 class="panel-title">Coupon Form</h2>
				</div>
				<div class="panel-body">
				
				<?php require_once '../alert.php'; ?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8" enctype = "multipart/form-data">
	<div class="form-body">
     
	<div class="row">
	
		<div class="form-group">
		   <input type="file" class="wpcf7-text" name="img" value="Upload CSV File">
		   
      
	      </div>
     </div>
    </div>
	</div>
	<div class="form-footer">
	<div class="pull-right">
	<input name="submitq" value="Upload" class="btn btn-theme mr-5" id="Submit" type="submit">
	<input name="reset" value="Reset" class="btn btn-warning mr-5" id="Reset" type="reset"></div>
			<div class="clearfix"></div>
			
			</div></form>
<?php
$servername = "localhost";
$username = "onlinbsi_user";
$password = "88885192.";
$dbname = "onlinbsi_offers2day";

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
$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
if(in_array($_FILES['img']['type'],$mimes)){
  // do something
         $sql= "INSERT INTO cashback_filetbl(file_name) VALUES('".$f_name."')";
		  if (mysqli_query($conn, $sql)) {
			  // path where your CSV file is located
define('CSV_PATH','csvfile/');

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
 $d = explode("-"  ,$col[4]);
if( !checkdate($d[1], $d[0], $d[2]) ){
 $pstart_date =str_replace('/', '-', $col[4]);
   }
  else{
	    $pstart_date=$col[4];
   }
	
 $d2 = explode("-"  ,$col[5]);
if( !checkdate($d2[1], $d2[0], $d2[2]) ){
       $pend_date = str_replace('/', '-', $col[5]);
   } 
   else{
	   $pend_date=$col[5];
   }
 $planding_page = $col[6];
    
$query = "INSERT INTO cashback_payoom(poffer_id, pcampaign, pcoupon_title, pcoupon_code, pstart_date, pend_date,planding_page) VALUES('".$poffer_id."','".$pcampaign."','".$pcoupon_title."', '".$pcoupon_code."', STR_TO_DATE('".$pstart_date."', '%m-%d-%Y'), STR_TO_DATE('".$pend_date."', '%m-%d-%Y'), '".$planding_page."')";
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
			
$se2 = "SELECT * FROM cashback_coupons WHERE coupons_title='$pcoupon_title2' && coupons_code='$pcoupon_code2' && coupons_campaign='$pcampaign2'";
$re2 = $conn->query($se2);
if ($re2->num_rows >= 1) {
     $i=0;
}
else
{
    $coupon_type= "coupon";$coupons_offer_name="PAYOOM";
	$se3="INSERT INTO cashback_coupons (coupons_offer_id,coupons_offer_name,coupons_campaign,coupons_title,coupons_type, coupons_code,coupons_link,coupons_date,coupons_expiry,coupons_storelink ) VALUES('".$poffer_id2."','".$coupons_offer_name."','".$pcampaign2."','".$pcoupon_title2."','".$coupon_type."'  ,'".$pcoupon_code2."' ,'".$planding_page2."','".$pstart_date2."' ,'".$pend_date2."','".$planding_page2."' ) ";
	 if (mysqli_query($conn, $se3)) {
	 $i=1;
	}
  }
 }
  echo "<script>alert('Data Updated.!!');</script>";
}
 }
    fclose($handle);
   }
} else {
  die("Please upload valid CSV File.");
}

		  }
		 else{
			  echo "<script>alert('Move uploaded file error..!!');</script>";
		 }
	}	
?>	
	</div>
	</div>
	</div>		
    </div> 
   </div><!-- /.body-content -->
                <!--/ End body content -->

                
<?php require_once 'footer.php'; ?>
<script src="<?php echo $qury->siteurl(); ?>ckeditor/ckeditor.js" type="text/javascript"></script>