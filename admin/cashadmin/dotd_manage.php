<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'STATUS UPDATE SUCCESSFULLY');	
}	
if($_REQUEST['id']==2)
{
array_push($valid->success_msg,'PRODUCT DELETED SUCCESSFULLY');	
}	
}

if(isset($_REQUEST['action']))
{
if($_REQUEST['action'] == 'status')
{
$qury->change_status($qury->dotd_table,$_REQUEST['name'],$_REQUEST['status']);
echo "<script>window.loprdion='dotd_manage.php?id=1'</script>";
}

if($_REQUEST['action'] == 'delete')
{
	$qury->delete_data($qury->prd_table,$_REQUEST['name']);
	echo "<script>window.loprdion='prod_manage.php?id=2'</script>";
}	
}

?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Manage Deal Of The Day Offers </h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        
                        <ol class="breadcrumb">
                           <li class="active"><a href="dotd_add.php" class="btn btn-theme btn-xs btn-push" style="color:white">Add Hot Deal</a> </li>
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
                                            <th>Dotd Title</th>
											<th>Dotd Descrition</th>
											<th>Cashback</th>
											<th>Company</th>
											<th>Image</th>
											<th>Availability</th>
											<th>Status</th>
                                           <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $i=1; 
									
									$page = $qury->pagination("*",$qury->dotd_table,20,$_SERVER['PHP_SELF'],"","");
									$prd_select = $qury->selectr("*",$qury->prefix.$qury->dotd_table," ORDER BY ".$qury->dotd_table."_id $page[0]");
										foreach($prd_select as $prd)
										{
											echo "<tr><td>".$i."</td><td>".ucwords($prd[$qury->dotd_table.'_title'])."</td>
											<td>".ucwords($prd[$qury->dotd_table.'_description'])."</td>
											<td><input class='".$prd[$qury->dotd_table.'_id']."' style='width:70px;' type='text' value='".$prd[$qury->dotd_table.'_cashback']."' /> <button name='cchange' class='change btn btn-primary btn-xs' id='".$prd[$qury->dotd_table.'_id']."'>change</button></td>
											<td>".$qury->companies($prd[$qury->dotd_table.'_company'])."</td>
											<td><img src='".$prd[$qury->dotd_table.'_imageUrls']."' style='width:100px; height:100px;'/></td>
											<td>".$prd[$qury->dotd_table.'_availability']."</td><td>".$project->status($prd[$qury->dotd_table.'_status'])."</td><td> <div class='btn-group'>
                                            <button type='button' class='btn btn-teal btn-push btn-xs'><i class='fa fa-cogs'></i></button>
                                            <button aria-expanded='false' type='button' class='btn btn-xs btn-push btn-teal dropdown-toggle' data-toggle='dropdown'>
                                                <span class='caret'></span>
                                                <span class='sr-only'>Toggle Dropdown</span>
                                            </button>
                                            <ul class='dropdown-menu' role='menu'>
                                                <li><a href='dotd_manage.php?action=status&status=active&name=".$qury->encrypt_decrypt('encrypt',$prd[$qury->dotd_table.'_id'])."'>Active</a></li>
                                                <li><a href='dotd_manage.php?action=status&status=block&name=".$qury->encrypt_decrypt('encrypt',$prd[$qury->dotd_table.'_id'])."'>Block</a></li>
                                                <li><a href='dotd_manage.php?action=status&status=pending&name=".$qury->encrypt_decrypt('encrypt',$prd[$qury->dotd_table.'_id'])."'>Pending</a></li>
                                                
                                            </ul>
                                        </div></td></tr>";
											
										$i++;
										}
									
									?>
									</tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center border-right">SNo</th>
                                            <th>Dotd Title</th>
											<th>Dotd Descrition</th>
											<th>Cashback</th>
											<th>Company</th>
											<th>Image</th>
											<th>Availability</th>
											<th>Status</th>
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
$('.change').click(function(){
var dotdv = $(this).attr('id');
var dotds = $('.'+dotdv).val();
var queryString = "dotdv="+dotdv+"&dotds="+dotds;
$.ajax({
            url: "query.php",
            type: "POST",
            data: queryString,
success: function(msg){
	$("#product").html(msg);
 
  }

});
});	
});
</script>