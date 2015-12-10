<!DOCTYPE html>
<html lang=\"nl\">
<head>
    <title>DeBonteKoe</title>
    <meta charset="iso-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="description" content="">
    <meta name="author" name="Rick van Koppen">
    <link rel="shortcut icon" href="../favicon.ico"> 
    <link rel="stylesheet" href="css/stylesheet.css" type="text/css" /> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.imagemapster.js"></script>

</head>
<body class="uitgaans">

<div class="banner_restaurant">
    <div class="banner_div">
         <a href="index.php"><img src="images/Logo/Logo3.png" class="banner_img" /></a>
    </div>
    <div class="banner_div">
        <h1 class="banner_header">Uitgaans Centrum</h1>
    </div>
    <div class="banner_buttons">
        <a href="restaurant_home.php"><button>Home</button></a>
        <a href="#"><button>Area's</button></a>
    </div>
</div>
<div class="menukaart_div" >
    <center>
        <h2 class="main_header">Area's</h2>
        <br /><br />
        
    <div id="veg_demo">
	<div style="">
            <img id="veg" src="images/uitgaans/plattegrond.jpg" usemap="#veg" style="width:1200px;" />
	</div>
    <div style="clear:both; height:8px;"></div>
    <div id="selections" style="clear:both;"></div>
</div>

    </center>    
<map id="veg_map" name="veg">
<area shape="poly" name="disco70" coords="643,182, 838,182, 838,112, 974,112, 974,182, 974,459, 643,459" href="#">
<area shape="poly" name="wc" coords="900,459, 974,459, 974,589, 900,589, 900,555, 928,555, 928,500, 900,500" href="#">
<area shape="poly" name="gang" coords="643,459, 900,459, 900,500, 928,500, 928,555, 900,555, 900,589, 643,589" href="#">
<area shape="poly" name="discoUrban" coords="643,589, 974,589, 974,914, 858,914, 858,943, 643,943, 643,914" href="#">
<area shape="poly" name="discoSchuur" coords="974,182, 1275,182, 1275,916, 974,916" href="#">
<area shape="poly" name="Buitenplaats" coords="974,47, 1651,51, 1656,919, 1275,916, 1275,182, 974,182" href="#">
<area shape="poly" name="Binnenplaats" coords="300,371, 641,371, 641,943, 420,943, 420,575, 300,575" href="#">
<area shape="poly" name="Receptie" coords="169,575, 418,575, 418,730, 169,730" href="#">
<area shape="poly" name="Restaurant" coords="169,242, 297,242, 297,575, 169,575, 169,529, 60,529, 60,380, 169,380" href="#">
<area shape="poly" name="Parkeerplaats" coords="5,730, 418,730, 418,993, 5,993" href="#">


    </map>



    <br /><br /><br />
</div>

<script type="text/javascript">

$(document).ready(function () {
	   var image = $('img');
	   var xref = {
	   		wc: "<b>Carrots</b> are delicious and may turn your skin orange!",
	   		gang: "<b>Asparagus</b> is one of the first vegetables of the spring. Being a dark green, it's great for you, and has interesting side effects.",
	   		Buitenplaats: "<b>Squash</b> is a winter vegetable, and not eaten raw too much. Is that really squash?",
	   		Binnenplaats: "<b>Red peppers</b> are actually the same as green peppers, they've just been left on the vine longer. Delicious when fire-roasted.",
	   		Receptie: "Similar to red peppers, <b>yellow peppers</b> are sometimes sweeter.",
	   		Restaurant: "<b>Celery</b> is a fascinating vegetable. Being mostly water, it actually takes your body more calories to process it than it provides.",
	   		Parkeerplaats: "<b>Cucumbers</b> are cool.",
	   };

	   image.mapster(
       {
       		fillOpacity: 0.4,
       		fillColor: "000000",
       		strokeColor: "3320FF",
       		strokeOpacity: 0.8,
       		strokeWidth: 4,
       		stroke: true,
            isSelectable: true,
			singleSelect: true,
            mapKey: 'name',
            listKey: 'name',
            onClick: function (e) {
                $('#selections').html(xref[e.key]);
                 
            },
            showToolTip: true,
            toolTipClose: ["tooltip-click", "area-click"],
            areas: [
                {
                	key: "disco70",
                	fillColor: "3fa3ff",
                        strokeColor: "000000",
                        fillOpacity: 0.6,
                },
                {
                	key: "discoUrban",
                	fillColor: "ff8100",
                        strokeColor: "000000",
                        fillOpacity: 0.6
                },
                {
                   key: "discoSchuur",
                   strokeColor: "000000",
                   fillColor: "07ea0b",
                   fillOpacity: 0.6
                },
                {
                   key: "wc",
                   fillColor: "ffffff",
                },
                {
                   key: "gang",
                   fillColor: "ffffff",
                },
                {
                    key: "Buitenplaats",
                },
                {
                    key: "Binnenplaats",
                },
                {
                    key: "Restaurant",
                },
                {
                    key: "Receptie",
                },
                {
                    key: "Parkeerplaats",
                }
                ]
        });
      });
      </script>