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
		$option[$row['id']] = array(
			'naam' => $row['naam'],
			'c_id' => $row['course']
		);
	}
	$conn->doquery("select * from `menukaart_soort_id_course`");
	$course_id = array();
	while($row = $conn->loadobjectlist()){
		$course_id[$row['id']] = $row['coursenaam'];
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
								<!--<input type="text" name="nsoort" maxlength='64' placeholder="Nieuw Soort">-->
								<!--<button type='submit' name="s_submit" value="true" class='btn btn-success btn-xs'><span class='glyphicon glyphicon-ok'></span>&nbsp;&nbsp;Voeg Toe</button>-->
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
						foreach($course_id as $ckey => $cvalue) {
							echo "<optgroup label='".$cvalue."'>";			
							foreach($option as $key => $value) 
							{
								if($value['c_id']==$ckey) {	
									echo "<option value='".$key."' ".(($key==$row['soort_id']) ? 'selected' : '').">"
									.$value['naam']."</option>";
								}/* else {
									echo "<option>course numb = ".$ckey.", option key is ".$value['c_id']."</option>";
								}*/
							}
							echo "</optgroup>";
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
				  ?>
				  <div class="form-group">
					<label class="control-label col-sm-2" for="soort">Soort: <span class="glyphicon glyphicon-euro"></span></label>
					<div class="col-sm-6">
					  <select class="form-control" name="soort_id" id="soort_id">
					  <?php
							$conn->doquery("select * from `menukaart_soort_id_course`");
								$course_id = array();
								while($row = $conn->loadobjectlist()){
									$course_id[$row['id']] = $row['coursenaam'];
								}
								foreach($course_id as $key=>$value) {
									echo "<optgroup label='".$value."'>";				
									$conn->doquery("select * from `menukaart_soort_id`");
									while($row = $conn->loadobjectlist()){
										if($row['course']==$key){
						  				echo "<option value='".$row['id']."'>".$row['naam']."</option>";
										}
									}
									echo "</optgroup>";
								}	
					  ?>
						</select>
						<?php //echo "<pre>";print_r($course_id);echo "</pre>"; ?>
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
								echo "<h4>Nieuw item aangemaakt.</h4>";
							break;
							case "edit":
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
							  "<a href='".$_SERVER['PHP_SELF']."?q=bioscoop_new&a=editres&id={$row['id']}'><span class='glyphicon glyphicon-edit text-success'></span></a>".
							  "&nbsp;".
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
	if(isset($_GET['a'])) /* check for edit */
	{ 
		$conn->doQuery("SELECT * FROM `zalen` where `id`='".$_GET['id']."' LIMIT 1");
		
		while($row = $conn->loadObjectList()) 
		{
			$id 			= $row['id'];
			$naam 			= $row['naam'];
			$tekst 			= $row['tekst'];
			$foto_blob 		= $row['foto'];
		}
	// (if-statement extends into next php block)
	?>
		<div class='page-content'>
			<div class='page-header'>
				<h1>
					Bioscoop
					<small>
						<i class='ace-icon fa fa-angle-double-right'></i>
						Zaal Wijzigen
					</small>
				</h1>
			</div><!-- /.page-header -->
			<div class="container col-sm-offset-2 col-sm-8">
				<div>
				<h3>Hier kan u de nieuwe gegevens van de zaal invoeren.</h3><br>
				</div>
				<form action="<?php echo $_SERVER['PHP_SELF']."?q=bioscoop&a=edit&id=".$_GET['id']."";?>" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
				  <div class="form-group">
					<label class="control-label col-sm-2" for="naam">Zaal naam:</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" name="naam" id="naam" placeholder="Nieuwe zaal" value="<?php echo $naam ?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-2" for="tekst">Omschrijving:</label>
					<div class="col-sm-10">
					  <textarea class="form-control" rows="4" name="tekst" id="tekst" placeholder="Omschrijving"><?php echo $tekst ?></textarea>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-2" for="foto">Afbeelding:</label>
					<div class="col-sm-10">
					  <img width=25% src="data:image/jpeg;base64,<?php echo base64_encode($foto_blob) ?>">
					  <input type="file" name="foto" id="foto">
					</div>
				  </div>
				  <div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-primary">Wijzigingen opslaan</button>
					</div>
				  </div>
				</form>

			</div>
		</div>
	<?php
	}
	else /* if no edit request was made */
	{
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
					  <input type="text" class="form-control" name="naam" id="naam" placeholder="Nieuwe zaal">
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
}

function bioscoop_processform()
{
	//"UPDATE `zalen` SET `naam` = 'Test Zaal333333' WHERE `zalen`.`id` = 15"
	global $conn;
	// begin met sql variabel bouwen
	if($_GET['a']=="submit") 
	{
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
			$sql .= "\"".mysql_escape_string(file_get_contents($_FILES['foto']['tmp_name']))."\"";
			$sql .= ") "; 
		} else {
			$sql = substr($sql,0,-1).") "; 
		}
		
		
	}
	elseif($_GET['a']=="edit")
	{
		$sql = "UPDATE `zalen` SET ";
		foreach ($_POST as $key => $value) 
		{
			$sql .= "`".$key."` = '".$value."', ";
		}
		if(file_exists($_FILES['foto']['tmp_name'])) 
		{	
			$sql .= "`foto` = \"".mysql_escape_string(file_get_contents($_FILES['foto']['tmp_name']))."\"";
		} else {
			$sql = substr($sql,0,-2); 
		}
		
		$sql .= " WHERE `zalen`.`id` = '".$_GET['id']."'";
	}
	
	
	
	// Show query (WARNING: might crash browser with blob in $sql)
	//echo $sql;print_r("<pre>");print_r($_POST);print_r("</pre>");
	
	$conn->doQuery($sql);
}

?>
