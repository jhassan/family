<?php
						include_once("front_functions.php");
						//Get page number from Ajax POST
						if(isset($_POST["page"]) && $_POST["page"] != -1){
							$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
							if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
						}else{
							$page_number = 1; //if there's no page number, set it to 1
						}
						//get total number of records from database for pagination
						$results = mysql_query("SELECT COUNT(*) as Counts FROM tblimages WHERE user_id = ".(int)$_REQUEST["user_id"]."");
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
						$results = mysql_query("SELECT * FROM tblimages WHERE user_id = ".(int)$_REQUEST["user_id"]." ORDER BY image_id ASC LIMIT $page_position, $item_per_page");
						//Display records fetched from database.
						
					//	echo '<ul class="contents">';
					$i = 1;
						while($row = mysql_fetch_array($results)) {
						echo '<a style="float:left; border: 9px solid #696763; margin: 5px;" class="fancybox" href="admin/images/temp/'.$row['image_name'].'" data-fancybox-group="gallery"><img src="admin/images/temp/'.$row['image_name'].'" width="150" alt="" /></a>';
						if($i%4 == 0) {
     echo '<div class="clearfix"></div>';
     
     } $i++;
					} // end while
							 
						echo '<div align="center" class="clear" style="margin-top:15px; margin-bottom:15px; float:left;">';
						/* We call the pagination function here to generate Pagination link for us. 
						As you can see I have passed several parameters to the function. */
						echo paginate_function($item_per_page, $page_number, $get_total_rows, $total_pages);
						echo '</div>';
					?>