<?php 
include('../config/sessionStart.php');
include('../Session/variable.php');
/*include('../config/configsql.php');*/
include('../templates/header.php');

try{

$pdo = new PDO ("mysql:host=$servername;port=3306;dbname=garageparrot",'user','3f7zhhRn4NH69R' );
$pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "<br> Connexion à la bdd : OK !";

} catch(PDOException $e) {
        die('Erreur : ' . $e->getMessage());
}

//page création utilisateur

        $userName = $_POST['User_name'];
        $userSurname = $_POST['User_surname'];
        $userMail = $_POST['User_email'];
        $userMdp = $_POST['User_mdp'];
        $userType = $_POST['User_type'];
//verification que les donnees saisie n'existe pas 
try{
$query = "SELECT * FROM users WHERE email = :email";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':email' , $userMail);
$stmt->execute();

// on verifie que le mail existe
        if ($stmt->rowCount() > 0){
                die("Cette adresse email existe déja");
        }

//on encrypte le mot de passe
$hashedPassword = password_hash($userMdp, PASSWORD_DEFAULT);

// ON INSERT LES DONNEES DANS LA BASE

$insertQuery = "INSERT INTO users (name, surname, email, password) VALUES (:name, :surName, :email, :password)";
$stmt = $pdo->prepare($insertQuery);
$stmt->bindParam(':name', $userName);
$stmt->bindParam(':surName', $userSurname);
$stmt->bindParam(':email', $userMail);
$stmt->bindParam(':password', $hashedPassword);
$stmt->execute();

//test
$statement = $pdo -> prepare ('INSERT INTO userRoles JOIN roles ON roles.id = userRoles.roleId WHERE id = :id');
$statement ->bindValue (':id',$userType);
if ($statement->execute()){
    while ($role = $statement->fetch(PDO::FETCH_ASSOC)){
        $user ->addRole($role['name']);
    }
}
/*recupere tout de la table role...
$roleQuery = " INSERT INTO userRoles id de la valeur de $userType";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':email' , $userMail);
$stmt->execute();*/

echo "Inscription réussie";
}
catch (PDOException $e){
        echo "Erreur lors de l'inscription :". $e->getMessage();
}
?>


