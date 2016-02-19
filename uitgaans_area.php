<?php 

include_once "page_navigation.php";

echo getNav();
?>
<body class="uitgaans">

<div class="banner_restaurant">
    <div class="banner_div">
         <a href="index.php"><img src="images/Logo/Logo3.png" class="banner_img" /></a>
    </div>
    <div class="banner_div">
        <h1 class="banner_header">Uitgaans Centrum</h1>
    </div>
    <div class="banner_buttons">
        <a href="uitgaan_home.php"><button class="button_uitgaans">Home</button></a>
        <a href="#"><button class="button_uitgaans">Area's</button></a>
    </div>
</div>
<div class="menukaart_div" >
    <center>
        <h2 class="main_header">Area's</h2>
        <br /><br />
        <p style="font-size: 18px; margin: 0 15% 0 15%;">
            Hier zie je de plattegrond van de Bonte Koe, Als je op 1 van de Area's klikt dan kan je precies zien wat het is en waarom het bij ons de beste discotheek van Nederland is!
        </p>
        <br />
        <img class="img-responsive" style="width:100%" id="veg" src="images/uitgaans/plattegrond.jpg" usemap="#veg">
    <div id="veg_demo">
	<div style="">

	</div>
        <div style="clear:both; height:8px;"></div>
        <div id="selections" style="clear:both;"></div>
    </div>

    </center>    
<map id="veg_map" name="veg">
    <area shape="poly" name="disco8090" coords="643,182, 838,182, 838,112, 974,112, 974,182, 974,459, 643,459" href="#" onclick="location.href='uitgaans_area_8090.php'">
    <area shape="poly" name="discoUrban" coords="643,589, 974,589, 974,914, 858,914, 858,943, 643,943, 643,914" href="#" onclick="location.href='uitgaans_area_urban.php'">
    <area shape="poly" name="discoSchuur" coords="974,182, 1275,182, 1275,916, 974,916" href="#" onclick="location.href='uitgaans_area_schuurfeest.php'">
    
    <area shape="poly" name="wc" coords="900,459, 974,459, 974,589, 900,589, 900,555, 928,555, 928,500, 900,500" href="#">
    <area shape="poly" name="gang" coords="643,459, 900,459, 900,500, 928,500, 928,555, 900,555, 900,589, 643,589" href="#">
    <area shape="poly" name="Buitenplaats" coords="974,47, 1651,51, 1656,919, 1275,916, 1275,182, 974,182" href="#">
    <area shape="poly" name="Binnenplaats" coords="300,371, 641,371, 641,943, 420,943, 420,575, 300,575" href="#">
    <area shape="poly" name="Receptie" coords="169,575, 418,575, 418,730, 169,730" href="#">
    <area shape="poly" name="Restaurant" coords="169,242, 297,242, 297,575, 169,575, 169,529, 60,529, 60,380, 169,380" href="#">
    <area shape="poly" name="Parkeerplaats" coords="5,730, 418,730, 418,993, 5,993" href="#">
</map>



    <br /><br /><br />
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.js"></script>
<script type="text/javascript" src="js/jquery.imagemapster.js"></script>
<script type="text/javascript">

$(document).ready(function () {
	   var image = $('img');
	   var xref = {
	   		wc: "<b>Toiletten:</b> Dit zijn de wctjes.",
	   		gang: "<b>Hoofdgang:</b> Hier kom je binnen als je naar Disco's wilt gaan.",
	   		Buitenplaats: "<b>Buitenplaats:</b> Hier kan je buiten even luchten of een peukie doen",
	   		Binnenplaats: "<b>Binnenplaats:</b> Hier kan je vuiten even luchten en hier loop je ook als je naar de disco's wilt",
	   		Receptie: "<b>Receptie:</b> Hier betaal je de entreeprijs/bioscoopkaartje of laat je reservering zien voor het restaurant/bioscoop",
	   		Restaurant: "<b>Restaurant:</b> Hier werken de beste koks van Nederland, dus kom gerust even langs.",
	   		Parkeerplaats: "<b>Parkeerplaats:</b> Onze parkeerplaat is even groot als bij shiphol dus je hoefft niet bang te zijn dat je je auto/motor/scooter/fiets niet kwijt kan.",
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
                	key: "disco8090",
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

      <?php
      
      echo getFooter(); ?>