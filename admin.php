<?php
	include_once("admin/functions.php");
	include_once("classes/database.class.php");
	include_once("include/nebLib.php");
	include_once("include/config.php");
	include_once("include/functions.php");
	
	$conn = Database::getInstance();

	$conn->connect(HOST,USER,PASS,DBNAME);
	
	// check for action
	if (isset($_GET['a']))
	{
		switch($_GET['a'])
		{
			case "login":
				$usr = $_POST['username'];
				$pwd = $_POST['password'];
				$conn->doQuery("SELECT * FROM `users` WHERE EXISTS".
						"(SELECT * FROM `users` WHERE `naam`='{$usr}' AND `ww`='{$pwd}')");
				if($conn->loadObjectList()) 
				{
					$_SESSION['login'] = 1;
					$_SESSION['naam'] = $usr;
				}
			break;
			case "logoff":
				unset($_SESSION['login']);
			break;
			
			case "savechanges":
				//echo "<pre>Post dump:\n"; print_r($_POST['res']);
				foreach($_POST['res'] as $entry)
				{
					
					if($entry['check']==1) 
					{
						$sql = "UPDATE `reserveringen` SET";
						unset($entry['check']);
						
						foreach($entry as $key => $value)
						{
							$sql .= " `{$key}`='{$value}',";
						}
						$sql = substr($sql,0,-1);
						$sql .= " WHERE `id`={$entry['id']}";
						
						$conn->doQuery($sql);
					}
					$sql = null;
					//echo $sql."\n\n";echo "</pre>";
					
				}
			break;
			
			case "delres":
				$conn->doQuery("DELETE FROM `reserveringen` where `id`={$_GET['id']}");
			break;
		}
	}
	
	// define $case for both switches
	if(!isset($_GET['q']))
	{
		$_GET['q']='';
	} 	
	
	$case = $_GET['q'];

	// define tags for breadcrumbs
	switch($case) 
	{
		case "rest_res":
		  if((isset($_GET['a']))&&($_GET['a']=='submitres'))
		  {
			reservering_processform();
		  }
		  $cpath = array(
			array("head" => "Restaurant", "url" => ""),
			array("head" => "Reserveringen", "url" => "?q=rest_res"));
		  $pagename = "Reserveringen";
		break;
		case "rest_res_new":
		  $cpath = array(
			array("head" => "Restaurant", "url" => ""),
			array("head" => "Reserveringen", "url" => "?q=rest_res"),
			array("head" => "Nieuwe reservering", "url" => "?q=rest_res_new")
			);
		  $pagename = "Nieuwe reservering";
		break;
		default:
		$cpath = array(
			array("head" => "Admin Paneel", "url" => "")
		);
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>De Bonte Koe - <?php echo $cpath[count($cpath)-1]["head"] ?></title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/css/font-awesome.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<?php if (isset($_SESSION['login'])): ?>
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
				
			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="#" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Admin Pagina
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->

					<!-- /section:basics/navbar.toggle -->
				</div>
			
				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $_SESSION['naam']?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="#">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo $_SERVER['PHP_SELF']."?a=logoff"; ?>">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			
			
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<!-- Niet nodig?
				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<!-- #section:basics/sidebar.layout.shortcuts 
						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>

						<!-- /section:basics/sidebar.layout.shortcuts 
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="<?php if ($case=='') echo 'active'; ?>">
						<a href="<?php echo $_SERVER['PHP_SELF']; ?>">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Admin Paneel </span>
						</a>

						<b class="arrow"></b>
					</li>


					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Restaurant </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="<?php if ($case=='rest_res') echo 'active'; ?>">
								<a href="<?php echo $_SERVER['PHP_SELF']."?q=rest_res"; ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Reserveringen
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Menukaart
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="<?php if ($case=='bios') echo 'active'; ?>">
						<a href="#">
							<i class="menu-icon fa fa-calendar"></i>

							<span class="menu-text">Bioscoop
							</span>
						</a>

						<b class="arrow"></b>
					</li>



				</ul><!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class='main-content-inner'>
					<!-- #section:basics/content.breadcrumbs -->
					<div class='breadcrumbs' id='breadcrumbs'>
						<script type='text/javascript'>
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class='breadcrumb'>
							<li>
								<i class='ace-icon fa fa-home home-icon'></i>
								<a href='<?php echo $_SERVER['PHP_SELF']; ?>'>De Bonte Koe</a>
							</li>
							<?php
								for($i=0;$i<count($cpath)-1;$i++) {
								   echo "<li>".(($cpath[$i]["url"]!="") ? "<a href='".$_SERVER['PHP_SELF'].$cpath[$i]["url"]."'>" : '').$cpath[$i]["head"].(($cpath[$i]["url"]!="") ? "</a>" : "")."</li>";
								}
								//echo end($cpath);
							?>
							
							<li class='active'><?php echo $cpath[count($cpath)-1]["head"]; /*echo "<pre>";print_r($cpath);echo "</pre>";*/ ?></li>
						</ul><!-- /.breadcrumb -->

						<!-- #section:basics/content.searchbox -->
						<div class='nav-search' id='nav-search'>
							<form class='form-search'>
								<span class='input-icon'>
									<input type='text' placeholder='Search ...' class='nav-search-input' id='nav-search-input' autocomplete='off' />
									<i class='ace-icon fa fa-search nav-search-icon'></i>
								</span>
							</form>
						</div><!-- /.nav-search -->

						<!-- /section:basics/content.searchbox -->
					</div>
						<?php
						// print huidige pagina
						if (isset($_GET['q']))
						{
							$case = $_GET['q'];
							switch($case) 
							{
							case "rest_res":
							  reserveringen_home();
							break;	
							case "rest_res_new":
							  reserveringen_form();
							break;
							default:
							  main_page();
							}
						}
						?>	
				</div>
			</div><!-- /.main-content -->
			<?php else: ?>
				<div class="container">
					<div class="alert alert-info">
						Je bent momenteel niet ingelogd.
					</div>
					<h3>Vul uw login gegevens in.</h3>
					<form action="<?php echo $_SERVER['PHP_SELF']."?a=login"?>" method="POST" class="form-horiontal" role="form">
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="username">Usernaam:</label>
					    <div class="col-sm-10">
					      <input class="form-control" type="username" name="username" id="username" placeholder="Uw login">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="password">Wachtwoord:</label>
						<div class="col-sm-10">
						  <input class="form-control" type="password" name="password" id="password" placeholder="  Uw wachtwoord">
						</div>
					  </div><br><br>
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-success">Login</button>
					    </div>
					  </div>
					  
					</form>
				</div>
			<?php endif; ?>

			<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">ALA</span>
							De Bonte Koe 2015-2016
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.js"></script>
		<script src="assets/js/jquery.easypiechart.js"></script>
		<script src="assets/js/jquery.sparkline.js"></script>
		<script src="assets/js/flot/jquery.flot.js"></script>
		<script src="assets/js/flot/jquery.flot.pie.js"></script>
		<script src="assets/js/flot/jquery.flot.resize.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace/elements.aside.js"></script>
		<script src="assets/js/ace/ace.js"></script>
		<script src="assets/js/ace/ace.ajax-content.js"></script>
		<script src="assets/js/ace/ace.touch-drag.js"></script>
		<script src="assets/js/ace/ace.sidebar.js"></script>
		<script src="assets/js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="assets/js/ace/ace.submenu-hover.js"></script>
		<script src="assets/js/ace/ace.widget-box.js"></script>
		<script src="assets/js/ace/ace.settings.js"></script>
		<script src="assets/js/ace/ace.settings-rtl.js"></script>
		<script src="assets/js/ace/ace.settings-skin.js"></script>
		<script src="assets/js/ace/ace.widget-on-reload.js"></script>
		<script src="assets/js/ace/ace.searchbox-autocomplete.js"></script>

	
	</body>
</html>
