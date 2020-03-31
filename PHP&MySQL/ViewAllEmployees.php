<?php
include "MySQLConnectionInfo.php";
?>

<!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="StyleSheet.css">
      <title>Employees</title>
    </head>
    <body>

    <?php
      include 'Header.php';
      include 'Menu.php';
    ?>

    <div class="content  ">
      <?php
        session_start();
        if(isset($_SESSION["email"])){
      ?>

  <fieldset>
    <legend><h3>Session State Data</h3></legend>
    <?php
    echo "<br>First Name: ".$_SESSION["first_name"];
    echo "<br>Last Name: ".$_SESSION["last_name"];
    echo "<br>E-mail: " .$_SESSION["email"];
    echo "<br>Phone Number: " .$_SESSION["phone_number"];
    echo "<br>SIN: " .$_SESSION["SIN"];
    echo "<br>Password: " .$_SESSION["password"];

    echo "</fieldset>";

   ?>

   <?php
      $conn = mysqli_connect($servername, $username, $password, $database);

      if (!$conn) {
        die("Connection failed: " .mysqli_connect_error());
      }

      mysqli_select_db($conn, $database);

      $sql = "SELECT * FROM employee";

      $result = mysqli_query($conn, $sql);
      $rowCount = mysqli_num_rows($result);

      if ($rowCount == 0) {
        echo "***There are no rows to display from the employee table. ";
      } else {

        echo "<fieldset>";
        echo "<legend><h3>Database Data</h3></legend>";

          echo "<table>";

          echo "<tr>";
          echo "<th>First Name</th>";
          echo "<th>Last Name</th>";
          echo "<th>E-mail Address</th>";
          echo "<th>Phone Number</th>";
          echo "<th>SIN</th>";
          echo "<th>Password</th>";
          echo "</tr>";
          for ($i=0; $i < $rowCount; ++$i) {
            $row = mysqli_fetch_row($result);
              echo "<tr>";
    					echo "<td>".$row[1]."<br/></td>";
              echo "<td>".$row[2]."<br/></td>";
              echo "<td>".$row[3]."<br/></td>";
              echo "<td>".$row[4]."<br/></td>";
              echo "<td>".$row[5]."<br/></td>";
              echo "<td>".$row[6]."<br/></td>";
  					  echo "</tr>";
        }
        echo "</table>";
        echo "</fieldset>";
      }
      session_destroy();
    } else {

      echo "<br><br><br>***No user logged in";
          }


      ?>

      </div>

    <?php
    include 'Footer.php';
    ?>
	</body>
</html>
