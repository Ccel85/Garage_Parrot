<?php
// Définit le temps d'expiration de la session en secondes (par exemple, 1 heure)
$session_lifetime = 3600; 

// Définir le temps d'expiration du cookie de session
session_set_cookie_params($session_lifetime);

session_start();

// Met à jour le timestamp de la dernière activité
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > $session_lifetime) {
    // Déconnecte l'utilisateur si le temps d'expiration est dépassé
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
} else {
  // Met à jour le timestamp de la dernière activité
    $_SESSION['last_activity'] = time(); 
}
?>