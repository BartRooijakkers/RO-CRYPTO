<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: profile.php"); // Redirecting To Profile Page
}
?>
<!DOCTYPE html>
    <html>
        <head>
            <!--Meta informatie-->
            <meta charset="UTF-8">
            <html lang="nl-en">
            <title>ROCrypto Home</title>
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
          <coingecko-coin-price-marquee-widget  coin-ids="bitcoin,ethereum,eos,ripple,litecoin" currency="eur" background-color="#00958E" locale="en"></coingecko-coin-price-marquee-widget>
          </div>

          <!--Dit is de box waar de website als het ware in komt-->
          <div class="box">

            <!--Dit is de login box op de loginpage-->
            <div class="login">
               <form action="" method="post"> <!--Naam hiervan kan veranderen voor de database shit-->
                <div class="imgcontainer">
                  <img src="images/loginavatar.png" alt="avatar" class="avatar">
                </div>
                <div class="container">
                  <label for="username"><b>Gebruikersnaam</b></label><br>
                  <input type="text" placeholder="Vul uw gebruikersnaam in" name="username" required><br>

                  <label for="password"><b>Wachtwoord</b></label><br>
                  <input type="password" placeholder="Voer wachtwoord in" name="password" required><br>

                  <label for="passwordconfirm"><b>Confirm Wachtwoord</b></label><br>
                  <input type="password" placeholder="Voer nogmaals uw wachtwoord in" name="passwordconfirm" required><br>

                  <button type="submit">Registreren</button><br>
                    <br>
                </label>
                <span><?php echo $error; ?></span>
              </div>
            </form>
          </div>
            <footer>HIER KOMT ALLE FOOTER SHIT IN HALFIES</footer>

        </div>

        </body>
</html>
