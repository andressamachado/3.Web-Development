<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include 'menu-data.php';
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
          <?php $image = $images[$_GET['key']]?>
           <h1><?php echo $image['title']; ?></h1>

            <img src="<?php echo "images/menu/".$image['path']; ?>" height="100%" width="100%"/>

            <p><?php echo $image['description']; ?></p>

            <p>Price: <?php echo $image['price']; ?></p>

      </div>
    </div>

    <?php include("footer.php"); ?>

  </body>
</html>
