<?php 
include_once('include/config.php');
include_once('classes/database.class.php');
include_once('classes/table.class.php');
include_once('classes/reservering.class.php');
include_once "page_navigation.php";

if (!empty($_POST))
{
    $dbo = Database::getInstance();
    $dbo->connect(HOST, GEBRUIKER, WACHTWOORD, DATABASE);

    $reservering = new Reservering();

    $data = $_POST;
    $reservering->bind($data);
    $reservering->store();

    header('Location:restaurant_reserveren.php');

}
else {
    
    echo getNav();
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
			<a href="restaurant_menukaart.php"><button>Menukaart</button></a>
			<a href="#"><button>Reserveren</button></a>
		</div>
	</div>
	<div class="main_div" >
		<center><h2 class="main_header">Reserveren</h2></center>
		<br>
		<p class="main_p">
			<form name="reserveren" action="restaurant_home.php" method="post">
				<table class="reserveer_table">
					<tr>
						<td>Naam:<span style="color:red">*</span></td>
						<td><input type="text" name="naam" class="reserveer_input"  required></td>
					</tr>
					<tr>
						<td>E-mailadres:<span style="color:red">*</span></td>
						<td><input type="email" name="email" class="reserveer_input" required></td>
					</tr>
					<tr>
						<td>Datum:<span style="color:red">*</span></td>
						<td><input  type="text" name="date" class="reserveer_input"  id="datepicker" required></td>
					</tr>
					<tr>
						<td>Tijd:<span style="color:red">*</span></td>
						<td><input type="time" name="tijd" class="reserveer_input" required></td>
					</tr>
					<tr>
						<td>Aantal Personen:<span style="color:red">*</span></td>
						<td><input type="number" name="aantalPers" class="reserveer_input" required></td>
					</tr>

					<tr>
						<td>Opmerking:</td>
						<td><textarea rows="4" name="opmerking" class="reserveer_textarea"></textarea></td>
					</tr>
					<tr>
						<td colspan="2">
						<input type="submit" name="submit" value="Reserveer"></td>
					</tr>
				</table>
			</form>
			
		</p>
	   
		<br /><br /><br />

			
			
		<br /><br />
	</div>
	<?php

		}

	?>
		
		<!-- Side Menu -->
	<div class="side_div">
		<br />
		<p class="side_p"><b>
			<br />
			Dagelijks open van 16:00 t/m 23:00
			</b>
			<br /><br /><br /><br />
			Uitgaanscentrum De Bonte Koe<br />
			Dorpsstraat 14b<br />
			2481BA Woubrugge<br />
			0172-518274
			<br /><br /><br /><br />
			<b>Website</b><br />
			<small class="link"><a href="">http://uitgaanscentrumdebontekoe.nl/restaurant</a></small><br />
			<br />
			<b>E-mail</b><br />
			<small class="link"><a href="">restaurant@uitgaancentrumdebontekoe.nl</a></small>      
		</p> 
		<br />
	</div>
		
		
	<link rel="stylesheet" href="css/datepicker.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="js/jquery-1.9.1.min.js"></script>
			<script src="js/bootstrap-datepicker.js"></script>
			<script type="text/javascript">
				// When the document is ready
				$(document).ready(function () {
					$('#datepicker').datepicker({
						format: "dd/mm/yyyy",
					}).datepicker("setDate", new Date());
				});
			</script>
</body>
</html>
    

