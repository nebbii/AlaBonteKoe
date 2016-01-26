<?php function getNav() { ob_start(); ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title>De Bonte Koe</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dit is een ALA opdracht voor de opleiding MD/AO van ID College" />
    <meta name="keywords" content="ALA, Bonte Koe, ID College" />
    <meta name="author" content="ALA Groepje" />
    <link rel="icon" href="images/Logo/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/stylesheet.css" type="text/css"  />
    <link rel="stylesheet" type="text/css" href="css/navigation.css" />
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>


</head>

<body>
<div class="jquery-script-ads" align="center"><script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 100;
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
<div class="open"> <span class="cls"></span> <span>
  <ul class="sub-menu">
    <li> <a href="index.php">Home</a> </li>
    <li> <a href="restaurant_home.php">Restaurant</a> </li>
    <li> <a href="uitgaan_home.php">Uitgaans centrum</a> </li>
    <li> <a href="bioscoop/web/">Bioscoop</a> </li>
    <li> <a href="contact.php">Contact</a> </li>
    <li> <a href="admin.php">Admin</a> </li>
  </ul>
  </span> <span class="cls"></span> 
</div>

<?php return ob_get_clean(); } ?>            
            

<?php function getFooter() { ob_start(); ?>
        			

<script>
$(document).ready(function() {
		$(document).delegate('.open', 'click', function(event){
			$(this).addClass('oppenned');
			event.stopPropagation();
		})
		$(document).delegate('body', 'click', function(event) {
			$('.open').removeClass('oppenned');
		})
		$(document).delegate('.cls', 'click', function(event){
			$('.open').removeClass('oppenned');
			event.stopPropagation();
		});
	});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>         
    
<?php return ob_get_clean(); } ?>
