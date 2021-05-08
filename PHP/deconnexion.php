<?php session_start();
    // Traite la déconnexion des personnes
    if (isset($_SESSION['id'])) {
        session_destroy();
    }
    header('Location: login.php');
?>