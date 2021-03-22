<?php session_start(); 
  //Connection à la base de donnée
  $serveur = "localhost";
  $login = "root";
  $mdp = "";
  $conn	 = mysqli_connect($serveur, $login, $mdp);
  mysqli_select_db($conn, 'comblo');

  if (!$conn){
  	die('Erreur: '.mysqli_connect_error());
  }

  //Récuperation des variables
  $user_email = !empty($_POST['email']) ? $_POST['email'] : NULL;
  $user_pwd = !empty($_POST['password']) ? $_POST['password'] : NULL;
  $errors = "";

  $query = "SELECT id, pass FROM utilisateur WHERE email = '$user_email'";
  $result = mysqli_query($conn, $query);

  if ($result){
  	$etu = mysqli_fetch_array($result);
  	if (!empty($etu['id'])){
  		$is_pwd_correct = password_verify($user_pwd, $etu['pass']);

  			if ($is_pwd_correct){
  				$_SESSION['id'] = $etu['id'];
        		$_SESSION['pseudo'] = $etu['pseudo'];
  			} else {
  				$errors = "Erreur de saisie";
  			}

  	} else {
  		$errors = "Erreur de saisie";
  	}
  }

  if ($errors == ""){
    header('Location: main.php');
  } else {
  	
  	$_SESSION['log_error'] = $errors;
  	header('Location: login.php');
  }
  mysqli_close($conn);
?>
