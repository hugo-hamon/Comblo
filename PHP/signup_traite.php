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
  $errors = array();

  //Test variable vide
  if ($user_pseudo == NULL or $user_email == NULL or $user_pwd1 == NULL or $user_pwd2 == NULL){
  	array_push($errors, "Veuillez remplir les champs");
  } else {
    array_push($errors, "");
  }

  //Test adresse email valide
  $query = "SELECT id FROM utilisateur WHERE email = '$user_email'";
  $result = mysqli_query($conn, $query);

  if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
    array_push($errors, "Compte déja existant");
  }else if($result){
    if (mysqli_num_rows($result) >= 1){
      array_push($errors, "Email déja pris");
    }
  } else {
    array_push($errors, "");
  }
  
  //Test mot de passe
  if ($user_pwd1 != $user_pwd2 or strlen($user_pwd1) < 4){
    array_push($errors, "Mauvais mot de passes");
  } else {
    array_push($errors, "");
  }

  //Test pseudo déja existant
  $query = "SELECT id FROM utilisateur WHERE pseudo = '$user_pseudo'";
  $result = mysqli_query($conn, $query);
  
  if($result){
    if (mysqli_num_rows($result) >= 1){
      array_push($errors, "Pseudo déja pris");
    } else {
      array_push($errors, "");
    }
  }

  if ($errors[0] == "" and $errors[1] == "" and $errors[2] == "" and $errors[3] == ""){
    $pwd_hache = password_hash($user_pwd1, PASSWORD_DEFAULT);
    $query = "INSERT INTO utilisateur (`pseudo`, `pass`, `email`, `date_inscription`) VALUES ('$user_pseudo', '$pwd_hache', '$user_email', CURDATE())";
    mysqli_query($conn, $query);
    header('Location: main.php');
  } else {
    $_SESSION['errors'] = $errors;
    header('Location: signup.php');
  }
  msqli_close($conn);
?>
