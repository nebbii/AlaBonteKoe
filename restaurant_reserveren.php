<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="css/stylesheet.css" type="text/css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="../bootstrap/assets/css/ace.css" type="text/css" /> 
    <link rel="stylesheet" href="../bootstrap/assets/css/bootstrap.css" type="text/css" /> 
    <link rel="stylesheet" href="../bootstrap/assets/css/font-awesome.css" type="text/css" /> 
    <link rel="stylesheet" href="../bootstrap/assets/css/jquery-ui.custom.css" type="text/css" /> 
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<div class="banner_restaurant">
    <div class="banner_div">
        <img src="images/Logo/Logo3.png" class="banner_img" />
    </div>
    <div class="banner_div">
        <h1 class="banner_header">Restaurant Module</h1>
    </div>
    <div class="banner_buttons">
        <a href="restaurant_home.php"><button>Home</button></a>
        <a href="restaurant_menukaart.php"><button>Menukaart</button></a>
        <a href="restaurant_reserveren.php"><button>Reserveren</button></a>
    </div>
</div>
    <!--/#header-->
    <section class="container">        
        <div class="price-table-2">
            <div class="row">
                <div class="col-sm-4">
					<img src="images/top1.png" class="img-responsive inline" alt="">
                </div>
                <div class="col-sm-4">
                    <div class="single-price price-two">
					<img src="images/top4.png" class="img-responsive inline" alt="">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-price price-three">
						<img src="images/top2.png" class="img-responsive inline" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="row">
                         <div class="col-md-12 col-sm-8">
                            <div class="single-blog blog-details two-column">
                                <div class="post-thumb">
                                    
                                </div>
								<div id = "formulierhulp">
								<form name="reserveren" action="restaurant_home2.php" method="post">
									<table class="reserveer_table">
										<tr>
											<th>Naam:</th>
											<td><input type="text" name="naam" class="reserveer_input"  required></td>
										</tr>
										<tr>
											<th>E-mailadres:</th>
											<td><input type="email" name="email" class="reserveer_input" required></td>
										</tr>
										<tr>
											<th>Datum:</th>
											<td><input  type="text" name="date" class="reserveer_input"  id="datepicker" required></td>
										</tr>
										<tr>
											<th>Tijd:</th>
											<td><input type="time" name="tijd" class="reserveer_input" required></td>
										</tr>
										<tr>
											<th>Aantal Personen:</th>
											<td><input type="number" name="aantalPers" class="reserveer_input" required></td>
										</tr>

										<tr>
											<th>Opmerking:</th>
											<td><textarea rows="4" name="opmerking" class="reserveer_textarea"></textarea></td>
										</tr>
										<tr>
											<td colspan="2">
											<input type="submit" name="submit" value="Reserveer"></td>
										</tr>
									</table>
								</form>
								</div>
                            </div>
                        </div>
                    </div>
                </div></br></br>	
                <div class="col-md-3 col-sm-12">
				<div id = "formulierhulp">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item  recent"> 
							<br>
							<h3>Dagelijks open van 16:00 t/m 23:00</h3>
							</b>
							<h3> Uitgaanscentrum De Bonte Koe<br>
							Dorpsstraat 14b<br>
							2481BA Woubrugge<br>
							0172-518274</h3>
							<br><br><br><br>
							<b>Website</b><br>
							   <h3><small class="link"><a href="">http://uitgaanscentrumdebontekoe.nl/restaurant</a></small><br></h3>
							<br>
							<b>E-mail</b><br>
							   <h3><small class="link"><a href="">restaurant@uitgaancentrumdebontekoe.nl</a></small>    </h3>     
                        </div>
                    </div>
                </div>
				</div>
            </div>
        </div>
    </section>
    

	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>   
</body>
</html>
