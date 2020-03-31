
<!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="StyleSheet.css">
      <title>Mailing List</title>
    </head>
    <body>

      <?php
      include 'db_config.php';
      include 'header.php';
      ?>

    <div id="content" class="clearfix">
        <aside>
                <h2>Mailing Address</h2>
                <h3>1385 Woodroffe Ave<br>
                    Ottawa, ON K4C1A4</h3>
                <h2>Phone Number</h2>
                <h3>(613)727-4723</h3>
                <h2>Fax Number</h2>
                <h3>(613)555-1212</h3>
                <h2>Email Address</h2>
                <h3>info@wpeatery.com</h3>
        </aside>

    <div class="main">

      <?php
      mysqli_select_db($conn, $dbname);

      $sql = "SELECT * FROM mailingList";

      $result = mysqli_query($conn, $sql);
      $rowCount = mysqli_num_rows($result);

      if ($rowCount == 0) {
      echo "<h4 style=\"color:darkred;\"><br>***There are no rows to display from the mailingList table.</h4> ";
      } else {

        // echo "<fieldset>";
        echo "<legend><h3>Database Data</h3></legend><br>";

          echo "<table>";

          for ($i=0; $i < $rowCount; ++$i) {
            $row = mysqli_fetch_row($result);
            echo "<tr><b>Full Name:  </b></tr>";
            echo "<tr>".$row[1]. " " .$row[2]."<br/></tr>";
            echo "<tr><b>E-mail Address:  </b></tr>";
            echo "<tr>".$row[4]."<br/></tr>";
            echo "<tr><b>E-mail Hash:  </b></tr>";
            echo "<tr>".$row[5]."<br/></tr>";
            echo "<tr><b>Phone Number:  </b></tr>";
            echo "<tr>".$row[3]."<br/></tr>";
            echo "<br><br>";
            }
        echo "</table>";
        // echo "</fieldset>";
      }
      ?>
      </div>
    </div>

    <?php
    include 'footer.php';
    ?>

	</body>
</html>
