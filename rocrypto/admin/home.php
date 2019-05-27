<?php
include('../functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "U dient eerst in te loggen";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
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
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
			<div class="profiel">
			<div class="account">

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>


						(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)
						<br>
						<a href="create_user.php"> Gebruiker toevoegen</a>
						<br>
						<a href="add_product.php"> Product toevoegen
						<br>
							<a href="home.php?logout='1'">logout</a>


				<?php endif ?>
			</div>
		</div>
	</div>
</div>
<footer>HIER KOMT ALLE FOOTER  IN </footer>
</div>
</body>
</html>
