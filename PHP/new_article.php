<?php session_start();
	if (!isset($_SESSION['id'])){
    header('Location: login.php');
  	}
	$errors =  !empty($_SESSION['article_error']) ? $_SESSION['article_error'] : ["", ""];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Nouvel article</title>
	<link rel="stylesheet" href="../CSS/new_article.css" />
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
    
	<form action="new_article_traite.php" method="post">
		<div class="container">
			<input id="title" type="text" name="titre" placeholder="Titre de mon article">
			<input list="categorie" name="categorie" placeholder="Catégories" class="categorie">
			<?php echo "<div class='errors'>$errors[1]</div>";?>
			<textarea id="text" name="text" placeholder="Article..."></textarea>
			<?php echo "<div class='errors'>$errors[0]</div>";?>
			<input class="btn" type="submit" name="sumbit" value="Créer">

			<datalist id="categorie">
			  <option value="Politique">
			  <option value="Jeux vidéos">
			  <option value="Nature">
			  <option value="Automobile">
			  <option value="Eléctronique">
			  <option value="Transport">
			  <option value="Technologie">
			  <option value="Relations">
			  <option value="Médecine">
			  <option value="Travail">
			  <option value="Bricolage">
			  <option value="Cuisine">
			  <option value="Couture">
			  <option value="Décoration">
			  <option value="Etude">
			  <option value="Jardinage">
			  <option value="Marques">
			  <option value="Militaire">
			  <option value="Sport">
			  <option value="Science">
			  <option value="Religion">
			  <option value="Civilisation">
			  <option value="Astronomie">
			  <option value="Mécanique">
			  <option value="Histoire">
			  <option value="Droit">
			  <option value="Economie">
			  <option value="Géographie">
			  <option value="Psychologie">
			  <option value="Architecture">
			  <option value="Musique">
			  <option value="Ecriture">
			  <option value="Humour">
			  <option value="Théâtre">
			</datalist>
		</div>

	</form>
	<img alt="Sunset.png" src="../IMG/sunset.png">
</body>
</html>
