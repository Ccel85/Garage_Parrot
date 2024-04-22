<?php
include('../config/sessionStart.php');
include('../Session/variable.php');
include('../config/configsql.php');

// Clear all session variables
session_unset();
// Destroy the session
session_destroy();
// Clear any existing cookies
setcookie('session', '', time() - 3600, '/');

// Redirect to the index page
header('location:../templates/accueil.php');
exit();
?>



