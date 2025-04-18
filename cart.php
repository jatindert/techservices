<?php
session_start();
include 'include/header.php';
include 'db.php';

// Remove item from cart
if (isset($_GET['remove'])) {
  $removeId = $_GET['remove'];
  unset($_SESSION['cart'][$removeId]);
}

// Update quantities
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
  foreach ($_POST['qty'] as $id => $quantity) {
    if (isset($_SESSION['cart'][$id])) {
      $_SESSION['cart'][$id]['quantity'] = max(1, intval($quantity));
    }
  }
}

// Prepare cart data
$cartItems = [];
$total = 0;

if (!empty($_SESSION['cart'])) {
  $ids = implode(',', array_map('intval', array_keys($_SESSION['cart'])));
  $sql = "SELECT * FROM products WHERE id IN ($ids)";
  $result = $conn->query($sql);

  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    if (!isset($_SESSION['cart'][$id])) continue;

    $qty = $_SESSION['cart'][$id]['quantity'];
    $subtotal = $row['price'] * $qty;
    $total += $subtotal;

    $cartItems[] = [
      'id' => $id,
      'name' => $row['name'],
      'image' => $row['image'],
      'price' => $row['price'],
      'quantity' => $qty,
      'subtotal' => $subtotal
    ];
  }
}
?>

<style>
body {
  font-family: 'Segoe UI', sans-serif;
  background: #f8f9fa;
}
.cart-wrapper {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  max-width: 1200px;
  margin: 40px auto;
  padding: 20px;
}
.cart-items {
  flex: 3;
  background: #fff;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 3px 10px rgba(0,0,0,0.05);
}
.cart-summary {
  flex: 1;
  background: #ffffff;
  padding: 20px;
  border-radius: 10px;
  height: fit-content;
  box-shadow: 0 3px 10px rgba(0,0,0,0.05);
}
.cart-items h2, .cart-summary h3 {
  margin-bottom: 20px;
}
.cart-item {
  display: flex;
  gap: 20px;
  margin-bottom: 20px;
  border-bottom: 1px solid #eee;
  padding-bottom: 15px;
}
.cart-item img {
  width: 100px;
  border-radius: 8px;
}
.item-info {
  flex: 1;
}
.item-info h4 {
  margin: 0 0 10px;
}
.item-info p {
  margin: 0;
  color: #555;
}
.qty-price {
  display: flex;
  flex-direction: column;
  align-items: end;
}
.qty-price input[type="number"] {
  width: 60px;
  padding: 6px;
  margin-bottom: 10px;
}
.cart-actions {
  display: flex;
  justify-content: space-between;
  margin-top: 30px;
}
.btn {
  background: #0073aa;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 6px;
  cursor: pointer;
  text-decoration: none;
  transition: 0.3s ease;
}
.btn:hover {
  background: #005f8a;
}
.btn.secondary {
  background: #ddd;
  color: #333;
}
.summary-total {
  font-size: 18px;
  font-weight: bold;
  margin: 20px 0;
}
.offer-box {
  background: #eafaf1;
  border: 1px dashed #28a745;
  padding: 15px;
  border-radius: 6px;
  margin-top: 20px;
  font-size: 14px;
  color: #2e7d32;
}
</style>

<div class="cart-wrapper">
  <div class="cart-items">
    <h2>🛒 Your Shopping Cart</h2>

    <?php if (empty($cartItems)): ?>
      <p>Your cart is empty. <a href="index.php">Shop now</a></p>
    <?php else: ?>
      <form method="POST">
        <?php foreach ($cartItems as $item): ?>
          <div class="cart-item">
            <img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>">
            <div class="item-info">
              <h4><?= $item['name'] ?></h4>
              <p>$<?= number_format($item['price'], 2) ?> each</p>
              <a href="cart.php?remove=<?= $item['id'] ?>" class="btn secondary" style="margin-top: 10px;">Remove</a>
            </div>
            <div class="qty-price">
              <input type="number" name="qty[<?= $item['id'] ?>]" value="<?= $item['quantity'] ?>" min="1">
              <strong>$<?= number_format($item['subtotal'], 2) ?></strong>
            </div>
          </div>
        <?php endforeach; ?>

        <div class="cart-actions">
          <button type="submit" name="update" class="btn">📝 Update Cart</button>
          <a href="checkout.php" class="btn">💳 Proceed to Checkout</a>
        </div>
      </form>
    <?php endif; ?>
  </div>

  <?php if (!empty($cartItems)): ?>
    <div class="cart-summary">
      <h3>🧾 Order Summary</h3>
      <p class="summary-total">Total: $<?= number_format($total, 2) ?></p>

      <div class="offer-box">
        🎁 <strong>Free Shipping</strong> on orders over $100!
        <br>
        💡 Tip: You’re just <?= number_format(max(0, 100 - $total), 2) ?> away!
      </div>

      <div style="margin-top: 20px;">
        <h4>Accepted Payments:</h4>
        <p>💳 Visa, MasterCard, UPI, COD</p>
      </div>
    </div>
  <?php endif; ?>
</div>

<?php include 'include/footer.php'; ?>
