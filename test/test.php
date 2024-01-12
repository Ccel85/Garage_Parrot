<?php
try{

$pdo = new PDO ("mysql:host=localhost;port=3306;dbname=garageparrot",'user','3f7zhhRn4NH69R' );
$pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "<br> Connexion à la bdd : OK !"."<br>";

//Recuperer tous les utilisateurs

$query = "SELECT * FROM users";
$stmt = $pdo->query($query);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Afficher les utilisateurs

foreach ($users as $user){
    echo"ID:".$user['id']."<br>";
    echo"ID:".$user['name']."<br>";
    echo"ID:".$user['surname']."<br>";
    echo"ID:".$user['email']."<br>";
    echo "<br>";
}

} catch(PDOException $e) {
        echo "Erreur de connection a la BDD" . $e->getMessage();
}