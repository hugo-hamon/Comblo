<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nouvelle article</title>
	<link rel="stylesheet" href="../CSS/new_article.css" />
</head>
<body>
	<div class="navbar">
      <a href="main.php">Comblo</a>
      <a href="infos.php">infos</a>
      <a href="publication.php">Mes publications</a>
      <a href="new_article.php">Nouvelles créations</a>
      <a href="favoris.php">Favoris</a>
      <a id="deco" href="deconnexion.php">Déconnexion</a>
    </div>
	<form action="new_article_traite.php" method="post">
		<div class="container">
			<input id="title" type="text" name="titre" placeholder="Titre de mon article">
			<input list="categorie" name="categorie" placeholder="Catégories" class="categorie">
			<textarea id="text" name="text" placeholder="Article..."></textarea>
			<input class="btn" type="submit" name="sumbit" value="Créer">

			<datalist id="categorie">
			  <option value="Politique">
			  <option value="Jeux vidéo">
			  <option value="Nature">
			  <option value="Automobile">
			  <option value="Electronique">
			</datalist>
		</div>	
	</form>
	<img src="../IMG/sunset.png">
</body>
</html>