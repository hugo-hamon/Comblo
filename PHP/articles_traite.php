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

  $query = "SELECT * FROM articles WHERE `id` = '$article_id'";
  $result = mysqli_query($conn, $query);

  mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<title>Articles</title>
    <link rel="stylesheet" href="../CSS/articles_traite.css" />
</head>
<body>
	<div class="navbar">
      <a href="main.php">Comblo</a>
      <a href="infos.php">Infos</a>
      <a href="articles.php">Articles</a>
      <a href="publication.php">Mes publications</a>
      <a href="new_article.php">Nouvelles créations</a>
      <a href="favoris.php">Favoris</a>
      <a id="deco" href="deconnexion.php">Déconnexion</a>
      <form class="left_search">
        <input class="rod_search" type="search" placeholder="Search" aria-label="Search">
        <button class="button_search" type="submit">Search</button>
      </form> 
    </div>

    <div id="container_article">
  		<div class='article'>
  		  <?php
        if ($result){
          while ($etu = mysqli_fetch_array($result)){
            $title = htmlspecialchars($etu['title'], ENT_QUOTES);
            echo "<div class='article'>";
            echo "<p class='pseudo_article'>".$etu['pseudo']."</p>";
            echo "<p class='categorie_article'>".$etu['category']."</p>";
            echo "<p class='titre_article'>$title</p>";
            echo "<p class='text_article'>".$etu['text']."</p>";
            echo "</div>";
          }
        }
      ?>
  		</div>
    </div>

</body>
</html>