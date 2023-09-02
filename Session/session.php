<?php
include('../config/configsql.php');
include('../config/sessionStart.php');
include('../html/header.php');
?>

<div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">    
        <h1 class="fw-bold mb-0 fs-2">Connection</h1>
        <div>
        <button type="button"  data-bs-dismiss="" class="btn-close"  aria-label="Close"></button>
        </div>
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



