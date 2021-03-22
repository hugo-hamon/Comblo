<?php session_start(); 
	$errors =  $_SESSION['sign_error'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Inscription</title>
	<link rel="stylesheet" href="../CSS/signup.css">
</head>
<body>
	<div class="container">
		<div class="signup-form">
			<form action="signup_traite.php" method="post">
				<div class="login">
					<h3>Inscription</h3>
				</div>
					<input class="input" type="text" name="username" placeholder="Pseudo">
					<?php echo "<div class='errors'>$errors[3]</div>";?>
					<input class="input" type="text" name="email" placeholder="Adresse email">
					<?php echo "<div class='errors'>$errors[1]</div>";?>
					<input class="input" type="password" name="password1" placeholder="Mot de passe">
					<input class="input" type="password" name="password2" placeholder="Confirmer mot de passe">
					<?php echo "<div class='errors'>$errors[2]</div>";?>
					<input class="btn "type="submit" name="login" value="Créer">
					<?php echo "<div class='errors'>$errors[0]</div>";?>
			</form>
		</div>
	</div>
	<img src="../IMG/sunset.png">
</body>
</html>
