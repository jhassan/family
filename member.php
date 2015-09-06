<?php require_once('header.php');
if(!empty($_GET['id']))
	{
		$ID = $_GET['id'];
		$Where = "user_id = '".(int)$ID."'";
		$strRow = GetRecord("our_family", $Where);
		$user_id = $strRow['user_id'];
		if(!empty($strRow['user_image'])){
			$user_image =  $strRow['user_image'];
		}else{
			if($strRow['user_type'] == 1)
				$user_image = 'male.jpg';
			else
				$user_image = 'female.png';	
		}
	}

?>
	
	<section>
		<div class="container">
			<div class="row">
				<?php require_once('left_side_bar.php');?>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="admin/images/<?php echo $user_image; ?>" alt="" height="250" />
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2><?php echo MemberName((int)$user_id);?></h2>
								<p><b>Father Name :  </b><?php echo MemberName((int)$strRow['father_id']);?></p>
								<p><b>Mother Name :  </b><?php echo MemberName((int)$strRow['mother_id']);?></p>
                                <?php if($strRow['user_type'] == 1 && $strRow['spous_id'] != 0) {?>
								<p><b>Wife Name :  </b><?php echo MemberName((int)$strRow['spous_id']);?></p>
                                <?php } elseif($strRow['user_type'] == 2 && $strRow['spous_id'] != 0){ ?>
                                <p><b>Husband Name :  </b><?php echo MemberName((int)$strRow['spous_id']);?></p>								<?php } ?>	
                                
                                <?php
												$SQL1 = "SELECT * FROM our_family WHERE father_id = '".$strRow['user_id']."'";			
												$result1 = MySQLQuery($SQL1); 
												$count = mysql_num_rows($result1);
												if($count > 0)
												{
												?>
                                                <h2 style="color:#FE980F;">Child Names</h2>
												<?php while($row1 = mysql_fetch_array($result1)) {
											?>
												<p><a style="padding-left:10px !important;" href="member?id=<?php echo $strRow['user_id'];?>"><?php echo MemberName($row1['user_id']);?></a></p>
                                            <?php } } ?>
                                
                                
                                			
							</div><!--/product-information-->
						</div>
					</div>
					<?php require_once("bottom_slider.php");?>
					
				</div>
			</div>
		</div>
	</section>
	<?php require_once("footer.php");?>
	
</body>
</html>