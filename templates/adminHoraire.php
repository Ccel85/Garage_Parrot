<?php  
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');

//creation de Horaire
?>        <form action="../Session/newHoraire.php"  enctype= "multipart/form-data" method="POST">
            <h2>Horaire Ouverture</h2> 
              <table>
                <thead>
                  <tr>
                    <th colspan="1">JOUR</th>
                    <th colspan="1">Heure début matin</th>
                    <th colspan="1">Heure fin matin</th>
                    <th colspan="1">Heure début après-midi</th>
                    <th colspan="1">Heure fin après-midi</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                    <th>
                    <input name="day1" >
                    </th>
                    <td>
                    <input name="heure_debut_am" type="time">
                    </td>
                    <td>
                    <input name="heure_fin_am" type="time">
                    </td>
                    <td>
                    <input name="heure_debut_pm" type="time">
                    </td>
                    <td>
                    <input name="heure_fin_pm" type="time">
                    </td>
                  </tr>
                   <!-- <tr>
                    <th name="day">MARDI</th>
                  <td>
                    <input  name="heure_debut_am"type="time">
                    </td>
                    <td>
                    <input name="heure_fin_am" type="time">
                    </td>
                    <td>
                    <input name="heure_debut_pm" type="time">
                    </td>
                    <td>
                    <input name="heure_fin_pm" type="time">
                    </td>
                    </tr>
                    <tr>
                    <th name="day">MERCREDI</th>
                                    <td>
                    <input name="heure_debut_am" type="time">
                    </td>
                    <td>
                    <input name="heure_fin_am" type="time">
                    </td>
                    <td>
                    <input name="heure_debut_pm" type="time">
                    </td>
                    <td>
                    <input name="heure_fin_pm" type="time">
                    </td>
                    </tr>
                    <tr>
                    <th name="day">JEUDI</th>
                  
                  <td>
                    <input name="heure_debut_am" type="time">
                    </td>
                    <td>
                    <input name="heure_fin_am" type="time">
                    </td>
                    <td>
                    <input name="heure_debut_pm" type="time">
                    </td>
                    <td>
                    <input name="heure_fin_pm" type="time">
                    </td>
                    </tr>
                    <tr>
                    <th name="day">VENDREDI</th>
                  
                  <td>
                    <input name="heure_debut_am" type="time">
                    </td>
                    <td>
                    <input name="heure_fin_am" type="time">
                    </td>
                    <td>
                    <input name="heure_debut_pm" type="time">
                    </td>
                    <td>
                    <input name="heure_fin_pm" type="time">
                    </td>
                    </tr>
                    <tr>
                    <th name="day">SAMEDI</th>
                  
                  <td>
                    <input name="heure_debut_am" type="time">
                    </td>
                    <td>
                    <input name="heure_fin_am" type="time">
                    </td>
                    <td>
                    <input name="heure_debut_pm" type="time">
                    </td>
                    <td>
                    <input name="heure_fin_pm" type="time">
                    </td>
                    </tr>
                    <tr>
                    <th name="day">DIMANCHE</th>
                  
                  <td>
                    <input name="heure_debut_am" type="time">
                    </td>
                    <td>
                    <input name="heure_fin_am" type="time">
                    </td>
                    <td>
                    <input name="heure_debut_pm" type="time">
                    </td>
                    <td>
                    <input name="heure_fin_pm" type="time">
                    </td>
                    </tr>-->
                </tbody>
              </table>
              <div class="form-group">
                <button type="submit"name="valider">Valider les modifications</button>
                </div>
            
            
            
            
            <!--<div class="formulaire">
                <div class="form-group">
                    <label for="service_title" >Jour</label>
                    <input class="form-control" type="text" name="service_title" id="exampleFormControlInput1" required>
                </div>
                <div class="form-group">
                    <label for="service_description">Description du service</label>
                    <textarea rows="10" class="form-control" type="text" name="service_description" id="exampleFormControlInput1" required></textarea>
                </div>
                <div class="form-group">
                <button type="submit"name="valider">Valider</button>
                </div>
            </div>-->
        </form>
        <?php include '../templates/footer.php' ?>
</html>
    
