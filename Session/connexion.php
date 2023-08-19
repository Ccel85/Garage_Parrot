<?php   session_start();?>

<?php 
    //on inclue un fichier contenant nom_de_serveur, nom_bdd, login et password d'accès à la bdd mysql
    include('../config/configsql.php');
        //Récupération des variables à l'aide du client MySQL
        $usersStatement = $mysqlUser->prepare('SELECT * FROM utilisateur');
        $usersStatement->execute();
        $users = $usersStatement->fetchall();?>

        <?php  
        foreach ($users as $user) {
            if (
                $user['email'] === $_POST['email'] &&
                $user['mdp'] === $_POST['mdp'] 
            ) {
                $loggedUser = ['name' =>$user['nom'],
                            'email'=>$user['email'],
                            'prenom'=>$user['prenom'],
                            'type'=>$user['type']];

                setcookie('LOGGED_USER',
                $loggedUser['nom'],
                ['expires' => time()+3600,
                'secure' => true,]
            );
                $_SESSION['LOGGED_USER'] = $loggedUser['nom'];

            } else {

                echo 'ttttt';
            }
        }

        if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER'])) {
            $loggedUser = [
                'nom' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER'],
            ];
        }

        if (isset($loggedUser)){
            header ('location:admin.php');
        };?>
