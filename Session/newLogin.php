<?php 
include('../config/sessionStart.php');
include('../config/configsql.php');
include('variable.php');?>

<?php   $userName = $_POST["User_name"];
        $userSurname = $_POST["User_surname"];
        $userMail = $_POST["User_email"];
        $userMdp = $_POST["User_mdp"];
        $userType = $_POST["User_type"];
//verification que les donnees saisie n'existe pas 

        if (isset($_POST['User_email']) &&  isset($_POST['User_mdp'])) {
                foreach ($users as $user) {
                if (
                        $user['nom'] === $_POST['User_name'] &&
                        $user['prenom'] === $_POST['User_surname']
                ) {
                        echo 'Le compte utilisateur'." ".$_POST['User_name']." ".$_POST['User_surname']." ".' existe déja.';
                       // $loggedUser = [
                        //'email' => $user['email'],
                        //];
                } else { //insertion données du formulaire adminUtilisateur.php
                        $sql = " INSERT INTO  utilisateur (nom,prenom,email,type,mdp) VALUES ('$userName','$userSurname','$userMail','$userType','$userMdp')";

                        $pdo-> exec($sql);

                        echo 'Le compte utilisateur'." ".$_POST['User_name']." ".$_POST['User_surname']." ".'est créé.';// avec le profil'." ".$_POST['User_type'];
                }
        }
}
?>
                        
                        
                
                
        
        

