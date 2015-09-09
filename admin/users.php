<?php include_once('top.php');
	$strRow = "";
	if(!empty($_GET['id']))
	{
	$GetID = mysql_real_escape_string($_GET['id']);	
	$Where = " about_us_id = '".(int)$GetID."'";
	$GetRow = GetRecord("about_us", $Where);
	$title = $GetRow['title'];
	$slogon = $GetRow['slogon'];
	$description = $GetRow['description'];
	$image = $GetRow['image'];

	}
?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <?php include_once('header.php');?>    

        <?php include_once('leftsidebar.php');?>     
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add About Us Page </h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            About Us Page
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="action.php" id="myForm" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="action" id="action" value="AddAboutUs" />
                                        <input type="hidden" name="nAboutUsID" id="nAboutUsID" value="<?php echo $GetID; ?>" />
                                       
                                        <?php TextField("Title", "title", $title, "50","3","form-control required"); ?>
                                        <?php TextField("Slogon", "slogon", $slogon, "50","3","form-control required"); ?>

                                        <?php TextArea("Description", "aboutus-des", $description , "5", "30");?>
                                        <div class="clear"></div>
                                            <div class="form-group m-r-15 m-t-10 col-lg-3 p-l-0">
                                                <label>Upload Image</label>
                                                <input type="file" name="fileToUpload" id="fileToUpload" class="">
                                            </div>
                                        <div class="form-group col-lg-4 m-t-10">
                                        	<?php if(!empty($GetID) && !empty($image)) {  ?>
                                            <img src="admin/images/<?php echo $image;?>" height="25" width="70" alt="Image">
                                            <?php } ?>
                                        </div>
											
                                            <div class="clear"></div>
                                        <div class="form-group col-lg-6">
	                                        <button type="submit" class="btn btn-default m-t-10">Save</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include_once('jquery.php');?>
    <script type="text/javascript" src="../js/zebra_datepicker.js"></script>
    <link rel="stylesheet" href="../dist/css/default.css" type="text/css">
    <script type="text/javascript">
	jQuery(function (){
		jQuery('#myForm').validate();
		$('input.datepicker_new').Zebra_DatePicker();
		});
	   </script>

</body>

</html>
