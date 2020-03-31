<?php
require_once ('WebsiteUser.php');

session_start();


if(isset($_SESSION['websiteUser'])){
    if($_SESSION['websiteUser']->isAuthenticated()){
        session_write_close();
        header('Location:internal.php');
    }
}

$missingUsername = false;
$missingPassword = false;

if(isset($_POST['submit'])){
    if(isset($_POST['username']) && isset($_POST['password'])){
        if($_POST['username'] == "" || $_POST['password'] == ""){
            if ($_POST['username'] == "" ) {
              $missingUsername = true;
            }
            if ($_POST['password'] == "") {
              $missingPassword = true;
            }
        } else {
            $websiteUser = new WebsiteUser();
            if(!$websiteUser->hasDbError()){
                $usernameLogin = $_POST['username'];
                $passwordLogin = $_POST['password'];
                $websiteUser->authenticate($usernameLogin, $passwordLogin);
                if($websiteUser->isAuthenticated()){

                    $timestamp = date("Y-m-d H:i:s");
                    $TSquery = "UPDATE adminusers SET LastLogin='" .$timestamp. "' WHERE Username='" .$usernameLogin. "'";


                    $_SESSION['websiteUser'] = $websiteUser;

                    $result = mysqli_query( $websiteUser->mysqli, $TSquery);

                    $sqlSession = "SELECT * FROM adminusers WHERE Username='" .$usernameLogin. "'";

                    $result = mysqli_query( $websiteUser->mysqli, $sqlSession);
                    $row =  mysqli_fetch_row($result);

                    $_SESSION['AdminID'] = $row[0];
                    $_SESSION['AdminLevel'] = $row[3];
                    $_SESSION['LastLogin'] = $row[4];

                    header('Location:internal.php');
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
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
            if($missingUsername){
                echo '***Username field is missing. Please enter your username<br><br>';
            }

            if ($missingPassword) {
              echo "***Password field is missing. Please enter your password<br><br>";
            }

            if(isset($websiteUser)){
                if(!$websiteUser->isAuthenticated()){
                    echo '***Login failed. Please try again.<br><br>';
                }
            }
        ?>


          <form class="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <fieldset>
              <legend><b>Login</b></legend>
              <label>Username</label>
              <input type="text" name="username"/><br>
              <label>Password</label>
              <input type="password" name="password"/><br>

              <div class="bottom">
                <input type="submit" name="submit" value="submit"/>
                <br>
              </div>
          </fieldset>
        </form>

      </div>
    </div>
    <?php include 'footer.php'; ?>
  </body>
</html>
