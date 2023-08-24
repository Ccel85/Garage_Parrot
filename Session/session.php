<?php
include('../config/configsql.php');
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Garage V.Parrot</title>
<!--Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<!--feuille CSS -->
<link rel="stylesheet" href="../html/style.css">
</head>
<body>
<html>
<body>
<div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <h1 class="fw-bold mb-0 fs-2">Connection</h1>
        <button type="button" href="../html/accueil.php" data-bs-dismiss="modal" class="btn-close"  aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        <form class="modalSession" method="POST" action="connexion.php">
          <div class="">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control rounded-3" id="email" >
          </div>
          <div class="">
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" class="form-control rounded-3" id="mdp" placeholder="Mot de passe">
            
          </div>
          <button class="connectSession" name="connexion" type="submit">Connection</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


