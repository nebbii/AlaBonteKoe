<?php 

include_once "page_navigation.php";

echo getNav();
?>
<body class="uitgaans">

    <div class="banner_uitgaans">
        <div class="banner_div">
         <a href="index.php"><img src="images/Logo/Logo3.png" class="banner_img" /></a>
    </div>
    <div class="banner_div">
        <h1 class="banner_header">Uitgaans Centrum</h1>
    </div>
    <div class="banner_buttons">
        <a href="#"><button class="button_uitgaans">Home</button></a>
        <a href="uitgaans_area.php"><button class="button_uitgaans">Area's</button></a>
    </div>
    </div>
    <div class="main_div" >
        <center><h2 class="main_header">Welcome op de Uitgaans Module</h2></center>
        <br>
        <center><p class="main_p">
            Bij ons zijn er 3 area's met alle een andere muziek en style: <br />
            Urban, 80's&90's en een schuurfeest. 
            <br><br>
            Dus waar wacht u nog op kom zosnel mogelijk naar de discotheek bij <b>De Bonte Koe</b>

        </p>
        </center>
        <br /><br /><br />
        <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden; visibility: hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                <div style="position:absolute;display:block;background:url('images/restaurant_slider/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
            </div>
            <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/uitgaans/DPP_0009.JPG" />
                </div>
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/uitgaans/disco-eggenfelden.jpg" />
                </div>
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/uitgaans/Zaal_Oirlo_6_LR.jpg" />
                </div>
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/uitgaans/Drive-in-Discotheek-Dixo-Balthazar-te-StayOkay-Rhijnauwen-Amelisweerd-Utrecht-1b.jpg" />
                </div>
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/uitgaans/Zaal_Oirlo_4_LR.jpg" />
                </div>
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/uitgaans/maxresdefault.jpg" />
                </div>
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/uitgaans/Oirlo_zonder_Ellen.jpg" />
                </div>
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/uitgaans/mimg_59174_large.jpg" />
                </div>
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/uitgaans/Zaal_Oirlo_5_LR.jpg" />
                </div>
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/uitgaans/disco1b.jpg" />
                </div>
             
                
                
            </div>
        
            <div data-u="navigator" class="jssorb05" style="bottom:16px;right:6px;" data-autocenter="1">
                <!-- bullet navigator item prototype -->
                <div data-u="prototype" style="width:16px;height:16px;"></div>
            </div>
            <!-- Arrow Navigator -->
            <span data-u="arrowleft" class="jssora12l" style="top:123px;left:0px;width:30px;height:46px;" data-autocenter="2"></span>
            <span data-u="arrowright" class="jssora12r" style="top:123px;right:0px;width:30px;height:46px;" data-autocenter="2"></span>
        </div>
        <br /><br />
    </div>

        <!-- Side Menu -->    
    <div class="side_div">
        <br />
        <p class="side_p"><b>
            <br />
            <b>Openingstijden:</b>
            </b>
            <br /><br />
            <b>Vrijdag & Zaterdag:</b><br />
            20:00 t/m 07:00<br />
            <br />
            <b>Zondag</b><br />
            16:00 t/m 02:00
            <br /><br /><br />
            <b>Toegangsprijs:</b> &euro; 7,50(incl. btw)<br />
            (Je kan tussen de zalen switchen)
            <br /><br />
            <b>Email</b><br />
            <small class="link"><a href="">uitgaan@uitgaancentrumdebontekoe.nl</a></small> 
            <br /><br /><br />
        </p> 
        <br />
    </div>
    
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jssor.slider.mini.js"></script>
    <script>
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
    
</body>
</html>
<!--
            <div id="schuurfeest">
                <p>Net als voorgaande jaren zal het bij de area Schuurfeest weer plat worden gedraaid!
                We trappen een nieuwe decennia schuurfeesten af met een lekker foute knalfuif!
                Dit feest wil je niet missen! Zorg daarom dat je je toegangskaarten haalt tijdens de voorverkoop.
                Ook leer je een hoop mensen kennen en heb je een gezellige avond!
                Misschien neem je wel iemand mee naar huis.</p>
            </div>
            
            <div id="jaren">
                <p>Het is weer zover! De 80's & 90's area wordt gecombineerd met het beste wat de jaren 80 en 90 te bieden hadden. 
                Een combinatie die garant staat voor een spetterende avond, waarbij alles in het teken staat van de leukste twee decennia ooit. 
                Verlang jij ook zo terug naar die tijd dat je uit je dak ging op �Like a virgin� van Madonna en er vrolijk op los moonwalkte en hiphopte? 
                Het is allemaal weer up to date in de 80�s & 90�s area! </p>
            </div>
            
            <div id="urban">
                <p>Urban dance feesten zijn er helemaal voor jou! Binnen de Urban area heb je vele R&B, HipHop, Pop, Rap muziek.
                Je vindt hier de beste urban beats en urban dj�s in een unieke setting voor een avond vol entertainment!
                De urban zaal is sfeervol ingericht met een unieke uitstraling voor de echte Urban liefhebbers.
                Enjoy the best urban beats en laat je meeslepen door de spetterende line-up van urban dj�s!</p>
            </div>
        </div>
    </div>
         -->

         <?php

echo getFooter(); 

?>