<?php
//include_once ("include/functions.php");
//
//getheaderRestaurant();
?>

<!DOCTYPE html>
<html lang=\"nl\">
<head>
    <title>DeBonteKoe</title>
    <meta charset="iso-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="description" content="">
    <meta name="author" name="Rick van Koppen/ Maarten Wijsman">
    <link rel="shortcut icon" href="../favicon.ico"> 
    <link rel="stylesheet" href="css/stylesheet.css" type="text/css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="../bootstrap/assets/css/ace.css" type="text/css" /> 
    <link rel="stylesheet" href="../bootstrap/assets/css/bootstrap.css" type="text/css" /> 
    <link rel="stylesheet" href="../bootstrap/assets/css/font-awesome.css" type="text/css" /> 
    <link rel="stylesheet" href="../bootstrap/assets/css/jquery-ui.custom.css" type="text/css" /> 
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
        $(function() {
          $( "#accordion" ).accordion({
            event: "click hoverintent",
            heightStyle: "content"
          });
        });

        /*
         * hoverIntent | Copyright 2011 Brian Cherne
         * http://cherne.net/brian/resources/jquery.hoverIntent.html
         * modified by the jQuery UI team
         */
        $.event.special.hoverintent = {
          setup: function() {
            $( this ).bind( "mouseover", jQuery.event.special.hoverintent.handler );
          },
          teardown: function() {
            $( this ).unbind( "mouseover", jQuery.event.special.hoverintent.handler );
          },
          handler: function( event ) {
            var currentX, currentY, timeout,
              args = arguments,
              target = $( event.target ),
              previousX = event.pageX,
              previousY = event.pageY;

            function track( event ) {
              currentX = event.pageX;
              currentY = event.pageY;
            };

            function clear() {
              target
                .unbind( "mousemove", track )
                .unbind( "mouseout", clear );
              clearTimeout( timeout );
            }

            function handler() {
              var prop,
                orig = event;

              if ( ( Math.abs( previousX - currentX ) +
                  Math.abs( previousY - currentY ) ) < 7 ) {
                clear();

                event = $.Event( "hoverintent" );
                for ( prop in orig ) {
                  if ( !( prop in event ) ) {
                    event[ prop ] = orig[ prop ];
                  }
                }
                // Prevent accessing the original event since the new event
                // is fired asynchronously and the old event is no longer
                // usable (#6028)
                delete event.originalEvent;

                target.trigger( event );
              } else {
                previousX = currentX;
                previousY = currentY;
                timeout = setTimeout( handler, 100 );
              }
            }

            timeout = setTimeout( handler, 100 );
            target.bind({
              mousemove: track,
              mouseout: clear
            });
          }
        };
  </script>
</head>
	<body class="restaurant">

<div class="banner_restaurant">
    <div class="banner_div">
        <img src="images/Logo/Logo3.png" class="banner_img" />
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
<div class="menukaart_div" >
    <center><h2 class="main_header">Het Menukaart</h2></center>
    <br />
    <div id="accordion" style="margin: 0 10% 10% 10%;">
  <h3>Voorgerecht</h3>
  <div>
    <p>
    Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
    ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
    amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
    odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
    </p>
  </div>
  <h3>Hoofdgerecht</h3>
  <div>
    <p>
    Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
    purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
    velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
    suscipit faucibus urna.
    </p>
  </div>
  <h3>Nagerecht</h3>
  <div>
    <p>
    Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
    Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
    ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
    lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
    </p>
    <ul>
      <li>List item one</li>
      <li>List item two</li>
      <li>List item three</li>
    </ul>
  </div>
  <h3>Dranken</h3>
  <div>
    <p>
    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
    et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
    faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
    mauris vel est.
    </p>
    <p>
    Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
    inceptos himenaeos.
    </p>
  </div>
  <br /><br /><br /><br />
</div>

</div>


