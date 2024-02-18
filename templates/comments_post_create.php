<?php
require '../config/configsql.php';

//insertion des commentaires en BDD

        $date = date('Y-m-d');
        $pseudo = $_POST["pseudo"];
        $comments = $_POST["comments"];
        $rating = $_POST["rating"];
        
        try{
        // requete mise à jour donnée
        $sql = $adminpdo->prepare(
            "INSERT INTO `garageparrot`.`comments` (date, pseudo, comments, rating)
            VALUES (:date, :pseudo,:comments, :rating)"
        );
        // Bind parameters
        $sql->bindParam(':date', $date);
        $sql->bindParam(':pseudo', $pseudo);
        $sql->bindParam(':comments', $comments);
        $sql->bindParam(':rating', $rating);
        $sql->execute();
    
        // Check if the update was successful
        if (!$sql) {
            echo "La modification a échoué. ";
            }  else {
                echo "<div class='alert alert-success'>
                <h1>Requête validée !</h1>
                <p>La mise à jour a bien été effectuée !</p>
            </div>";
            header('location: ../templates/index.php');

            }
        } catch (PDOException $e) {
        
            echo 'Erreur lors de l\'enregitrement du commentaire : '.$e->getMessage();
        }
        
?>