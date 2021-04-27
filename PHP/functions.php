<?php
  include 'bdd.php';
  if (!isset($_SESSION['id'])){
    header('Location: login.php');
  }

  // Return all information needed for the main page 
  function get_main_page_information($conn){
    $information = [];

    $nbr_user_query = mysqli_query($conn, "SELECT * FROM utilisateur");
    if($nbr_user_query){
      array_push($information, mysqli_num_rows($nbr_user_query));
    }

    $nbr_article_query = mysqli_query($conn, "SELECT * FROM articles");
    if($nbr_article_query){
      array_push($information, mysqli_num_rows($nbr_article_query));
    }

    $nbr_commentaires_query = mysqli_query($conn, "SELECT * FROM commentaire");
    if($nbr_commentaires_query){
      array_push($information, mysqli_num_rows($nbr_commentaires_query));
    }

    $nbr_likes_query = mysqli_query($conn, "SELECT SUM(likes) as sum_score FROM commentaire;");
    if($nbr_likes_query){
      array_push($information, mysqli_fetch_array($nbr_likes_query)[0]);
    }
    
    $nbr_favoris_query = mysqli_query($conn, "SELECT * FROM favoris");
    if($nbr_favoris_query){
      array_push($information, mysqli_num_rows($nbr_favoris_query));
    }
    
    return $information;
  }
?>