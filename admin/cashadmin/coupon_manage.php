<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'STATUS UPDATE SUCCESSFULLY');	
}	
if($_REQUEST['id']==2)
{
array_push($valid->success_msg,'API DELETED SUCCESSFULLY');	
}
if($_REQUEST['id']==3)
{
array_push($valid->success_msg,'API Detail updated successfully');	
}	
}

if(isset($_REQUEST['action']))
{
if($_REQUEST['action'] == 'status')
{
$qury->change_status($qury->com_table,$_REQUEST['name'],$_REQUEST['status']);
echo "<script>window.location='api_integrate.php?id=1'</script>";
}

if($_REQUEST['action'] == 'delete')
{
	$qury->delete_data($qury->com_table,$_REQUEST['name']);
	echo "<script>window.location='api_integrate.php?id=2'</script>";
}	
}

if(isset($_REQUEST['UPDATE']))
{
$data =array(
$qury->com_table.'_trackingid' => $_REQUEST['track_id'],
$qury->com_table.'_token' => $_REQUEST['token'],
$qury->com_table.'_apikey' => $_REQUEST['apikey'],
$qury->com_table.'_cashback' => $_REQUEST['cashback']
);
$qury->update($qury->prefix.$qury->com_table,$data," WHERE ".$qury->com_table."_id='".$_REQUEST['a_id']."'");

$cdata = array(
$qury->cat_table."_cashback" =>$_REQUEST['cashback']
);
$qury->update($qury->prefix.$qury->cat_table,$cdata," WHERE ".$qury->cat_table."_companies	='".$_REQUEST['a_id']."'");

$pdata = array(
$qury->prd_table."_cashback" =>$_REQUEST['cashback']
);
$qury->update($qury->prefix.$qury->prd_table,$pdata," WHERE ".$qury->prd_table."_company='".$_REQUEST['a_id']."'");
echo "<script>window.location='api_integrate.php?id=3'</script>";	
}
?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Manage Coupons</h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Coupons </li>
                        </ol>
                    </div>
                </div><!-- /.header-content -->
                <!--/ End page header -->

                <!-- Start body content -->
                <div class="body-content animated fadeIn">
					<div class="row">
					
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php include '../alert.php'; ?>
						
						
						<div class="table-responsive mb-20">
                                <table class="table table-striped table-theme table-responsive">
                                    <thead>
                                        <tr>
                                           <th class="text-center border-right">SNo</th>
											<th>Title</th>
											<th>Category </th>
											<th>Cashback</th>
                                            <th>Company Name</th>
											<th>Logo</th>
											<th>Start date </th>
											<th>End Date </th>		
											
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $i=1; 
									$now = date('Y-m-d');
									$page = $qury->pagination("*",$qury->cpn_table,20,$_SERVER['PHP_SELF']," WHERE ".$qury->cpn_table."_expiry >= '".$now."'","");
									
									
									$com_select = $qury->selectr("*",$qury->prefix.$qury->cpn_table," WHERE ".$qury->cpn_table."_expiry >= '".$now."' ORDER BY ".$qury->cpn_table."_id DESC $page[0]");
										foreach($com_select as $com)
										{
											echo "<tr><td>".$i."</td>
											<td>".ucwords($com[$qury->cpn_table.'_title'])."</td>
											<td><select class='form-control rounded ff' name='company' id='".$com[$qury->cpn_table.'_id']."' valid='select'>
	  <option value=''>Select Category</option>";
				$cat_select = $qury->selectr($qury->cpn_table."_category",$qury->prefix.$qury->cpn_table," WHERE ".$qury->cpn_table."_category !='' GROUP BY ".$qury->cpn_table."_category");
				foreach($cat_select as $cat)
		{
			echo "<option value='".$cat[$qury->cpn_table.'_category']."' ".$qury->selected($com[$qury->cpn_table.'_category'],$cat[$qury->cpn_table.'_category']).">".$cat[$qury->cpn_table.'_category']."</option>";
		}
	 
	  
	 echo "</select></td>
	  <td><input type='text' value='".$com[$qury->cpn_table.'_cashback']."' class='cs_".$com[$qury->cpn_table.'_id']."' style='width:80px;' /> <button class='btn btn-primary btn-sm sub' id='".$com[$qury->cpn_table.'_id']."'>SUBMIT</button>
	 </td>
											<td>".ucwords($com[$qury->cpn_table.'_offer_name'])."</td>
											<td><img src='../logo/".$com[$qury->cpn_table.'_images']."' class='image-responsive' style='width:100px; height:50px;'/></td><td>".$com[$qury->cpn_table.'_date']."</td><td>".$com[$qury->cpn_table.'_expiry']."</td>
											<td>
											<div class='fb-like' data-href='http://onlineoffers2day.com/coupons.php?cat=".$qury->encrypt_decrypt('encrypt',$com[$qury->cpn_table.'_offer_name'])."&sss=".$com[$qury->cpn_table.'_id']."' data-layout='button' data-action='like' data-size='small' data-show-faces='true' data-share='true'></div>
											
											<a href='api_integrate.php?action=edit&name=".$qury->encrypt_decrypt('encrypt',$com[$qury->cpn_table.'_id'])."' class='btn btn-push btn-info btn-xs'><i class='fa fa-pencil'></i> </a> <a  href='api_integrate.php?action=delete&name=".$qury->encrypt_decrypt('encrypt',$com[$qury->cpn_table.'_id'])."' class='btn btn-push btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>
					 						
											
											 </td></tr>";
											
										$i++;
										}
									
									?>
									</tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center border-right">SNo</th>
											 <th class="text-center border-right">SNo</th>
											<th>Title</th>
											<th>Category </th>
											<th>Cashback</th>
                                            <th>Company Name</th>
											<th>Logo</th>
											<th>Start date </th>
											<th>End Date </th>		
											
                                           <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
							<ul class="pagination">
							<?php echo $page[1]; ?>
							</ul>
						</div>
						

					</div>
                    
                </div><!-- /.body-content -->
                <!--/ End body content -->

                
<?php require_once 'footer.php'; ?>
<script>
$(document).ready(function(){
$('.ff').change(function(){
var coid = $(this).attr('id');

var vaj = $(this).val();
var queryString = "coid="+coid+"&vaj="+vaj;
$.ajax({
            url: "query.php",
            type: "POST",
            data: queryString,
success: function(msg){

  }
});
});
});

$(document).ready(function(){
$('.sub').click(function(){
var caid = $(this).attr('id');
var csaj = $('.cs_'+caid).val();
var queryString = "caid="+caid+"&csaj="+csaj;
$.ajax({
            url: "query.php",
            type: "POST",
            data: queryString,
success: function(msg){

  }
});
});
});
</script>
