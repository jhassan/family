<?php
include_once('functions.php');
if($_POST['image_form_submit'] == 1)
{
	$images_arr = array();
	foreach($_FILES['images']['name'] as $key=>$val){
		$random_no = generateRandomString(5);
		$image_name = $_FILES['images']['name'][$key];
		$tmp_name 	= $_FILES['images']['tmp_name'][$key];
		$size 		= $_FILES['images']['size'][$key];
		$type 		= $_FILES['images']['type'][$key];
		$error 		= $_FILES['images']['error'][$key];
		$finalImageName = $random_no.$image_name;
		
		############ Remove comments if you want to upload and stored images into the "uploads/" folder #############
		
		$target_dir = "images/temp/";
		$target_file = $target_dir.$finalImageName;
		if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$target_file)){
			$images_arr[] = $target_file;
		}
		
		//Insert images gallery
		
		$arr = array(
						'user_id' => $_POST['nUserID'],
						'image_name' => $finalImageName);
			if(!empty($image_name))
				$nLastID = InsertRec("tblimages", $arr);
		
	}
	
	//Generate images view
	$SQL = "SELECT * FROM tblimages WHERE user_id = '".(int)$_POST['nUserID']."'";			
	$result = MySQLQuery($SQL);
	while($row = mysql_fetch_array($result)){
		 $count++?>
			<ul class="reorder_ul reorder-photos-list">
            	<li id="image_li_<?php echo $count; ?>" class="ui-sortable-handle">
                	<a href="javascript:void(0);" style="float:none;" class="image_link"><img src="images/temp/<?php echo $row['image_name']; ?>" alt=""></a>
               	</li>
          	</ul>
	<?php }
	}

?>