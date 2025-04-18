<?php
include 'db.php';

$products = [];

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $products[] = [
      $row['name'],                  // [0] Product Name
      $row['image'],                 // [1] Product Image
      "$" . number_format($row['price'], 2), // [2] Formatted Price
      $row['id']                     // [3] Product ID (used for cart)
    ];
  }
}

$conn->close();
?>
