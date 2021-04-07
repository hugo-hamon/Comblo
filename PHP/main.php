<?php session_start();
  if (!isset($_SESSION['id'])){
    
  }
?>

<!DOCTYPE>
  <html lang="fr">
  <head>
    <title>Comblo</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../CSS/main.css" />
  </head>

  <body id="body" >
    <div class="navbar">
      <a href="main.php">Comblo</a>
      <a href="infos.php">infos</a>
      <a href="articles.php">Articles</a>
      <a href="publication.php">Mes publications</a>
      <a href="new_article.php">Nouvelles créations</a>
      <a href="favoris.php">Favoris</a>
      <a id="deco" href="deconnexion.php">Déconnexion</a>
      <form class="left_search">
        <input class="rod_search" type="search" placeholder="Search" aria-label="Search">
        <button class="button_search" type="submit">Search</button>
      </form> 
    </div>
      
      <hr size="5" NOSHADE align="left" WIDTH="10%">
        <nav class="personnalisation"/>
          <div class="container_personnalisation" />
            <h2><span>Police</span></h2>
            <div class="vect_personalisation_police ">
              <ul class="liste_police">
                <li id="">
                  <a href="">Arial</a>
                </li>
                <li id="">
                  <a href="">Comic-Sans-MS</a>
                </li>
                <li id="">
                  <a href="">Times New Roman</a>
                </li>
                <li id="">
                  <a href="">Helvetica</a>
                </li>
                <li id="">
                  <a href="">Lucida Console</a>
                </li>
              </ul>
            </div>
          
          <p>Taille de la police</p>
          <select id="Taille_police" name="taille_police" onchange="changeFont()">
            <option value="25px">25%</option>
            <option value="50px">50%</option>
            <option value="75px">75%</option>
            <option value="100px">100%</option>
          </select>
          
          <hr size="5" NOSHADE align="left" WIDTH="10%">
          
          <p>Fond de Couleur : </p>
          <select id="color_background" name="Couleur De fond" onchange="changeColor()">
            <option value="Rouge">Rouge</option>
            <option value="#ff8000">Orange</option>
            <option value="Jaune">Jaune</option>
            <option value="vert">vert</option>
            <option value="blue">Bleu</option>
            <option value="Indigo">Indigo</option>
            <option value="Violet">Violet</option>
          </select>
          
          <hr size="5" NOSHADE align="left" WIDTH="10%">
          
          <p>Zoom de page</p>
          <select id="zoom_page" name="zoom_page">
            <option value="25">25%</option>
            <option value="50">50%</option>
            <option value="75">75%</option>
            <option value="100">100%</option>
          </select>
          
          <hr size="5" NOSHADE align="left" WIDTH="10%">
          <input id="btn" type="button" value="Cliquez ici" onclick="test();">
      </nav>
  
  <script type="text/javascript">
    function test(){
      alert("coucou c'est moi")
    }
    
    function changeColor() {
      var x = document.getElementById("color_background").value;
      document.getElementById("div1").style.background = x;
    }
    
    function changeFont() {
      var x = document.getElementById("Taille_police").value;
      document.getElementById("div1").style.fontSize = x;
    }
  </script>
  </body>

</html>
