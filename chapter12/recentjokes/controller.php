<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

try
{
  $sql = 'SELECT id, joketext FROM joke
      ORDER BY jokedate DESC
      LIMIT 3';
  $result = $pdo->query($sql);
}
catch (PDOException $e)
{
  $error = 'Error fetching jokes.';
  include $_SERVER['DOCUMENT_ROOT'] . '/includes/error.html.php';
  exit();
}

foreach ($result as $row)
{
  $jokes[] = array('text' => $row['joketext']);
}

include 'jokes.html.php';
