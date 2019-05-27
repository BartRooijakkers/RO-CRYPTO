<?php include('functions.php') ?>
<!DOCTYPE html>
    <html>
        <head>
            <!--Meta informatie-->
            <meta charset="UTF-8">
            <html lang="nl-en">
            <title>Inloggen - ROCrypto</title>
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
              <li><a href="coins.php">Coins</a></li>
              <li><a href="Info.html">Info</a></li>
              <li><a class="active" href="login.php">Login</a></li> <!-- DEZE VERANDERD MISSCHIEN NAAR PHP VOOR DE DATABASE???-->
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
               <form action="login.php" method="post"> <!--Naam hiervan kan veranderen voor de database -->
                <div class="imgcontainer">
                  <img src="images/loginavatar.png" alt="avatar" class="avatar">
                </div>
                <div class="container">
                  <label for="username"><b>Gebruikersnaam</b></label><br>
                  <input type="text" placeholder="Vul uw gebruikersnaam in" name="username" required><br>

                  <label for="password"><b>wachtwoord</b></label><br>
                  <input type="password" placeholder="Voer wachtwoord in" name="password" required><br>

                  <button type="submit" class="btn" name="login_btn">Login</button>
									<br>
                  <label>
                    <span class="register">Nog geen account? <a href="register.php">Registreer hier.</a></span>
                    <br>
                </label>
							<label class="error">	<?php echo display_error(); ?> </label>
              </div>
            </form>
          </div>
            <footer>HIER KOMT ALLE FOOTER  IN HALFIES</footer>

        </div>

        </body>
</html>
