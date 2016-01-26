<?php 

include_once "page_navigation.php";

echo getNav();
?>

<div class="logo_home">
    <img src="images/Logo/Logo3.png" draggable="false" />
    <h1>De Bonte Koe</h1>
</div>

<ul id="slider">
        <li>
            <a href="restaurant_home.php">
                <img src="images/restaurant_home.jpg" width="100%" height="100%" draggable="false"/>
            </a>
                <div class="slider-bg-restaurant"></div>
                <div class="slider-info">
                        <strong>Het Restaurant</strong>
                        <p class="slider-text">Dit is het restaurant van de Bonte Koe. Hier zie je het beste koks en de lekkerste eten. Als je naar deze pagina gaat dan kan je ook reserveren en de menukaart zien.</p>
                </div>
        </li>
        <li>
            <a href="uitgaan_home.php">
                <img src="images/colorful-music-speaker-wide.jpg"  width="100%" height="100%"  draggable="false"/>
            </a>
            <div class="slider-bg-uitgaan"></div>
                <div class="slider-info">
                        <strong>Uitgaanscentrum</strong>
                        <p class="slider-text">Dit is de Uitgaanscentrum van de Bonte Koe, hier kan je kijken welke zalen wij hebben en wat er te beleven is. Er zijn totaal 3 zalen met allemaal een andere stijl. Dus kom een keertje langs om het te beleven!!!</p>
                </div>
        </li>
        <li>
            <a href="bioscoop/web/">
                <img src="images/bioscoo_home.jpg"  width="100%" height="100%" draggable="false" />
            </a>
                <div class="slider-bg-bioscoop"></div>
                <div class="slider-info">
                        <strong>De Bioscoop</strong>
                        <p class="slider-text">Dit is de Bioscoop van de Bonte Koe, Hier kan je naar de nieuwste films in de beste kwaliteit. Op deze pagina kan je ook gelijk zien hoelaat elke film draait en hoeveel plekken ernog beschikbaar zijn.</p>
                </div>
        </li>
</ul>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="js/jquery.zaccordion.js"></script>
<link rel="stylesheet" type="text/css" href="css/home_slider.css"/>
<script type="text/javascript">
    $(document).ready(function() {
                            $("#slider").zAccordion({
                                    tabWidth: "15%",
                                    width: "100%",

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

<?php

echo getFooter(); 

?>

		