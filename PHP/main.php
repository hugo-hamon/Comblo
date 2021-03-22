<!DOCTYPE>
  <html>

  <head>
    <title>Comblo</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../CSS/main.css" />
  </head>

  <body id="body" >
    <div class="navbar">
      <a href="#home">Comblo</a>
      <a href="#infos">infos</a>
      <a href="#publications">Mes publications</a>
      <a href="#new_crea  ">Nouvelles créations</a>
      <a href="#favoris">Favoris</a>
      <a id="deco" href="#deco">Déconnexion</a>
    </div>
      
      <form class="left_search">
        <input class="rod_search" type="search" placeholder="Search" aria-label="Search">
        <button class="button_search" type="submit">Search</button>
      </form> 
      
      <hr size="5" NOSHADE align="left" WIDTH="10%">
      
        <nav class="personnalisation"/>
          <div class="container_personnalisation" />
            <h2><span>Police</span></h2>
            <div class="vect_personalisation_police ">
              <ul class="liste_police">
                <li id="">
                  <a value="" href="">Arial</a>
                </li>
                <li id="">
                  <a value="" href="">Comic-Sans-MS</a>
                </li>
                <li id="">
                  <a value=""  href="">Times New Roman</a>
                </li>
                <li id="">
                  <a value="" href="">Helvetica</a>
                </li>
                <li id="">
                  <a value="" href="">Lucida Console</a>
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
      </nav>
      
      <div class="container_info1" id="div1">
        <p>container_info1</p>
		</div>
    
    <div class="container_info2">
        <p>container_info2</p>
		</div>
    
    <div class="container_info3">
        <p>container_info3</p>
		</div>
    
    <div class="container_info4">
        <p>container_info4</p>
		</div>
	</div>
  <input id="btn" type="button" value="Cliquez ici" onclick="test();"/>
  
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
