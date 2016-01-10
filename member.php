<?php require_once('header.php');
if(!empty($_GET['id']))
	{
		$ID = $_GET['id'];
		$Where = "user_id = '".(int)$ID."'";
		$strRow = GetRecord("our_family", $Where);
		$user_id = $strRow['user_id'];
		$urdu_text = $strRow['urdu_text'];
		if(!empty($strRow['user_image'])){
			$user_image1 =  $strRow['user_image'];
		}else{
			if($strRow['user_type'] == 1)
				$user_image1 = 'male.jpg';
			else
				$user_image1 = 'female.png';	
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
            <div class="view-product"> <img src="admin/images/<?php echo $user_image1; ?>" alt="" width="300"/> </div>
          </div>
          <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
              <h2><?php echo MemberName((int)$user_id,$lang);?></h2>
              <p><b>Father Name : </b><?php echo MemberName((int)$strRow['father_id'],$lang);?></p>
              <p><b>Mother Name : </b><?php echo MemberName((int)$strRow['mother_id'],$lang);?></p>
              <?php if($strRow['user_type'] == 1 && $strRow['spous_id'] != 0) {?>
              <p><b>Wife Name : </b><?php echo MemberName((int)$strRow['spous_id'],$lang);?></p>
              <?php } elseif($strRow['user_type'] == 2 && $strRow['spous_id'] != 0){ ?>
              <p><b>Husband Name : </b><?php echo MemberName((int)$strRow['spous_id'],$lang);?></p>
              <?php } ?>
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
              <p><a style="padding-left:10px !important;" href="member?id=<?php echo $row1['user_id'];?>&lang=<?php echo $lang;?>"><?php echo MemberName($row1['user_id'],$lang);?></a></p>
              <?php } } ?>
            </div>
            <!--/product-information--> 
          </div>
        </div>
        <?php require_once("bottom_slider.php");?>
      </div>
    </div>
  </div>
</section>
<?php require_once("footer.php");?>
<script type="text/javascript" src="js/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" />
 <script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			
		});
	</script>
</body></html>