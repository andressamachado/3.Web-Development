<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <link rel="stylesheet" href="StyleSheet.css">
    <title>Currency</title>
  </head>
  <body>

  <?php
    include 'Header.php';
    include 'Menu.php';

    $currencies = array (
       "CAD" => "Canadian Dollar",
       "NZD" => "New Zealand Dollar",
       "USD" => "US Dollar");
    $rates = array (
       "CAD" => 0.97645,
       "NZD" => 1.20642,
       "USD" => 1.0);

    echo "<div class=\"content\">";
  ?>

    <h2><b>Currency Converter</b></h2>
    <form class="form" action="" method="get">
      Convert <input type="text" name="amount_input"/>
      <select name="basecurr">
        <option value="CAD">Canadian Dollar</option>
        <option value="USD">US Dollar</option>
        <option value="NZD">New Zealand Dollar</option>
      </select>
      to
      <select name="destcurr">
        <option value="USD">US Dollar</option>
        <option value="NZD">New Zealand Dollar</option>
        <option value="CAD">Canadian Dollar</option>
      </select>
      <input type="submit" name="submit" value="Do It!" />
    </form>



  <?php

    if (isset($_GET["submit"])) {
      $amount_input = $_GET["amount_input"];
      $basecurr = $_GET["basecurr"];
      $destcurr = $_GET["destcurr"];
      $message = "<h3>Conversion Results</h3>";

      $converted_output = ($amount_input/$rates[$basecurr]) * $rates[$destcurr];
      echo $message;

      echo number_format((float)$amount_input, 2, ".", "") ." ". $currencies[$basecurr]."  converts to ". number_format((float)$converted_output, 2, ".", "") ." ". $currencies[$destcurr];
    }
  ?>


  <?php
    echo "</div>";
    include 'Footer.php';
  ?>
  </body>
</html>
