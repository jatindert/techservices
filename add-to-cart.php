<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $productId = intval($_POST['id'] ?? 0);
  $quantity = intval($_POST['quantity'] ?? 1);

  if ($productId > 0) {
    // Initialize cart if not set
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = [];
    }

    // If product already in cart, increase quantity
    if (isset($_SESSION['cart'][$productId])) {
      $_SESSION['cart'][$productId]['quantity'] += $quantity;
    } else {
      $_SESSION['cart'][$productId] = [
        'quantity' => $quantity
      ];
    }
  }
}

// Redirect back to product or cart
header("Location: cart.php");
exit;
?>
