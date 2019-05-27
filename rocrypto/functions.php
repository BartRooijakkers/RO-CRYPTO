<?php
session_start();

// Database connectie
$db = mysqli_connect('localhost', 'root', '', 'rocrypto');

//
$username = "";
$email    = "";
$errors   = array();

// Registreer knop
if (isset($_POST['register_btn'])) {
	register();
}

// Registreer USER
function register(){
	global $db, $errors, $username, $email;

	// Haalt de gegevens uit de form
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// Zorgt dat de form correct is ingevuld
	if (empty($username)) {
		array_push($errors, "Gebruikersnaam is verplicht");
	}
	if (empty($email)) {
		array_push($errors, "Email is verplicht");
	}
	if (empty($password_1)) {
		array_push($errors, "Wachtwoord is verplicht");
	}
	if ($password_1 != $password_2) {
		array_push($errors, "Wachtwoord komt niet overeen");
	}

	// registeert gebruikers wanneer er geen errors in de form zitten
	if (count($errors) == 0) {
		$password = md5($password_1);//Encrypt het wachtwoord voor het opslaan

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (username, email, user_type, password)
					  VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "Niewe gebruiker aangemaakt!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO users (username, email, user_type, password)
					  VALUES('$username', '$email', 'user', '$password')";
			mysqli_query($db, $query);

			// Haalt ID van de gebruiker op
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // Start een sessie met ingelogde gebruiker
			$_SESSION['success']  = "Succesvol ingelogd";
			header('location: index.php');
		}
	}
}

// Haalt gebruikersgegevens op
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

//
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}
function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}
// uitlog knop
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

// Zorgt dat je inlogt na registreren
if (isset($_POST['login_btn'])) {
	login();
}

// login USER
function login(){
	global $db, $username, $errors;

	// fORM WAARDES
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// zorgt dat de form is ingevuld
	if (empty($username)) {
		array_push($errors, "Gebruikersnaam is verplicht");
	}
	if (empty($password)) {
		array_push($errors, "Wachtwoord is verplicht");
	}

	// Login als er geen errors zijn
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // User gevonden
			// Controlleert User_type
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "Succesvol ingelogd";
				header('location: admin/home.php');
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "Succesvol ingelod";
				header('location: index.php');
			}
		}else {
			array_push($errors, "Gebruikersnaam/Wachtwoord is niet correct");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

//Product Toevoegen

?>
