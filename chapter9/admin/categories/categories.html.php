<?php include_once $_SERVER['DOCUMENT_ROOT'] .
    '/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Manage Categories</title>
  </head>
  <body>
    <h1>Manage Categories</h1>
    <p><a href="?add">Add new category</a></p>
    <ul>
      <?php foreach ($categories as $category): ?>
        <li>
          <form action="" method="post">
            <div>
              <?php htmlout($category['name']); ?>
              <input type="hidden" name="id" value="<?php
                  echo $category['id']; ?>">
              <input type="submit" name="action" value="Edit">
              <input type="submit" name="action" value="Delete">
            </div>
          </form>
        </li>
      <?php endforeach; ?>
    </ul>
    <p><a href="..">Return to JMS home</a></p>
    <?php include '../logout.inc.html.php'; ?>
  </body>
</html>
