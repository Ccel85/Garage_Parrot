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
}