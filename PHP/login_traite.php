<?php
$nameErr = "";
if(empty($_POST['username'])) {
  $nameErr = "idd est vide";
  header("location:login.php");
}
?>
