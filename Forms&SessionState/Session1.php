<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="StyleSheet.css">
    <title>Input</title>
  </head>
  <body>

    <?php
      include 'Header.php';
      include 'Menu.php';
    ?>
    <div class="content">
      <div class="div_left">

        <form class="form" action="Session2.php" method="get">
          <div class="Personal_div">
              <fieldset>
                <legend><b>Personal Information</b></legend>
                  <label>First Name</label>
                  <input type="text" name="first_name"/><br>
                  <label>Last Name</label>
                  <input type="text" name="last_name"/><br>
                  <label>Telephone Number</label>
                  <input type="tel" name="phone_number"/><br>
                  <label>Email</label>
                  <input type="email" name="email"/><br>
                  <label>Birth Day</label>
                  <input type="date" name="date"/><br>
                </fieldset>
            </div>

          <div class="Profession_div">
                <fieldset>
                  <legend><b>Profession</b></legend>
                  <input type="radio" name="Profession" value="Student">Student<br>
                  <input type="radio" name="Profession" value="Doctor">Doctor<br>
                  <input type="radio" name="Profession" value="Farmer">Farmer<br>
                  <input type="radio" name="Profession"
                  value="Engineer">Engineer<br>
            </fieldset>
          </div>

          <div class="Favourite_div">
              <fieldset>
                <legend><b>Favourite Sports</b></legend>
                <select name="Sports[]" multiple>
                  <option value="hockey">Hockey</option>
                  <option value="Football">Football</option>
                  <option value="Carling">Carling</option>
                  <option value="Tennis">Tennis</option>
                </select>
              </fieldset>
          </div>

        <div class="bottom">
          <input type="submit" name="submit" value="Submit"/>
          <input type="reset" name="reset" value="Reset"/>
        </div>
      </form>

    </div>

    <div class="div_right">
      <div class="echo-wrapper">

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

          }?>

      </div>
    </div>
  </div>

    <?php
      include 'Footer.php';
    ?>
  </body>
</html>
