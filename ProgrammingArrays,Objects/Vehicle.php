<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <link rel="stylesheet" href="StyleSheet.css">
    <title>Vehicle</title>
  </head>
  <body>

  <?php
    include 'Header.php';
    include 'Menu.php';

    echo "<div class=\"content\">";

    Interface Vehicle{

      public function displayVehicleinfo();
    }

    Class LandVehicle implements Vehicle{
      protected $make = "";
      protected $model = "";
      protected $year = 0;
      protected $price = 0;

      public function __construct($make, $model, $year, $price){
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
        $this->price = $price;
      }

      public function displayVehicleinfo(){
        echo "<h3><b><u>Car</u></b></h3>";
        echo "<b>Make: </b>".$this->make;
        echo "<b>Model: </b>".$this->model;
        echo "<b>Year: </b>".$this->year;
        echo "<b>Price: </b>".$this->price;
      }
    }

    Class Car extends LandVehicle{
      private $speedLimit = 0;

      public function __construct($make, $model, $year, $price, $speedLimit){
        parent::__construct($make, $model, $year, $price);
        $this->speedLimit = $speedLimit;
      }

      public function displayVehicleinfo(){
        echo "<b>Make: </b>".$this->make.", ";
        echo "<b>Model: </b>".$this->model.", ";
        echo "<b>Year: </b>".$this->year.", ";
        echo "<b>Price: </b>".$this->price.", ";
        echo "<b>Speed Limit: </b>".$this->speedLimit.". ";
      }
    }

    Class WaterVehicle implements Vehicle{
      protected $make = "";
      protected $model = "";
      protected $year = 0;
      protected $price = 0;

      public function __construct($make, $model, $year, $price){
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
        $this->price = $price;
      }

      public function displayVehicleinfo(){
        echo "<b>Make: </b>".$make;
        echo "<b>Model: </b>".$model;
        echo "<b>Year: </b>".$year;
        echo "<b>Price: </b>".$price;
      }
    }

   Class Boat extends WaterVehicle{
     private $boatCapacity = 0;

     public function __construct($make, $model, $year, $price, $boatCapacity){
       parent::__construct($make, $model, $year, $price, $boatCapacity);
       $this->boatCapacity = $boatCapacity;
     }

     public function displayVehicleinfo(){
       echo "<b>Make: </b>".$this->make.", ";
       echo "<b>Model: </b>".$this->model.", ";
       echo "<b>Year: </b>".$this->year.", ";
       echo "<b>Price: </b>".$this->price.", ";
       echo "<b>Boat Capacity: </b>".$this->boatCapacity.". ";
     }

   }

   echo "<div style=\"border: 1px solid black; margin-top: 25px\">";
   $car1 = new Car("Toyota", "Camry", "1991", 2000, 180);
   $car2 = new Car("Honda", "Accord", "2002", 6000, 200);
   echo "<h3 style=\"font-size: 32px;margin-top: 15px;\"><b><u>Car</u></b></h3>";
   $car1->displayVehicleinfo();
   echo "<br>";
   echo "<br>";
   $car2->displayVehicleinfo();
   echo "</div>";

   echo "<br>";

   echo "<div style=\"border: 1px solid black\">";
   $boat1 = new Boat("Mitsubishi", "Turbo", 1999, 20000, 18);
   $boat2 = new Boat("Hyundai", "XT", 2012, 2600, 8);
   echo "<h3 style=\"font-size: 32px;margin-top: 15px;\"<b><u>Boat</u></b></h3>";
   $boat1->displayVehicleinfo();
   echo "<br>";
   echo "<br>";
   $boat2->displayVehicleinfo();
   echo "</div>";
?>

<?php

  echo "</div>";
  include 'Footer.php';
?>
