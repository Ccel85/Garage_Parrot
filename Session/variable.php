<?php
require '../config/configsql.php';

//GESTION UTILISATEUR
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
                    ['expires' => time()+3600,
                    'secure' => true,]);
            } else {
                    $_SESSION['role'] = 'Employé';
                    header('location: ../templates/index.php');
                    setcookie('session',$email,
                    ['expires' => time()+3600,
                    'secure' => true,]);
            }
        } else
        {
        echo " Mot de passe incorrect";
        } 
    }
    }

   // public static function sayHello(){

       // echo('Bonjour'. $surname . ' '. $name);
    
//}
}
    
//GESTION SERVICES
class Service
{
    private string $id;
    private string $title;
    private string $content;
        
    public function __construct($id='',$title='',$content='')
    {
    $this->id = $id;
    $this->title = $title;
    $this->content = $content;
    }

    public function getId() : string
    {
        return $this->id;
    }  
    public function getTitle() : string
    {
        return $this->title;
    }  
    public function setTitle(string $title) : void
    {
        $this->title=$title;
    }  
    public function getContent() : string
    {
        return $this->content;
    }  
    public function setContent(string $content): void
    {
        $this->content = $content;
    }  
}

   
    //fonction recuperer donnée service
function getservice(PDO $adminpdo) {
    $sql = "SELECT * FROM services ORDER BY id = :id ";
    $queryService = $adminpdo->prepare($sql);
    $queryService->bindParam(':id', $id, PDO::PARAM_INT);
    $queryService->execute();
    return $queryService->fetchAll();
    }

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
class Car
    {
        private string $modele;
        private string $energy;
        private int $km;
        private string $year;
        private string $carContent;
        private int $price;
        
            
        public function __construct($modele='',$energy='',$km='',$year='',$carContent='',$price='')
        {
        $this->modele = $modele;
        $this->energy = $energy;
        $this->km = $km;
        $this->year = $year;
        $this->carContent = $carContent;
        $this->price = $price;
        }
        
        public function getModele() : string
        {
            return $this->modele;
        }  
        public function setModele($modele) : void
        {
            $this->modele=$modele;
        }  
        public function getEnergy() : string
        {
            return $this->energy;
        }  
        public function setEnergy($energy): void
        {
            $this->energy = $energy;
        }  
        public function setKm(int $km): void
        {
            $this->km = $km;
        }  
        public function getKm(): int
        {
            return $this->km;
        }  
        public function setYear($year): void
        {
            $this->year = $year;
        }  
        public function getYear(): int
        {
            return $this->year;
        }
        public function setcarContent($carContent): void
        {
            $this->carContent = $carContent;
        }  
        public function getcarContent(): string
        {
            return $this->carContent;
        }
        public function setPrice(int $price): void
        {
            $this->price = $price;
        }  
        public function getPrice(): int
        {
            return $this->price ;
        }  
}

function getCarbyId(PDO $adminpdo){

    $getcar = $adminpdo->prepare("SELECT * FROM cars ORDER BY id = :id");
    $getcar -> bindParam (':id',$id, PDO::PARAM_INT);
    $getcar->execute();
    return $getcar->fetchAll();
}
/*
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
//fonction recuperer image vehicule
    function getCarImage(string|null $image) {
        if ($image === null) {
            return '../img/img_clio_1.png';
        } else {
            return $image['image'];
        }
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
    
    */

    //GESTION HORAIRES
class Horaire
{
    private string $day;
    private string $heureDebutAm;
    private string $heureFinAm;
    private string $heureDebutPm;
    private string $heureFinPm;
        
    public function __construct($day='',$heureDebutAm='',$heureFinAm='',$heureDebutPm='',$heureFinPm='')
    {
    $this->day = $day;
    $this->heureDebutAm = $heureDebutAm;
    $this->heureFinAm = $heureFinAm;
    $this->heureDebutPm = $heureDebutPm;
    $this->heureFinPm = $heureFinPm;
    }

    public function getDay() : string
    {
        return $this->day;
    }  
    public function getHeureDebutAm() : string
    {
        return $this->heureDebutAm;
    }  
    public function setHeureDebutAm(string $heureDebutAm) : void
    {
        $this->heureDebutAm=$heureDebutAm;
    }  
    public function getHeureFinAm() : string
    {
        return $this->heureFinAm;
    }  
    public function setHeureFinAm(string $heureFinAm) : void
    {
        $this->heureFinAm=$heureFinAm;
}
public function getHeureDebutPm() : string
    {
        return $this->heureDebutPm;
    }  
    public function setHeureDebutPm(string $heureDebutPm) : void
    {
        $this->heureDebutPm=$heureDebutPm;
    }
    public function getHeureFinPm() : string
    {
        return $this->heureFinPm;
    }  
    public function setHeureFinPm(string $heureFinPm) : void
    {
        $this->heureFinPm=$heureFinPm;
    }
}
function getHoraire(PDO $adminpdo){

    $getHoraire = $adminpdo->prepare("SELECT * FROM horaires ORDER BY id = :id");
    $getHoraire -> bindParam (':id',$id, PDO::PARAM_INT);
    $getHoraire->execute();
    return $getHoraire->fetchAll(PDO::FETCH_CLASS, 'Horaire');
}
