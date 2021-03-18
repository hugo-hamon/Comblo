<?php
  $serveur = "localhost";
  $login = "root";
  $mdp = "";
  $conn	 = mysqli_connect($serveur, $login, $mdp);
  mysqli_select_db($conn, 'comblo');

  if (!$conn){
  	die('Erreur: '.mysqli_connect_error());
  }

  	$query = "SELECT * FROM `utilisateur`";

  	$result = mysqli_query($conn, $query);
	
	if($result){
		while($row = mysqli_fetch_array($result)){
			$name = $row["$pseudo"];
			echo "Name: ".$name."br/>";
		}
	}

  $user_pseudo = !empty($_POST['username']) ? $_POST['username'] : NULL;
  $user_email = !empty($_POST['email']) ? $_POST['email'] : NULL;
  $user_pwd1 = !empty($_POST['password1']) ? $_POST['password1'] : NULL;
  $user_pwd2 = !empty($_POST['password2']) ? $_POST['password1'] : NULL;

  if ($user_pseudo == NULL or $user_email == NULL or $user_pwd1 == NULL or $user_pwd2 == NULL){
  	mysqli_close($conn);
  	header('Location: signup.php');
  }
  
  
  mysqli_close($conn);
?>
