<?php session_start();
  include 'bdd.php';
  //Connection à la base de donnée
  $conn	 = mysqli_connect($serveur, $login, $mdp);
  mysqli_select_db($conn, $bdd_name);

  if (!$conn){
  	die('Erreur: '.mysqli_connect_error());
  }

  //Récuperation des variables
  $article_title = !empty($_POST['titre']) ? $_POST['titre'] : NULL;
  $article_category = !empty($_POST['categorie']) ? $_POST['categorie'] : NULL;
  $article_text = !empty($_POST['text']) ? $_POST['text'] : NULL;
  $errors = ["", ""];
  $category = ['Politique', 'Jeux vidéos', 'Nature', 'Automobile', 'Electronique'];

  if ($article_category == NULL or $article_text == NULL or $article_title == NULL){
  	$errors[0] = "Veuillez remplir tous les champs";
  }

  if (!in_array($article_category, $category)){
  	$errors[1] = "Veuillez choisir une catégorie valide";
  }

  //Création d'un nouvelle utilsiateur ou redirection ver signup 
  if ($errors[0] == "" and $errors[1] == ""){
  	$article_text = mysqli_real_escape_string($conn, $article_text);
  	$article_title = mysqli_real_escape_string($conn, $article_title);
  	$id = $_SESSION['id'];
  	$pseudo = $_SESSION['pseudo'];
    $query = "INSERT INTO `articles` (`user_id`, `text`, `title`, `category`, `pseudo`, `date_article`, `favoris`, `id`) VALUES ('$id', '$article_text', '$article_title', '$article_category', '$pseudo', CURDATE(), 0, NULL)";
    mysqli_query($conn, $query);
    header('Location: main.php');
  } else {
    $_SESSION['article_error'] = $errors;
    header('Location: new_article.php');
  }

  mysqli_close($conn);
?>