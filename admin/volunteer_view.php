<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'STATUS UPDATE SUCCESSFULLY');	
}	
if($_REQUEST['id']==2)
{
array_push($valid->success_msg,'MEMBERS DELETED SUCCESSFULLY');	
}	
}
if(isset($_REQUEST['name']))
{
	$mid = $qury->encrypt_decrypt('decrypt',$_REQUEST['name']);
$comp = $qury->selectfetch("*",$qury->prefix.$qury->comp_table," WHERE ".$qury->comp_table."_id='".$mid."'");
}
if(isset($_REQUEST['action']))
{
if($_REQUEST['action'] == 'status')
{
$qury->change_status($qury->mem_table,$_REQUEST['name'],$_REQUEST['status']);
echo "<script>window.location='members_manage.php?id=1'</script>";
}

if($_REQUEST['action'] == 'delete')
{
	$qury->delete_data($qury->mem_table,$_REQUEST['name']);
	echo "<script>window.location='members_manage.php?id=2'</script>";
}	
}

?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Volunteer Detail </h2>
                    </div><!-- /.header-content -->
                <!--/ End page header -->

                <!-- Start body content -->
                <div class="body-content animated fadeIn">
					<div class="row">
					
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
						<table class="table-reponsive table table-theme table-bordered">
						<thead>
						<tr><th colspan="4">Volunteer</th></tr>
						</thead>
						<tbody>
						<tr><td><strong>Title  </strong></td> <td><?php echo $comp[$qury->comp_table.'_complaint']; ?></td> <td><strong>Contact No</strong></td>  <td><?php echo $comp[$qury->comp_table.'_phone']; ?></td> </tr>
						
						<tr><td><strong>Description  </strong></td> <td><?php echo $comp[$qury->comp_table.'_desc']; ?></td> </tr>
				<?php $user3 = $qury->selectfetch("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_id='".$comp[$qury->comp_table.'_username']."'");
															?>
						
						<tr><td><strong>First Name </strong></td> <td><?php echo $user3[$qury->mem_table.'_fname']; ?></td> <td><strong>Last Name</strong></td>  <td><?php echo $user3[$qury->mem_table.'_lname']; ?></td> </tr>
						</tbody>
						<tbody>
							<tr><td><strong>Date </strong></td> <td><?php echo $comp[$qury->comp_table.'_date']; ?></td> </tr>
						
						
						</tbody>
						<tfoot>
                                        <tr>
                                            <th colspan="4"></th>
                                            
                                        </tr>
                                    </tfoot>
						</table>
						</div>
						</div>
						
  </div><!-- /.body-content -->
                <!--/ End body content -->

                
<?php require_once 'footer.php'; ?>
