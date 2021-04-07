<?php session_start();
  if (!isset($_SESSION['id'])){
    header('Location: login.php');
  }
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
      <a href="infos.php">infos</a>
      <a href="articles.php">Articles</a>
      <a href="publication.php">Mes publications</a>
      <a href="new_article.php">Nouvelles créations</a>
      <a href="favoris.php">Favoris</a>
      <a id="deco" href="deconnexion.php">Déconnexion</a>
    </div>

    <div id="container_article">
  		<div class='article'>
  		  <p class='pseudo_article'>Pseudo</p>
  			<p>Titre</p>
  			<p class='text_article'>Text</p>
  			<p class='categorie_article'>Categorie</p>
  		</div>
    </div>

</body>
</html>