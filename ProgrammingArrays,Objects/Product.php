<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <link rel="stylesheet" href="StyleSheet.css">
    <title>Product</title>
  </head>
  <body>

<?php
  include 'Header.php';
  include 'Menu.php';

  $Products = array(
    array("Category" => "Printer", "Brand" => "Epson", "Quantity" => 100, "Price" => 2500),
    array("Category" => "Printer", "Brand" => "Canon", "Quantity" => 100, "Price" => 3000),
    array("Category" => "Printer", "Brand" => "Xerox", "Quantity" => 500, "Price" => 2000),
    array("Category" => "Laptop", "Brand" => "Apple", "Quantity" => 200, "Price" => 2000),
    array("Category" => "Laptop", "Brand" => "HP", "Quantity" => 300, "Price" => 1500),
    array("Category" => "Laptop", "Brand" => "Toshiba", "Quantity" => 100, "Price" => 1200),
    array("Category" => "TV", "Brand" => "Samsung", "Quantity" => 500, "Price" => 1200),
    array("Category" => "TV", "Brand" => "LG", "Quantity" => 500, "Price" => 1050),
    array("Category" => "TV", "Brand" => "Sony", "Quantity" => 200, "Price" => 1000)
  );


  echo "<div class=\"content\">";
  echo "<h3>Task 2: Structure of the \$Product array.</h3>";
  var_dump($Products);
  echo "<br>";

  echo "<h3>Task 3: Elements of the \$Product array.</h3>";
  $lastCategory = '';
  foreach ($Products as $key => $value) {
    if( $Products[$key]["Category"] != $lastCategory) {
      $lastCategory = $Products[$key]["Category"];
      echo "<b><u>".$Products[$key]["Category"]."</u></b><br>";
    }
    foreach ($Products[$key] as $prod_key => $prod_value) {
      if($prod_key != "Category"){
        echo "$prod_key : $prod_value <br>";
    }
  }
    echo "<br>";
  }

  echo "<h3>Task 4: HTML Table of the \$Product array.</h3>";
  echo "<table cellpadding='10' cellspacing'10' border='1'>";
  echo "<tr><th>Category</th> <th>Brand</th> <th>Quantity</th> <th>Price</th></tr>";

  $lastCategory = '';
  foreach ($Products as $key => $value) {
    if( $Products[$key]["Category"] != $lastCategory) {
      $lastCategory = $Products[$key]["Category"];
      echo "<tr><td>".$Products[$key]["Category"]."</td>";
    } else {
      echo "<tr><td></td>";
    }
    foreach ($Products[$key] as $prod_key => $prod_value) {
      if($prod_key != "Category"){
        echo "<td>$prod_value</td>";
      }
    }
    echo "</tr>";
  }
  echo "</table>";

  echo "</div>";

  include 'Footer.php';
?>

  </body>
</html>
