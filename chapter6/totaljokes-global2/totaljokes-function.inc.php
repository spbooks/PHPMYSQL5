<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

function totalJokes()
{
  try
  {
    $result = $GLOBALS['pdo']->query('SELECT COUNT(*) FROM joke');
  }
  catch (PDOException $e)
  {
    $error = 'Database error counting jokes!';
    include 'error.html.php';
    exit();
  }

  $row = $result->fetch();

  return $row[0];
}
