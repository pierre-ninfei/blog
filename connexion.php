<?php include('phpspe/inscription&connexion_back.php'); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
		<title>Connexion (TEMP)</title>
	</head>

	<header>
		<?php include('header.php'); ?>
	</header>

	<body>
		<h1> Connectez-vous </h1>

		<div class="p_c_form">
			<form method="post" action="connexion.php">
				<label for="p_loginc"><br/> Nom d'utilisateur </label>
				<input type="text" name="p_loginc"/>

				<label for="p_passwordc"><br/> Mot de passe </label>
				<input type="password" name="p_passwordc"/>

				<br/>
				<input type="submit" name="confirm" value="Connexion"/>
				<?php if(count($p_errors) > 0) : ?>
					<div>
						<?php foreach($p_errors	as $p_error) : ?>
							<p style="color:red;"> <?php echo $p_error; ?> </p>
						<?php endforeach ?>
					</div>
				<?php endif ?>
			</form>
		</div>
	</body>

	<footer>
		<?php include('footer.php'); ?>
	</footer>
</html>