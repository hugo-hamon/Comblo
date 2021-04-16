<?php session_start();
  include 'bdd.php';
  if (!isset($_SESSION['id'])){
    header('Location: login.php');
  }
  
  //Connection à la base de donnée
  $conn	 = mysqli_connect($serveur, $login, $mdp);
  mysqli_select_db($conn, $bdd_name);

  if (!$conn){
  	die('Erreur: '.mysqli_connect_error());
  }

  $error = !empty($_SESSION['add_com_error']) ? $_SESSION['add_com_error'] : "";

  $query = "SELECT * FROM articles ORDER BY `id` DESC LIMIT 25";
  $result = mysqli_query($conn, $query);

  mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<title>Articles</title>
    <link rel="stylesheet" href="../CSS/articles.css" />
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
      <form class="left_search" action="" method="post">
        <input class="rod_search" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="button_search" type="submit">Search</button>
      </form> 
    </div>

    <div id="container_article">
    	<?php
        $search = !empty($_POST['search']) ? $_POST['search'] : NULL;
    		if ($result){
  				while ($etu = mysqli_fetch_array($result)){
            $title = htmlspecialchars($etu['title'], ENT_QUOTES);
            if ($search != NULL){
              if(strpos(strtolower($title), strtolower($search)) !== false or strpos(strtolower($etu['pseudo']), strtolower($search)) !== false or strpos(strtolower($etu['category']), strtolower($search)) !== false ){
                  echo "<div class='article'>";
                  echo "<p class='pseudo_article'>".$etu['pseudo']."</p>";
                  echo "<button type='submit' class='button_star'>";
                  echo "<img class='star' alt='star' src='../IMG/empty_star'>";
                  echo "</button>";
                  echo "<form action='articles_traite.php' method='post'>";
                  echo "<input type='submit' class='titre_article' value='$title'>";
                  echo "<input type='hidden' name='id' value='".$etu['id']."'>";
                  echo "</form>";
                  echo "<p class='text_article'>".$etu['text']."</p>";
                  echo "<p class='categorie_article'>".$etu['category']."</p>";
                  echo "</div>";
              }
            } else {
              echo "<div class='article'>";
                  echo "<p class='pseudo_article'>".$etu['pseudo']."</p>";
                  echo "<button type='submit' class='button_star'>";
                  echo "<img class='star' alt='star' src='../IMG/empty_star'>";
                  echo "</button>";
                  echo "<form action='articles_traite.php' method='post'>";
                  echo "<input type='submit' class='titre_article' value='$title'>";
                  echo "<input type='hidden' name='id' value='".$etu['id']."'>";
                  echo "</form>";
                  echo "<p class='text_article'>".$etu['text']."</p>";
                  echo "<p class='categorie_article'>".$etu['category']."</p>";
                  echo "</div>";
            }
  				}
  			}
    	?>
    </div>

</body>
</html>
