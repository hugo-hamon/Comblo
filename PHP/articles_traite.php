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
  

  $article_query = "SELECT * FROM articles WHERE `id` = '$article_id'";
  $article_result = mysqli_query($conn, $article_query);

  $commentaire_query = "SELECT * FROM commentaire WHERE `id` = '$article_id'";
  $commentaire_result = mysqli_query($conn, $commentaire_query);

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
    </div>

    <div id="container_article">
  		<div class='article'>
  		  <?php
        if ($article_result){
          while ($etu = mysqli_fetch_array($article_result)){
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

    <div id="container_commentaire">
      <form action='commentaire.php' method='post'>
        <input type="text" class="add_commentaire_text" name="text" placeholder="Ajouter">
        <input type='hidden' name='article_id' value=<?php echo "$article_id"?>>
        <input type="submit" class="add_commentaire_submit" value="Ajouter un commentaire">
      </form>
    <div class="commentaire">
        
      </div>
    </div>

</body>
</html>