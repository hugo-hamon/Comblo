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
  $id = $_SESSION['id'];
  

  $fav_query = "SELECT * FROM favoris WHERE `article_id` = '$article_id' and `user_id` = '$id'";
  $fav_result = mysqli_query($conn, $fav_query);

  

  if($fav_result){
    if (mysqli_num_rows($fav_result) >= 1){
      $fav_query = "DELETE FROM favoris WHERE article_id = $article_id and `user_id` = '$id'";
      $fav_result = mysqli_query($conn, $fav_query);
      $fav_article_query = "UPDATE articles SET favoris = favoris - 1 WHERE `id` = '$article_id'";
      $fav_article_result = mysqli_query($conn, $fav_article_query);

    } else {
      $fav_query = "INSERT INTO favoris (`user_id`, `article_id`) VALUES ('$id', '$article_id')";
      $fav_result = mysqli_query($conn, $fav_query);
      $fav_article_query = "UPDATE articles SET favoris = favoris + 1 WHERE `id` = '$article_id'";
      $fav_article_result = mysqli_query($conn, $fav_article_query);
    }
  }

  header('Location: favoris.php');
  mysqli_close($conn);
?>