<?php
require '../config/configsql.php';

class User 
{
    private string $id;
    private string $email;
    private string $password;
    private string $name;
    private string $surname;
  //tableau des roles
    private array $roles = [];
    
    public function __construct($id='',$email='',$password='',$name='',$surname='',$roles=[])
    {
    $this->id = $id;
    $this->email = $email;
    $this->password = $password;
    $this->name = $name;
    $this->surname = $surname;
    $this->roles = $roles;
    }

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
        session_start();
    //Recuperation des donnees de la table Users
        $statement= $pdo->prepare('SELECT * FROM users WHERE email=:email');
        $statement->setFetchMode(PDO::FETCH_CLASS,'User');
        $statement->bindValue(':email',$email);
        $statement->execute();
    // Verification si email entrée existe dans la table

        if ($statement->rowCount() == 0)
        {
            echo'Identifiant invalide';
        } else {
        //vérification mot de passe
        $monUser = $statement->fetch(PDO::FETCH_ASSOC);
                
        if (password_verify($password,$monUser['password']) || $password === $monUser['password'])
        {
            $_SESSION['user_id'] = $monUser['id'];
            $_SESSION['name'] = $monUser['name'];
            $_SESSION['surname'] = $monUser['surname'];
            $_SESSION['role'] = $monUser['role'];
                
        //recuperation des roles d'un utilisateur

            $stmt = $pdo -> prepare ('SELECT roles.name FROM users JOIN userroles ON :usersId = userRoles.userId JOIN roles ON roles.id = userroles.roleId ');
            $stmt ->bindValue (':usersId',$_SESSION['user_id']);
            $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_CLASS,'User');
            $role = $stmt->fetch();
                
            if (in_array('administrateur', $role)) {
                $_SESSION['role'] = 'Administrateur';
                header('location: ../templates/admin.php');
                setcookie('session',$email,
                    ['expires' => time()+600,
                    'secure' => true,]);
            } else {
                    $_SESSION['role'] = 'Employé';
                    header('location: ../templates/index.php');
                    setcookie('session',$email,
                    ['expires' => time()+600,
                    'secure' => true,]);
            }
        } else
        {
        echo " Mot de passe incorrect";
        } 
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

//Récuperation données table service
    //$getsStatement = $pdo->prepare('SELECT * FROM utilisateur');
    //$usersStatement->execute();
    //$users = $usersStatement->fetchall();

    //fonction recuperer donnee vehicule par id pas utilise
    /*function getCarbyId(PDO $pdo, $carId){

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
    }*/
    //fonction recuperer donnée service
    function getservice(PDO $adminpdo) {
        $sql = "SELECT * FROM services ORDER BY id = :id ";
        $query = $adminpdo->prepare($sql);
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



