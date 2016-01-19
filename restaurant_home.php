<?php 
	include_once("classes/database.class.php");
	include_once("include/config.php");

	$conn = Database::getInstance();
	$conn->connect(HOST,USER,PASS,DBNAME);

	if((isset($_POST))&&$_POST!=null) 
	{		
		$datetime = $_POST['date']." ".$_POST['tijd'];
		
		$sql = "INSERT INTO `reserveringen`(naam,aantalpers,date,opmerking) 
			VALUES ('{$_POST['naam']}','{$_POST['aantalPers']}','{$datetime}','{$_POST['opmerking']}')";
		
		$conn->doQuery($sql);
		// prg
		header("Location: " . $_SERVER['REQUEST_URI'] . "?q=submitform");

		exit();
	}
?>
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
	<nav class="navbar navbar-default">
		<div class="container">			
			
			<!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigatie">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span> 
			</button>-->
			<!--<div class="collapse navbar-collapse" id="navigatie">-->
				<ul class="nav navbar-nav">
					<li>
					<a class="navbar-brand" href="index.php">
						<img src="images/logo3.png" class="img-responsive inline"  height="100" width="100" alt="">
					</a>
					</li>
					<li><a href="restaurant_home.php">Home</a></li>
					<li><a href="restaurant_menukaart.php">Menukaart</a></li>                       
					<li><a href="restaurant_reserveren.php">Reserveren</a></li>                       
				</ul>
			<!--</div>-->
		</div>
	</nav><br />
    <!--/#header-->
    <section class="container">        
        <div class="price-table-2">
            <div class="row">
                <div class="col-sm-4">
					<img src="images/top1.png" class="img-responsive inline" alt="">
                </div>
                <div class="col-sm-4">
                    <div class="single-price price-two">
					<img src="images/tophome.png" class="img-responsive inline" alt="Homepagina (image moet gemaakt worden!)">
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
                         <div class="col-md-8 col-sm-12">
                            <div class="single-blog blog-details two-column">
                                <div class="post-thumb">
                                    
                                </div>
								<div class="main_div" >
									<?php 
									if((isset($_GET['q']))&&$_GET['q']=='submitform') 
									{
									?>
										<h1 class="main_header">Uw reservering is aangemaakt!</h1>
										<br>
										<p class="main_p">
											U zal binnenkort de factuur en een confirmatie mailtje ontvangen waarin
											de datum en prijs van de reservering staat.
											</p>
										
									<?php
									}
										else
									{
									?>
									<h1 class="main_header">Welcome op de Restaurant Module.</h1>
									<br>
									<p class="main_p">
										Als u zoekt voor een restaurant om te eten, dan bent u op de juiste plek!!<br>
										Want het restaurant van De Bonte Koe is echt de perfecte plek voor als je gaat uiteten, wij hebben alles 
										van elke vleesproduct naar elke vis product, voor jong en oud.<br>
										Natuurlijk mag uw huisdier ook mee want hebben ook een menukaart voor uw huisdier
										want wij denken niet alleen aan onze klanten maar ook aan hun geliefde 
										Wist u ook dat als u hier eet tegelijk ook korting krijgt bij ons in de bioscoop
										Jazeker, bij elke bestelling zit een bepaalde kortings persentage vast
										Dus hoe meer u besteld des te meer korting u krijgt
										<br><br>
										Dus waar wacht u nog op reserveer zosnel mogelijk bij De Bonte Koe 

									</p>
									
									<?php
									}
									?>
								</div>
							</div>
                        </div>
                    </div>
                </div></br></br>	
                <div class="col-md-3 col-sm-4">
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
    </section>
    

	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>   
</body>
</html>
