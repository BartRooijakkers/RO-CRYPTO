<?php
include('functions.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>

<!DOCTYPE html>
    <html>
        <head>
            <!--Meta informatie-->
            <meta charset="UTF-8">
            <html lang="nl-en">
            <title>Uw profiel - ROCrypto</title>
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
						  <div class="profiel">
							<div class="account">
						<div>
							<?php  if (isset($_SESSION['user'])) : ?>
								<h1>Welkom: <?php echo ucfirst($_SESSION['user']['username']); ?></h1>

								<h2>
									<br>

									 Uw E-mail: <?php echo ucfirst($_SESSION['user']['email']); ?>
									<br>
									<a href="index.php?logout='1'">logout</a>
								</h2>

							<?php endif ?>
						</div>

					</div>


              </div>
            <footer>HIER KOMT ALLE FOOTER SHIT IN </footer>

        </div>

        </body>
</html>
