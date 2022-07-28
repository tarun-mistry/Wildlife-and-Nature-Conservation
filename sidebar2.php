<div class="blog-bottom">
					<h4>Recent Posts</h4>			
				<?php 	$fetch = $qury->selectr("*",$qury->prefix.$qury->blog_table  );
			foreach($fetch as $fet)	{
				echo '
						<div class="product-go">
								<a href="single.php?id='.$fet[$qury->blog_table."_id"].'" class="fashion"><img class="img-responsive " src="blog/'.$fet[$qury->blog_table."_image"].'" alt=""></a>
								<div class="grid-product">
									<a href="single.php?id='.$fet[$qury->blog_table."_id"].'" class="elit">'.substr($fet[$qury->blog_table."_title"],0,28).'</a>
									<p>'.substr($fet[$qury->blog_table."_description"],0,60).'</p>
								</div>
							<div class="clearfix"> </div>
			</div> ';} ?>
						
							</div>
			