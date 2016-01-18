<!DOCTYPE html>

<html lang="en">
<head>
	<?php 
		// navigation
		include_once "page_navigation.php";
		echo getNav();
		
		// restaurant menu build
		include_once("classes/database.class.php");
		include_once("include/config.php");
		
		$conn = Database::getInstance();
		
		// prepare menukaart
		
		$sql =	"SELECT 
					`menukaart`.`id`,
					`menukaart`.`naam`,
					`menukaart`.`prijs`,
					`menukaart`.`soort_id`,
					`menukaart_soort_id_course`.`id` as courseid
				FROM 
					`menukaart`
				INNER JOIN `menukaart_soort_id` 
					ON `menukaart`.`soort_id` = `menukaart_soort_id`.`id` 
				INNER JOIN `menukaart_soort_id_course` 
					ON `menukaart_soort_id`.`course` = `menukaart_soort_id_course`.`id` 
				ORDER BY
					`menukaart`.`id`
				ASC";
					
		$conn->connect(HOST,USER,PASS,DBNAME);
		
		$conn->doQuery($sql);
		
		while($row = $conn->loadObjectList()) {
			$result[$row['id']] = array (
				"id"			=> $row['id'],
				"naam" 			=> $row['naam'],
				"prijs"			=> $row['prijs'],
				"soort_id"		=> $row['soort_id'],
				"courseid"		=> $row['courseid']
			);
		}
		
		/* Debug echo */
		//echo "<pre style='background: white; border-radius: 2px'>Regular visitor, don't look! You're not ready!\n"; print_r($result); echo "</pre>";
	?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet"> 
    <link href="css/animate.min.css" rel="stylesheet"> 
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">    
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header">      	
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">

                    <a class="navbar-brand" href="index.html">
                       <img src="images/logo3.png" class="img-responsive inline"  height="100" width="100" alt="">
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="restaurant_home.php">Home</a></li>
                        <li><a href="restaurant_menukaart.php">menukaart</a></li>                       
                        <li><a href="restaurant_reserveren.php">reserveren</a></li>                       
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->
	
    <section class="container">        
        <div class="price-table-2">
            <div class="row">
                <div class="col-sm-6 col-md-1">
                </div>
                <div class="col-sm-6 col-md-3">
					<img src="images/top1.png" class="img-responsive inline" alt="">
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="single-price price-two">
					<img src="images/top3.png" class="img-responsive inline" alt="">
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="single-price price-three">
						<img src="images/top2.png" class="img-responsive inline" alt="">
                    </div>
                </div>
                <div class="col-sm-6 col-md-1">
                </div>
            </div>
        </div>
    </section>
  
	<?php
		$conn->doQuery("SELECT * FROM `menukaart_soort_id` ORDER BY `id`");
		while($row = $conn->loadObjectList())
		{
			$soort_id[] = $row;
		}
		// store courses for later use
		$conn->doQuery("SELECT * FROM `menukaart_soort_id_course` ORDER BY `id`");
		while($row = $conn->loadObjectList())
		{
			$course_id[] = $row;
		}
	?>
	<?php
		// 'Menukaart'
		foreach($course_id as $ckey)
		{
		?>
			<section class="container">        
				<div class="price-table">
					<div class="row">
				<?php
					foreach($soort_id as $skey)
					{
						if($skey['course']==$ckey['id'])
						{
					?>
						<div class="col-sm-6 col-md-4">
							<div class="single-price price-one">
								<div class="table-heading">
									<p class="plan-name"><?php echo $ckey['coursenaam'] ?></p>
									<p class="plan-price">
										<span class="dollar-sign"></span>
										<span class="price"></span>
										<span class="month"><?php echo $skey['naam'] ?></span>
									</p>
								</div>
						
					<?php
						
							echo "<ul>";
							foreach($result as $key)
							{
								if(($key['soort_id']==$skey['id'])&&($key['courseid']==$ckey['id']))
								{
									// fix price decimals
									if((strlen(substr($key['prijs'], strpos($key['prijs'], ".")+1))==1)&&strpos($key['prijs'], ".")==true)
									{
										$key['prijs'] .= 0;											
									}
										elseif(strpos($key['prijs'], ".")==false)
									{
										$key['prijs'] .= ",-";
									}
									$key['prijs'] = str_replace(".", ",", $key['prijs']);
									echo "<li>";
									echo $key['naam'];
									echo "<span>".$key['prijs']."</span>";
									echo "</li>";
									/*echo "<tr>";
									echo "<td>".$key['naam']."</td>";
									echo "<td>&nbsp;</td>";
									echo "<td>&euro;".$key['prijs']."</td>";
									echo "</tr>";*/
								}
							}
							echo "</ul>";
						?>
							</div>
						</div>
						<?php
						}
					}
					?>
						
					</div>
				</div>
			</section>
		<?php
			
		}
	?>
	<section class="container">
        
        <div class="price-table-2">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                </div>
                <div class="col-sm-6 col-md-6	">
                    <div class="single-price price-two">
					<img src="images/bot.png" class="img-responsive inline" alt="">
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="single-price price-three">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>   
</body>
</html>
