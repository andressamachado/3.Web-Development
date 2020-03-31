<?php
include("db_config.php");
include("header.php");

function create_emailaddress_hash($emailAddress){
  return base64_encode($emailAddress);
}


 if(isset($_POST["btnSubmit"])) {

   if (isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["phoneNumber"]) && isset($_POST["emailAddress"]) && isset($_POST["username"]) && isset($_POST["referral"])) {

     if ($_POST["firstName"]=="" || $_POST["lastName"]=="" || $_POST["phoneNumber"]=="" ||  $_POST["emailAddress"]=="" || $_POST["username"]=="" ||  $_POST["referral"] =="") {

       echo "<h4 style=\"color:darkred;\"><br>***You must fill the form in order to sign up.</h4>";

     } else if ($_POST["firstName"]=="" && $_POST["lastName"]=="" && $_POST["phoneNumber"]=="" &&  $_POST["emailAddress"]=="" && $_POST["username"]=="" &&  $_POST["referral"] =="") {

       echo "<h4 style=\"color:darkred;\"><br>***You must fill the form in order to sign up.<h4>";
     } else {

     $firstName = $_POST["firstName"];
     $lastName = $_POST["lastName"];
     $phoneNumber = $_POST["phoneNumber"];
     $emailAddress = $_POST["emailAddress"];
     $emailHash = create_emailaddress_hash($emailAddress);
     $userName = $_POST["username"];
     $referrer = $_POST["referral"];

     mysqli_select_db($conn, $dbname);

     $query = "SELECT * FROM mailingList WHERE emailAddress = '" .$emailAddress."'";

     $result = mysqli_query($conn, $query);
     $rowCount = mysqli_num_rows($result);

     if ($rowCount == 0) {
       $query = "INSERT INTO mailingList (firstName, lastName, phoneNumber,emailAddress, emailHash, username, referrer) VALUES('" .$firstName. "', '" .$lastName. "', '" .$phoneNumber. "', '" .$emailAddress. "', '" .$emailHash. "', '" .$username. "', '" .$referrer."')";

       $result = mysqli_query($conn, $query);

       if ($result) {
         echo "<h4 style=\"color:darkred;\"><br> Your data has been successfully saved in our database!</h4>";
       } else {
         echo "<h4 style=\"color:darkred;\"><br>***Error: <br>" .mysqli_error($conn). "</h4>";
       }


     } else {
        $row = mysqli_fetch_row($result);

        echo "<h4 style=\"color:darkred;\"><br>***This email address is already registered in our database.</h4> <br><br>";

        echo "Please, update the following information:<br>";

        if ($row[1] != $firstName) {
          echo "First Name<<br>";
        }
        if ($row[2] != $lastName) {
          echo "Last Name<br>";
        }
        if ($row[3] != $phoneNumber) {
          echo "Phone Number<br>";
        }
        if ($row[6] != $username) {
          echo "Username<br>";
        }
        if ($row[7] != $referrer) {
          echo "Referral<br>";
        }
      }
    }
  }
}
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
                    <h1>Sign up for our newsletter</h1>
                    <p>Please fill out the following form to be kept up to date with news, specials, and promotions from the WP eatery!</p>
                    <form name="frmNewsletter" id="frmNewsletter" method="post">
                        <table>
                            <tr>
                                <td>First Name:</td>
                                <td><input type="text" name="firstName" id="customerfName" size='40'></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><input type="text" name="lastName" id="customerlName" size='40'></td>
                            </tr>
                            <tr>
                                <td>Phone Number:</td>
                                <td><input type="text" name="phoneNumber" id="phoneNumber" size='40'></td>
                            </tr>
                            <tr>
                                <td>Email Address:</td>
                                <td><input type="text" name="emailAddress" id="emailAddress" size='40'>
                            </tr>
                             <tr>
                                <td>Username:</td>
                                <td><input type="text" name="username" id="username" size='20'>
                            </tr>
                            <tr>
                                <td>How did you hear<br> about us?</td>
                                <td>
                                   <select name="referral" size="1">
                                      <option>Select referer</option>
                                      <option value="newspaper">Newspaper</option>
                                      <option value="radio">Radio</option>
                                      <option value="tv">Television</option>
                                      <option value="other">Other</option>
                                   </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2'><input type='submit' name='btnSubmit' id='btnSubmit' value='Sign up!'>&nbsp;&nbsp;<input type='reset' name="btnReset" id="btnReset" value="Reset Form"></td>
                            </tr>
                        </table>
                    </form>
                </div><!-- End Main -->
            </div><!-- End Content -->

    <?php include("footer.php"); ?>
