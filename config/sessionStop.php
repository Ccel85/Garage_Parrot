<?php

// Met à jour le timestamp de la dernière activité
if (isset($_SESSION['last_activity']))  {
    // Déconnecte l'utilisateur si le temps d'expiration est dépassé
    session_unset();
    session_destroy();
    header('Location: ../templates/session.php');
    exit();
} 
?>