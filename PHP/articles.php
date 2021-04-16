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

  $id = $_SESSION['id'];

  $fav_query = "SELECT * FROM favoris WHERE `user_id` = '$id'";
  $fav_result = mysqli_query($conn, $fav_query);

  $fav_list = [];
  if($fav_result){
    while($row = mysqli_fetch_array($fav_result))
    {
      array_push($fav_list, $row);
    }
  }

  function print_article($pseudo, $img_src, $id, $title, $text, $category){
    echo "<div class='article'>";
    echo "<p class='pseudo_article'>$pseudo</p>";
    echo "<form class='form_fav' action='favoris_traite.php' method='post'>";
    echo "<button type='submit' class='button_star'>";
    echo "<img class='star' alt='star' src=$img_src>";
    echo "</button>";
    echo "<input type='hidden' name='id' value='$id'>";
    echo "</form>";
    echo "<form action='articles_traite.php' method='post'>";
    echo "<input type='submit' class='titre_article' value='$title'>";
    echo "<input type='hidden' name='id' value='$id'>";
    echo "</form>";
    echo "<p class='text_article'>$text</p>";
    echo "<p class='categorie_article'>$category</p>";
    echo "</div>";
  }

  function is_fav($f_list, $id){
    for ($i = 0; $i < count($f_list); $i++){
      if ($f_list[$i]['article_id'] == $id){
        return true;
      }
    }
    return false;
  }

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
                if(is_fav($fav_list, $etu['id'])){
                  print_article($etu['pseudo'], '../IMG/full_star.jpg', $etu['id'], $title, $etu['text'], $etu['category']);
                } else {
                  print_article($etu['pseudo'], '../IMG/empty_star.jpg', $etu['id'], $title, $etu['text'], $etu['category']);
                }  
              }
            } else {
              if(is_fav($fav_list, $etu['id'])){
                print_article($etu['pseudo'], '../IMG/full_star.jpg', $etu['id'], $title, $etu['text'], $etu['category']);
              } else {
                print_article($etu['pseudo'], '../IMG/empty_star.jpg', $etu['id'], $title, $etu['text'], $etu['category']);
              } 
            }
  				}
  			}
    	?>
    </div>
</body>
</html>
