<?php 

session_start();
//define var

$p_login=" ";
$p_email="test@gmail.com";
$p_passw1 = " ";
$p_passw2 = " ";

$p_errors = array();

//connect to bdd 

$bdd = mysqli_connect("localhost", "root", "", "blog") or die("impossible de se connecter à la bdd");
//retrieve infos from form

if(isset($_POST['p_login'])){
	$p_login = mysqli_real_escape_string($bdd, $_POST['p_login']);
}

if(isset($_POST['p_email'])){
	$p_email = mysqli_real_escape_string($bdd, $_POST['p_email']);
}

if(isset($_POST['p_passw'])){
	$p_passw1 = mysqli_real_escape_string($bdd, $_POST['p_passw']);
}

if(isset($_POST['p_passwc'])){
	$p_passw2 = mysqli_real_escape_string($bdd, $_POST['p_passwc']);
}


//Check for form errors

if(empty($p_login)){
	array_push($p_errors, "Veuillez saisir un nom d'utilisateur");
}

if(empty($p_email) || !filter_var($p_email, FILTER_VALIDATE_EMAIL)){
	array_push($p_errors, "Veuillez saisir une adresse mail valide");
}	

if(empty($p_passw1)){
	array_push($p_errors, "Veuillez saisir un mot de passe");
}

if($p_passw2 != $p_passw1){
	array_push($p_errors, "Veuillez saisir un mot de passe identique");
}

// Check if login and email already are in use in the bdd

$p_user_check = "SELECT * FROM utilisateurs WHERE login ='$p_login' LIMIT 1";
$p_query = mysqli_query($bdd, $p_user_check);
$p_user = mysqli_fetch_assoc($p_query);
if($p_user){
	if($p_user['login'] === $p_login){
		array_push($p_errors, "Ce nom d'utilisateur est déjà utilisé !");
	}
}

$p_email_check = "SELECT * FROM utilisateurs WHERE email = '$p_email' LIMIT 1";
$p_query2 = mysqli_query($bdd, $p_email_check);
$p_mail = mysqli_fetch_assoc($p_query2);
if($p_mail){
	if($p_mail['email'] == $p_email){
		array_push($p_errors, "Cette adresse mail est déjà utilisée !"); 
	}
}

//if there are no errors, register user's account

if(count($p_errors) == 0 && $p_login != " "){
	$p_password = password_hash($p_passw1, PASSWORD_DEFAULT);
	$p_queryr = "INSERT INTO utilisateurs(login, password, email, id_droits) VALUES ('$p_login', '$p_password', '$p_email', 1)";
	mysqli_query($bdd, $p_queryr);

	$_SESSION['login'] = $p_login;
	$_SESSION['success'] = "Inscription Validée";

	header('location: connexion.php');
}

?>