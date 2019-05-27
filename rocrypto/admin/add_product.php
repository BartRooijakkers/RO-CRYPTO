<?php include('productfunctie.php') ?>
<!DOCTYPE html>
<html>
<head>
		<!--Meta informatie-->
		<meta charset="UTF-8">
		<html lang="nl-en">
		<title>Product Toevoegen - ROCrypto</title>
		<meta name="description" content="HTML,CSS,XML,Cryptocoin, ROC, ROCrypto, Cryptocurrencies, Kop Van Noord-Holland">
		<meta name="author" content="Bart Rooijakkers, Wesley van der Slikke, Dane Schuijt">
		<meta name="viewport" content="widht=device-width, initial-scale=1">
		<link rel="stylesheet" href="../stylesheet.css">
</head>
<body>
	<a href="home.html">
		<img src="../Images/Logo.svg" class="logo">
	</a>


	<div class="navigation">
		<ul>
			<li><a href="../Home.html">Home</a></li>
			<li><a href="../Coins.php">Coins</a></li>
			<li><a href="../Info.html">Info</a></li>
			<li><a href="../index.php">Login</a></li> <!-- DEZE VERANDERD MISSCHIEN NAAR PHP VOOR DE DATABASE???-->
		</ul>
	</div>

	<div class="bar">
	<script src="https://widgets.coingecko.com/coingecko-coin-price-marquee-widget.js"></script>
	<coingecko-coin-price-marquee-widget  coin-ids="bitcoin,ethereum,eos,ripple,litecoin,dogecoin" currency="eur" background-color="#00958E" locale="en"></coingecko-coin-price-marquee-widget>
	</div>

	<div class="box">
	<div class="header">
		<h2>Admin - Product toevoegen</h2>
	</div>

  <div class="login">
	<form method="post" action="add_product.php">



			<label for="Productnaam"><b>Naam Product</b></label><br>
			<input type="text" name="productnaam">
			<br>

		  <label for="coinsaantal"><b>Aantal coins</b></label><br>
			<input type="text" name="coinsaantal">
			<br>


		  <label for="imagepath"><b>Foto path</b></label><br>
			<input type="text" name="imgpath">
			<br>

			<label for="prijs"><b>Prijs</b></label><br>
		<input type="text" name="coinprice"
		</select>
		<br>


			<button type="submit" class="btn" name="addproduct_btn"> Voeg Product toe</button>

	</form>
</div>
</div>
</body>
</html>
