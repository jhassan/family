<style type="text/css">
.urdu_font{ font-size: 18px !important; }
</style>
<?php
if(!empty($_GET['lang']) && $_GET['lang'] == 'ur')
{
	$lang = 'ur';
	$class_font = "urdu_font";
}
else
{
		$lang = 'en';
}
?>
<?php
						include_once("front_functions.php");
						$item_per_page = 8;
						//Get page number from Ajax POST
						if(isset($_POST["page"])){
							$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
							if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
						}else{
							$page_number = 1; //if there's no page number, set it to 1
						}
						
						//get total number of records from database for pagination
						$results = mysql_query("SELECT COUNT(*) as Counts FROM our_family");
						$row = mysql_fetch_array($results);
    		$results = $row['Counts'];
												//$results = mysql_num_rows($results);
						//var_dump($results); die;

						$get_total_rows = $results; //hold total records in variable
						//break records into pages
						$total_pages = ceil($get_total_rows/$item_per_page);
						
						//get starting position to fetch the records
						$page_position = (($page_number-1) * $item_per_page);
						mysql_query ("set character_set_results='utf8'");
						//SQL query that will fetch group of records depending on starting position and item per page. See SQL LIMIT clause
						$results = mysql_query("SELECT * FROM our_family ORDER BY user_id ASC LIMIT $page_position, $item_per_page");
						//Display records fetched from database.
						
					//	echo '<ul class="contents">';
					$i = 1;
						while($row = mysql_fetch_array($results)) {
							if(!empty($row['user_image'])){
								$user_image =  $row['user_image'];
							}else{
								if($row['user_type'] == 1)
									$user_image = 'male.jpg';
								else
									$user_image = 'female.png';	
							} 
						echo '<div class="col-sm-3">';
							echo '<div class="product-image-wrapper">';
								echo '<div class="single-products">';
										echo '<div class="productinfo text-center">';
											echo '<img src="admin/images/'.$user_image.'" alt="" height="170" width="40" />';
											echo '<a href="member?id='.(int)$row['user_id'].'&lang='.$_REQUEST['lang'].'"><h2>'.MemberName($row['user_id'],$_REQUEST['lang']).'</h2></a>';
											echo '<a href="member?id='.(int)$row['user_id'].'&lang='.$_REQUEST['lang'].'"><p class="'.$class_font.'">'.MemberName($row['father_id'],$_REQUEST['lang']).'</p></a>';
								   echo '<a href="member?id='.(int)$row['user_id'].'&lang='.$_REQUEST['lang'].'"><p class="'.$class_font.'">'.MemberName($row['mother_id'],$_REQUEST['lang']).'</p></a>';
										echo '</div>';
										//echo '<div class="product-overlay">';
											//echo '<div class="overlay-content">';
           	//echo '<h2>Shop Name</h2>';
												//echo '<p>Easy Polo Black Edition Easy Polo Black Edition Easy Polo Black Edition Easy Polo Black Edition Easy Polo Black Edition Easy Polo Black Edition</p>';
											//echo '</div>';
										//echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
						 if($i%4 == 0) {
     echo '<div class="clearfix"></div>';
     
     } $i++;
					} // end while
							 
						echo '<div align="center" class="clear" style="margin-bottom:15px;">';
						/* We call the pagination function here to generate Pagination link for us. 
						As you can see I have passed several parameters to the function. */
						echo paginate_function($item_per_page, $page_number, $get_total_rows, $total_pages);
						echo '</div>';
					?>