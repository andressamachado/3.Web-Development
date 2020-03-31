<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <link rel="stylesheet" href="StyleSheet.css">
    <title>Books</title>
  </head>

  <body>

    <?php
      include 'Header.php';
      include 'Menu.php';

      $xml = file_get_contents("http://www.rejaul.com/CST8238/Lab10/Books.xml");

      $xmlDoc = new DOMDocument();
      $xmlDoc->loadXML($xml);

      $catalog = $xmlDoc->getElementsByTagName('catalog');

    ?>
    <div class="content">

      <div class="table-wrapper">
        <table>
          <tr>
            <th>BOOK</th>
            <th>Author</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Price</th>
            <th>Publish Date</th>
            <th>Description</th>
          </tr>

          <?php
            $counter = 1;
            foreach ($catalog as $currentCatalog) {
              foreach ($currentCatalog->childNodes as $node) {
                if ($node->nodeName == "book") {
                  echo "<tr>";
                  echo "<td>Book #$counter </td>";
                  foreach ($node->childNodes as $bookNode) {
                    if ($bookNode->nodeName=='author')
                      echo "<td>" .$bookNode->nodeValue. "</td>";
                    if ($bookNode->nodeName=='title')
                      echo "<td>".$bookNode->nodeValue. "</td>";
                    if ($bookNode->nodeName=='genre')
                      echo "<td>".$bookNode->nodeValue. "</td>";
                    if ($bookNode->nodeName=='price')
                      echo "<td>".$bookNode->nodeValue. "</td>";
                    if ($bookNode->nodeName=='publish_date')
                      echo "<td>".$bookNode->nodeValue. "</td>";
                    if ($bookNode->nodeName=='description')
                      echo "<td>".$bookNode->nodeValue. "</td>";
                  }
                  echo "</tr>";
                  $counter++;
                }
              }
            }
          ?>
          </tr>
        </table>
      </div>

    </div>
    <?php
      include 'Footer.php';
    ?>
  </body>
</html>
