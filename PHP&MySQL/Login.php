<?php
include "MySQLConnectionInfo.php";

if(isset($_POST["submit"])) {
  $conn = mysqli_connect($servername, $username, $password, $database);

  if (!$conn) {
    die("Connection failed: " .mysqli_connect_error());
  }

  $email = $_POST["email"];
  $password = $_POST["password"];

  mysqli_select_db($conn, $database);

  $sql = "SELECT * FROM employee WHERE EmailAddress = '".$email."' AND password =  '".$password."'";

  $result = mysqli_query($conn, $sql);
  $rowCount = mysqli_num_rows($result);

  if ($rowCount == 0) {
    $error = "***User password not found. ";
  } else {

  session_start();

  $row = mysqli_fetch_row($result);

  $_SESSION["first_name"] = $row[1];
  $_SESSION["last_name"] = $row[2];
  $_SESSION["email"] = $row[3];
  $_SESSION["phone_number"] = $row[4];
  $_SESSION["SIN"] = $row[5];
  $_SESSION["password"] = $row[6];

  header("Location:ViewAllEmployees.php");
  exit;
  }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="StyleSheet.css">
    <title>Login</title>
  </head>
  <body>
    <?php
    include 'Header.php';
    include 'Menu.php';
     ?>

    <div class="content">
      <?php if ($error){
        echo $error;
      }?>
      <form class="form" action="" method="post">
        <fieldset>
          <legend><b>Login</b></legend>
          <label>Email Address</label>
          <input type="email" name="email"/><br>
          <label>Password</label>
          <input type="password" name="password"/><br>
        </fieldset>

      <div class="bottom">
        <input type="submit" name="submit" value="submit"/>
        <br>
        <a href="CreateAccount.php">Create an account</a>
      </div>
      </form>
    </div>

    <?php
    include 'Footer.php';
    ?>
  </body>
</html>
