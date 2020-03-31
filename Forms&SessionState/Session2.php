<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="StyleSheet.css">
    <title>Session 2</title>
  </head>

  <body>

    <?php
      include 'Header.php';
      include 'Menu.php';
    ?>

    <div class="content">

      <div class="session2_wrapper">

        <?php
          if(isset($_GET["submit"])) {
            $first_name = $_GET["first_name"];
            $last_name = $_GET["last_name"];
            $phone_number = $_GET["phone_number"];
            $email = $_GET["email"];
            $date = $_GET["date"];

            echo "<b><u>Personal Information</u></b><br><br>";
            echo "<b>First Name:</b> " .$first_name. "<br>";
            echo "<b>Last Name:</b> " .$last_name. "<br>";
            echo "<b>Telephone Number:</b> " .$phone_number. "<br>";
            echo "<b>E-mail:</b> " .$email. "<br>";
            echo "<b>Birth Day:</b>" .$date. "<br>";

            echo "<br><br>";

            if (isset($_GET["Profession"])) {
              echo "<b><u>Profession</u></b>";
              echo "<br><br>";
              echo $_GET["Profession"];
            }else {
              echo "<b><u>Profession was not selected</u></b>";
            }

            echo "<br><br><br>";

            echo "<b><u>Favourite Sports</u></b>";
            echo "<br><br>";
            foreach ($_GET["Sports"] as $select) {
              echo $select. "<br>";
            }
          }

       ?>

     </div>
  </div>

   <?php
     include 'Footer.php';
   ?>

 </body>
</html>
