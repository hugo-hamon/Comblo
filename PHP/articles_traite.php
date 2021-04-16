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

  $article_id = !empty($_POST['id']) ? $_POST['id'] : $_SESSION['article_id'];
  $_SESSION['article_id'] = $article_id;
  

  $article_query = "SELECT * FROM articles WHERE `id` = '$article_id'";
  $article_result = mysqli_query($conn, $article_query);

  $commentaire_query = "SELECT * FROM commentaire WHERE `article_id` = '$article_id' ORDER BY likes DESC";
  $commentaire_result = mysqli_query($conn, $commentaire_query);

  // Affiche les commentaires
  function show_commentaire($deepth, $date, $text, $pseudo, $id){
    global $article_id;
      $d = $deepth * 10;
      if ($d > 50){
        $d = 50;
      }
      echo "<div class='commentaire' style='margin-left: ".$d."px'>";
        echo "<p class='pseudo_date_commentaire'><span class='white_color'>$pseudo</span> <span class='text-align-right'>$date</span></p>";
        echo "<p class='commentaire_text'>$text</p>";
        echo "<form class='form_rep_com' action='' method='post'>";
        echo "<input type='submit' class='rep_com' value='Répondre'>";
        echo "<input type='hidden' name='com_id' value='$id'>";
        echo "<input type='hidden' name='id' value='$article_id'>";
        echo "</form>";
      echo "</div>";
  }

  // Fonctions récursive qui affiche les commentaires dans l'ordre avec un décalage
  $set = [];
  function print_commentaire($c_array, $p_id){
      global $set;

      for ($i = 0; $i < count($c_array); $i++){
        if ($c_array[$i]['parent_id'] == $p_id and !in_array($c_array[$i]['id'], $set)){
          show_commentaire($c_array[$i]['deepth'], $c_array[$i]['date'], $c_array[$i]['text'], $c_array[$i]['pseudo'], $c_array[$i]['id']);
          array_push($set, $c_array[$i]['id']);
          for ($j = 0; $j < count($c_array); $j++){
            if($j != $i and $c_array[$j]['parent_id'] == $c_array[$i]['id']){
              print_commentaire($c_array, $c_array[$j]['parent_id']);
            }
          }
        }
      }
  }

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
        <?php 
          $value = !empty($_POST['com_id']) ? "@".$_POST['com_id']."" : "";
         ?>
        <input type="text" class="add_commentaire_text" name="text" placeholder="Ajouter" value="<?php echo $value?>">
        <input type='hidden' name='article_id' value=<?php echo "$article_id"?>>
        <input type="submit" class="add_commentaire_submit" value="Ajouter un commentaire">
      </form>
    <?php
        $a = array();
        if ($commentaire_result){
          while ($etu = mysqli_fetch_array($commentaire_result)){
            array_push($a, $etu);
          }
        }
        if (count($a) != 0){
          print_commentaire($a, 0, []);
        }
      ?>
    </div>



</body>
</html>