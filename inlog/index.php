<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: profile.php"); // Redirecting To Profile Page
}
?> 
<!DOCTYPE html>
<html>
<head>
  <title>Inloggen</title>
  <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
 <div id="login">
  <h2>Inlog Formulier</h2>
  <form action="" method="post">
   <label>Gebruikersnaam :</label>
   <input id="name" name="username" placeholder="Gebruikersnaam" type="text">
   <label>Wachtwoord :</label>
   <input id="password" name="password" placeholder="**********" type="password"><br><br>
   <input name="submit" type="submit" value=" Login ">
   <span><?php echo $error; ?></span>
  </form>
   
   <H1> Klik hier om te registreren</h1>
 </div>
</body>
</html>
