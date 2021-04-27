<?php session_start();
  include 'bdd.php';
  //Connection à la base de donnée
  $conn	 = mysqli_connect($serveur, $login, $mdp);
  mysqli_select_db($conn, $bdd_name);

  if (!$conn){
  	die('Erreur: '.mysqli_connect_error());
  }

  $set = [];
  function delete_com($c_array, $p_id, $conn){
    global $set;

    for ($i = 0; $i < count($c_array); $i++){
      if ($c_array[$i]['id'] == $p_id and !in_array($c_array[$i]['id'], $set)){
        $del_query = mysqli_query($conn, "DELETE FROM commentaire WHERE `id` = $p_id");
        array_push($set, $c_array[$i]['id']);
        for ($j = 0; $j < count($c_array); $j++){
          if($j != $i and $c_array[$j]['parent_id'] == $c_array[$i]['id']){
            delete_com($c_array, $c_array[$j]['id'], $conn);
          }
        }
      }
    }      
  }

  //Récuperation des variables
  $com_id = !empty($_POST['com_id']) ? $_POST['com_id'] : NULL;
  $com_query = mysqli_query($conn, "SELECT * FROM commentaire");

  $a = array();
  if ($com_query){
    while ($etu = mysqli_fetch_array($com_query)){
      array_push($a, $etu);
    }
  }

  delete_com($a, $com_id, $conn);
  
  header('Location: articles_traite.php');
  mysqli_close($conn);
?>