<?php require_once('front_functions.php');?>
<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Each Family</h2>
                        	
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php
							$SQL = "SELECT * FROM our_family WHERE user_type = 1 AND spous_id <> 0";			
							$result = MySQLQuery($SQL);
							$i = 1;
							while($row = mysql_fetch_array($result)) {
						?>
                        <div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens_<?php echo $i;?>">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											<a href="member?id=<?php echo $row['user_id'];?>"><?php echo $row['user_name'];?></a>
										</a>
									</h4>
								</div>
								<div id="mens_<?php echo $i;?>" class="panel-collapse collapse">
									<div class="panel-body">
                                    <a href="member?id=<?php echo $row['spous_id'];?>"><h5 style="padding-left: 19px; color:#000;"><?php echo MemberName($row['spous_id']);?></h5></a>
										<ul>
                                        	<?php
												$SQL1 = "SELECT * FROM our_family WHERE father_id = '".$row['user_id']."'";			
												$result1 = MySQLQuery($SQL1);
												while($row1 = mysql_fetch_array($result1)) {
											?>
												<li><a href="member?id=<?php echo $row1['user_id'];?>"><?php echo MemberName($row1['user_id']);?></a></li>
                                            <?php } ?>
										</ul>
									</div>
								</div>
							</div>
                        <?php $i++; }?>
                        
                        
                        

						</div><!--/category-products-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>