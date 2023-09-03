<?php
include ('../config/configsql.php');
//recuperer les variables du client MySQL

    //Récupération des variables à l'aide du client MySQL pour les utilisateurs
    //$usersStatement = $pdo->prepare('SELECT * FROM utilisateur');
    //$usersStatement->execute();
   // $users = $usersStatement->fetchALL();

   // foreach ($users as $user){
     //   $userType = $user['type'];}

    class User{
        private string $id;
        private string $email;
        private string $password;
        private string $nom;
        private string $prenom;
        //tableau des roles
        private array $roles = [];

        public function getId() : string
        {
            return $this->id;
        }
        public function addRole(string $role) : void
        {
            $this->roles[] = $role ;
        }
        public function getRole() : array
        {
            return $this->roles;
        }
        }

        

    function verifyUserLoginPassword(PDO $pdo, string $email, string $userMdp) {
        $query = $pdo->prepare("SELECT * FROM utilisateur WHERE email = :email");
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $users = $query->fetch();
    
        if ($users && password_verify($userMdp, $users['mdp'])) {
            return $users;
        } else {
            return false;
        }
    }

//Récuperation données table service
    //$getsStatement = $pdo->prepare('SELECT * FROM utilisateur');
    //$usersStatement->execute();
    //$users = $usersStatement->fetchall();

    //fonction recuperer donnée vehicule par id-> pas utilisée
   /* function getCarbyId(PDO $pdo, $carId){

        $getcar = $pdo->prepare("SELECT * FROM vehicule ORDER BY id = :id");
        $getcar -> bindParam (':id',$carId, PDO::PARAM_INT);
        $getcar->execute();
        return $getcar->fetchAll();
    }*/
    //fonction recuperer donnee vehicule par id
    function getcars(PDO $pdo) {
        $sql = 'SELECT * FROM VEHICULE ORDER BY id = :id DESC';
        $query = $pdo->prepare($sql);
        $query->bindParam(':id',$carId,PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    }
    //fonction recuperer image vehicule
    function getCarImage(string|null $image) {
        if ($image === null) {
            return '../img/img_clio_1.png';
        } else {
            return $image['image'];
        }
    }
    //fonction recuperer donnée service
    function getservice(PDO $pdo) {
        $sql = "SELECT * FROM service ORDER BY id = :id ";
        $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
        return $query->fetchAll();
    }
    //$carCreate = $mysql->prepare('SELECT * FROM vehicule');
//$carCreate->execute();
//$cars = $carCreate->fetchall();

//création des variables pour annonce
/*$stmt = $pdo->query("SELECT * FROM vehicule ");
$row = $stmt->fetch();
    $carModele=$row['modele'];
    $carGasoil=$row['carburant'];
    $carKilometers=$row['km'];
    $carYear=$row['année'];
    $carDescription=$row['description'];
    $carPrice=$row['Prix'];
    $carId=$row['id'];*/

?>

