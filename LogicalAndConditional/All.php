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
  <h3>99 Bottles of beer on the Wall</h3>
  <?php
      $counter = 99;

      do {

        echo "$counter bottles of beer on the wall...<br>";
        echo "You take one down you pass it aroud...<br>";
        $counter--;
        echo "$counter bottles of beer on the wall.<br>";
        echo "<br>";

        if ($counter == 0) {
          echo "There are no more bottles of beer.<br>";
        }

      } while ($counter > 0);
     ?>
      </div>

      <?php
      include 'Footer.php';
    ?>

  </body>
</html>
