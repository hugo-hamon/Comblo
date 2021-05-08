<?php session_start();
  include 'bdd.php';
  if (!isset($_SESSION['id'])){
    header('Location: login.php');
  }
  //Connection à la base de donnée
  $conn  = mysqli_connect($serveur, $login, $mdp);
  mysqli_select_db($conn, $bdd_name);

  if (!$conn){
    die('Erreur: '.mysqli_connect_error());
  }

  // Récuperation des données provenant de compte.php
  $id = $_SESSION['id'];
  $mail = !empty($_POST['mail']) ? $_POST['mail'] : NULL;
  $old_mdp = !empty($_POST['old_mdp']) ? $_POST['old_mdp'] : NULL;
  $new_mdp = !empty($_POST['new_mdp']) ? $_POST['new_mdp'] : NULL;

  // Test si mail est nul si non NULL remplace l'ancien mail par le nouveau dans la base de donnée 
  if ($mail != NULL){
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
      mysqli_query($conn, "UPDATE utilisateur SET `email` = '$mail' WHERE `id` = $id");
    } 
  }
  // Test si les mots de passes rentrés sont cohérent avec ce qu'il y a dans la base de donnée si oui il remplace l'ancien par le nouveau
  if ($old_mdp != NULL and $new_mdp != NULL){
    $old_mdp_query = mysqli_query($conn, "SELECT pass FROM utilisateur WHERE id = $id");
    if ($old_mdp_query){
      $old_mdp_query = mysqli_fetch_array($old_mdp_query)[0];
      if ($is_pwd_correct = password_verify($old_mdp, $old_mdp_query)){
        if (strlen($new_mdp) >= 4){
          $mdp = password_hash($new_mdp, PASSWORD_DEFAULT);
          mysqli_query($conn, "UPDATE utilisateur SET `pass` = '$mdp' WHERE `id` = $id");
        }
      }
    }
  }
  
  header('Location: infos.php');
  mysqli_close($conn);
?>
