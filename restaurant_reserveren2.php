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
	<header id="header">      	
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">

                    <a class="navbar-brand" href="index.html">
                       <img src="images/logo3.png" class="img-responsive inline"  height="100" width="100" alt="">
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="restaurant_home.php">Home</a></li>
                        <li><a href="restaurant_menukaart.php">menukaart</a></li>                       
                        <li><a href="restaurant_reserveren.php">reserveren</a></li>                       
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->

    <section class="container">        
        <div class="price-table-2">
            <div class="row">
                <div class="col-sm-6 col-md-4">
					<img src="images/top1.png" class="img-responsive inline" alt="">
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="single-price price-two">
					<img src="images/top4.png" class="img-responsive inline" alt="">
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="single-price price-three">
						<img src="images/top2.png" class="img-responsive inline" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="blog-details" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="row">
                         <div class="col-md-12 col-sm-8">
                            <div class="single-blog blog-details two-column">
                                <div class="post-thumb">
                                    
                                </div>
            <table class="reserveer_table">
                <tr></br></br></br>
                    <th>Naam:</th>
                    <td><input type="text" name="naam" class="reserveer_input"  required></td>
                </tr>
                <tr>
                    <th>E-mailadres:</th>
                    <td><input type="email" name="email" class="reserveer_input" required></td>
                </tr>

                <tr>
                    <th>Datum:</th>
                    <td><input  type="text" name="datum" class="reserveer_input"  id="datepicker" required></td>
                </tr>
                <tr>
                    <th>Tijd:</th>
                    <td><input type="time" name="tijd" class="reserveer_input" required></td>
                </tr>
                <tr>
                    <th>Aantal Personen</th>
                    <td><input type="number" name="aantalPersonen" class="reserveer_input" required></td>
                </tr>

                <tr>
                    <th>Opmerking</th>
                    <td><textarea rows="4" cols="50" name="opmerking" class="reserveer_textarea"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2">
                    <input type="submit" name="submit" value="Reserveer"></td>
                </tr>
            </table>
                            </div>
                        </div>
                    </div>
                 </div></br></br>	
                <div class="col-md-3 col-sm-12">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item  recent"> 
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
