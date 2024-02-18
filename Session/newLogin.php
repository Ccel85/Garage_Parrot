<?php 
session_start();
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');

if (isset($_POST["createUser"])){
        //page création utilisateur
                $userName = $_POST['User_name'];
                $userSurname = $_POST['User_surname'];
                $userMail = $_POST['User_email'];
                $userMdp = $_POST['User_mdp'];
                $userType = $_POST['User_type'];
        //verification que les donnees saisie n'existe pas 
        try{
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $adminpdo->prepare($query);
        $stmt->bindParam(':email' , $userMail);
        $stmt->execute();

        // on verifie que le mail existe
        if ($stmt->rowCount() > 0){
        die("Cette adresse email existe déja");
                }

        //on encrypte le mot de passe
        $hashedPassword = password_hash($userMdp, PASSWORD_DEFAULT);

        // ON INSERT LES DONNEES DANS LA BASE
        $insertQuery = "INSERT INTO users (name, surname, email, password, role) VALUES (:name, :surName, :email, :password , :role)";
        $stmt = $adminpdo->prepare($insertQuery);
        $stmt->bindParam(':name', $userName);
        $stmt->bindParam(':surName', $userSurname);
        $stmt->bindParam(':email', $userMail);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role', $userType);
        $stmt->execute();

        echo "Inscription réussie";
        header("refresh:3; url=../templates/adminUtilisateurs.php");
        }
        catch (PDOException $e){
                echo "Erreur lors de l'inscription :". $e->getMessage();
        }
}
if(isset($_POST['modifierUtilisateur'])) {

        // Réecriture des variables
        $id =  $_POST['id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        try{
        // Requête de modification d'enregistrement
        $stmt= $adminpdo->prepare ("UPDATE `garageparrot`.`users` SET 
        name = :name,
        surname = :surname,
        email = :email,
        role = :role
        WHERE id = :id");

        $stmt->bindParam (':id',$id);
        $stmt->bindParam (':name',$name);
        $stmt->bindParam (':surname',$surname);
        $stmt->bindParam (':email',$email);
        $stmt->bindParam (':role',$role);
        $success=$stmt->execute();

        if (!$success) {
                echo "La modification a échoué. ";
                } else {
                        echo "La modification a réussie. ";
                // Redirection après modification réussie
                header("refresh:3; url=../templates/adminUtilisateurs.php");
                exit();
                }
        } catch (PDOException $e) {
                echo "Erreur lors de la modification de l'utilisateur : " . $e->getMessage();
                }
        }

if (isset($_POST['supprimerUtilisateur'])){
        
        // Réecriture des variables
        $id = $_POST['id'];
        //$image_service=$_POST['image'];
        try{
        // Requête de modification d'enregistrement
        $stmt= $adminpdo->prepare ("DELETE FROM users WHERE id = :id");
        $stmt->bindParam (':id', $id);
        $success=$stmt->execute();
        
        if (!$success) {
        echo "La suppression a échoué.";
        } else {
                echo "Suppression réussie";
         // Redirection après modification réussie
        header("refresh:3; url=../templates/adminUtilisateurs.php");
        exit();
        }
        } catch (PDOException $e) {
                echo "Erreur lors de la suppression de l'utilisateur : " . $e->getMessage();
        }
}
?>


