<?php
// database connect
/*function dbConnect()
{
	include_once("config.php");
	global $dbLink = new mysqli(HOST,USER,PASS,DBNAME);
	
	if ($dbLink->connect_errno) {
		print_r("Database connect failed!");
	}
}*/

// # html block functions
function getHeaderHome()
{
	?>
	<!DOCTYPE html>
	<html lang=\"nl\">
	<head>
		<title>DeBonteKoe</title>
		<meta charset=\"iso-8859-1\">
		<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\"> 
		<meta name=\"description\" content=\"\">
		<meta name=\"author\" name=\"Rick van Koppen\">
		<link rel=\"shortcut icon\" href=\"../favicon.ico\"> 
		<link rel=\"stylesheet\" href=\"css/stylesheet.css\" type=\"text/css\" />
		<link rel=\"stylesheet\" href=\"css/HoverEffect/demo.css\" type=\"text/css\" />
		<link rel=\"stylesheet\" href=\"css/HoverEffect/style.css\" type=\"text/css\" />
		<link href=\"https://fonts.googleapis.com/css?family=Open+Sans\" rel=\"stylesheet\">
		<link href=\"https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two\" rel=\"stylesheet\">
		<script src=\"js/modernizr.custom.97074.js\"></script>
		<noscript><link rel=\"stylesheet\" type=\"text/css\" href=\"css/noJS.css\"/></noscript>
	</head>
	<body>
	<?php
}

function getHeaderRestaurant()
{
	?>
	<!DOCTYPE html>
	<html lang="nl">
	<head>
		<title>DeBonteKoe</title>
		<meta charset="iso-8859-1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="description" content="">
		<meta name="author" name="Rick van Koppen">
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" href="css/stylesheet.css" type="text/css" />
		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jssor.slider.mini.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function ($) {
				
				var jssor_1_SlideshowTransitions = [
				  { $Duration:1200,$Opacity:2 }
				];
				
				var jssor_1_options = {
				  $AutoPlay: true,
				  $SlideshowOptions: {
					$Class: $JssorSlideshowRunner$,
					$Transitions: jssor_1_SlideshowTransitions,
					$TransitionsOrder: 1
				  },
				  $ArrowNavigatorOptions: {
					$Class: $JssorArrowNavigator$
				  },
				  $BulletNavigatorOptions: {
					$Class: $JssorBulletNavigator$
				  }
				};
				
				var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
				
				//responsive code begin
				//you can remove responsive code if you don't want the slider scales while window resizes
				function ScaleSlider() {
					var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
					if (refSize) {
						refSize = Math.min(refSize, 600);
						jssor_1_slider.$ScaleWidth(refSize);
					}
					else {
						window.setTimeout(ScaleSlider, 30);
					}
				}
				ScaleSlider();
				$(window).bind("load", ScaleSlider);
				$(window).bind("resize", ScaleSlider);
				$(window).bind("orientationchange", ScaleSlider);
				//responsive code end
			});
		</script>
		
	</head>
	<body>
	<?php
}
/*
function login($naam, $pwd){
    $link = mysqli_connect("localhost","root","","Debontekoe") or die("Error " . mysqli_error($link)); 
    $email = mysqli_real_escape_string($link, $naam);
    $pwd = mysqli_real_escape_string($link, $pwd);
    
    $query = "SELECT * FROM users WHERE naam = '".$naam."' AND wachtwoord = '".$pwd."'";
    $result = mysqli_query($link, $query);
    $number = mysqli_num_rows($result);
    if($number == 1){
        $_SESSION["ingelogd"] = true;
        header("location: admin.php");
    }else{
        header("location: faillogin.php");
    }
}
*/

function getFooter()
{
    ?>
	</body>
	   </html>
	   <script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js\"></script>
		<script type=\"text/javascript\" src=\"js/jquery.hoverdir.js\"></script>	
		<script type=\"text/javascript\">
			$(function() {

				$(' #da-thumbs > li ').each( function() { $(this).hoverdir({
					hoverDelay : 75
				}); } );

			});
		</script>
	<?php
}


?>