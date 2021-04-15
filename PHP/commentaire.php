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
  $pseudo = $_SESSION['pseudo'];
  $is_com;

  if ($commentaire_text == NULL or $article_id == NULL){
  	$error = "Champ vide";
  }

  if (strpos($commentaire_text, "@" ) === 0){
    $is_com = TRUE;
  }

  if ($is_com){
    //Get parent id
    $number = 0;
    $i = 1;
    while (is_numeric($commentaire_text[$i]) and strlen($commentaire_text) > $i){
      $number *= 10;
      $number += intval($commentaire_text[$i]);
      $i += 1;
    }
    $parent_id = $number;

    $query = "SELECT deepth FROM commentaire WHERE id = '$parent_id'";
    $result = mysqli_query($conn, $query);

    if ($result){
      $etu = mysqli_fetch_array($result);
      $deepth = $etu['deepth'] + 1;
    }

    $commentaire_text = substr($commentaire_text, $i);
  }

  if ($error == ""){
  	$commentaire_text = mysqli_real_escape_string($conn, $commentaire_text);
  	$query = "INSERT INTO `commentaire` (`user_id`, `text`, `deepth`, `likes`, `date`, `parent_id`, `article_id`, `pseudo`) VALUES ('$id', '$commentaire_text', '$deepth', '$likes', CURDATE(), '$parent_id', '$article_id', '$pseudo')";
    mysqli_query($conn, $query);
  }

  $_SESSION['add_com_error'] = $error;
  header('Location: articles_traite.php');

  mysqli_close($conn);
?>
