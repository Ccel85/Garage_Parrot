<?php
require '../config/configsql.php';

            /*GESTION UTILISATEUR*/
class User 
{
    private string $id;
    private string $email;
    private string $password;
    private string $name;
    private string $surname;
  //tableau des roles
    private array $roles = [];
    
    public function __construct(
    $id='',
    $email='',
    $password='',
    $name='',
    $surname='',
    $roles=[])
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

    // CONNECTION ,VERIFICATION MDP ET ROLE
    public static function connect(PDO $pdo,string $email,string $password) 
    {
    //session_start();
    //Recuperation des données de la table Users
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
            $_SESSION['email'] = $monUser['email'];
            $_SESSION['role'] = $monUser['role'];

        if ($_SESSION['role'] === 'Employé') {
            header('location: ../templates/employes.php');
        } else {
            $_SESSION['role'] = 'Administrateur';
            header('location: ../templates/admin.php');
        }   
    //  cookie de session 
        setcookie('session', $email, [
            'expires' => time() + 3600,
            'secure' => true,
            ]);
        }
        else
        {
        echo " Mot de passe incorrect";
        } 
    }
}
}
//RECUPERATION DES UTILISATEURS
function getUsers($adminpdo){
try {
    // Utilisation d'une requête préparée pour éviter les injections SQL
        $statement= $adminpdo->prepare('SELECT * FROM users ');
        $statement->setFetchMode(PDO::FETCH_CLASS,'User');
        $statement->execute();
    // Récupération des résultats
    $bddUsers =  $statement->fetchAll(PDO::FETCH_ASSOC);
    // Fermeture de la connexion à la base de données
    //$adminpdo = null;
    return $bddUsers;

} catch (PDOException $e) {
    // Gestion des erreurs de connexion à la base de données
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}
}
    
    /*GESTION SERVICES*/

class Service
{
    private string $id;
    private string $title;
    private string $content;
    private string $serviceFile;
        
    public function __construct($title,$content,$serviceFile)
    {
    
    $this->title = $title;
    $this->content = $content;
    $this->serviceFile = $serviceFile;
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
    public function getFile() : string
    {
        return $this->serviceFile;
    }   
    public function setFile(string $serviceFile): void
    {
        $this->serviceFile = $serviceFile;
    } 
}
//RECUPERER DONNEES SERVICES
function getservice(PDO $adminpdo) {
    $sql = "SELECT * FROM services ORDER BY id = :id ";
    $queryService = $adminpdo->prepare($sql);
    $queryService->bindParam(':id', $id, PDO::PARAM_INT);
    $queryService->execute();
    return $queryService->fetchAll();
    }
    


    /* GESTION DES VEHICULES*/
class Car
    {
        private string $id;
        private string $modele;
        private string $energy;
        private int $km;
        private string $year;
        private string $carContent;
        private int $price;
        private array $files;
        
            
        public function __construct($modele='',$energy='',$km='',$year='',$carContent='',$price='',array $files=[])
        {
        $this->modele = $modele;
        $this->energy = $energy;
        $this->km = $km;
        $this->year = $year;
        $this->carContent = $carContent;
        $this->price = $price;
        $this->files = $files;
        }
        public function getId() : string
        {
            return $this->id;
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
        public function getFile(): array
        {
            return $this->files ;
        }  
}
//RECUPERER LES ANNONCES VOITURES
function getCar(PDO $adminpdo){

    $getcar = $adminpdo->prepare("SELECT * FROM cars ORDER BY id = :id");
    $getcar -> bindParam (':id',$id, PDO::PARAM_INT);
    $getcar->execute();
    return $getcar->fetchAll();
}
//RECUPERATION D'UNE ANNONCE VOITURES
function getCarById(PDO $adminpdo,$id){
        try {
            // Utilisation d'une requête préparée pour éviter les injections SQL
            $query = "SELECT * FROM cars WHERE id = :id";
            $statement = $adminpdo->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();    
            // Récupération des résultats
            $carDetails = $statement->fetch(PDO::FETCH_ASSOC);
            // Fermeture de la connexion à la base de données
            $adminpdo = null;

            return $carDetails;

        } catch (PDOException $e) {
            // Gestion des erreurs de connexion à la base de données
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }
    
//RECUPERER IMAGE VEHICULE
function getCarImages(?array $carImages) {
    if ($carImages === null || empty($carImages)) {
        return '../img/img_clio_1.png';
    }
    // Retournez la première image de la liste
    return ($carImages);
}
// Utilisation de la fonction
$carImages = getCarImages([
    "1" => "../assets\img/1-jeepcompass\W102834019_STANDARD_1.jpg",
    "2" => "../assets\img/2-audirs4\E113347647_STANDARD_1.jpg",
    "3" => "../assets\img/3-renaultespace\E112536985_STANDARD_2.jpg",
    "4" => "../assets\img/4-dacia\E113210533_STANDARD_1.jpg"
]);

//RECUPERER LE FICHIER IMAGE

    // Chemin du répertoire où se trouvent les images
function getImages($cheminRepertoire){
    $cheminRepertoire = '../assets/img';
        // Liste des fichiers et dossiers dans le répertoire
    $contenuRepertoire = scandir($cheminRepertoire);
        // Filtrer les résultats pour ne conserver que les dossiers (en excluant . et ..)
    $dossiersImages = array_filter($contenuRepertoire, function ($element) use ($cheminRepertoire) {
        return is_dir($cheminRepertoire . '/' . $element) && !in_array($element, ['.', '..']);
    });
     //Afficher le tableau des dossiers
    if (!empty($dossiersImages)) {
        foreach ($dossiersImages as $dossier) {
            echo '<h2>Dossier : ' . $dossier . '</h2>';
        // Obtenir la liste des fichiers dans le dossier
            $cheminDossier = $cheminRepertoire . '/' . $dossier;
            $contenuDossier = scandir($cheminDossier);
            // Filtrer les résultats pour ne conserver que les fichiers (en excluant . et ..)
            $fichiersImage = array_filter($contenuDossier, function ($element) use ($cheminDossier) {
                return is_file($cheminDossier . '/' . $element) && !in_array($element, ['.', '..']);
            });
        }
    }
}

 // RECUPERER INFO VEHICULE PAR ID
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
//NOMBRE D'ANNONCES DE VEHICULES
    function numberCars(PDO $adminpdo){
    try{
    // Préparation de la requête SQL
    $query = $adminpdo->prepare("SELECT COUNT(*) AS total_cars FROM cars");
    // Exécution de la requête
    $query->execute();
    // Récupération du nombre total de produits
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $totalCars = $result['total_cars'];
    return $totalCars;
    } catch (PDOException $e) {
    // Gestion des erreurs de connexion à la base de données
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
    }
    //RECUPERER VALEUR MIN MAX DE RANGE
function minMaxRange(PDO $adminpdo){
    // Exemple de requête pour obtenir les valeurs minimales et maximales
    $requete = "SELECT MIN(price) AS min_prix, MAX(price) AS max_prix, 
    MIN(year) AS min_annee, MAX(year) AS max_annee,
    MIN(km) AS min_km, MAX(km) AS max_km
    FROM cars";
    $resultat = $adminpdo->query($requete);
    // Vérifier la réussite de la requête
    if ($resultat) {
    return  $resultat->fetch(PDO::FETCH_ASSOC);
    } else {
    // Gérer l'erreur de la requête
    die("Erreur dans la requête : " . $adminpdo->errorInfo()[2]);
    }
    }

            /*GESTION HORAIRES*/

class Horaire
{
    private int $id;
    private string $day;
    private string $heure_debut_am;
    private string $heure_fin_am;
    private string $heure_debut_pm;
    private string $heure_fin_pm;
    
        public function __construct(
            //int $id  ,
            string $day ='',
            string $heure_debut_am ='' ,
            string $heure_fin_am = '',
            string $heure_debut_pm = '',
            string $heure_fin_pm = ''
        ) {
           // $this->id = $id;
            $this->day = $day;
            $this->heure_debut_am = $heure_debut_am;
            $this->heure_fin_am = $heure_fin_am;
            $this->heure_debut_pm = $heure_debut_pm;
            $this->heure_fin_pm = $heure_fin_pm;
        }
    
    public function getDay(): string
    {
        return $this->day;
    }

    public function getHeureDebutAm(): string
    {
        return $this->heure_debut_am;
    }
    public function setHeureDebutAm(string $heure_debut_am): void
    {
        $this->heure_debut_am = $heure_debut_am;
    }

    public function getHeureFinAm(): string
    {
        return $this->heure_fin_am;
    }

    public function setHeureFinAm(string $heure_fin_am): void
    {
        $this->heure_fin_am = $heure_fin_am;
    }

    public function getHeureDebutPm(): string
    {
        return $this->heure_debut_pm;
    }

    public function setHeureDebutPm(string $heure_debut_pm): void
    {
        $this->heure_debut_pm = $heure_debut_pm;
    }

    public function getHeureFinPm(): string
    {
        return $this->heure_fin_pm;
    }

    public function setHeureFinPm(string $heure_fin_pm): void
    {
        $this->heure_fin_pm = $heure_fin_pm;
    }
}
//RECUPERER LES HORAIRES EN BDD     
    function getHoraire(PDO $adminpdo){
    $getHoraire = $adminpdo->prepare("SELECT *, DATE_FORMAT(heure_debut_am,'%H/%i') FROM horaires ORDER BY id = :id");
    $getHoraire -> bindParam (':id',$id, PDO::PARAM_INT);
    $getHoraire->execute();
    return $getHoraire->fetchAll();

}

/* GESTION DES MESSAGES */
class Message
{
    private string $id;
    private string $name;
    private string $surname;
    private string $email;
    private string $phone;
    private string $message;
    private string $date;
        
    public function __construct($id='',$email='',$phone='',$message='',$date='')
    {
    $this->id = $id;
    $this->email = $email;
    $this->phone = $phone;
    $this->message = $message;
    $this->date = $date;
    }

    public function getId() : string
    {
        return $this->id;
    }  
    public function getEmail() : string
    {
        return $this->email;
    }  
    public function getPhone() : string
    {
        return $this->phone;
    }  
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }  
    public function getMessage() : string
    {
        return $this->message;
    }  
    public function getDate() : string
    {
        return $this->date;
    }  
    
}

//RECUPERER MESSAGES SANS ARCHIVAGE
function getMessages(PDO $adminpdo) {
    $sql = "SELECT * FROM message WHERE archive = :archive ORDER BY id ";
    $archivage = '';
    $sql = $adminpdo->prepare($sql);
    $sql->bindParam(':archive', $archivage);
    $sql->execute();
    return $sql->fetchAll();
    }

// RECUPERER LES 5 DERNIERS MESSAGES
    function getLastMessage(PDO $adminpdo) {
        $sql = "SELECT * FROM message WHERE archive = :archive ORDER BY id DESC LIMIT 0,5";
        $queryService = $adminpdo->prepare($sql);
        $queryService->bindValue(':archive','');
        $queryService->execute();
        return  $queryService->fetchAll();
        }

// INSERER LES MESSAGES EN BDD
function insertMessage(PDO $adminpdo){
    // Reecriture des variables
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $message = $_POST["message"];
        $date =date('Y-m-d');
        $archive = '';
        try{
        // requete mise à jour donnée
        $sql = $adminpdo->prepare(
            "INSERT INTO `garageparrot`.`message` (name, surname, email, phone, message, date, archive)
            VALUES (:name, :surname, :email, :phone, :message, :date, :archive)"
        );
        $sql->bindParam(':name', $name);
        $sql->bindParam(':surname', $surname);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':phone', $phone);
        $sql->bindParam(':message', $message);
        $sql->bindParam(':date', $date);
        $sql->bindParam(':archive', $archive);
        $sql->execute();
        if (!$sql) {
            echo "La modification a échoué. ";
            }  else {
                echo "<div class='alert alert-success'>
                <h1>Le message a bien été envoyé, nous vous répondrons rapidement!</h1>
                
            </div>";    
            }
        } catch (PDOException $e) {
        
            echo 'Erreur lors de la modification : '.$e->getMessage();
        }
        }

//AFFICHER LE NOMBRE DE MESSAGE
    function numbermessage(PDO $adminpdo){
    try{
        // Préparation de la requête SQL
        $query = $adminpdo->prepare("SELECT COUNT(*) AS total_message FROM message WHERE archive = :archive");
        $query -> bindValue(':archive','');
        // Exécution de la requête
        $query->execute();
        
        // Récupération du nombre total de produits
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $totalMessage = $result['total_message'];
        return $totalMessage;

        } catch (PDOException $e) {
            // Gestion des erreurs de connexion à la base de données
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

//INTEGRER NOTION ARCHIVE AU MESSAGE EN BDD
function checkMessage($adminpdo){
    if(isset($_POST['validerArchive']) && isset($_POST['archive']))  {
            // Récupérer les ID des messages sélectionnés
            foreach ($_POST['archive'] as $email => $archive) {
                // Vérifier si la checkbox est cochée
                if ($archive == 'Y') {
            try{
                $sql = $adminpdo->prepare('UPDATE `garageparrot`.`message` SET archive = :archive WHERE email = :email');
                $sql->bindParam(':email', $email);
                $sql->bindValue(':archive', 'Y');
                $sql->execute();
            // Vérifiez si la mise à jour a réussi
                if ($sql->rowCount() > 0) {
                    echo "L'archivage a été effectué";
                } else {
                    echo "La modification a échoué pour l'ID : $email.";
                }
            } catch (PDOException $e) {
            // Gestion des erreurs de connexion à la base de données
                die('Erreur de connexion à la base de données : ' . $e->getMessage());
            }
        }
    }
}
};

//RECUPERER LES MESSAGES ARCHIVES
    function messageArchive($adminpdo){
        try{
        // Préparation de la requête SQL
            $query = $adminpdo->prepare("SELECT * FROM `garageparrot`.`message` WHERE archive=:archive");
            $archiveValue = 'Y';
            $query->bindParam(':archive', $archiveValue);
        // Exécution de la requête
            $query->execute();
            $messageArchive = $query->fetchAll();
            return $messageArchive;
            
            } catch (PDOException $e) {
        // Gestion des erreurs de connexion à la base de données
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
            }
        }

/*GESTION DES AVIS */

//RECUPERATION DE TOUTES LES AVIS ARCHIVES
function checkComments($adminpdo){
    try{
    $sql = $adminpdo->prepare('SELECT * FROM comments WHERE archive =:archive');
    $archiveValue = 'Y';
    $sql->bindParam(':archive', $archiveValue);
    $sql->execute();
    $comments = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $comments;
    } catch (PDOException $e) {
        // Gestion des erreurs de connexion à la base de données
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
} 

//RECUPERATION DES AVIS NOTE>4
function ratingComments($adminpdo){
    try{
        $sql = $adminpdo->prepare('SELECT * FROM comments WHERE rating > :rating ORDER BY date DESC LIMIT 0,4');
    $ratingValue = '3';
    $sql->bindParam(':rating', $ratingValue);
    $sql->execute();
    $comments = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $comments;
    } catch (PDOException $e) {
        // Gestion des erreurs de connexion à la base de données
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
} 

//AJOUTER LA NOTION D'ARCHIVE POUR LES AVIS EN BDD
function hideComments($adminpdo){
    if(isset($_POST['valideComments']) && isset($_POST['action']))  {
        foreach ($_POST['action'] as $idComment => $action){
            try{
                $sql = $adminpdo->prepare('UPDATE `garageparrot`.`comments` SET publication = :publication WHERE id = :id');
                $sql->bindParam(':id', $idComment);
                $sql->bindValue(':publication', $action);
                $sql->execute();
                // Vérifiez si la mise à jour a réussi
                if ($sql->rowCount() > 0) {
                    echo "<div class='alert alert-success'>
                    <h1>Requête validée !</h1>
                    <p>La mise à jour a bien été effectuée !</p>
                </div>";                    
                exit();
            } 
            } catch (PDOException $e) {
                // Gestion des erreurs de connexion à la base de données
                die('Erreur de connexion à la base de données : ' . $e->getMessage());
            }
        }
    }
}
//RECUPERATION DE TOUS LES AVIS
function getComments($adminpdo){
    try{
    $sql = $adminpdo->prepare('SELECT * FROM comments ORDER BY id' );
    $sql->execute();
    $comments = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $comments;
    } catch (PDOException $e) {
        // Gestion des erreurs de connexion à la base de données
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
} 
//AFFICHER LE NOMBRE D'AVIS
function numberComments(PDO $adminpdo){
    try{
        // Préparation de la requête SQL
        $query = $adminpdo->prepare("SELECT COUNT(*) AS total_comments FROM comments");
        // Exécution de la requête
        $query->execute();
        // Récupération du nombre total de produits
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $totalcomments = $result['total_comments'];
        return $totalcomments;
        } catch (PDOException $e) {
            // Gestion des erreurs de connexion à la base de données
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

?>


