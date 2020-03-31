<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="StyleSheet.css">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great|Martel:200,300,400,900|Nixie+One|Oranienbaum" rel="stylesheet">
  </head>

  <body>

    <?php
    date_default_timezone_set('America/Toronto');
      include 'Header.php';
      include 'Menu.php';
?>
<div class="content">
  <?php
      if(isset($_POST["submit"])){
        $fName = $_POST["fName"];
        $mName = $_POST["mName"];
        $lName = $_POST["lName"];
        $date = new DateTime();
        $time = $date->getTimezone();
        $message ="";


        if (date("H") < 12) {
          $dateTime = "Good Morning";
        } else {
          $dateTime = "Good Day";
        }


        if(!$fName && !$mName && !$lName){
          $message = "You did not supply any names.";
          $dateTime = "";
        } else {
          if ($fName && $mName && $lName) {
           $message = "$fName $mName $lName! Your middle name is very unique.";
         } else {
           if ($fName && !$mName && !$lName) {
             $message = "$fName! You did not provide middle and last name.";
           }
          if ($fName && !$mName && $lName) {
            $message = "$fName $lName! You did not provide middle name.";
          }
          if($message == ""){
          $message = ", Welcome to the World of PHP ";
          }
         }
        }
        $message = "$dateTime $message";
      } else {
        $message = "";
        $dateTime = "";
      }
    ?>

    <br>
    <br>
    <br>
    <div class="Form-wrapper">
      <h1>Name Form</h1>
      <br>
      <form action="" method="post">
      <p><label>First Name:</label> <input type="text" name="fName"></p>
      <p><label>Middle Name:</label> <input type="text" name="mName"></p>
      <p><label>Last Name:</label><input type="text" name="lName"></p>

      <p><label><input type="submit" name="submit"></label>
      <input type="reset" value="Reset Form"></p>
      </form>
      <?php
      echo $message;
       ?>
    </div>

    </div>
<?php
      include 'Footer.php';

    ?>

  </body>
</html>
