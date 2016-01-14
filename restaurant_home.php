<?php 
include_once("classes/database.class.php");
include_once("include/config.php");
include_once "page_navigation.php";

echo getNav();

$conn = Database::getInstance();
$conn->connect(HOST,USER,PASS,DBNAME);
?>
<body class="restaurant">

    <div class="banner_restaurant">
        <div class="banner_div">
             <a href="index.php"><img src="images/Logo/Logo3.png" class="banner_img" /></a>
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
    <div class="main_div" >
		<?php 
		if((isset($_POST))&&$_POST!=null) 
		{		
			// build datetime
			$datetime = explode("/",$_POST['date']);
			$datetime = $datetime[2]."/".$datetime[1]."/".$datetime[0]." ".$_POST['tijd'];
			
			$sql = "INSERT INTO `reserveringen`(naam,aantalpers,date,opmerking) 
				VALUES ('{$_POST['naam']}','{$_POST['aantalPers']}','{$datetime}','{$_POST['opmerking']}')";
			
			$conn->doQuery($sql);
		?>
			<center><h2 class="main_header">Uw reservering is aangemaakt!</h2></center>
			<br>
			<center><p class="main_p">
				U zal binnenkort de factuur en een confirmatie mailtje ontvangen waarin
				de datum en prijs van de reservering staat.
				</p>
			</center>
		<?php
		}
			else
		{
		?>
        <center><h2 class="main_header">Welcome op de Restaurant Module</h2></center>
        <br>
        <center><p class="main_p">
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
        </center>
		<?php
		}
		?>
        <br /><br /><br />
        <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden; visibility: hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                <div style="position:absolute;display:block;background:url('images/restaurant_slider/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
            </div>
            <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/restaurant_slider/233C236F00000578-2837806-image-1_1416233939406.jpg" />
                </div>
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/restaurant_slider/images_blog_images_2_b2ap3_thumbnail_fat-cow-Sticky-Toffee-Pudding.jpg" />
                </div>
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/restaurant_slider/images_blog_images_2_b2ap3_thumbnail_fat-cow-cheese-burger.jpg" />
                </div>
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/restaurant_slider/images_blog_images_2_b2ap3_thumbnail_fat-cow-interior.jpg" />
                </div>
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/restaurant_slider/images_blog_images_2_b2ap3_thumbnail_fat-cow-la-restaurant.jpg" />
                </div>
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/restaurant_slider/images_blog_images_2_b2ap3_thumbnail_fat-cow-moo-bar (1).jpg" />
                </div>
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/restaurant_slider/images_blog_images_2_b2ap3_thumbnail_fat-cow-restaurant.jpg" />
                </div>
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/restaurant_slider/images_blog_images_2_b2ap3_thumbnail_fat-cow-sausage-burrata-pizza.jpg" />
                </div>
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/restaurant_slider/images_blog_images_2_b2ap3_thumbnail_fat-cow-squash-blossom-tempura.jpg" />
                </div>
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/restaurant_slider/images_blog_images_2_b2ap3_thumbnail_gordon-ramsay-the-fat-cow-restaurant.jpg" />
                </div>
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="images/restaurant_slider/images_blog_images_2_b2ap3_thumbnail_the-fat-cow-la-corina_20121210-234559_1.jpg" />
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

<?php

echo getFooter(); 

?>