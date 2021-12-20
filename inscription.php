<?php 

$p_errors = array();

//connect to bdd 

$bdd = mysqli_connect("localhost", "root", "", "blog") or die("impossible de se connecter à la bdd");

//retrieve infos from form

if(isset($_POST['submit_i'])){
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

	//starting with password hashing
	if(count($p_errors) == 0 && $p_login != " "){
		$p_password = password_hash($p_passw1, PASSWORD_DEFAULT);
		$p_queryr = "INSERT INTO utilisateurs(login, password, email, id_droits) VALUES ('$p_login', '$p_password', '$p_email', 1)";
		mysqli_query($bdd, $p_queryr);

		header('location: connexion.php');
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="inscription.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>The BLOG</title>
		<link rel="stylesheet" href="style.css">

	</head>

	<header>
    	<?php include "header.php";?> 
  	</header>

	<body>
		<main>
		<h1 class="sm_title"><i>The BLOG.  </i></h1> 
		<h3 class="p_i_intro_txt"> Veuillez remplir les champs suivants afin de compléter votre inscription </h3>
		<div class="p_i_container"> 
			<div class="p_i_form"> 
				<form method="post" action="inscription.php">
					<label for="p_login"><br/> Nom d'utilisateur </label>
					<input type="text" value="<?php if(isset($_POST['p_login'])){echo $_POST['p_login'];}; ?>" name="p_login"/>

					<label for="p_email"><br/> Adresse mail </label>
					<input type="text" value="<?php if(isset($_POST['p_email'])){echo $_POST['p_email'];}; ?>"name="p_email"/>

					<label for="p_passw"><br/> Mot de passe </label>
					<input type="password" value="<?php if(isset($_POST['p_passw'])){echo $_POST['p_passw'];}; ?>" name="p_passw"/>

					<label for="p_passwc"><br/> Confirmez le mot de passe </label>
					<input type="password" value="<?php if(isset($_POST['p_passwc'])){echo $_POST['p_passwc'];}; ?>" name="p_passwc"/>

					<br/>
					<input type="submit" name ="submit_i" value="Valider"/>

					<?php // counts errors and return values of each

					if(count($p_errors) > 0) : ?>
						<div>
							<?php foreach($p_errors	as $p_error) : ?>
								<p style="color:red;"> <?php echo $p_error; ?> </p>
							<?php endforeach ?>
						</div>
					<?php endif ?>

				</form>
			</div>
		</div>
	</body>
	</main>	
	<footer>
    	<?php include "footer.php";?> 
  	</footer>
</html>
