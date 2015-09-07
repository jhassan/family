<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
                            	<?php 
									$SQL = 'SELECT user_id FROM our_family';
									$result = MySQLQuery($SQL);
									$row = mysql_fetch_array($result);
									$count = 1;
									while($count <= 3){
										if(!empty($row['user_image'])){
											$user_image =  $row['user_image'];
										}else{
											if($row['user_type'] == 1)
												$user_image = 'male.jpg';
											else
												$user_image = 'female.png';	
										}
								?> 
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="admin/images/<?php echo $user_image; ?>" alt="" />
													<h2><?php echo MemberName($row['user_id']); ?></h2>
													<p><?php echo $row['dob']; ?></p>
													<!--<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
												</div>
												
											</div>
										</div>
									</div>
									</div>
                                    <?php $count++; }?>
								</div>
								
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div>