<?php  require 'header.php';
 ?>
    <!--=== Content Part ===-->
    <div class="container content">
        <div class="row magazine-page">
            <!-- Begin Content -->
            <div class="col-md-12 margin-bottom-25">
				<div class="col-md-8">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="headline"><h2><img src="images/hot-32.png" class="img-responsive" style="max-width: 40px; float: left; margin-right: 10px;"> Flipkart Offers</h2>
							

							</div>
							
							<?php
							$page = $qury->pagination("*",$qury->alofr_table,10,$_SERVER['PHP_SELF']," WHERE ".$qury->alofr_table."_status='1' AND ".$qury->alofr_table."_endtime >= '".time()."000'","");	
						
							$alloffers= $qury->selectr("*",$qury->prefix.$qury->alofr_table," WHERE ".$qury->alofr_table."_status='1' AND ".$qury->alofr_table."_endtime >= '".time()."000' ORDER BY ".$qury->alofr_table."_id $page[0]");
							
							
							
							foreach($alloffers as $offer)
							{
								//date_default_timezone_set('Asia/Kolkata');
							$sub =  $project->unix_to_time($offer[$qury->alofr_table.'_endtime']);
							
							if(isset($_SESSION['casUser']))
							{
								$href = "shop.php?ao=".$offer[$qury->alofr_table."_id"];
							}
							else{
								
								$href = "access.php?ao=".$offer[$qury->alofr_table."_id"];
							}
							
							echo '<div class="col-md-12 col-sm-12">
							<div class="funny-boxes funny-boxes-left-blue">
                        <div class="row">
                            <div class="col-md-4 funny-boxes-img">';
							if($offer[$qury->alofr_table."_imgurl"]!='')
							{
							echo '<img class="img-responsive" src="'.$offer[$qury->alofr_table."_imgurl"].'" alt="" style="height: 100px; width: 150px;">'; }
							else{
							echo '<img class="img-responsive" src="images/default_product.jpg" alt="" style="height: 100px; width: 150px;">'; }	
							
                                
                            echo '</div>
                           <div class="col-md-6">
						    <h2><a href="#" attr="'.$offer[$qury->alofr_table."_url"].'">'.ucwords(str_replace('_',' ',$offer[$qury->alofr_table."_description"])).'</a> '.$project->fstock($offer[$qury->alofr_table."_availability"]).'</h2>
							<p class="color-red">Offer - '.$offer[$qury->alofr_table."_title"].'</p>
							<p>Category - '.ucwords(str_replace('_',' ',$offer[$qury->alofr_table."_category"])).'</p>
							<p class="color-blue"><small>Expiring on '.$project->unix_to_time($offer[$qury->alofr_table."_endtime"]).'</small></p>
							
						   </div>
						   
						   <div class="col-md-2">
						   <p><center><img src="images/offer-icons.png" alt="offer-icons.png" class="img-responsive" /></center></p>
						   
						   <p><a class="btn-u rounded-3x btn-u-blue offer" style="color:#fff" href="'.$href.'" target="_blank">Rewards</a></p>
						   
						  
						   
						   
						   </div>
                        </div>
                    </div>
				</div><div class="margin-bottom-25"></div>';
							} ?>
			
						</div>
						<ul class="pagination">
						<?php  echo $page[1]; ?>
						</ul>
					</div>
               
                           
				</div>
            <!-- End Content -->

            <!-- Begin Sidebar -->
            <?php include 'site_sidebar.php'; ?>  
            
            
            </div>
            <!-- End Sidebar -->
        </div>
       
        
        
        </div>
    </div><!--/container-->     
    <!-- End Content Part -->

 <?php require 'footer.php' ?>