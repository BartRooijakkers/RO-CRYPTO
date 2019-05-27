<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "rocrypto");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if (isset($_POST['addproduct_btn'])) {
	addproduct();
}

// Registreer USER
function addproduct(){
	global $db, $errors, $productnaam, $coinsaantal;

	// Haalt de gegevens uit de form
	$productnaam   =  e($_POST['productnaam']);
	$coinsaantal      =  e($_POST['coinsaantal']);
	$imgpath  =  e($_POST['imgpath']);
	$prijs  =  e($_POST['prijs']);

	// Zorgt dat de form correct is ingevuld
	if (empty($productnaam)) {
		array_push($errors, "Productnaam is verplicht");
	}
	if (empty($coinsaantal)) {
    array_push($errors, "Aantal coins is verplicht");
	}
	if (empty($imgpath)) {
		array_push($errors, "Image path is verplicht");
	}
	if (empty($prijs)) {
		array_push($errors, "Prijs is verplicht");
	}

	// registeert gebruikers wanneer er geen errors in de form zitten
	if (count($errors) == 0) {

			$query = "INSERT INTO producten (name, coins, image, prijs)
					  VALUES('$productnaam', '$coinsaantal', '$imgpath', '$prijs')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "Niewe Product toegevoegd!";
			header('location: home.php');
		}
}

?>
