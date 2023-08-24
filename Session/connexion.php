<?php   session_start();?>

<?php 
    //on inclue un fichier contenant nom_de_serveur, nom_bdd, login et password d'accès à la bdd mysql
    include('../config/configsql.php');
    include('variable.php');

        if (isset($_POST['email']) && isset($_POST['mdp'])){
        foreach ($users as $user) {
            if (
                $user['email'] === $_POST['email'] &&
                $user['mdp'] === $_POST['mdp'] 
            ) {
                $loggedUser = ['email' => $user['email']];

                setcookie('LOGGED_USER',
                $loggedUser['email'],
                ['expires' => time()+3600,
                'secure' => true,]);

                $_SESSION['LOGGED_USER'] = $loggedUser['email'];
                
            } else {

                echo 'Vous ne possedez pas de compte utilisateur,veuillez voir votre administrateur';
            }
        }
        //si le cookie ou session existents
        if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER'])){
            if ($user['type'] = 'adm') {        
            $loggedUser = [
                'email' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER'],
            ];
            header ('location:admin.php');
        
        /*if (isset($loggedUser)){
            header ('location:admin.php');*/
        } else {
            header('location:../html/accueil.php');
        }   
    }



        ?>
