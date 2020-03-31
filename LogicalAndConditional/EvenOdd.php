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
      include 'Header.php';
      include 'Menu.php';
?>

<div class="content">
  <h3>99 Even or Odd Bottles of beer on the Wall</h3>
  <?php
      $counter = 99;

      do {
        if($counter == 1){
          echo "$counter bottle of beer can serve ONLY ONE guest";
        } else {
          if ($counter % 2 == 0) {
            echo "$counter bottles of beer can serve even number of guests<br>";
          } else {
            echo "$counter bottles of beer can serve odd number of guests<br>";
          }
        }
          $counter--;
      } while ($counter > 0);
?>

  </div>
  <?php
        include 'Footer.php';
    ?>

  </body>
</html>
