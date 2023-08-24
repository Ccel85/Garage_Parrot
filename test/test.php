<?php session_start(); 
include('../Session/variable.php');
include('../config/configsql.php');?>

<div class="filtres">
    <h3>Filtres:</h3>
    <div class="filter">
    <div class="price">
      <h3>Prix</h3>
      <input type="range" id="prix" name="prix" min="0 €" max="20 000€">
    </div>
    <div class="année">
      <h3>Année</h3>
      <input type="range" id="année" name="année" min="0 €" max="20 000€">
      <label for="année"></label>
    </div>
    <div class="km">
      <h3>Kilométrage</h3>
      <input type="range" id="km" name="km" min="0 €" max="20 000€">
      <label for="km"></label>
    </div>
    </div>
  </div>

  

    <div class="row">    

 <?php  
//$sql ='SELECT * FROM vehicule ORDER BY id DESC';
//$query = $mysqli->prepare($sql);
//$query->execute();
//$cars = $query->fetchAll(); 
//echo print_r($cars);
//var_dump($cars);
?>
    
  <?php

$cars = getcars($pdo);?>

<div class="row ">

<?php foreach ($cars as $key => $car) {
  include('cars.php');
}
 ?>


  <?php//foreach ($getcar as $key => $value){
    //$id = (int)$row['id'];
    //$car = getCars($pdo,$id);
   /* $id=(INT)$row['id'];
    $getcar = getCarbyId($pdo,$id);
    foreach ($getcar as $key=>$value){
    include 'cars.php';
    //var_dump($getcar);
    }*/
  ?>

    </div>
