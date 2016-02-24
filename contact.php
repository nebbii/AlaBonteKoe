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
</head>

<body class="contact">
<div class="banner_restaurant">
    <div class="banner_div">
         <a href="index.php"><img src="images/Logo/Logo3.png" class="banner_img" /></a>
    </div>
    <div class="banner_div">
        <h1 class="banner_header"><strong>Contact Pagina</strong></h1>
    </div>

</div>
<div class="contact_div">
    <div class="contact_restaurant"><center><p class="contact_p">Contact gegevens Restaurant</p></center></div>
    <div class="contact_uitgaan"><center><p class="contact_p">Contact gegevens Uitgaan</p></center></div>
    <div class="contact_bioscoop"><center><p class="contact_p">Contact gegevens Bioscoop</p></center></div>
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
