<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Family</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script type="text/javascript" src="js/jquery.js"></script>
    <style type="text/css">

/* For pagination function. */
ul.pagination {
    text-align:center;
    color:#FE980F;
}
ul.pagination li {
    display:inline;
    padding:0 3px;
}
ul.pagination a {
    color:#000;
    display:inline-block;
    padding:5px 10px;
    border:1px solid #FE980F;
    text-decoration:none;
}
ul.pagination a:hover,
ul.pagination a.current {
    background:#FE980F;
    color:#fff;
}
.clear{ clear:both !important;}
.urdu_font{ font-size: 18px !important; }
</style>
</head><!--/head-->
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
<body>
	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<h2><a href="index?lang=<?php echo $lang;?>">Family</a></h2>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
      <?php $page = $_SERVER['PHP_SELF'];
													$page = explode("/",$page);
													$page = preg_replace('/\\.[^.\\s]{3,4}$/', '', $page[2]);
													if(!empty($_GET['id']))
														$page = $page."?id=".$_GET['id'];
															
													
						?>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index?lang=<?php echo $lang;?>" class="active">Home</a></li>
        <li><a href="family_members?lang=<?php echo $lang;?>">Family Members</a></li>
        <li><a href="family_tree?lang=<?php echo $lang;?>">Family Tree</a></li>
        <?php if(empty($_GET['id'])){ ?>
        <li><a href="<?php echo $page;?>?lang=ur">Urdu</a></li>
        <li><a href="<?php echo $page;?>?lang=en">Eng</a></li>
        <?php } else { ?>
        <li><a href="<?php echo $page;?>&lang=ur">Urdu</a></li>
        <li><a href="<?php echo $page;?>&lang=en">Eng</a></li>        
        <?php }?>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
    <?php require_once('front_functions.php'); ?>