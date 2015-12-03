<!DOCTYPE html>
<html lang="nl">
<head>
    <title>DeBonteKoe</title>
    <meta charset="iso-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="description" content="">
    <meta name="author" name="Rick van Koppen">
    <link rel="shortcut icon" href="../favicon.ico"> 
    <link rel="stylesheet" href="css/stylesheet.css" type="text="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/jquery.zaccordion.js"></script>
    <link rel="stylesheet" type="text/css" href="css/home_slider.css"/>
    <script type="text/javascript">
	$(document).ready(function() {
				$("#slider").zAccordion({
					tabWidth: "15%",
					width: "100%",
                                        speed: 1050,
					height: "100%",
                                        slideClass: 'slider',
                                        animationStart: function () {
                                            $('#slider').find('li.slider-open div').css('display', 'none');
                                            $('#slider').find('li.slider-previous div').css('display', 'none');
                                        },
                                        animationComplete: function () {
                                            $('#slider').find('li div').fadeIn(600);
                                        }    
				});
				$(window).resize(function() {
					$("#slider").height($(window).height());
					$("#slider li").height($(window).height());
					$("#slider img").height($(window).height());
				});
                                


			});
    </script>
</head>
<body>
    <div class="logo_home">
        <img src="images/Logo/Logo3.png" draggable="false" />
        <h1>De Bonte Koe</h1>
    </div>
    
    <ul id="slider">
            <li>
                <a href="restaurant_home.php">
                    <img src="images/restaurant_home.jpg" width="100%" height="100%" draggable="false"/>
                </a>
                    <div class="slider-bg"></div>
                    <div class="slider-info">
                            <strong>Het Restaurant</strong>
                            <p class="slider-text">Dit is het restaurant van de Bonte Koe. Hier zie je het beste koks en de lekkerste eten. Als je naar deze pagina gaat dan kan je ook reserveren en de menukaart zien.</p>
                    </div>
            </li>
            <li>
                <a href="uitgaan_home.php">
                    <img src="images/colorful-music-speaker-wide.jpg"  width="100%" height="100%"  draggable="false"/>
                </a>
                <div class="slider-bg"></div>
                    <div class="slider-info">
                            <strong>Uitgaanscentrum</strong>
                            <p class="slider-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in condimentum sem. Aenean faucibus dignissim auctor. In ut libero vitae augue laoreet iaculis at a tellus.</p>
                    </div>
            </li>
            <li>
                <a href="bioscoop_home.php">
                    <img src="images/bioscoo_home.jpg"  width="100%" height="100%" draggable="false" />
                </a>
                    <div class="slider-bg"></div>
                    <div class="slider-info">
                            <strong>De Bioscoop</strong>
                            <p class="slider-text">Duis viverra velit orci. Sed vestibulum mi nec est imperdiet sed ullamcorper augue molestie. Donec ultrices facilisis erat at porttitor.</p>
                    </div>
            </li>
    </ul>
</body>
</html> 

		
