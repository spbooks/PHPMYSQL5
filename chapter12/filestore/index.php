<?php
include_once $_SERVER['DOCUMENT_ROOT'] .
    '/includes/magicquotes.inc.php';

if (isset($_POST['action']) and $_POST['action'] == 'upload')
{
  // Bail out if the file isn't really an upload
  if (!is_uploaded_file($_FILES['upload']['tmp_name']))
  {
    $error = 'There was no file uploaded!';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/error.html.php';
    exit();
  }
  $uploadfile = $_FILES['upload']['tmp_name'];
  $uploadname = $_FILES['upload']['name'];
  $uploadtype = $_FILES['upload']['type'];
  $uploaddesc = $_POST['desc'];
  $uploaddata = file_get_contents($uploadfile);

  include 'db.inc.php';

  try
  {
    $sql = 'INSERT INTO filestore SET
        filename = :filename,
        mimetype = :mimetype,
        description = :description,
        filedata = :filedata';
    $s = $pdo->prepare($sql);
    $s->bindValue(':filename', $uploadname);
    $s->bindValue(':mimetype', $uploadtype);
    $s->bindValue(':description', $uploaddesc);
    $s->bindValue(':filedata', $uploaddata);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Database error storing file!';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/error.html.php';
    exit();
  }

  header('Location: .');
  exit();
}

if (isset($_GET['action']) and
    ($_GET['action'] == 'view' or $_GET['action'] == 'download') and
    isset($_GET['id']))
{
  include 'db.inc.php';

  try
  {
    $sql = 'SELECT filename, mimetype, filedata
        FROM filestore
        WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_GET['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Database error fetching requested file.';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/error.html.php';
    exit();
  }

  $file = $s->fetch();
  if (!$file)
  {
    $error = 'File with specified ID not found in the database!';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/error.html.php';
    exit();
  }

  $filename = $file['filename'];
  $mimetype = $file['mimetype'];
  $filedata = $file['filedata'];
  $disposition = 'inline';

  if ($_GET['action'] == 'download')
  {
    $mimetype = 'application/octet-stream';
    $disposition = 'attachment';
  }

  // Content-type must come before Content-disposition
  header('Content-length: ' . strlen($filedata));
  header("Content-type: $mimetype");
  header("Content-disposition: $disposition; filename=$filename");

  echo $filedata;
  exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'delete' and
    isset($_POST['id']))
{
  include 'db.inc.php';

  try
  {
    $sql = 'DELETE FROM filestore
        WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Database error deleting requested file.';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/error.html.php';
    exit();
  }

  header('Location: .');
  exit();
}

include 'db.inc.php';

try
{
  $result = $pdo->query(
      'SELECT id, filename, mimetype, description
      FROM filestore');
}
catch (PDOException $e)
{
  $error = 'Database error fetching stored files.';
  include $_SERVER['DOCUMENT_ROOT'] . '/includes/error.html.php';
  exit();
}

$files = array();
foreach ($result as $row)
{
  $files[] = array(
      'id' => $row['id'],
      'filename' => $row['filename'],
      'mimetype' => $row['mimetype'],
      'description' => $row['description']);
}

include 'files.html.php';
