<?php
include_once ("include/config.php");
include_once ("include/functions.php");

getHeaderHome();

?>
<div class="container">
    <header class="clearfix">
//	<h1><img src="images/logo/Logo3.png" class="logo_home"/>De Bonte <span>Koe</span></h1>
    </header>
    
    <section>
        <ul id="da-thumbs" class="da-thumbs">
            <li style="background: #D8267D;">
                <a href="restaurant_home.php">
                    <img src="images/6484cd21-fe6a-469c-ba67-1678b7ea7f22.jpg"  class="restaurant_home"/>
                        <div><span>Restaurant module</span></div>
                </a>
            </li>
            <li style="background: #41BCEB;">
                <a href="uitgaan_home.php">
                    <img src="images/Schuurfeest2010stb.jpg" class="uitgaan_home"/>
                        <div><span>Uitgaans module</span></div>
                </a>
            </li>
            <li style="background: #FF6A00;">
                <a href="bioscoop_home.php">
                    <img src="images/faciliteiten09.jpg" class="bowling_home"/>
                        <div><span>Bioscoop Module</span></div>
                </a>
            </li>
        </ul>
    </section>
</div>
		
<?php

getFooter();

?>
