<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My first PHP scripting</title>
  </head>

  <body>

<?php

  $firstName = "Andressa";
  $LastName = " Machado";
  echo $firstName;
  echo $LastName;
  echo "<br>";

  define("studentNumber", "040923007", true);
  echo studentNumber;
  echo "<br>";
  echo "<br>";


  $firstString = "Hello World!";
  $secondString = "I am using PHP!";
  echo $firstString .$secondString;
  echo "<br>";
  echo "<br>";


  $date = new DateTime();
  $timeZone = $date->getTimezone();
  echo "The server`s time zone is " .$timeZone->getName();
  echo "<br>";
  echo "Current server time " .date("h:i:sa");
  echo "<br>";
  echo "<br>";

  echo "Links to my other labs and assignment:";
  echo "<br>";

  echo "<a href=../Lab1/index.html>Lab1 - Preparation and Hello World</a>";
  echo "<br>";
  echo "<a href=../Lab2/index.html>Lab2 - Create a Novice Website</a>";
  echo "<br>";
  echo "<a href=../Lab3/index.html>Lab3 - Tables and Attributes</a>";
  echo "<br>";
  echo "<a href=../Lab4/index.html>Lab4 - CSS and Multimedia</a>";
  echo "<br>";
  echo "<a href=../Assignment1/index.html>Assignment1 - Canada Website</a>";

  ?>

  </body>
</html>
