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

  $article_id = !empty($_POST['id']) ? $_POST['id'] : NULL;
  $fav_query = mysqli_query($conn, "DELETE FROM articles WHERE id = $article_id");

  header('Location: publication.php');
  mysqli_close($conn);
?>