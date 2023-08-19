<?php  session_start();?>

<?php 
    //on inclue un fichier contenant nom_de_serveur, nom_bdd, login et password d'accès à la bdd mysql
    include('../config/configsql.php');
        //Récupération des variables à l'aide du client MySQL
        $usersStatement = $mysqlUser->prepare('SELECT * FROM utilisateur');
        $usersStatement->execute();
        $users = $usersStatement->fetchall();

        foreach ($users as $user) {
        $type = $user['type'];
        $name = $user['nom'];
        $surname = $user['prenom'];
        $mdp = $user['mdp'];
        $mail = $user['email'];
        }

        /*$name = ($_POST['nom']);
        $mdp = ($_POST['mdp']);*/
        //$_SESSION[$mail] = $_POST ['email'];

       //requete pour verifier saisie avec bdd

        $requete = $mysqlUser-> prepare ("SELECT COUNT(*) as nb FROM utilisateur WHERE email = ? AND mdp = ?");
        $requete-> execute(array($_POST['email'],$_POST['mdp']));
        $row = $requete -> fetch();

        if ($row['nb'] === 0)
        {
            echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
        } else {
            // voir pour ouvrir une $_SESSION:
            //la session peut être appelée différemment et son contenu aussi peut être autre chose que le pseudo
            //$_SESSION['nom'] = $name;
            header ('location:admin.php');
        }

       /* if (isset($_POST['email']) &&  isset($_POST['password'])) {
    
                 // verification du type d'utilisateur pour redirection de page

            if  ( $type === 'adm'){
            
            $_SESSION[$type] = true {

                setcookie('nom' , 'type' , time() +3600,'/');

                        header ('location:../admin.php');            
            }
        }
            else {
                $_SESSION[$type] = false{
        
                setcookie('nom' , 'type' , time() +3600,'/');
        
                header('location:../html/accueil.php');
            }
        }
        
    }
            
       <?php //header("location:admin.php");?>
    <?php
    //fin ajout
    
                /**
                 * Cookie qui expire dans un an
                 */
              /*  setcookie(
                    'LOGGED_USER',
                    $loggedUser['email'],
                    [
                        'expires' => time() + 365*24*3600,
                        'secure' => true,
                        'httponly' => true,
                    ]
                );
    
                $_SESSION['LOGGED_USER'] = $loggedUser['email'];
            } else {
                $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                    $postData['email'],
                    $postData['password']
                );
            }
        }
    }
    
    // Si le cookie ou la session sont présentes
    if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER'])) {
        $loggedUser = [
            'email' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER'],
        ];
    }
    ?>
    
    <?php if(!isset($loggedUser)): ?>
    <form action="home.php" method="post">
        <?php if(isset($errorMessage)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo($errorMessage); ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com">
            <div id="email-help" class="form-text">L'email utilisé lors de la création de compte.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    <?php else: ?>
        <div class="alert alert-success" role="alert">
            Bonjour <?php echo($loggedUser['email']); ?> !
        </div>
    <?php endif; ?>*/

    /*try
{
	// On se connecte à MySQL
	$mysqlClient = new PDO('mysql:host=localhost;dbname=garageparrot;charset=utf8', 'admin', 'admin');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}*/

/*if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['password']) && !empty($_POST['password']))){
    $mysqlClient = new PDO('mysql:host=localhost;dbname=garageparrot;charset=utf8', 'admin', 'admin');

}

    $type = $_POST['type'];
    $username = $_POST['nom'];
    $password = $_POST['mdp'];
    
// verification du type d'utilisateur pour redirection de page

    $verif = mysql_query ("SELECT 'type' AGAINST $type FROM utilisateur");

    if ( $verif === 'adm'){

        $_SESSION['adm'] = true;

        setcookie('nom' , 'type' , time() +3600,'/');

        header("location:admin.php");
        }
    
        else {
    
            $_SESSION['adm'] = false;
    
            setcookie('nom' , 'type' , time() +3600,'/');
    
            header("location:../html/accueil.php");
        }

    ?>*/