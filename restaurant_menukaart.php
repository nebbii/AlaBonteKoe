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
			"naam" 			=> $row['naam'],
			"prijs"			=> $row['prijs'],
			"soort"			=> $row['soortnaam'],
			"courseid"		=> $row['courseid']
		);
	}
	
	/* Debug echo */
	echo "<pre style='background: white; border-radius: 2px'>Regular visitor, don't look! You're not ready!\n"; print_r($result); echo "</pre>";
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
				<nav>
					<ul style="list-style-type: none;">
						<li><a href="#section-1"><span>Voorgerecht</span></a></li>
						<li><a href="#section-2"><span>Hoofdgerecht</span></a></li>
						<li><a href="#section-3"><span>Nagerecht</span></a></li>
						<li><a href="#section-4"><span>Dranken</span></a></li>
					</ul>
				</nav>
				<div class="content">
						<?php
							$sql = "SELECT * FROM `menukaart_soort_id` ORDER BY `id`";
							
							/* *** Voorgerecht *** */
							?> <section id="section-1">
								<div class="mediabox">
									<h2>Voorgerechten</h2>
									<br />
									<table class="menukaart">
							<?php
							foreach($result as $key)
							{
								if($key['courseid']==1) {
									echo "<tr>";
									echo "<td>".$key['naam']."</td>";
									echo "<td>&nbsp;</td>";
									echo "<td>&euro;".$key['prijs']."</td>";
									echo "</tr>";
								}
							}
							echo "</table></div></section>";
							/* *** Hoofdgerecht *** */
							?> <section id="section-2">
								<div class="mediabox">
									<h2>Hoofdgerecht</h2>
									<br />
									<table class="menukaart">
							<?php
							foreach($result as $key)
							{
								if($key['courseid']==2) {
									echo "<tr>";
									echo "<td>".$key['naam']."</td>";
									echo "<td>&nbsp;</td>";
									echo "<td>&euro;".$key['prijs']."</td>";
									echo "</tr>";
								}
							}
							echo "</table></div></section>";
							/* *** Nagerecht *** */
							?> 
								<section id="section-3">
									<div class="mediabox">
										<h2>Nagerecht</h2>
										<br />
										<table class="menukaart">
							<?php
							foreach($result as $key)
							{
								if($key['courseid']==3) {
									echo "<tr>";
									echo "<td>".$key['naam']."</td>";
									echo "<td>&nbsp;</td>";
									echo "<td>&euro;".$key['prijs']."</td>";
									echo "</tr>";
								}
							}
							echo "</table></div></section>"; 
							/*	*** Dranken ***	*/
							?>
								<section id="section-4">
									<div class="mediabox">
										<h2>Dranken</h2>
										<br />
										<table class="menukaart">
							<?php
							foreach($result as $key)
							{
								if($key['courseid']==4) {
									echo "<tr>";
									echo "<td>".$key['naam']."</td>";
									echo "<td>&nbsp;</td>";
									echo "<td>&euro;".$key['prijs']."</td>";
									echo "</tr>";
								}
							}
							echo "</table></div></section>";
						?>
					<!--<section id="section-1">
						<div class="mediabox">
							<h4>Koude voorgerechten</h4>
							<br />
							<table class="menukaart">
							
								<tr>
									<td>Haringtartaar met tomaat en lente-ui</td>
									<td>&euro; 3,50</td>
								</tr>
								<tr>
									<td>Stokbrood met kruidenboter</td>
									<td>&euro; 2,50</td>
								</tr>
								<tr>
									<td>Garnalen Cocktail</td>
									<td>&euro; 3,50</td>
								</tr>
								<tr>
									<td>Gemarineerde champignons met geitenkaas</td>
									<td>&euro; 3,-</td>
								</tr>
							</table>
						</div>
						<div class="mediabox">
							<h4>Warme voorgerechten</h4>
							<br />
							<table class="menukaart">
								<tr>
									<td>Verse tomatensoep</td>
									<td>&euro; 4,-</td>
								</tr>
								<tr>
									<td>Soep van de dag</td>
									<td>&euro; 5,-</td>
								</tr>
								<tr>
									<td>Gefrituurde inktvis ringen</td>
									<td>&euro; 6,50</td>
								</tr>
								<tr>
									<td>Mini Hamburgers</td>
									<td>&euro; 9,50</td>
								</tr>
							</table>
						</div>
						<div class="mediabox">
							<h4>Salades</h4>
							<br />
							<table class="menukaart">
								<tr>
									<td>Groene Salade</td>
									<td>&euro; 4,-</td>
								</tr>
								<tr>
									<td>Salade met gerookte zalm</td>
									<td>&euro; 5,50</td>
								</tr>
								<tr>
									<td>Salade met gebakken scampi's</td>
									<td>&euro; 6,-</td>
								</tr>
								<tr>
									<td>Salade met walnoten</td>
									<td>&euro; 5,-</td>
								</tr>
							</table>
						</div>
					</section>
					<section id="section-2">
						<p><small>Alle vlees en vis hoofdgerechten worden geserveerd met patat en salade</small></p> 
						<div class="mediabox">
							<h4>Vlees</h4>
							<br />
							<table class="menukaart">
								<tr>
									<td>Ossenhaas met champignonensaus</td>
									<td>&euro; 11,-</td>
								</tr>
								<tr>
									<td>Wienerschnitzel</td>
									<td>&euro; 12,50</td>
								</tr>
								<tr>
									<td>Biefstuk</td>
									<td>&euro; 12,-</td>
								</tr>
								<tr>
									<td>Spareribs (4 stuks)</td>
									<td>&euro; 13,-</td>
								</tr>
								<tr>
									<td>De bonte koe hamburger met patat</td>
									<td>&euro; 12,50</td>
								</tr>
								<tr>
									<td>Kipfile</td>
									<td>&euro; 9,50</td>
								</tr>
							</table>
						</div>
						<div class="mediabox">
							<h4>Pizza's</h4>
							<br />
							<table class="menukaart">
								<tr>
									<td>Margarita</td>
									<td>&euro; 8,-</td>
								</tr>
								<tr>
									<td>Peperoni pizza</td>
									<td>&euro; 9,50</td>
								</tr>
								<tr>
									<td>Tonijn pizza</td>
									<td>&euro; 10,-</td>
								</tr>
								<tr>
									<td>Hawaii pizza</td>
									<td>&euro; 10,50</td>
								</tr>
								<tr>
									<td>Pizza van de chef</td>
									<td>&euro; 12,-</td>
								</tr>
								<tr>
									<td>Shoarma pizza (met knoflooksaus)</td>
									<td>&euro; 9,50</td>
								</tr>
								<tr>
									<td>De bonte koe pizza (met erg veel vlees)</td>
									<td>&euro; 14,-</td>
								</tr>
							</table>
						</div>
						<div class="mediabox">
							<h4>Vis</h4>
							<br />
							<table class="menukaart">
								<tr>
									<td>Mosselen</td>
									<td>&euro; 13,-</td>
								</tr>
								<tr>
									<td>Gebakken garnalen</td>
									<td>&euro; 12,50</td>
								</tr>
								<tr>
									<td>Visschotel (2 per.)</td>
									<td>&euro; 19,-</td>
								</tr>
								<tr>
									<td>Lekker bek </td>
									<td>&euro; 12,-</td>
								</tr>
							</table>
						</div>
					</section>
					<section id="section-3">
						<div class="mediabox_nagerecht">	
							<h4>ijs</h4>
							<br />
								<table class="menukaart">
									<tr>
										<td>Groene Salade</td>
										<td>&euro; 4,-</td>
									</tr>
									<tr>
										<td>Salade met gerookte zalm</td>
										<td>&euro; 5,50</td>
									</tr>
									<tr>
										<td>Salade met gebakken scampi's</td>
										<td>&euro; 6,-</td>
									</tr>
									<tr>
										<td>Salade met walnoten</td>
										<td>&euro; 5,-</td>
									</tr>
								</table>
						</div>
					</section>
					<section id="section-4">
						<div class="mediabox">
						<h4>Koude dranken</h4>
						<br />
							<table class="menukaart">
								<tr>
									<td>Koude dranken</td>
									<td>&euro; 4,-</td>
								</tr>
								<tr>
									<td>Salade met gerookte zalm</td>
									<td>&euro; 5,50</td>
								</tr>
								<tr>
									<td>Salade met gebakken scampi's</td>
									<td>&euro; 6,-</td>
								</tr>
								<tr>
									<td>Salade met walnoten</td>
									<td>&euro; 5,-</td>
								</tr>
							</table>
					</div>
						<div class="mediabox">
							<h4>Warme dranken</h4>
							<br />
							<table class="menukaart">
								<tr>
									<td>Warme dranken</td>
									<td>&euro; 4,-</td>
								</tr>
								<tr>
									<td>Salade met gerookte zalm</td>
									<td>&euro; 5,50</td>
								</tr>
								<tr>
									<td>Salade met gebakken scampi's</td>
									<td>&euro; 6,-</td>
								</tr>
								<tr>
									<td>Salade met walnoten</td>
									<td>&euro; 5,-</td>
								</tr>
							</table>
						</div>
						<div class="mediabox">
							<h4>Alcohol</h4>
							<br />
							<table class="menukaart">
								<tr>
									<td>Alcohol</td>
									<td>&euro; 4,-</td>
								</tr>
								<tr>
									<td>Salade met gerookte zalm</td>
									<td>&euro; 5,50</td>
								</tr>
								<tr>
									<td>Salade met gebakken scampi's</td>
									<td>&euro; 6,-</td>
								</tr>
								<tr>
									<td>Salade met walnoten</td>
									<td>&euro; 5,-</td>
								</tr>
							</table>
						</div>
					</section>-->
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