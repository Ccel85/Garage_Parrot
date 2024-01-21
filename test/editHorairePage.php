<?php  
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');
?>
<!--page de modification de horaire-editHoraire.php  A METTRE DANS LE FOOTER-->

<h2>Liste des Horaires</h2>

    <table border="1">
        <thead>
            <tr>
                <th>Jour</th>
                <th>Heure Début AM</th>
                <th>Heure Fin AM</th>
                <th>Heure Début PM</th>
                <th>Heure Fin PM</th>
            </tr>
        </thead>
        <tbody>
        <?php $horaires = getHoraire($adminpdo);
        foreach ($horaires as $horaire){?> 
            <tr>
                <td><?php echo($horaire['day']) ?></td>                  
                <td><?php echo($horaire['heure_debut_am']) ?></td>
                <td><?php echo($horaire['heure_fin_am']) ?></td>
                <td><?php echo($horaire['heure_debut_pm']) ?></td>
                <td><?php echo($horaire['heure_fin_pm']) ?></td>
            </tr>
        <?php
       } ?>
      </tbody>
  </table>
        <div class="form-group">
        <button type="submit" name="modifierHoraire">Valider la modification</button>
        </div>
    </div>
</form> 

<form  action="../templates/adminHoraire.php" method="POST" style="display:flex; justify-content:center">
    <button  type="submit" name="creerHoraire">Créer l'horaire</button>
</form>
<?php include "../templates/footer.php" ?>
