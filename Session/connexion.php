<?php session_start(); 
include('../Session/variable.php');
include('../config/configsql.php');?>
<?php
//on inclue un fichier contenant nom_de_serveur, nom_bdd, login et password d'accès à la bdd mysql
    if (isset($_POST['email']) && isset($_POST['mdp'])){
        foreach ($users as $user) {
            if (
                $user['email'] === $_POST['email'] &&
                $user['mdp'] === $_POST['mdp'] && $user['type'] === 'adm' 
            ) {
                $loggedUser = ['email' => $user['email']];

                setcookie('LOGGED_USER',
                $loggedUser['email'],
                ['expires' => time()+3600,
                'secure' => true,]);

                $_SESSION['LOGGED_USER'] = $loggedUser['email'];

                header ('location:../Session/admin.php');
            }
                elseif (
                    $user['email'] === $_POST['email'] &&
                    $user['mdp'] === $_POST['mdp'] && $user['type'] !== 'adm' 
                ) {
                    $loggedUser = ['email' => $user['email']];
    
                    setcookie('LOGGED_USER',
                    $loggedUser['email'],
                    ['expires' => time()+3600,
                    'secure' => true,]);
    
                    $_SESSION['LOGGED_USER'] = $loggedUser['email'];
    
                    header ('location:../html/accueil.php');                   
                
            } else {

            echo 'Vous ne possedez pas de compte utilisateur,veuillez voir votre administrateur';
            }
        }
}
        //si le cookie ou session existents
        /*foreach ($users as $user) {
        if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER']) && $user['type']==='adm'){       
            $loggedUser = [
                'email' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER'],
            ];
                header ('location:admin.php');
            } elseif 
                (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER']) && $user['type']!=='adm'){       
                    $loggedUser = [
                        'email' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER'],
                    ];
                header('location:../html/accueil.php');
            }   
    }      */
    ?>
