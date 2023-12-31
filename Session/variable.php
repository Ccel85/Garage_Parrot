<?php
//require '../Session/variable.php';
require '../config/configsql.php';

//$user = $manager->('email','password');
class User {
    private string $id;
    private string $email;
    private string $password;
    private string $name;
    private string $surname;
  //tableau des roles
    private array $roles = [];
    
    /*public function __construct($id,$email,$password,$name,$surname)
    {
    $this->id = $id;
    $this->email = $email;
    $this->password = $password;
    $this->name = $name;
    $this->surname = $surname;
    }*/

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
    //$email=$_POST['email'];
    //$password=$_POST['mdp'];
        $statement= $pdo->prepare('SELECT * FROM users WHERE email=:email');
        $statement->setFetchMode(PDO::FETCH_CLASS,'User');
        $statement->bindValue(':email',$email);
        ($statement->execute());
        
        if ($statement->rowCount() == 0)
        {
            echo'identifiant invalide';
        } else 
        {
        //verification mot de passe
                $monUser = $statement->fetch(PDO::FETCH_ASSOC);
                var_dump($monUser);
                if (password_verify($password,$monUser['password']) || $password === $monUser['password'])
            {
                echo "Connection réussie! Bienvenue"." " . $monUser['surname']." " . $monUser['name'];
                header('location:../templates/admin.php');
                //recuperation des roles d'un utilisateur
                /* $stmt = $pdo -> prepare ('SELECT * FROM userRoles JOIN roles ON roles.id = userRoles.userId WHERE id = :id');
                $stmt ->bindValue (':id',$monUser['id']);
                $stmt->execute();

                    $role = $stmt->setFetchMode(PDO::FETCH_CLASS,'User');
                    var_dump($role);
                    print_r($role);
                    $role->getRole()['administrateur'];
                    if ($role == 'administrateur'){
                        $monUser->addRole('administrateur');
                        var_dump($monUser);
                        echo $monUser;
                        
                    }
        //verification du roles pour acceder aux pages
                if (! in_array('administrateur',$monUser))
                {
                    header('location:../templates/index.php');
                    $_SESSION['LOGGED_USER'] = 'Employé';
                    $loggedUser = ['email' => $monUser['email']];
                                setcookie('LOGGED_USER',
                                $loggedUser['email'],
                                ['expires' => time()+3600,
                                'secure' => true,]);
                } 
                else
                {
                    header('location:../templates/admin.php');
                    $_SESSION['LOGGED_USER'] = 'administrateur';
                    $loggedUser = ['email' => $monUser['email']];
                                setcookie('LOGGED_USER',
                                $loggedUser['email'],
                                ['expires' => time()+3600,
                                'secure' => true,]);
                }*/
        }
        else{
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



