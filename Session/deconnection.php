<?php
session_start();
session_unset();
session_destroy();
header('location: ./templates/session.php');
exit();
?>



