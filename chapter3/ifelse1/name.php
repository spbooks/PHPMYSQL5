<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Form Example</title>
  </head>
  <body>
    <p>
      <?php
      $name = $_REQUEST['name'];
      if ($name == 'Kevin')
      {
        echo 'Welcome, oh glorious leader!';
      }
      else
      {
        echo 'Welcome to our website, ' .
            htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '!';
      }
      ?>
    </p>
  </body>
</html>
