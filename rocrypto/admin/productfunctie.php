<?php

session_start();

// Database connectie
$db = mysqli_connect('localhost', 'root', '', 'rocrypto');
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}
//
$productnaam = "";
$coinsaantal    = "";
$imgpath    = "";
$prijs    = "";
$errors   = array();

// toevoeg knop
if (isset($_POST['addproduct_btn'])) {
	addproduct();
}

// Product toevoegen
function addproduct(){
	global $db, $errors, $productnaam, $email;

	// Haalt de gegevens uit de form
	$productnaam    =  e($_POST['productnaam']);
	$coinsaantal      =  e($_POST['coinsaantal']);
	$imgpath   =  e($_POST['imgpath']);
	$prijs   =  e($_POST['coinprice']);

	// Zorgt dat de form correct is ingevuld
	if (empty($productnaam)) {
		array_push($errors, "productnaam is verplicht");
	}
	if (empty($coinsaantal)) {
		array_push($errors, "aantal is verplicht");
	}
	if (empty($imgpath)) {
		array_push($errors, "img is verplicht");
	}
	if (empty($prijs)) {
		array_push($errors, "prijs is verplicht");
	}

	// registeert producten wanneer er geen errors in de form zitten
	if (count($errors) == 0) {
			$query = "INSERT INTO producten (name, coins, image, prijs)
					  VALUES('$productnaam', '$coinsaantal', '$imgpath', '$prijs')";
					  mysqli_query($db, $query);

	}else{
			echo ("fout");


		}
	}
