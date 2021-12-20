<?php

session_start();

$p_errors = array();

// connect to bdd

$bdd = mysqli_connect("localhost", "root", "", "blog") or die("impossible de se connecter à la bdd");

//retrieve infos from form

 if(isset($_POST['submit_c'])){
	if(isset($_POST['p_loginc'])){
		$p_loginc = mysqli_real_escape_string($bdd, $_POST['p_loginc']);
	}

	if(isset($_POST['p_passwordc'])){
		$p_passwordc = mysqli_real_escape_string($bdd, $_POST['p_passwordc']);
	}

	//Check for form errors

	if(empty($p_loginc)){
		array_push($p_errors, "Veuillez saisir un nom d'utilisateur");
	}

	if(empty($p_passwordc)){
		array_push($p_errors, "Veuillez saisir un mot de passe");
	}

	//If no errors, attempt log in 
	
	if(count($p_errors) == 0 && $p_loginc !=" "){
		$p_query_c = "SELECT password FROM utilisateurs WHERE login ='$p_loginc'";
		$p_conn = mysqli_query($bdd, $p_query_c);
		$p_password_q = mysqli_fetch_array($p_conn);

		if(mysqli_num_rows($p_conn)){

			if(password_verify($_POST['p_passwordc'], $p_password_q[0]) == true){

				//retrieve user's role ID

				$p_query_id = "SELECT id from utilisateurs WHERE (login='$p_loginc')";
				$p_id_d_q = mysqli_query($bdd, $p_query_id);
				$p_id_droits = mysqli_fetch_assoc($p_id_d_q);

				// define new session vars

				$_SESSION['id'] = $p_id_droits;
				$_SESSION['login'] = $p_loginc;
				$_SESSION['success'] = "Connexion validée";

				header('location: index.php');
			}

			//If no account is found in the bdd
			
			else{
				array_push($p_errors, "Identifiant ou mot de passe invalide");
			}
		}
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
		<title>Connexion (TEMP)</title>
		<meta charset="utf-8">
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 		<link rel="stylesheet" href="style.css">
	</head>

	<header>
		<?php include('header.php'); ?>
	</header>

	<body>
		<main>
		<h1 class="sm_title"><i>The BLOG.  </i></h1> 
		<h1 class="p_i_intro_txt" > Connectez-vous </h1>
		<div class="p_i_container"> 
			<div class="p_i_form">
				<form method="post" action="connexion.php">
					<label for="p_loginc"><br/> Nom d'utilisateur </label>
					<input type="text" value="<?php if(isset($_POST['p_loginc'])){echo $_POST['p_loginc'];}; ?>" name="p_loginc"/>

					<label for="p_passwordc"><br/> Mot de passe </label>
					<input type="password" value="<?php if(isset($_POST['p_passwordc'])){echo $_POST['p_passwordc'];}; ?>" name="p_passwordc"/>

					<br/>
					<input type="submit" name="submit_c" value="Valider"/>
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
		<?php include('footer.php'); ?>
	</footer>
</html>