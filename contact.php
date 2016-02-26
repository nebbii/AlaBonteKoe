<?php 
include_once "page_navigation.php";

echo getNav();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#flip").click(function(){
                $("#panel").slideToggle("slow");
            });
        });

        $(document).ready(function(){
            $("#flip2").click(function(){
                $("#panel2").slideToggle("slow");
            });
        });

        $(document).ready(function(){
            $("#flip3").click(function(){
                $("#panel3").slideToggle("slow");
            });
        });
    </script>

    <style>
        div.scroll {
            width: 280px;
            height: 350px;
            overflow-x: hidden;
            overflow-y: scroll;
            background: transparent;
        }

        #panel, #flip {
            padding: 5px;
            text-align: center;
            background-color: #D8267D;
            font-family: "Shadows Into Light Two";
        }

        #panel {
            padding: 30px;
            display: none;
            font-size: 21px;
        }

        #panel2, #flip2 {
            padding: 5px;
            text-align: center;
            background-color: #41BCEB;
            font-family: "Shadows Into Light Two";
        }

        #panel2 {
            padding: 30px;
            display: none;
            font-size: 21px;
        }

        #panel3, #flip3 {
            padding: 5px;
            text-align: center;
            background-color: #FF6A00;
            font-family: "Shadows Into Light Two";
        }

        #panel3 {
            padding: 30px;
            display: none;
            font-size: 21px;
        }
    </style>
</head>

<body class="contact">
<div class="banner_restaurant">
    <div class="banner_div">
         <a href="index.php"><img src="images/Logo/Logo3.png" class="banner_img" /></a>
    </div>
    <div class="banner_div">
        <h1 class="banner_header"><strong>Contact Pagina</strong></h1>
        <div class="banner_header"><small>Klik op de contact titels</small></div>
    </div>
</div>

<div class="contact_div">
    <div class="contact_restaurant"><center><p class="contact_p"><div id="flip"><h1>Contact gegevens Restaurant</h1></div></p></center>
        <div class="scroll">
            <div id="panel">Dagelijks open van &nbsp; 16:00uur t/m 23:00uur <hr> Uitgaanscentrum <br />De Bonte Koe <br /> Dorpsstraat 14b <br /> 2481BA Woubrugge <br />0172-518274</div></div></div>

    <div class="contact_uitgaan"><center><p class="contact_p"><div id="flip2"><h1>Contact gegevens Uitgaan</h1></div></p></center>
        <div id="panel2">Openingstijden: &nbsp;&nbsp; Vrijdag & Zaterdag &nbsp; 16:00uur t/m 02:00uur <hr>&nbsp; Toegangsprijs &nbsp; &euro;7,50 euro (inc. btw) &nbsp; 3 zalen: 80's en 90's, Urban & Schuurfeest!</div></div>

    <div class="contact_bioscoop"><center><p class="contact_p"><div id="flip3"><h1>Contact gegevens Bioscoop</h1></div></p></center>
        <div id="panel3">Elke snorhaar is welkom</div></div>
</div>

<script>
    $(document).ready(function(){
        $('.btn').popover({title: "<h1><strong>HTML</strong> inside <code>the</code> <em>popover</em></h1>", content: "Blabla <br> <h2>Cool stuff!</h2>", html: true, placement: "right"});
    });
</script>

</body>
</html>







<?php

echo getFooter(); 
?>
