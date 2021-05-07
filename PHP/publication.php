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

  $id = $_SESSION['id'];

  $query = "SELECT * FROM articles WHERE `user_id` = $id ORDER BY id DESC";
  $result = mysqli_query($conn, $query);

  function print_article($pseudo, $id, $title, $text, $category, $date){
    echo "<div class='article'>";
    echo "<p class='pseudo_article'>$pseudo</p>";
    echo "<form class='del_art' action='delete_art.php' method='post'>";
    echo "<button type='submit' class='button_delete'>";
    echo "<img class='delete' alt='delete' src='../IMG/delete.png'>";
    echo "</button>";
    echo "<input type='hidden' name='id' value='$id'>";
    echo "</form>";
    echo "<form action='articles_traite.php' method='post'>";
    echo "<input class='titre_article' type='submit' value='$title'>";
    echo "<input type='hidden' name='id' value='$id'>";
    echo "</form>";
    echo "<p class='text_article'>$text</p>";
    echo "<p class='categorie_article'>$category<span class='date_article'>$date</span> </p>";
    echo "</div>";
  }

  mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<title>Mes publications</title>
    <link rel="stylesheet" href="../CSS/publication.css" />
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
        <input class="rod_search" type="search" name="search" placeholder="Rechercher" aria-label="Search">
        <button class="button_search" type="submit">Trouver</button>
      </form> 
    </div>

    <div id="container_article">
      <?php
        $search = !empty($_POST['search']) ? $_POST['search'] : NULL;
    		if ($result){
    		    if (mysqli_num_rows($result) < 1){
                    echo "<h2 class='empty_article'>Pas encore d'article créez en un <a href='new_article.php'>ici</a></h2>";
                }
  				while ($etu = mysqli_fetch_array($result)){
            $title = htmlspecialchars($etu['title'], ENT_QUOTES);
            if ($search != NULL){
              if(strpos(strtolower($title), strtolower($search)) !== false or strpos(strtolower($etu['pseudo']), strtolower($search)) !== false or strpos(strtolower($etu['category']), strtolower($search)) !== false ){
                  print_article($etu['pseudo'], $etu['id'], $title, $etu['text'], $etu['category'], $etu['date_article']);
              }
            } else {
              print_article($etu['pseudo'], $etu['id'], $title, $etu['text'], $etu['category'], $etu['date_article']);
            }
  				}
  			}
    	?>
    </div>
</body>
</html>
