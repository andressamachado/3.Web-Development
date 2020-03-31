<?php
include "MySQLConnectionInfo.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="StyleSheet.css">
    <title>Employee</title>

    <script>
      function showEmployee(str){
         if (str == "") {
           document.getElementById("txtHint").innerHTML = "";
           return;
        } else {
          if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
          } else {
            // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML =this.responseText;
              }
            };
            xmlhttp.open("GET","GetEmployee.php?q="+str,true);
            xmlhttp.send();
          }
        }
    </script>
  </head>

  <body>
    <?php
      include 'Header.php';
      include 'Menu.php';
    ?>
    <div class="content">
      <?php
        $connection = mysqli_connect($servername, $username, $password, $database);

        if (!$connection) {
          die("Connection failed: " .mysqli_connect_error());
        }

        mysqli_select_db($connection, $database);

        $sql = "SELECT * FROM employee";
        $result = mysqli_query($connection, $sql);
        $rowCount = mysqli_num_rows($result);
      ?>

      <div class="selection">
        <fieldset>

          <form>
            <select name="Employee" onchange="showEmployee(this.value)">

              <?php if ($rowCount == 0) { ?>
                      <option value="empty">Database is empty</option>
                    </select>
                  </fieldset>
              <?php } else {
                      echo "<option value =\"\"> Select an employee </option>";
                      for($i = 0; $i < $rowCount; ++$i) {
                        $row = mysqli_fetch_row($result);
                        echo "<option value = \"$row[0]\">" .$row[1]. " " .$row[2]."</option>";
                      }
                    }
              ?>
            </select>
          </form>
          <br />
          <div id="txtHint"><b>Detailed Employee information will be displayed in this section.</b></div>
        </fieldset>
      </div>

      </div>
      <?php
        include 'Footer.php';
      ?>

  </body>
</html>
