<?php
function main_page() 
{
	?>
	<div class='page-content'>
		<div class='page-header'>
			<h1>
				Admin Paneel
				<small>
					<i class='ace-icon fa fa-angle-double-right'></i>
					overview &amp; stats
				</small>
			</h1>
		</div><!-- /.page-header -->
		<h2>Welkom op het Admin Paneel.</h2>
		<p>
			U kunt hier de gegevens van de website bijwerken, onderandere de gebruikers,
			tabellen van reserveringen, de menukaart, en de bioscoop.
		</p>
	</div><!-- /.page-content -->
	<?php
}

function reserveringen_home() 
{
	global $conn;
	$conn->doQuery("SELECT * FROM `reserveringen`");
	
	?>
		<!-- /section:basics/content.breadcrumbs -->
		<div class='page-content'>
			<div class='page-header'>
				<h1>
					Reserveringen
					<small>
						<i class='ace-icon fa fa-angle-double-right'></i>
						reserveringen &amp; meer
					</small>
				</h1>
			</div><!-- /.page-header -->
			<div class="container">
				<a href="<?php echo $_SERVER['PHP_SELF']."?q=rest_res_new"; ?>" class="btn btn-primary">Nieuwe reservering</a>
				<br><br>
				<div class="table-responsive">
					<table class="table">
						<tr>
							<th>Reservering #</th>
							<th>Naam</th>
							<th>Aantal Personen</th>
							<th>Datum &amp Tijd</th>
							<th>Opmerking</th>
						</tr>
					<?php
					while($row = $conn->loadObjectList()) {
						echo "<tr>";
						echo "<td>".$row['id']."</td>";
						echo "<td>".$row['naam']."</td>";
						echo "<td>".$row['aantalpers']."</td>";
						echo "<td>".$row['date']."</td>";
						echo "<td>".$row['opmerking']."</td>";
						echo "</tr>";
					}
					?>
					</table>
				</div>
			</div>
		</div><!-- /.page-content -->
	<?php
	
}

function reserveringen_form()
{
	global $conn;
	$conn->doQuery("SELECT * FROM `reserveringen`");
	
	?>
		<!-- /section:basics/content.breadcrumbs -->
		<div class='page-content'>
			<div class='page-header'>
				<h1>
					Reserveringen
					<small>
						<i class='ace-icon fa fa-angle-double-right'></i>
						Nieuwe reservering aanmaken
					</small>
				</h1>
			</div><!-- /.page-header -->
			<div class="container">
				<form class="form-horizontal" role="form">
				  <div class="form-group">
					<label class="control-label col-sm-2" for="email">Naam Reservering:</label>
					<div class="col-sm-6">
					  <input type="email" class="form-control" id="resnaam" placeholder="Naam">
					</div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="aantpers">Aantal Personen: </label>
					<div class="col-sm-2">
					  <select class="form-control" id="aantpers">
					    <option value="1" selected>1</option>
					    <option value="2">2</option>
					    <option value="3">3</option>
					    <option value="4">4</option>
					    <option value="5">5</option>
					    <option value="6">6</option>
					    <option value="7">7</option>
					    <option value="8">8</option>
					    <option value="9">9</option>
					    <option value="10">10</option>
					  </select>
					</div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-2">Datum en Tijd</label>
					<div class='col-sm-3'>
						<div class='input-group' id='datetimepicker1'>
							<input type='date' class="form-control">
							
						</div>
					</div>
				  </div>
				  <div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-primary">Toevoegen</button>
					</div>
				  </div>


			</div>
		</div><!-- /.page-content -->
	<?php
	
}

?>
