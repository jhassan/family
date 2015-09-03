<?php
	
	session_start();
	ob_start();
	include_once('config.php');
	include_once('functions.php');
	/*include_once('include/csv.php');
	include_once('accounts.php');*/  
	
	$action = $_REQUEST['action'];
	$nUserId = $_SESSION["nUserId"];
	$strDate = date("Y-m-d");
	// Upload Images
	$folderName = "uploads/";
	
	switch($action)
	{
		// Create User
		case "AddUser":
			
			// Upload Image
			$random_no = generateRandomString(5);
			$target_dir = "images/";
			$target_file = $target_dir . basename($random_no.$_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					echo "File is not an image.";
					$uploadOk = 0;
				//	die;
				}
			}
			
			// Check if file already exists
			if (file_exists($target_file)) {
				echo "Sorry, file already exists.";
				$uploadOk = 0;
				//die;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			//	die;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			//	die;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
				//die;
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$_POST['fileToUpload'] = $random_no.$_FILES["fileToUpload"]["name"];
					//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				} else {
					echo "Sorry, there was an error uploading your file.";
				//	die;
				}
			}
			
			$arr = array(
						'user_name' => $_POST['user_name'],
						'user_type' => $_POST['user_type'],
						'dob' 						=> $_POST['dob'],
						'death_date' => $_POST['death_date'],
						'mother_id' => $_POST['mother_id'],
						'father_id' => $_POST['father_id'],
						'spous_id'  => $_POST['spous_id'],
						'user_image'  => $_POST['fileToUpload'],
						'date_created' => date("Y-m-d H:i:s")
						);
			if(empty($_POST['nUserID']))
				$nLastID = InsertRec("our_family", $arr);
			else
			{
				$nLastID = UpdateRec('our_family', "user_id = '".$_POST['nUserID']."'",$arr);
				$nLastID = $_POST['nUserID'];
			}
			header("Location: view_users");
			//}
		break;
		
		// Add Air Lines AddAirLines
		case "AddAirLines":
			//if(empty($_POST['air_line_name']) && !empty($_POST['air_line_code']) && !empty($_FILES["fileToUpload"]["name"]))
			if(empty($_POST['air_line_name']))
			{
				echo "Please enter air line name!"; 
				die;
			}
			else if(empty($_POST['air_line_code']))
			{
				echo "Please enter air line code!"; 
				die;	
			} else if(empty($_FILES["fileToUpload"]["name"]))
			{
				echo "Please select air line image!"; 
				die;	
			}
			else
			{
			// Upload Image
			$random_no = generateRandomString(5);
			$target_dir = "images/";
			$target_file = $target_dir . basename($random_no.$_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					echo "File is not an image.";
					$uploadOk = 0;
					die;
				}
			}
			
			// Check if file already exists
			if (file_exists($target_file)) {
				echo "Sorry, file already exists.";
				$uploadOk = 0;
				die;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
				die;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
				die;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
				die;
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$_POST['fileToUpload'] = $random_no.$_FILES["fileToUpload"]["name"];
					//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				} else {
					echo "Sorry, there was an error uploading your file.";
					die;
				}
			}
			}
			$ID = $_POST['ID'];
			$arr = array("air_line_name" => $_POST['air_line_name'],
						"air_line_code" => $_POST['air_line_code'],
						"air_line_image" => $_POST['fileToUpload']);
			if(empty($ID))
			{ 
				$nLastId = InsertRec("tblairlines", $arr);
			}
			else
			{
				UpdateRec('tblairlines', "air_line_id = '$ID'",$arr);
			}
			// Update Permissions for admin
			$SQL = "SELECT * FROM tblairlines ORDER BY air_line_name";			
			 $result = MySQLQuery($SQL);
			 while($row = mysql_fetch_array($result)) {
				 $All_air_lines .= $row['air_line_id'].","; 
			 }
			$arrAirLine = array(
						'user_permissions' => rtrim($All_air_lines,","));
			$nLastID = UpdateRec('tbluser', "user_id = '1'",$arrAirLine);	
			echo "upload"; die;		
			//header("Location: view_air_lines");
		break;
		
		// Delete Air Lines
		case "DeleteAirLines":
			$DelID = $_REQUEST['DelID'];
			$Where = " air_line_id = '".$DelID."' ";
			$nRec = DeleteRec('tblairlines', $Where);
			echo "Record Deleted Successfully!";
		break;
		
		// Delete Users
		case "DeleteUsers":
			$DelID = $_REQUEST['DelID'];
			$arrAirLine = array(
						'user_status' => '0');
			$nLastID = UpdateRec('tbluser', "user_id = '".(int)$DelID."'",$arrAirLine);
			echo "Record Deleted Successfully!";
		break;
		
		
		
		
		
	}

?>