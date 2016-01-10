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
	$urdu_text =  $GetRow['urdu_text'];
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
                                    <form role="form" action="action.php" id="myForm" method="post" enctype="multipart/form-data" accept-charset='ISO-8859-15'>
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
                                            <select name="user_order" id="user_order" class="form-control" onchange='return SaveUserOrder(<?php echo (int)$GetID; ?>);'>
                                            	<option>---Select Number---</option>
																																														<?php 
                                               for ($i=1; $i<=15; $i++){
                                                if($user_order == $i)
                                                 echo "<option selected value=\"$i\">$i</option>\n";
                                                else
                                                 echo "<option value=\"$i\">$i</option>\n";
                                               }
                                              ?>
                                            </select>
                                        </div>
																																								<?php TextField("Name in Urdu", "urdu_text", $urdu_text, "50","3","form-control"); ?>		
                                        <div class="form-group m-r-15 m-t-10 col-lg-3">
                                            <label>Upload Image</label>
                                            <input type="file" name="fileToUpload" id="fileToUpload" class="">
                                        </div>
                                        <div class="form-group col-lg-4 m-t-10">
                                        	<?php if(!empty($GetID) && !empty($user_image)) {  ?>
                                            <img src="images/<?php echo $user_image;?>" height="70" width="70" alt="Air Line">
                                            <?php } ?>
                                        </div>
                                        <div class="clear"></div>
                                        <div class="form-group col-lg-6">
                                        <button type="submit" class="btn btn-default m-t-10">Save</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="upload_div" style="margin-left:30px; margin-bottom:0px;">
                                  <form name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="upload.php">
                                   <input type="hidden" name="image_form_submit" value="1"/>
                                   <input type="hidden" name="nUserID" id="nUserID" value="<?php echo $GetID; ?>" />
                                          <label>Choose Image</label>
                                          <input type="file" name="images[]" id="images" multiple >
                                      <div class="uploading none">
                                          <label>&nbsp;</label>
                                          <img src="../images/uploading.gif"/>
                                      </div>
                                  </form>
                                  </div>
                                 <div class="gallery" id="images_preview"></div>
                                 <div class="gallery" id="images_preview1" style="margin-top: 0px;">
                                 <?php
                                 	//Generate images view
																																				$SQL = "SELECT * FROM tblimages WHERE user_id = '".(int)$GetID."'";			
																																				$result = MySQLQuery($SQL);
																																				while($row = mysql_fetch_array($result)){
																																						$count++?>
																																						<ul class="reorder_ul reorder-photos-list">
																																																<li id="image_li_<?php echo $count; ?>" class="ui-sortable-handle">
																																																				<a href="javascript:void(0);" style="float:none;" class="image_link"><img src="images/temp/<?php echo $row['image_name']; ?>" width="150" alt=""></a>
                                                    <img style="width: 16px !important; " src="../images/minus2.png" alt="" width="16" height="16" onClick="" />
																																																			</li>
																																														</ul>
																																				<?php }	?>
                                    </div>
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
    <script type="text/javascript" src="../js/jquery.form.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#images').on('change',function(){
		$('#multiple_upload_form').ajaxForm({
			target:'#images_preview',
			beforeSubmit:function(e){
				$('.uploading').show();
			},
			success:function(e){
				$('.uploading').hide();
			},
			error:function(e){
			}
		}).submit();
	});
});

// onchange save user order
function SaveUserOrder(id)
{
	alert(id);
	alert($(this).val());
	
	
}
</script>
<style type="text/css">
.gallery{ width:100%; float:left; margin-top:30px;}

.gallery ul{ margin:0; padding:0; list-style-type:none;}

.gallery ul li{ padding:7px; border:2px solid #ccc; float:left; margin:10px 7px; background:none; width:auto; height:auto;}

#reorder-helper{margin: 18px 10px;
padding: 10px;}
.light_box {
background: #efefef;
padding: 20px;
margin: 10px 0;
text-align: center;
font-size: 1.2em;
}

/* NOTICE */
.notice, .notice a{ color: #fff !important; }
.notice { z-index: 8888; }
.notice a { font-weight: bold; }
.notice_error { background: #E46360; }
.notice_success { background: #657E3F; }

.gallery img{ width:250px;}

/************ multiple uploads **************/
.none{ display:none;}
.upload_div{ margin-bottom:50px;}
.uploading{ margin-top:15px;}
</style>

</body>

</html>
