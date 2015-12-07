<?php
session_start();

/* Begin HTML Block */
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
				<?php 
					// table notification box
					if(isset($_GET['a']))
					{	
						switch($_GET['a']) 
						{
							case "submitres":
								echo "<h4>Nieuwe reservering aangemaakt.</h4>";
							break;
							case "delres":
								echo "<h4>Reservering verwijderd.</h4>";
							break;
						}
					}
				?>
				<div class="table-responsive">
					<table class="table">
						<tr>
							<th>Reservering #</th>
							<th>Naam</th>
							<th>Aantal Personen</th>
							<th>Datum &amp Tijd</th>
							<th>Opmerking</th>
							<th>Verwijder</th>
						</tr>
					<?php
					while($row = $conn->loadObjectList()) {
						echo "<tr>";
						echo "<td><input type='text' name='res[{$row['id']}][id]' value='".$row['id']."'></td>";
						echo "<td><input type='text' name='res[{$row['id']}][naam]' value='".$row['naam']."'></td>";
						echo "<td><input type='text' name='res[{$row['id']}][aantalpers]' value='".$row['aantalpers']."'></td>";
						echo "<td><input type='text' name='res[{$row['id']}][date]' value='".$row['date']."'></td>";
						echo "<td><input type='text' name='res[{$row['id']}][opmerking]' value='".$row['opmerking']."'></td>";
						
						echo "<td><a href='".$_SERVER['PHP_SELF']."?q=rest_res&a=delres&id={$row['id']}'><span class='glyphicon glyphicon-remove-circle text-danger'></span></a></td>";
						
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
				<div>
				<h3>Hier kan u een nieuwe reservering maken.</h3><br>
				</div>
				<form action="<?php echo $_SERVER['PHP_SELF']."?q=rest_res&a=submitres";?>" method="POST" class="form-horizontal" role="form">
				  <div class="form-group">
					<label class="control-label col-sm-2" for="naam">Naam Reservering:</label>
					<div class="col-sm-6">
					  <input type="text" class="form-control" name="naam" id="naam" placeholder="Nieuwe reservering">
					</div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="aantalpers">Aantal Personen: </label>
					<div class="col-sm-2">
					  <select class="form-control" name="aantalpers" id="aantalpers">
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
				    <label class="control-label col-sm-2">Datum &amp; Tijd</label>
					<div class='col-sm-3'>
						<div class='input-group' id='date'>
							<input type='text' class="form-control" name="date" value="<?php echo date("Y/m/d"); ?>">	
						</div>
					</div>
					<div class='col-sm-3'>
						<div class='input-group' id='text'>
							<input type='text' class="form-control" name="time" value="<?php echo date("H:i"); ?>"></input>	
						</div>
					</div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="opmerking">Opmerking</label>
					<div class="col-sm-6">
					  <textarea class="form-control" name="opmerking" id="opmerking"></textarea>
					</div><hr>
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

/*	End HTML Functions */

function reservering_processform()
{
	// begin met sql variabel bouwen
	$sql = "INSERT INTO `reserveringen`(";
	
	$_POST['date'] .= " ".$_POST['time'];
	unset($_POST['time']);
	
	foreach ($_POST as $key => $value) 
	{
		$sql .= "`".$key."`,";
	}
	
	$sql = substr($sql,0,-1).") VALUES (";
	
	foreach ($_POST as $key => $value) 
	{
		$sql .= "\"".$value."\",";
	}
	
	$sql = substr($sql,0,-1).")";
	
	global $conn;
	
	///*debug: view query: */ echo $sql;print_r("<pre>");print_r($_POST);print_r("</pre>");
	$conn->doQuery($sql);
	
	
	
}

?>
