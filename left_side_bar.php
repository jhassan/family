<?php require_once('front_functions.php');?>

<div class="col-sm-3">
  <div class="left-sidebar">
    <h2>Each Family</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
      <?php
							mysql_query ("set character_set_results='utf8'");
							$SQL = "SELECT user_id,spous_id FROM our_family
WHERE user_id IN 
(
  SELECT DISTINCT father_id FROM our_family 
)
AND father_id != 0 AND user_type = 1";			
							$result = MySQLQuery($SQL);
							$i = 1;
							while($row = mysql_fetch_array($result)) {
						?>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordian" href="#mens_<?php echo $i;?>"> <span class="badge pull-right"><i class="fa fa-plus"></i></span> <a href="member?id=<?php echo $row['user_id'];?>&lang=<?php echo $lang;?>" class="<?=$class_font?>"><?php echo MemberName($row['user_id'],$lang);?></a> </a> </h4>
        </div>
        <div id="mens_<?php echo $i;?>" class="panel-collapse collapse">
          <div class="panel-body"> <a href="member?id=<?php echo $row['user_id'];?>&lang=<?php echo $lang;?>" class="<?=$class_font?>">
            <h5 style="padding-left: 19px; color:#FE980F; margin-top:0px;" class="<?=$class_font?>"><?php echo MemberName($row['spous_id'],$lang);?></h5>
            </a>
            <ul>
              <?php
												$SQL1 = "SELECT * FROM our_family WHERE father_id = '".$row['user_id']."' ORDER BY user_order";
												mysql_query ("set character_set_results='utf8'");			
												$result1 = MySQLQuery($SQL1);
												while($row1 = mysql_fetch_array($result1)) {
											?>
              <li><a href="member?id=<?php echo $row1['user_id'];?>&lang=<?php echo $lang;?>" class="<?=$class_font?>"><?php echo MemberName($row1['user_id'],$lang);?></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
      <?php $i++; }?>
    </div>
    <!--/category-products-->
    
    <div class="shipping text-center" style="padding-top: 0px;"><!--shipping-->
      <?php
							$SQL = "SELECT * FROM our_family where user_image <> '' ORDER BY RAND() LIMIT 0,2";
							mysql_query ("set character_set_results='utf8'");
								$results = MySQLQuery($SQL);
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
      <a style="padding-left:0px !important;" href="member?id=<?php echo $row['user_id'];?>&lang=<?php echo $lang;?>" class="<?=$class_font?>"><img src="admin/images/<?php echo $user_image?>"  width="270" alt="" /></a>
      <?php
								$i++; }
							?>
    </div>
    <!--/shipping--> 
    
  </div>
</div>
