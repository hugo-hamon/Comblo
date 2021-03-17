<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Connexions</title>
	<link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
	<div class="container">
		<div class="login-form">
			<form action="login_traite.php" method="post">
				<div class="login">
					<h3>Se connecter</h3>
				</div>
					<input class="input" type="text" name="email" placeholder="Adresse email">
					<input class="input" type="password" name="password" placeholder="Mot de passe">
					<input class="btn "type="submit" name="login" value="Se connecter">
					<p>Pas encore inscrit ? <a href="signup.php"> Nous rejoindre</a> </p>
			</form>
		</div>
	</div>
	<img src="../IMG/sunset.png">
</body>
</html>
