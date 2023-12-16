<?php 
include('../config/sessionStart.php');
include('../Session/variable.php');
include('../config/configsql.php');?>
<?php
//page de connection utilisateur

$email=$_POST['email'];
$password=$_POST['mdp'];

//on encrypte le mot de passe
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$user = User :: connect($pdo,$email,$hashedPassword);

// verification et redirection de connection
/*$statement= $pdo->prepare('SELECT * FROM users WHERE email=:email');
$statement->bindValue(':email',$email);
$statement->execute();
    $user =$statement->fetchObject('User');
    if($user === false){
        echo'identifiant invalide';
    } else{

//recuperation des roles d'un utilisateur
$statement = $pdo -> prepare ('SELECT * FROM userRoles JOIN roles ON roles.id = userRoles.userID WHERE id = :id');
$statement ->bindValue (':id',$user->getId());
if ($statement->execute()){
    while ($role = $statement->fetch(PDO::FETCH_ASSOC)){
        $user ->addRole($role['name']);
    }
}

//verification du roles pour acceder aux pages
if (! in_array('administrateur',$user->getRole()))
{
    header('location:../templates/index.php');

    $_SESSION['LOGGED_USER'] = 'Employé';

    $loggedUser = ['email' => $user['email']];

                setcookie('LOGGED_USER',
                $loggedUser['email'],
                ['expires' => time()+3600,
                'secure' => true,]);

} else {

    header('location:../templates/admin.php');

    $_SESSION['LOGGED_USER'] = 'administrateur';
 
    $loggedUser = ['email' => $user['email']];
   
                setcookie('LOGGED_USER',
                $loggedUser['email'],
                ['expires' => time()+3600,
                'secure' => true,]);

    }*/

    ?>
