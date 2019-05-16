<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
  header("location: index.php"); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
    <html>
        <head>
            <!--Meta informatie-->
            <meta charset="UTF-8">
            <html lang="nl-en">
            <title>Uw profiel</title>
            <meta name="description" content="HTML,CSS,XML,Cryptocoin, ROC, ROCrypto, Cryptocurrencies, Kop Van Noord-Holland">
            <meta name="author" content="Bart Rooijakkers, Wesley van der Slikke, Dane Schuijt">
            <meta name="viewport" content="widht=device-width, initial-scale=1">
            <link rel="stylesheet" href="stylesheet.css">
        </head>

        <body>
          <a href="home.html">
            <img src="Images/Logo.svg" class="logo">
          </a>

          <div class="navigation">
            <ul>
              <li><a href="Home.html">Home</a></li>
              <li><a href="Coins.html">Coins</a></li>
              <li><a href="Info.html">Info</a></li>
              <li><a href="index.php">Login</a></li> <!-- DEZE VERANDERD MISSCHIEN NAAR PHP VOOR DE DATABASE???-->
            </ul>
          </div>

          <!--Dit is de scrollbar met de currencies-->
          <div class="bar">
          <script src="https://widgets.coingecko.com/coingecko-coin-price-marquee-widget.js"></script>
          <coingecko-coin-price-marquee-widget  coin-ids="bitcoin,ethereum,eos,ripple,litecoin,dogecoin" currency="eur" background-color="#00958E" locale="en"></coingecko-coin-price-marquee-widget>
          </div>

          <!--Dit is de box waar de website als het ware in komt-->
          <div class="box">
            <div id="profile">
             <b id="welcome">Welkom : <i><?php echo $login_session; ?></i></b>
             <b id="logout"><a href="logout.php">Log Out</a></b>
             <br>
             </div>
              <div class="profiel">
               <h1>Welkom op uw profiel, Hier zal u kunnen zien wat voor coins u in bezit heeft en hoeveel deze op dit moment waar zijn.</h2><br>
               <p> De borders zijn tijdelijk </p>
              </div>
            <footer>HIER KOMT ALLE FOOTER SHIT IN HALFIES</footer>

        </div>

        </body>
</html>
