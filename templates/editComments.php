<?php  
session_start();
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');

//Gestion des commentaires?>

<h2 class="text-center ">Gestion des avis</h2>

<form method="post" >
    <div class="comments">
        <?php
        //RECUPERATION DE TOUS LES AVIS
        $allComments = getComments($adminpdo);
        foreach ($allComments as $allComment){
        $datePublication = strtotime($allComment['date']);
            // Date actuelle
            $dateActuelle = time();
            // Calcul de la différence en jours
            $diffEnJours = floor(($dateActuelle - $datePublication) / (60 * 60 * 24));
            // Calcul de la différence en semaines
            $diffEnSemaines = floor($diffEnJours / 7);
            // Affichage du message en fonction de la différence
            if ($diffEnJours == 0) {
                echo "Aujourd'hui";
            } elseif ($diffEnJours == 1) {
                echo " Hier";
            } elseif ($diffEnJours < 7) {
                echo "Il y a " . $diffEnJours . " jours";
            } elseif ($diffEnSemaines == 1) {
                echo "Il y a 1 semaine";
            } else {
                echo "Il y a " . $diffEnSemaines . " semaines";
            }
            if ($allComment['publication'] == 'Y'){

                $allComment['publication'] = 'Publier';
            } else {
                $allComment['publication'] = 'Pas publier';
            }
                
            ?>
        <p class="fst-italic"><?=($allComment['pseudo']) ?></p>
        <p><?= htmlspecialchars($allComment['comments']) ?></p>
        <span value="" id="rating" class="rating textRed" data-rating="<?=htmlspecialchars($allComment['rating']) ?>">Note :<?=htmlspecialchars($allComment['rating']) ?></span>
        <div class="row form-group">
            <div class="col-md-2 align-self-center">
                <label for="exampleFormControlInput1">Publication :</label>
            </div>
            <div class="col-md-2 align-self-center ">
                <select class="form-control fw-bold text-center" name="action[<?= $allComment['id'] ?>]" id="exampleFormControlInput1" >
                    <option value="<?=$allComment['publication']?>" selected><?=$allComment['publication']?></option>
                    <option name="comment" value='Y'>Publier</option>
                    <option name="hideComment" value='N'>Ne pas publier</option>
                </select>
            </div>
        </div>
        <!-- Champ caché pour stocker l'ID de l'utilisateur -->
        <input type="hidden" name="id" value="<?= $allComment['id'] ?>">
    </div>
    <hr>
    <?php } ?> 
    <div class="button">
        <button type = "submit" class="button" name="valideComments" >Valider les modifications</button>
    </div>
</form>
    <?php //insertion de la valeur archivé en BDD
        hideComments($adminpdo);
        include '../templates/footer.php' ?>


