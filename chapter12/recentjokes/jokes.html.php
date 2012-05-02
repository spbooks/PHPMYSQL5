<?php include_once $_SERVER['DOCUMENT_ROOT'] .
    '/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Recent Jokes</title>
    <link rel="canonical" href="/recentjokes/">
  </head>
  <body>
    <p>Here are the most recent jokes in the database:</p>
    <?php foreach ($jokes as $joke): ?>
      <?php markdownout($joke['text']); ?>
    <?php endforeach; ?>
  </body>
</html>
