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
				<a href="<?php echo $_SERVER['PHP_SELF']."?q=rest_res_new"; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Nieuwe reservering</a>
				<br><br>
				<?php 
					// table notification box
					if(isset($_GET['a']))
					{	
						switch($_GET['a']) 
						{
							case "submit":
								echo "<h4>Nieuwe reservering aangemaakt.</h4>";
							break;
							case "savechanges":
								echo "<h4>Wijzigingen opgeslagen.</h4>";
							break;
							case "delres":
								echo "<h4>Reservering verwijderd.</h4>";
							break;
						}
					}
				?>
				<script>
				function tickupbox(id){
					//alert("Hello world!");
					document.getElementById('rescheck['+id+']').value = 1;
					document.getElementById('checkboxglyph['+id+']').innerHTML = "<span class='glyphicon glyphicon-ok-circle text-success'></span>"
					document.getElementById('savechangecontain').innerHTML = "<button type='submit' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-ok'></span> Wijzigen Opslaan</button>"
				}
				</script>
				<div class="table-responsive">
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>?q=rest_res&a=savechanges" method="POST"><table class="table">
						<tr>	
							<th>&nbsp;</th>
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
						echo "<input type='hidden' name='res[{$row['id']}][check]' id='rescheck[{$row['id']}]' value='0'>";
						echo "<input type='hidden' name='res[{$row['id']}][id]' value='".$row['id']."'>";
						echo "<td><span id='checkboxglyph[{$row['id']}]'></span></td>";
						//echo "<td><input type='text' onchange='tickupbox({$row['id']})' name='res[{$row['id']}][id]' value='".$row['id']."'></td>";
						echo "<td>".$row['id']."</td>";
						echo "<td><input type='text' maxlength='64' onchange='tickupbox({$row['id']})' name='res[{$row['id']}][naam]' value='".$row['naam']."'></td>";
						echo "<td><input type='number' maxlength='6' onchange='tickupbox({$row['id']})' name='res[{$row['id']}][aantalpers]' value='".$row['aantalpers']."'></td>";
						echo "<td><input type='text' onchange='tickupbox({$row['id']})' name='res[{$row['id']}][date]' value='".$row['date']."'></td>";
						echo "<td><input type='text' onchange='tickupbox({$row['id']})' name='res[{$row['id']}][opmerking]' value='".$row['opmerking']."'></td>";
						
						echo "<td><a href='".$_SERVER['PHP_SELF']."?q=rest_res&a=delres&id={$row['id']}'><span style='font-size:1.5em;' class='glyphicon glyphicon-remove-circle text-danger'></span></a></td>";
						
						echo "</tr>";
					}
					?>
					</table>
					<div class="form-group"> 
					    <span id="savechangecontain"></span>
					</div>
					</form>
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
				<form action="<?php echo $_SERVER['PHP_SELF']."?q=rest_res&a=submit";?>" method="POST" class="form-horizontal" role="form">
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

function menukaart_home() 
{
	global $conn;
	
	// build select options
	$conn->doQuery("SELECT * FROM `menukaart_soort_id`");
	$option = Array();
	while($row = $conn->loadObjectList()){
		$option[$row['id']] = $row['naam'];
	}
	//echo "<pre>";print_r($option);echo "</pre>";
	?>
		<!-- /section:basics/content.breadcrumbs -->
		<div class='page-content'>
			<div class='page-header'>
				<h1>
					Menukaart
					<small>
						<i class='ace-icon fa fa-angle-double-right'></i>
						menukaart &amp; meer
					</small>
				</h1>
			</div><!-- /.page-header -->
			<div class="container">
				<a href="<?php echo $_SERVER['PHP_SELF']."?q=rest_menu_new"; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Nieuw gerecht</a>
				<br><br>
				<?php 
					// table notification box
					if(isset($_GET['a']))
					{	
						switch($_GET['a']) 
						{
							case "submit":
								echo "<h4>Nieuwe item aangemaakt.</h4>";
							break;
							case "savechanges":
								echo "<h4>Wijzigingen opgeslagen.</h4>";
							break;
							case "delres":
								echo "<h4>Item verwijderd.</h4>";
							break;
						}
					}
				?>
				<script>
				function tickupbox(id){
					//alert("Hello world!");
					document.getElementById('rescheck['+id+']').value = 1;
					//document.getElementById('checkboxglyph['+id+']').innerHTML = "<span class='glyphicon glyphicon-ok-circle text-success'></span>"
					document.getElementById('savechangecontain').innerHTML = "<button type='submit' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-ok'></span> Wijzigen Opslaan</button>"
				}
				</script>
				
				<script>
				// hier komt popover jquery?
				
				</script>
				
				<div class="table-responsive">
					<form action='<?php echo $_SERVER['PHP_SELF']; ?>?q=rest_menu&a=savechanges' method='POST' id='res'><table class='table'>
						<tr>	
							<th>&nbsp;</th>
							<th>Gerecht #</th>
							<th>Naam</th>
							<th><span style='font-size:0.8em;' class="glyphicon glyphicon-euro"></span> Prijs</th>
							<th>Soort<span class='glyphicon glyphicon-plus-sign text-success'></span></a>
								<input type="text" name="nsoort" maxlength='64' placeholder="Nieuw Soort">
								<button type='submit' name="s_submit" value="true" class='btn btn-success btn-xs'><span class='glyphicon glyphicon-ok'></span>&nbsp;&nbsp;Voeg Toe</button>
							</th>
							<th>Verwijder</th>
						</tr>
					<?php
					$conn->doQuery("SELECT * FROM `menukaart`");
					while($row = $conn->loadObjectList()) { 
						echo "<tr>";
						echo "<input type='hidden' name='res[{$row['id']}][check]' id='rescheck[{$row['id']}]' value='0'>";
						echo "<input type='hidden' name='res[{$row['id']}][id]' value='".$row['id']."'>";
						
						echo "<td><span id='checkboxglyph[{$row['id']}]'></span></td>";
						echo "<td>".$row['id']."</td>";
						echo "<td><input type='text' maxlength='64' onchange='tickupbox({$row['id']})' name='res[{$row['id']}][naam]' value='".$row['naam']."'></td>";
						echo "<td><input type='text' onchange='tickupbox({$row['id']})' name='res[{$row['id']}][prijs]' value='".$row['prijs']."'></td>";
						echo "<td><select class='form-control' onchange='tickupbox({$row['id']})' name='res[{$row['id']}][soort_id]' id='soort_id'>";
						foreach($option as $key => $value) 
						{
							echo "<option value='".$key."' ".(($key==$row['soort_id']) ? 'selected' : '').">".$value."</option>";
						}
						echo "</select></td>";
						
						echo "<td><a href='".$_SERVER['PHP_SELF']."?q=rest_menu&a=delres&id={$row['id']}'><span style='font-size:1.5em;' class='glyphicon glyphicon-remove-circle text-danger'></span></a></td>";
						
						echo "</tr>";
					}
					?>
					</table>
					<div class="form-group"> 
					    <span id="savechangecontain"></span>
					</div>
					</form>
				</div>
			</div>
		</div><!-- /.page-content -->
	<?php
	
}

function menukaart_form()
{
	global $conn;
	$conn->doQuery("SELECT * FROM `reserveringen`");
	
	?>
		<!-- /section:basics/content.breadcrumbs -->
		<div class='page-content'>
			<div class='page-header'>
				<h1>
					Menukaart
					<small>
						<i class='ace-icon fa fa-angle-double-right'></i>
						Nieuw gerecht aanmaken
					</small>
				</h1>
			</div><!-- /.page-header -->
			<div class="container">
				<div>
				<h3>Hier kan u een nieuw item voor het menu maken.</h3><br>
				</div>
				<?php 
					// table notification box
					if(isset($_GET['a']))
					{	
						switch($_GET['a']) 
						{
							case "submit":
								echo "<h4>Nieuwe item aangemaakt.</h4>";
							break;
							case "savechanges":
								echo "<h4>Wijzigingen opgeslagen.</h4>";
							break;
							case "delres":
								echo "<h4>Item verwijderd.</h4>";
							break;
						}
					}
				?>
				<form action="<?php echo $_SERVER['PHP_SELF']."?q=rest_menu&a=submit";?>" method="POST" class="form-horizontal" role="form">
				  <div class="form-group">
					<label class="control-label col-sm-2" for="naam">Naam Gerecht:</label>
					<div class="col-sm-6">
					  <input type="text" class="form-control" name="naam" id="naam" placeholder="Nieuwe reservering">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-2" for="prijs">Prijs: <span class="glyphicon glyphicon-euro"></span></label>
					<div class="col-sm-6">
					  <input type="text" class="form-control" name="prijs" id="prijs" placeholder="0.00">
					</div>
				  </div>
				  <?php 
					$conn->doQuery("SELECT * FROM `menukaart_soort_id`");
				  ?>
				  <div class="form-group">
					<label class="control-label col-sm-2" for="soort">Soort: <span class="glyphicon glyphicon-euro"></span></label>
					<div class="col-sm-6">
					  <select class="form-control" name="soort_id" id="soort_id">
					  <?php
						while($row = $conn->loadObjectList()){
							echo "<option value='".$row['id']."'>".$row['naam']."</option>";
						}
					  ?>
					  </select>
					</div>
				  </div>
				  <div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-primary">Toevoegen</button>
					</div>
				  </div>
				</form>

			</div>
		</div><!-- /.page-content -->
	<?php
	
}

function menukaart_processform()
{
	global $conn;
	// begin met sql variabel bouwen
	$sql = "INSERT INTO `menukaart`(";

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
	
	
	
	///*debug: view query: */ echo $sql;print_r("<pre>");print_r($_POST);print_r("</pre>");
	$conn->doQuery($sql);
}

function bioscoop_home(){
	global $conn;
	
	$sql = "SELECT * from `zalen`";
	$conn->doQuery($sql);
	
	?>
	<!-- /section:basics/content.breadcrumbs -->
		<div class='page-content'>
			<div class='page-header'>
				<h1>
					Bioscoop
					<small>
						<i class='ace-icon fa fa-angle-double-right'></i>
						Bioscopen, films &amp; meer
					</small>
				</h1>
			</div><!-- /.page-header -->
			<div class="container col-sm-12">
			<?php 
					// table notification box
					if(isset($_GET['a']))
					{	
						switch($_GET['a']) 
						{
							case "submit":
								echo "<h4>Nieuwe item aangemaakt.</h4>";
							break;
							case "savechanges":
								echo "<h4>Wijzigingen opgeslagen.</h4>";
							break;
							case "delres":
								echo "<h4>Item verwijderd.</h4>";
							break;
						}
					}
				?>
			<div class='col-sm-12'><a href="<?php echo $_SERVER['PHP_SELF']."?q=bioscoop_new"; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Nieuwe Zaal</a></div>
    			<?php
				while($row = $conn->loadObjectList() ) { 
					echo "<div class='col-sm-4'>".
							"<a class='' href='#'>".
							"<div class='thumbnail'>".
							  "<img src='data:image/jpeg;base64,".base64_encode($row['foto'])."'/></a>".
							  "<h4>".$row['naam']." ".
							  "<a href='".$_SERVER['PHP_SELF']."?q=bioscoop&a=delres&id={$row['id']}'><span class='glyphicon glyphicon-remove-sign text-danger'></span></a>".
							  "</h4>"
							.$row['tekst'].
							"</div>".
						"</div>";
				}
			  ?>
			</div>
			<?php
}

function bioscoop_form()
{
	global $conn;
	$conn->doQuery("SELECT * FROM `reserveringen`");
	
	?>
		<!-- /section:basics/content.breadcrumbs -->
		<div class='page-content'>
			<div class='page-header'>
				<h1>
					Bioscoop
					<small>
						<i class='ace-icon fa fa-angle-double-right'></i>
						Nieuwe zaal aanmaken
					</small>
				</h1>
			</div><!-- /.page-header -->
			<div class="container col-sm-offset-2 col-sm-8">
				<div>
				<h3>Hier kan u een nieuwe zaal aanmaken.</h3><br>
				</div>
				<form action="<?php echo $_SERVER['PHP_SELF']."?q=bioscoop&a=submit";?>" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
				  <div class="form-group">
					<label class="control-label col-sm-2" for="naam">Zaal naam:</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" name="naam" id="naam" placeholder="Nieuwe reservering">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-2" for="tekst">Omschrijving:</label>
					<div class="col-sm-10">
					  <textarea class="form-control" rows="4" name="tekst" id="tekst" placeholder="Omschrijving"></textarea>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-2" for="foto">Afbeelding:</label>
					<div class="col-sm-10">
					  <input type="file" name="foto" id="foto">
					</div>
				  </div>
				  <div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-primary">Toevoegen</button>
					</div>
				  </div>
				</form>

			</div>
		</div><!-- /.page-content -->
	<?php
	
}

function bioscoop_processform()
{
	global $conn;
	// begin met sql variabel bouwen
	$sql = "INSERT INTO `zalen`(";
	foreach ($_POST as $key => $value) 
	{
		$sql .= "`".$key."`,";
	}
	if(file_exists($_FILES['foto']['tmp_name'])) 
	{
		$sql .= "`foto`,";
	}
	
	$sql = substr($sql,0,-1).") VALUES (";
	
	foreach ($_POST as $key => $value) 
	{
		$sql .= "\"".$value."\",";
	}
	if(file_exists($_FILES['foto']['tmp_name'])) 
	{	
		$sql .= "\"".mysql_escape_string(file_get_contents($_FILES['foto']['tmp_name']))."\",";
	}
	$sql = substr($sql,0,-1).")";
	
	
	// WARNING might crash browser with blob in $sql
	///*debug: view query: */ echo $sql;print_r("<pre>");print_r($_POST);;print_r("</pre>");
	
	$conn->doQuery($sql);
}

?>
