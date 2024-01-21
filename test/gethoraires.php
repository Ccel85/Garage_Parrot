<?php
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');

$horaires = getHoraires($adminpdo);
var_dump($horaires);
foreach ($horaires as $horaire) {
    // Access Horaire properties
   // $id = $horaire->getId();
    $day = $horaire->getDay();
    $heure_debut_am = $horaire->getHeureDebutAm();
    $heure_fin_am = $horaire->getHeureFinAm();
    $heure_debut_pm = $horaire->getHeureDebutPm();
    $heure_fin_pm = $horaire->getHeureFinPm();

    // Display or process each Horaire object as needed
    echo "Day: $day, Heure Début AM: $heure_debut_am, Heure Fin AM: $heure_fin_am, Heure Début PM: $heure_debut_pm, Heure Fin PM: $heure_fin_pm";
  }
  ?>
  
  <!DOCTYPE html>
  <html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Horaires</title>
  </head>
  <body>
  
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
          <?php $horaires = getHoraires($adminpdo);
          foreach ($horaires as $horaire){ ?>
              <tr>
                  <td><? echo($day) ?></td>                  
                  <td><? echo($heure_debut_am) ?></td>
                  <td><?= $horaire->getHeureFinAm() ?></td>
                  <td><?= $horaire->getHeureDebutPm() ?></td>
                  <td><?= $horaire->getHeureFinPm() ?></td>
              </tr>
          <?php
       } ?>
      </tbody>
  </table>
  </body>
<?php include '../templates/footer.php' ?>

