<?php
include_once $_SERVER['DOCUMENT_ROOT'] .
    '/includes/magicquotes.inc.php';

$items = array(
    array('id' => '1', 'desc' => 'Canadian-Australian Dictionary',
        'price' => 24.95),
    array('id' => '2', 'desc' => 'As-new parachute (never opened)',
        'price' => 1000),
    array('id' => '3', 'desc' => 'Songs of the Goldfish (2CD set)',
        'price' => 19.99),
    array('id' => '4', 'desc' => 'Simply JavaScript (SitePoint)',
        'price' => 39.95));

session_start();
if (!isset($_SESSION['cart']))
{
  $_SESSION['cart'] = array();
}

if (isset($_POST['action']) and $_POST['action'] == 'Buy')
{
  // Add item to the end of the $_SESSION['cart'] array
  $_SESSION['cart'][] = $_POST['id'];
  header('Location: .');
  exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Empty cart')
{
  // Empty the $_SESSION['cart'] array
  unset($_SESSION['cart']);
  header('Location: ?cart');
  exit();
}

if (isset($_GET['cart']))
{
  $cart = array();
  $total = 0;
  foreach ($_SESSION['cart'] as $id)
  {
    foreach ($items as $product)
    {
      if ($product['id'] == $id)
      {
        $cart[] = $product;
        $total += $product['price'];
        break;
      }
    }
  }

  include 'cart.html.php';
  exit();
}

include 'catalog.html.php';
