<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Query String Link Example</title>
  </head>
  <body>
    <p>
      <?php
      $name = $_GET['name'];
      echo 'Welcome to our website, ' . $name . '!';
      ?>
    </p>
  </body>
</html>
