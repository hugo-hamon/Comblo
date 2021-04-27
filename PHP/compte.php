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
      <p></p>
        <p>Vous vous êtes inscrit sur cette addresse </p>
        <p>Si vous souhaiter changer d'addresse, cliquez :  <input class="favorite styled" value="ici" type="button"> </p>
        <hr>
        <p>Si vous souhaiter changer de mot de passe, cliquez :  <input class="favorite styled" value="ici" type="button"></p>
        <hr>
        <p>Si vous souhaiter ajouter une photo de profil, cliquez : <form method="post" action="change.php">
                                                                    <input class="favorite styled" value="ici" type="button"> 
                                                                    </form>
        
        </p>
        <hr>
        <img id="img_copy1" src="../IMG/logo_comblo_2.png" alt="Logo_Comblo" width="150"/>
      </div>
      
      <div class="footer_bottom" >
        <p>copyright &copy; 2021, designed by <span>Arka and Blupo</span></p>
      </div> 
 </body>
</html>
