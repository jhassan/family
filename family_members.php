<?php require_once('header.php');?>
	<section>
		<div class="container">
			<div class="row">
				<?php require_once('left_side_bar.php');?>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Family Members</h2>

     
     <?php
     			$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
								if ($page <= 0) $page = 1;
								
								$per_page = 9; // Set how many records do you want to display per page.
								
								$startpoint = ($page * $per_page) - $per_page;
								
								$statement = "our_family ORDER BY `user_id` ASC"; // Change `records` according to your table name.
									
								//$results = mysqli_query($conDB,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");
								
								$SQL = "SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}";
								$results = MySQLQuery($SQL);
								$i = 1;
								
								if (mysql_num_rows($results) != 0) {
												
									// displaying records.
												while ($row = mysql_fetch_array($results)) {
												if(!empty($row['user_image'])){
												$user_image =  $row['user_image'];
											}else{
												if($row['user_type'] == 1)
													$user_image = 'male.jpg';
												else
													$user_image = 'female.png';	
											}	?>											
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
     
     <?php } $i++;
												} // end while
									
								} else {
													echo "No records are found.";
								}
								
									// displaying paginaiton.
								echo pagination($statement,$per_page,$page,$url='index?');
					
					?>

						
						
						
						
						
					</div><!--features_items-->
					
					<?php require_once("bottom_slider.php");?>
					
				</div>
			</div>
		</div>
	</section>
	<?php require_once("footer.php");?>
	
</body>
</html>