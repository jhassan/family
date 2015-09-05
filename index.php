<?php require_once('header.php');?>
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						</ol>
						
						<div class="carousel-inner">
       						<?php 
								$SQL = "SELECT * FROM tblbanner WHERE banner_status='1'";			
								$result = MySQLQuery($SQL);
								$i = 1;
								while($row = mysql_fetch_array($result)) {?>
                                <div class="item <?php if($i == 1) echo "active";?>">
                                <div class="col-sm-12">
                                 <img src="admin/images/<?=$row['banner_image']?>" height="500" class="girl img-responsive" alt="" />
                                </div>
                               </div>
                            <?php $i++; }?>

							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<?php require_once('left_side_bar.php');?>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
                        <?php 
								$SQL = "SELECT * FROM our_family";
								$result = MySQLQuery($SQL);
								$i = 1;
								while($row = mysql_fetch_array($result)) {
									if(!empty($row['user_image'])){
										$user_image =  $row['user_image'];
									}else{
										if($row['user_type'] == 1)
											$user_image = 'male.jpg';
										else
											$user_image = 'female.png';	
									}
									?>
                                
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="admin/images/<?php echo $user_image; ?>" alt="" height="250" />
											<h2><?php echo MemberName($row['user_id']);?></h2>
											<p><?php echo MemberName($row['father_id']);?></p>
								           <p><?php echo MemberName($row['mother_id']);?></p>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
           	<h2>Shop Name</h2>
												<p>Easy Polo Black Edition Easy Polo Black Edition Easy Polo Black Edition Easy Polo Black Edition Easy Polo Black Edition Easy Polo Black Edition</p>
											</div>
										</div>
								</div>
							</div>
						</div>
                        <?php if($i%3 == 0) {?>
                        <div class="clearfix"></div>
                        
                        <?php } $i++; } ?>

						
						
						
						
						
					</div><!--features_items-->
					
					<?php require_once("bottom_slider.php");?>
					
				</div>
			</div>
		</div>
	</section>
	<?php require_once("footer.php");?>
	
</body>
</html>