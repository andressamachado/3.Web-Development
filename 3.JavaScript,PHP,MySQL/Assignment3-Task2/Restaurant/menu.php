<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Menu</title>
  </head>
  <body>

    <?php include("header.php"); ?>

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
          include 'menu-data.php';

          echo "<h3 style=\"color:darkred;\"> MENU </h3>";

          foreach ($images as $key => $value) {
            $href = "menu-image.php?key=".$images[$key]["id"];
          ?>
            <a href=<?php echo $href ?> style="display: inline-block; background-color: white; padding: 5px 10px ;margin: 5px 15px;">

              <img src="<?php echo "images/menu/".$images[$key]["path"];?>" height="95px" width="95px"/>
            </a>
        <?php } ?>

        </div>
      </div>
    <?php include("footer.php"); ?>
  </body>
</html>
