<?php require_once('header.php');?>
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						</ol>
						
						<div class="carousel-inner">
       						<?php 
								$SQL = "SELECT * FROM tblbanner WHERE banner_status='1'";			
								$result = MySQLQuery($SQL);
								$i = 1;
								while($row = mysql_fetch_array($result)) {?>
                                <div class="item <?php if($i == 1) echo "active";?>">
                                <div class="col-sm-12">
                                <img src="admin/images/<?=$row['banner_image']?>" height="500" class="girl img-responsive" alt="" />
                                </div>
                               </div>
                            <?php $i++; }?>

							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<?php require_once('left_side_bar.php');?>
    <script type="text/javascript">
				$(document).ready(function() {
					$("#results" ).load( "ajax_index.php?lang=<?php echo $lang;?>"); //load initial records
					
					//executes code below when user click on pagination_1 links
					$("#results").on( "click", ".pagination_1 a", function (e){
						e.preventDefault();
						$(".loading-div").show(); //show loading element
						var page = $(this).attr("data-page"); //get page number from link
						$("#results").load("ajax_index.php?lang=<?php echo $lang;?>",{"page":page}, function(){ //get content from PHP page
							$(".loading-div").hide(); //once done, hide loading element
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
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Family Members</h2>
					<div class="loading-div"><img src="images/ajax-loader.gif" ></div>
 			<div id="results"><!-- content will be loaded here --></div>
					</div><!--features_items-->
					
					<?php //require_once("bottom_slider.php");?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php require_once("footer.php");?>
	
</body>
</html>