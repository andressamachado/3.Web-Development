<?php
  $q = intval($_GET['q']);

  include "MySQLConnectionInfo.php";

  $connection = mysqli_connect($servername, $username, $password, $database);

  if (!$connection) {
    die("Connection failed: " .mysqli_connect_error());
  }

  mysqli_select_db($connection,"andressa_cst8238");
  $sql = "SELECT * FROM employee WHERE EmployeeId = '".$q."'";
  $result = mysqli_query($connection, $sql);


  echo "<table>
  <tr>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Email Address</th>
  <th>Telephone Number</th>
  <th>Social Insurance Number</th>
  <th>password</th>
  </tr>";

  while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" .$row['FirstName']. "</td>";
    echo "<td>" .$row['LastName']. "</td>";
    echo "<td>" .$row['EmailAddress']. "</td>";
    echo "<td>" .$row['TelephoneNumber']. "</td>";
    echo "<td>" .$row['SocialInsuranceNumber']. "</td>";
    echo "<td>" .$row['PASSWORD']. "</td>";
    echo "</tr>";
  }

  echo "</table>";
  mysqli_close($connection);
  ?>
