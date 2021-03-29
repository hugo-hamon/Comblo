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
  $user_pseudo = !empty($_POST['username']) ? $_POST['username'] : NULL;
  $user_email = !empty($_POST['email']) ? $_POST['email'] : NULL;
  $user_pwd1 = !empty($_POST['password1']) ? $_POST['password1'] : NULL;
  $user_pwd2 = !empty($_POST['password2']) ? $_POST['password2'] : NULL;
  $errors = ["", "", "", ""];
  
  //Test variable vide
  if ($user_pseudo == NULL or $user_email == NULL or $user_pwd1 == NULL or $user_pwd2 == NULL){
  	$errors[0] = "Veuillez remplir les champs";
  }

  //Test adresse email valide
  $query = "SELECT id FROM utilisateur WHERE email = '$user_email'";
  $result = mysqli_query($conn, $query);

  if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
    $errors[1] = "Email invalide";
  }else if($result){
    if (mysqli_num_rows($result) >= 1){
      $errors[1] = "Email déja pris";
    }
  }
  
  //Test mot de passe
  if ($user_pwd1 != $user_pwd2 or strlen($user_pwd1) < 4){
    $errors[2] = "Mauvais mot de passes";
  }

  //Test pseudo déja existant
  $query = "SELECT id FROM utilisateur WHERE pseudo = '$user_pseudo'";
  $result = mysqli_query($conn, $query);
  
  if($result){
    if (mysqli_num_rows($result) >= 1){
      $errors[3] = "Pseudo déja pris";
    }
  }

  //Création d'un nouvelle utilsiateur ou redirection ver signup 
  if ($errors[0] == "" and $errors[1] == "" and $errors[2] == "" and $errors[3] == ""){
    $pwd_hache = password_hash($user_pwd1, PASSWORD_DEFAULT);
    $query = "INSERT INTO utilisateur (`pseudo`, `pass`, `email`, `date_inscription`) VALUES ('$user_pseudo', '$pwd_hache', '$user_email', CURDATE())";
    mysqli_query($conn, $query);
    header('Location: login_traite.php');
  } else {
    $_SESSION['sign_error'] = $errors;
    header('Location: signup.php');
  }
  mysqli_close($conn);
?>
