<?php include('phpspe/inscription_back.php'); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="inscription.css">
		<title> Inscription (TEMP)</title>
	</head>

	<header>
		<?php //include('header.php'); ?>
	</header>

	<body>
		<h1 class="p_i_intro_txt"> Veuillez remplir les champs suivants afin de compléter votre inscription </h1>

		<div class="p_i_form"> 
			<form method="post" action="inscription.php">
				<label for="p_login"><br/> Nom d'utilisateur </label>
				<input type="text" name="p_login"/>

				<label for="p_email"><br/> Adresse mail </label>
				<input type="text" name="p_email"/>

				<label for="p_passw"><br/> Mot de passe </label>
				<input type="password" name="p_passw"/>

				<label for="p_passwc"><br/> Confirmez le mot de passe </label>
				<input type="password" name="p_passwc"/>

				<br/>
				<input type="submit" value="Valider"/>

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
	</body>

	<footer>
		<?php //include('footer.php'); ?>
	</footer>
</html>