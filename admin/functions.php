<?php
function main_page() {
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

function reserveringen_home() {
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
				<h2>Test Table</h2>
				<div class="table-responsive">
					<table class="table">
						<tr>
							<th>Name</th>
							<th>Pass</th>
						</tr>
						<tr>
							<td>Test</td>
							<td>123</td>
						</tr>
					</table>
				</div>
			</div>
		</div><!-- /.page-content -->
	</div>
	<?php
}


?>