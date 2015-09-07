<?php include_once('top.php');
	$strRow = "";
	if(!empty($_GET['id']))
	{
	$GetID = mysql_real_escape_string($_GET['id']);	
	$Where = " user_id = '".(int)$GetID."'";
	$GetRow = GetRecord("our_family", $Where);
	$user_name = $GetRow['user_name'];
	$user_type = $GetRow['user_type'];
	$dob = $GetRow['dob'];
	$death_date = $GetRow['death_date'];
	$father_id = $GetRow['father_id'];
	$mother_id = $GetRow['mother_id'];
	$spous_id = $GetRow['spous_id'];
	$user_image = $GetRow['user_image'];
	$user_order =  $GetRow['user_order'];
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
                    <h1 class="page-header">Add Family Member</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Family Member
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="action.php" id="myForm" method="post">
                                    <input type="hidden" name="action" id="action" value="AddUser" />
						            																		<input type="hidden" name="nUserID" id="nUserID" value="<?php echo $GetID; ?>" />
                                        <?php TextField("Name", "user_name", $user_name, "50","3","form-control required"); ?>
                                        <div class="form-group col-lg-3">
                                        <label>Select Gender</label>
																																								<?php ArrayComboBox("user_type", $user_type, $arrGender, true, "", "---Select Gender---", "required form-control", "");?>
                                        </div>
                                        <div class="clear m-t-10 hide"></div>
																																								<?php TextField("DOB", "dob", $dob, "16","3","form-control datepicker_new");
																																														TextField("Death", "death_date", $death_date, "16","3","form-control datepicker_new");
                                        
                                        ?>
                                        <div class="clear"></div>
                                        <div class="form-group col-lg-3">
                                            <label>Mother</label>
																																												<?php TableComboMsSql("our_family", "user_name", "user_id", "user_type = 2", "mother_id", $mother_id, "", "<option value=''>---Select Mother---</option>", "form-control", ""); ?>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Father</label>
																																												<?php TableComboMsSql("our_family", "user_name", "user_id", "user_type = 1", "father_id", $father_id, "", "<option value=''>---Select Father---</option>", "form-control", ""); ?>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Spous</label>
																																												<?php TableComboMsSql("our_family", "user_name", "user_id", "", "spous_id", $spous_id, "", "<option value=''>---Select Spous---</option>", "form-control", ""); ?>
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label>User Order</label>
                                            <select name="user_num" id="user_num" class="form-control">
                                            	<option>---Select Number---</option>
												<?php 
													for ($i=1; $i<=15; $i++){
														echo "<option value=\"$i\">$i</option>\n";
													}
												?>
                                            </select>
                                                                                                                                                                                </div>

                                        <div class="form-group m-r-15 m-t-10 col-lg-3">
                                            <label>Upload Image</label>
                                            <input type="file" name="fileToUpload" id="fileToUpload" class="">
                                        </div>
                                        <div class="clear"></div>
                                        <div class="form-group col-lg-4 m-t-10">
                                        	<?php if(!empty($GetID) && !empty($user_image)) {  ?>
                                            <img src="images/<?php echo $user_image;?>" height="25" width="70" alt="Air Line">
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
