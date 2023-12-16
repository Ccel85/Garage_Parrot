<?php
include ('../config/configsql.php');
//recuperer les variables du client MySQL

    //Récupération des variables à l'aide du client MySQL pour les utilisateurs
    //$usersStatement = $pdo->prepare('SELECT * FROM utilisateur');
    //$usersStatement->execute();
   // $users = $usersStatement->fetchALL();

   // foreach ($users as $user){
     //   $userType = $user['type'];}

    class User {
        private string $id;
        private string $email;
        private string $password;
        private string $name;
        private string $surname;
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
        public function getPassword() : string
        {
            return $this->password;
        }

    public static function connect(PDO $pdo,string $email,string $password) 
        {
            $statement= $pdo->prepare('SELECT * FROM users WHERE email=:email');
           // $statement->setFetchMode(PDO::FETCH_CLASS,'User');
            $statement->bindValue(':email',$email);
            $statement->execute();
            $user =$statement->fetch();
                if($user === false){
                    echo'identifiant invalide';
                } else{
                    if (password_verify($password, $user->getPassword())){
                    echo "Connection réussie! Bienvenue" . $user['name'] . $user['surname'];
                        }else {
                    echo " Mot de passe incorrect";
                        }
                } 
            
            //recuperation des roles d'un utilisateur
            $statement = $pdo -> prepare ('SELECT * FROM userRoles JOIN roles ON roles.id = userRoles.userId WHERE id = :id');
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
            
                }
            }
        }
    

        
class UserManager {

            private PDO $pdo;
            public function __construct(PDO $pdo)
            {
                $this->pdo = $pdo;
            }

           // public function subscribe (string $email,string $password,string $name, string $surname) : 
          //  {

          //  }
         //tableau des roles
            private array $roles = [];
    
          /*  public function sayHello() : string{
                return 'Bonjour '.$this->name.' '.$this->surname;
    
            }*/
        }

/*function verifyUserLoginPassword(PDO $pdo, string $email, string $password) {
        $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        
        if ($query-> rowCount()== 1) {

            $users = $query->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password , $users['password'])){
            echo "Connection réussie! Bienvenue" . $users['name'] . $users['surname'];
        }else {
            echo " Mot de passe incorrect";
        }
        }
        else {
            echo "utilisteur introuvable, êtes vous sure de votre email ?";
        }
    }
     /*   if ($users && password_verify($userMdp, $users['password'])) {
            return $users;
        } else {
            return false;
        }
    }*/

//Récuperation données table service
    //$getsStatement = $pdo->prepare('SELECT * FROM utilisateur');
    //$usersStatement->execute();
    //$users = $usersStatement->fetchall();

    //fonction recuperer donnee vehicule par id pas utilise
    function getCarbyId(PDO $pdo, $carId){

        $getcar = $pdo->prepare("SELECT * FROM vehicule ORDER BY id = :id");
        $getcar -> bindParam (':id',$carId, PDO::PARAM_INT);
        $getcar->execute();
        return $getcar->fetchAll();
    }
    //fonction recuperer donnee vehicule par id
    function getcars(PDO $pdo, int $limit = null) {
        $sql = 'SELECT * FROM VEHICULE ORDER BY id DESC';
        if ($limit) {
            $sql .= ' LIMIT :limit';
        }
        $query = $pdo->prepare($sql);
        if ($limit) {
            $query->bindParam(':limit', $limit, PDO::PARAM_INT);
        }
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



