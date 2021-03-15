<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Log in</title>
	<link rel="stylesheet" href="../css/login.css">
</head>
<body>
	<div class="container">
		<div class="login-form">
			<form action="login_traite.php" method="post">
				<div class="login">
					<h3>Login</h3>
				</div>
					<input class="input" type="text" name="username" placeholder="Username">
					<input class="input" type="password" name="password" placeholder="Password">
					<input class="btn "type="submit" name="login" value="Log In">
					<p>Pas encore inscris ? <a href="signup.php"> Nous rejoindres</a> </p>
			</form>
		</div>
	</div>
	<img src="../IMG/sunset.png">
</body>
</html>