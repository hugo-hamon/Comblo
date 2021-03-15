<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Inscriptiont</title>
	<link rel="stylesheet" href="../css/signup.css">
</head>
<body>
	<div class="container">
		<div class="login-form">
			<form action="login_traite.php" method="post">
				<div class="login">
					<h3>Inscription</h3>
				</div>
					<input class="input" type="text" name="username" placeholder="Pseudo">
					<input class="input" type="text" name="email" placeholder="Adresse email">
					<input class="input" type="password" name="password1" placeholder="Mot de passe">
					<input class="input" type="password" name="password2" placeholder="Confirmer mot de passe">
					<input class="btn "type="submit" name="login" value="Créer">
			</form>
		</div>
	</div>
	<img src="../img/sunset.png">
</body>
</html>