<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Query String Link Example</title>
  </head>
  <body>
    <p>
      <?php
      $firstName = $_GET['firstname'];
      $lastName = $_GET['lastname'];
      echo 'Welcome to our website, ' .
          htmlspecialchars($firstName, ENT_QUOTES, 'UTF-8') . ' ' .
          htmlspecialchars($lastName, ENT_QUOTES, 'UTF-8') . '!';
      ?>
    </p>
  </body>
</html>
