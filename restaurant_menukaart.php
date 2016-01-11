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
				`menukaart_soort_id`.`naam` as soortnaam,
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
			"soort"			=> $row['soortnaam'],
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
					foreach($course_id as $key)
					{
					?>
						<section id="section-<?php echo $key['id'] ?>">
							<div class="mediabox">
								<h2><?php echo $key['coursenaam'] ?></h2>
								<br />
								<table class="menukaart">
					<?php
						foreach($result as $ckey)
						{
							if($ckey['courseid']==$key['id'])
							{
								echo "<tr>";
								echo "<td>".$ckey['naam']."</td>";
								echo "<td>&nbsp;</td>";
								echo "<td>&euro;".$ckey['prijs']."</td>";
								echo "</tr>";
							}
						}
					?>
								</table>
							</div>
						</section>
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