<?php session_start(); 
  include 'bdd.php';
  //Connection à la base de donnée
  $conn	 = mysqli_connect($serveur, $login, $mdp);
  mysqli_select_db($conn, $bdd_name);

  if (!$conn){
    die('Erreur: '.mysqli_connect_error());
  }

  $commentaire_text = !empty($_POST['text']) ? $_POST['text'] : NULL;
  $article_id = !empty($_POST['article_id']) ? $_POST['article_id'] : NULL;
  $id = $_SESSION['id'];
  $error = "";
  $deepth = 0;
  $likes = 0;
  $parent_id = 0;

  if ($commentaire_text == NULL or $article_id == NULL){
  	$error = "Champ vide";
  }

  if ($error == ""){
  	$commentaire_text = mysqli_real_escape_string($conn, $commentaire_text);
  	$query = "INSERT INTO `commentaire` (`user_id`, `text`, `deepth`, `likes`, `date`, `parent_id`, `article_id`) VALUES ('$id', '$commentaire_text', '$deepth', '$likes', CURDATE(), '$parent_id', '$article_id')";
    mysqli_query($conn, $query);
  }

  $_SESSION['add_com_error'] = $error;
  header('Location: articles.php');

  mysqli_close($conn);
?>
