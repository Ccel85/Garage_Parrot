<?php  
session_start();
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');

//PAGES DE VISUALISATION ET MODIFICATION HORAIRE
?> 
  
  <form class="horaire">
    <h2>Horaire d'ouverture</h2>
    <table>
      <thead>
          <tr>
          <th colspan="1" >Jour</th>
            <th colspan="2" >Matin</th>
            <th colspan="2">Après-midi</th>
          </tr>
      </thead>
      <tbody>
      <?php $horaires = getHoraire($adminpdo);
          foreach ($horaires as $horaire){ 
                $heure_debut_am = date("H:i", strtotime($horaire['heure_debut_am']));
                $heure_fin_am = date("H:i", strtotime($horaire['heure_fin_am']));
                $heure_debut_pm = date("H:i", strtotime($horaire['heure_debut_pm']));
                $heure_fin_pm = date("H:i", strtotime($horaire['heure_fin_pm']));?> 
          <tr>
            <td name = "day" type = "text" ><?php echo ($horaire['day']);?></td> 
            <td name = "heure_debut_am" type = "text"><?php echo ($heure_debut_am);?></td>                  
            <td name = "heure_fin_am" type = "text"><?php echo ($heure_fin_am);?></td>
            <td name = "heure_debut_pm" type = "text"><?php echo ($heure_debut_pm);?></td>
            <td name = "heure_fin_pm" type = "text"><?php echo ($heure_fin_pm);?><?php } ?>
          </tr>
          </tbody>
    </table>
  </form>
  <form class="horaire" action="../Session/editHoraire.php"  enctype= "multipart/form-data" method="POST">
    <table>
      <thead>
          <tr>
          <th colspan="1" >Jour</th>
            <th colspan="2" >Matin</th>
            <th colspan="2">Après-midi</th>
            <th></th>
          </tr>
      </thead>
      <tbody>
          <tr>
            <td><select name="day" type="text" >
              <option>Lundi</option>
              <option>Mardi</option>
              <option>Mercredi</option>
              <option>Jeudi</option>
              <option>Vendredi</option>
              <option>Samedi</option>
              </select>
            </td> 
            <td><input name="heure_debut_am" type="time" ></td>                  
            <td><input name="heure_fin_am" type="time" ></td>
            <td><input name="heure_debut_pm" type="time" ></td>
            <td><input name="heure_fin_pm" type="time" ></td>
          </tr>
      </tbody>
    </table>
      <button type="submit" name="modifierHoraire">Valider la modification</button>
  </form>
  <?php include '../templates/footer.php' ?>

