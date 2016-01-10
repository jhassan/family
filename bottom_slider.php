<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Gallery</h2>
      <!--<div class="loading-div1"><img src="images/ajax-loader.gif" ></div>-->
	 			<div id="results1"><!-- content will be loaded here --></div>
      <?php
												/*$SQL2 = "SELECT * FROM tblimages WHERE user_id = '".(int)$user_id."'";		
												$result2 = MySQLQuery($SQL2); 
												$count1 = mysql_num_rows($result2);
												if($count1 > 0)
												{
												 while($row1 = mysql_fetch_array($result2)) {*/
											?>
						<!--<a style="float:left; border: 9px solid #696763; margin: 5px;" class="fancybox" href="admin/images/temp/<?php echo $row1['image_name'];?>" data-fancybox-group="gallery"><img src="admin/images/temp/<?php echo $row1['image_name'];?>" width="150" alt="" /></a>-->
      
      <?php //} }?>

</div>
<script type="text/javascript">
				$(document).ready(function() {
					$("#results1" ).load( "ajax_index1.php?user_id=<?php echo (int)$user_id;?>"); //load initial records
					
					//executes code below when user click on pagination_1 links
					$("#results1").on( "click", ".pagination_1 a", function (e){
						e.preventDefault();
						//$(".loading-div1").show(); //show loading element
						var page = $(this).attr("data-page"); //get page number from link
						$("#results1").load("ajax_index1.php?user_id=<?php echo (int)$user_id;?>",{"page":page}, function(){ //get content from PHP page
							//$(".loading-div1").hide(); //once done, hide loading element
						});
						
					});
				});
</script>
<style>
body,td,th {
	font-family: Georgia, "Times New Roman", Times, serif;
	color: #333;
}
.contents{
	margin: 20px;
	padding: 20px;
	list-style: none;
	background: #F9F9F9;
	border: 1px solid #ddd;
	border-radius: 5px;
}
.contents li{
    margin-bottom: 10px;
}
.loading-div{
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(0, 0, 0, 0.56);
	z-index: 999;
	display:none;
}
.loading-div img {
	margin-top: 20%;
	margin-left: 50%;
}

/* pagination_1 style */
.pagination_1{margin:0;padding:0;}
.pagination_1 li{
	display: inline;
	padding: 6px 10px 6px 10px;
	border: 1px solid #ddd;
	margin-right: -1px;
	font: 15px/20px Arial, Helvetica, sans-serif;
	background: #FFFFFF;
	box-shadow: inset 1px 1px 5px #F4F4F4;
}
.pagination_1 li a{
    text-decoration:none;
    color: rgb(89, 141, 235);
}
.pagination_1 li.first {
    border-radius: 5px 0px 0px 5px;
}
.pagination_1 li.last {
    border-radius: 0px 5px 5px 0px;
}
.pagination_1 li:hover{
	background: #CFF;
}
.pagination_1 li.active{
	background: #F0F0F0;
	color: #333;
}
</style>