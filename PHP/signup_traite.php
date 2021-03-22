<?php
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
  $user_pwd2 = !empty($_POST['password2']) ? $_POST['password1'] : NULL;

  //Test variable vide
  if ($user_pseudo == NULL or $user_email == NULL or $user_pwd1 == NULL or $user_pwd2 == NULL){
  	mysqli_close($conn);
  	header('Location: signup.php');
  }

  //Test adresse email valide
  if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
    mysqli_close($conn);
    header('Location: signup.php');
  }

  if ($user_pwd1 != $user_pwd2){
    mysqli_close($conn);
    header('Location: signup.php');
  }

  //Test pseudo déja existant
  $query = "SELECT id FROM `utilisateur` WHERE pseudo = '$user_pseudo'";
  $result = mysqli_query($conn, $query);
  
  if($result){
    if (mysqli_num_rows($result) >= 1){
      mysqli_close($conn);
      header('Location: signup.php');
    } else {
      mysqli_close($conn);
      header('Location: main.php');
    }
  }


  
  
  mysqli_close($conn);
?>
