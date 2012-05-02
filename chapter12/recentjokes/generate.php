<?php
$srcurl = 'http://localhost/recentjokes/controller.php';
$tempfilename = $_SERVER['DOCUMENT_ROOT'] .
    '/recentjokes/tempindex.html';
$targetfilename = $_SERVER['DOCUMENT_ROOT'] .
    '/recentjokes/index.html';

if (file_exists($tempfilename))
{
  unlink($tempfilename);
}

$html = file_get_contents($srcurl);
if (!$html)
{
  $error = "Unable to load $srcurl. Static page update aborted!";
  include $_SERVER['DOCUMENT_ROOT'] . '/includes/error.html.php';
  exit();
}

if (!file_put_contents($tempfilename, $html))
{
  $error = "Unable to write $tempfilename. Static page update aborted!";
  include $_SERVER['DOCUMENT_ROOT'] . '/includes/error.html.php';
  exit();
}

copy($tempfilename, $targetfilename);
unlink($tempfilename);
