<?php
session_start();
include('../config/configsql.php');
include('../Session/variable.php');
include('../templates/header.php');?>
      <div>
        <h1 class="fw-bold mb-0 fs-2">Connexion</h1>
        <form class="modalSession" method="POST" action="../Session/connexion.php">
          <div class="">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control rounded-3" id="email" >
          </div>
          <div class="">
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" class="form-control rounded-3" id="mdp" placeholder="Mot de passe">
          </div>
          <button class="connectSession" name="connexion" type="submit">Connexion</button>
        </form>
      </div>
<?php include '../templates/footer.php' ?>

