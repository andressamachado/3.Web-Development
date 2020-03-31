<?php

  include 'MySQLConnectionInfo.php';

  if(isset($_POST["submit"])) {
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
      die("Connection failed: " .mysqli_connect_error());
    }

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone_number"];
    $SIN = $_POST["SIN"];
    $password = $_POST["password"];

    mysqli_select_db($conn, $database);

    $sql = "INSERT INTO employee (FirstName, LastName, EmailAddress, TelephoneNumber, SocialInsuranceNumber, PASSWORD) VALUES ('" .$first_name. "', '" .$last_name. "', '" .$email. "', '" .$phone. "', '" .$SIN. "', '" .$password."')";

    if (mysqli_query($conn, $sql)) {
      session_start();

      $_SESSION["first_name"] = $first_name;
      $_SESSION["last_name"] = $last_name;
      $_SESSION["email"] = $email;
      $_SESSION["phone_number"] = $phone;
      $_SESSION["SIN"] = $SIN;
      $_SESSION["password"] = $password;
      header("Location:ViewAllEmployees.php");

    } else {
     echo "Error: "  . $sql. "<br>". mysqli_error($connection);
    }

    mysqli_close($conn);
  }
?>
<!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="StyleSheet.css">
      <title>Creaate an Account</title>
    </head>
    <body>

<?php
include 'Header.php';
include 'Menu.php';
 ?>
    <div class="content">
      <form class="form" action="" method="post">
        <fieldset>
          <legend><b>Create your new account</b></legend>
          Please, fill in all information.
          <label>First Name</label>
          <input type="text" name="first_name"/><br>
          <label>Last Name</label>
          <input type="text" name="last_name"/><br>
          <label>Email</label>
          <input type="email" name="email"/><br>
          <label>Telephone Number</label>
          <input type="tel" name="phone_number"/><br>
          <label>SIN</label>
          <input type="number" name="SIN"/><br>
          <label>Password</label>
          <input type="password" name="password"/><br>
        </fieldset>

        <div class="bottom">
          <input type="submit" name="submit" value="Submit"/>
        </div>

      </form>
    </div>

    <?php
      include 'Footer.php';
    ?>

  </body>
</html>
