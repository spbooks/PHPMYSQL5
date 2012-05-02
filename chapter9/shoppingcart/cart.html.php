<?php include_once $_SERVER['DOCUMENT_ROOT'] .
    '/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Shopping Cart</title>
    <style>
    table {
      border-collapse: collapse;
    }
    td, th {
      border: 1px solid black;
    }
    </style>
  </head>
  <body>
    <h1>Your Shopping Cart</h1>
    <?php if (count($cart) > 0): ?>
    <table>
      <thead>
        <tr>
          <th>Item Description</th>
          <th>Price</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <td>Total:</td>
          <td>$<?php echo number_format($total, 2); ?></td>
        </tr>
      </tfoot>
      <tbody>
        <?php foreach ($cart as $item): ?>
          <tr>
            <td><?php htmlout($item['desc']); ?></td>
            <td>
              $<?php echo number_format($item['price'], 2); ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php else: ?>
    <p>Your cart is empty!</p>
    <?php endif; ?>
    <form action="?" method="post">
      <p>
        <a href="?">Continue shopping</a> or
        <input type="submit" name="action" value="Empty cart">
      </p>
    </form>
  </body>
</html>
