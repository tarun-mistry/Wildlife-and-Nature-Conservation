<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'STATUS UPDATE SUCCESSFULLY');	
}	
if($_REQUEST['id']==2)
{
array_push($valid->success_msg,'Category DELETED SUCCESSFULLY');	
}	
}

if(isset($_REQUEST['action']))
{
if($_REQUEST['action'] == 'status')
{
$qury->change_status($qury->cat_table,$_REQUEST['name'],$_REQUEST['status']);
echo "<script>window.location='category_manage.php?id=1'</script>";
}

if($_REQUEST['action'] == 'delete')
{
	$qury->delete_data($qury->cat_table,$_REQUEST['name']);
	echo "<script>window.location='category_manage.php?id=2'</script>";
}	
}

?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Category Setting </h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Category </li>
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
                                            <th>Category Name</th>
											
											<th>Cashback </th>
											<th>Company</th>
											<th>Status</th>
                                           <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $i=1; 
									
									$page = $qury->pagination("*",$qury->cat_table,20,$_SERVER['PHP_SELF'],"","");
									$cat_select = $qury->selectr("*",$qury->prefix.$qury->cat_table," ORDER BY ".$qury->cat_table."_name $page[0]");
										foreach($cat_select as $cat)
										{
										echo "<tr><td>".$i."</td><td>".ucwords($cat[$qury->cat_table.'_name'])."<br/><small style='color:red'>
										Real Name :- ".ucwords($cat[$qury->cat_table.'_realname'])."</small>
										</td>
										
										
										
										<td><input class='".$cat[$qury->cat_table.'_title']."' style='width:70px;' type='text' value='".$cat[$qury->cat_table.'_cashback']."' /> <button name='cchange' class='change btn btn-primary btn-xs' id='".$cat[$qury->cat_table.'_title']."'>change</button></td>
										
										<td>".$qury->companies($cat[$qury->cat_table.'_companies'])."</td>
										<td>".$project->status($cat[$qury->cat_table.'_status'])."</td><td> <a  href='category_manage.php?action=delete&name=".$qury->encrypt_decrypt('encrypt',$cat[$qury->cat_table.'_id'])."' class='btn btn-push btn-danger btn-xs'><i class='fa fa-trash-o'></i></a> <div class='btn-group'>
                                            <button type='button' class='btn btn-teal btn-push btn-xs'><i class='fa fa-cogs'></i></button>
                                            <button aria-expanded='false' type='button' class='btn btn-xs btn-push btn-teal dropdown-toggle' data-toggle='dropdown'>
                                                <span class='caret'></span>
                                                <span class='sr-only'>Toggle Dropdown</span>
                                            </button>
                                            <ul class='dropdown-menu' role='menu'>
                                                <li><a href='category_manage.php?action=status&status=active&name=".$qury->encrypt_decrypt('encrypt',$cat[$qury->cat_table.'_id'])."'>Active</a></li>
                                                <li><a href='category_manage.php?action=status&status=block&name=".$qury->encrypt_decrypt('encrypt',$cat[$qury->cat_table.'_id'])."'>Block</a></li>
                                                <li><a href='category_manage.php?action=status&status=pending&name=".$qury->encrypt_decrypt('encrypt',$cat[$qury->cat_table.'_id'])."'>Pending</a></li>
                                                
                                            </ul>
                                        </div></td></tr>";
											
										$i++;
										}
									
									?>
									</tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center border-right">SNo</th>
                                            <th>Category Name</th>
											
											<th>Cashback </th>
											<th>Company</th>
											
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
$('.pare').change(function(){
var dd = $(this).attr('id');
var mcid = $('#'+dd).attr('att');
var vcalu = $('#'+dd).val();
var queryString = "mcid="+mcid+"&vcalu="+vcalu;
$.ajax({
            url: "query.php",
            type: "POST",
            data: queryString,
success: function(msg){
	alert(msg);
	$("#product").html(msg);
 
  }

});
});	
});

$(document).ready(function(){
$('.change').click(function(){
var catv = $(this).attr('id');
var cats = $('.'+catv).val();
var queryString = "catv="+catv+"&cats="+cats;
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