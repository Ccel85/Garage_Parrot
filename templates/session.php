<?php
session_start();
include('../config/configsql.php');
include('../templates/header.php');
include('../Session/variable.php');
?>

        <h1 class="fw-bold mb-0 fs-2">Connection</h1>
        <form class="modalSession" method="POST" action="../Session/connexion.php">
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
     <!-- </div>
    </div>
  </div>
</div>-->
<?php include '../templates/footer.php' ?>

