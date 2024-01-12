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
    
    
    