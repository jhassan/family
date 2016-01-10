<footer id="footer" style="margin-top:50px;"><!--Footer-->
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-sm-offset-2  col-sm-10">
          <div class="col-sm-12 pull-left">
            <?php
							$SQL = "SELECT * FROM our_family ORDER BY RAND() LIMIT 0,5";
								$results = MySQLQuery($SQL);
								mysql_query ("set character_set_results='utf8'");
								$row = mysql_fetch_array($results);
								$i = 1;
								while ($row = mysql_fetch_array($results)) {
									if(!empty($row['user_image'])){
										$user_image =  $row['user_image'];
									}else{
										if($row['user_type'] == 1)
											$user_image = 'male.jpg';
										else
											$user_image = 'female.png';	
									}	?>
            <div class="col-md-3">
              <div class="video-gallery text-center">
                <div class="iframe-img" style="height: 125px"> <a href="member?id=<?php echo $row['user_id'];?>&lang=<?php echo $lang;?>"><img src="admin/images/<?php echo $user_image?>" height="50" alt="" /></a> </div>
                <div class="overlay-icon" style="height: 125px"> <i class="fa fa-play-circle-o"></i> </div>
                <h2><?php echo MemberName($row['user_id'],$lang);?></h2>
                <p><?php echo $row['dob'];?></p>
              </div>
            </div>
            <?php
								$i++; }
							?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <p class="pull-left">Copyright &copy; <?php echo date("Y");?> All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>
<!--/Footer--> 

<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.scrollUp.min.js"></script> 
<script src="js/price-range.js"></script> 
<script src="js/jquery.prettyPhoto.js"></script> 
<script src="js/main.js"></script>