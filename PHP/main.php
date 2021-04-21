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

  $article_query = "SELECT * FROM articles ORDER BY `favoris` DESC LIMIT 3";
  $article_result = mysqli_query($conn, $article_query);

  mysqli_close($conn);
?>

<!DOCTYPE>
  <html lang="fr">
  <head>
    <title>Comblo</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../CSS/main.css" />
  </head>

  <body id="body" >
    <div class="navbar">
      <a href="main.php"> <img id="img_copy1" src="../IMG/logo_comblo_2_new.png" alt="Logo_Comblo" width="20" /></a>
      <a href="infos.php">Infos</a>
      <a href="articles.php">Articles</a>
      <a href="publication.php">Mes publications</a>
      <a href="new_article.php">Nouvelles créations</a>
      <a href="favoris.php">Favoris</a>
      <a id="deco" href="deconnexion.php">Déconnexion</a>
    </div>

    <?php 
      if ($article_result){
        $i = 0;
        while ($etu = mysqli_fetch_array($article_result)){
        }
      }

    ?>
  </body>

</html>
