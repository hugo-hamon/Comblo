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

  $id = $_SESSION['id'];
  $result = mysqli_query($conn, "SELECT email FROM utilisateur WHERE id = $id");

  if ($result){
    $mail = mysqli_fetch_array($result)[0];
  } else {
    $mail = "";
  }

  mysqli_close($conn);
?>


<!DOCTYPE html>
  <html lang="fr">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../CSS/info.css" />
    <title>compte/paramètres</title>
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
    
    <div>
      <hr class="separation" />
    </div>
    
    <div id="sidebar">
      <a id="list-info1" href="infos.php">Informations</a>
      <a id="list-info2" href="compte.php">Compte/paramètres</a>
      <a id="list-info3" href="confidentialite.php">Confidentialité</a>
    </div>
    
    <div id="paramètres">
      <h1>Bonjour ! <!-- nom de la personne --> </h1> 
        <p>Vous vous êtes inscrit sur cette addresse : </p>
        <p>Si vous voulez changer d'addresse, cliquez ici : </p>
        <form action='compte_traite.php' method="post">
          <p>Mail: <?php echo $mail?></p>
          <input type="text" name="mail" placeholder="Email">
          <input type="submit" name="login" value="Changer">
          <hr>
          <p>Si vous voulez changer de mot de passe, cliquez ici : </p>
          <input type="text" name="old_mdp" placeholder="Ancien mot de passe">
          <input type="text" name="new_mdp" placeholder="Nouveau mot de passe">
          <input type="submit" name="login" value="Changer">
        </form>
        <hr>
        <img id="img_copy1" src="../IMG/logo_comblo_2.png" alt="Logo_Comblo" width="100"/>
      </div>
      <div class="footer_bottom" >
        <p>copyright &copy; 2021, designed by <span>Arka and Blupo</span></p>
      </div> 
 </body>
</html>
