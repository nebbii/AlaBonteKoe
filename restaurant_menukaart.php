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
<body class="restaurant">

	<div class="banner_restaurant">
	<div class="banner_div">
		 <a href="index.php"><img src="images/Logo/Logo3.png" class="banner_img" /></a>
	</div>
	<div class="banner_div">
		<h1 class="banner_header">Restaurant Module</h1>
	</div>
	<div class="banner_buttons">
		<a href="restaurant_home.php"><button>Home</button></a>
		<a href="#"><button>Menukaart</button></a>
		<a href="restaurant_reserveren.php"><button>Reserveren</button></a>
	</div>
	</div>
	<div class="menukaart_div" >
		<center>
			<h2 class="main_header"><img src="images/decoratie_menukaart_links2.png" style="width: 10%;"><i style="padding: 10px;">Menukaart</i><img src="images/decoratie_menukaart_rechts2.png" style="width: 10%;"></h2>
			<div id="tabs" class="tabs">
				
				<div class="content">
				<?php
					// store soorten for later use
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
					<nav>
						<ul style="list-style-type: none;">
						<?php
							// page index
							foreach($course_id as $key)
							{
								echo "<li><a href='#section-".$key['id']."'><span>".$key['coursenaam']."</span></a></li>";
							}
						?>
						</ul>
					</nav>
				<?php
					// 'Menukaart'
					foreach($course_id as $ckey)
					{
					?>
						<section id="section-<?php echo $ckey['id'] ?>">
							<div class="mediabox">
								
								<h2><?php echo $ckey['coursenaam'] ?></h2>
								<table class='menukaart'>
					<?php
						foreach($soort_id as $skey)
						{
							if($skey['course']==$ckey['id'])
							{
								echo "<tr><th colspan='10'>".$skey['naam']."</th></tr>";
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
										
										echo "<tr>";
										echo "<td>".$key['naam']."</td>";
										echo "<td>&nbsp;</td>";
										echo "<td>&euro;".$key['prijs']."</td>";
										echo "</tr>";
									}
								}
							}
						}
						?>
								</table>	
							</div>
						</section>
						</br>
					<?php
						
					}
				?>
				</div><!-- /content -->
			</div><!-- /tabs -->
			<img src="images/decoratie_menukaart_onder.png" style="height: 100px; width: 350px;"/>
		</center>
		<br /><br /><br />
	</div>
	
	<br /><br />
	
	<link rel="stylesheet" type="text/css" href="css/tabs_menukaart.css" />
	<script src="js/cbpFWTabs.js"></script>
	<script>
		new CBPFWTabs( document.getElementById( 'tabs' ) );
	</script>
	
</body>