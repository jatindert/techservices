<?php
session_start();
include 'include/header.php';
include 'db.php';

if (empty($_SESSION['cart'])) {
  echo "<p style='text-align:center;'>Your cart is empty. <a href='index.php'>Shop now</a></p>";
  include 'include/footer.php';
  exit;
}

// Fetch cart items
$cartItems = [];
$total = 0;

$ids = implode(',', array_map('intval', array_keys($_SESSION['cart'])));
$sql = "SELECT * FROM products WHERE id IN ($ids)";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
  $id = $row['id'];
  $qty = $_SESSION['cart'][$id]['quantity'];
  $subtotal = $row['price'] * $qty;
  $total += $subtotal;

  $cartItems[] = [
    'name' => $row['name'],
    'price' => $row['price'],
    'quantity' => $qty,
    'subtotal' => $subtotal
  ];
}

// Order submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $name = $_POST['fname'] . ' ' . $_POST['lname'];
  $address = $_POST['address'] . ', ' . $_POST['city'] . ', ' . $_POST['state'] . ', ' . $_POST['zip'];
  $payment = $_POST['payment'];

  // Store logic here...

  unset($_SESSION['cart']);
  echo "<div style='text-align:center; padding:40px;'><h2>✅ Thanks, $name!</h2><p>Order placed. Confirmation sent to <strong>$email</strong>.</p></div>";
  include 'include/footer.php';
  exit;
}
?>

<style>
body {
  background: #f9f9f9;
}
.checkout-container {
  max-width: 1200px;
  margin: 40px auto;
  display: flex;
  gap: 30px;
  padding: 20px;
}
.left-form {
  flex: 2;
  background: white;
  padding: 30px;
  border-radius: 12px;
}
.right-summary {
  flex: 1;
  background: white;
  padding: 20px;
  border-radius: 12px;
  position: sticky;
  top: 20px;
  height: fit-content;
}
h2, h4 {
  margin-bottom: 20px;
}
.section {
  margin-bottom: 30px;
}
.section label {
  display: block;
  font-size: 14px;
  margin-bottom: 6px;
}
.section input, .section textarea, .section select {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 6px;
}
.section .two-cols {
  display: flex;
  gap: 10px;
}
.payment-methods input {
  margin-right: 8px;
}
.order-summary table {
  width: 100%;
  font-size: 14px;
  border-collapse: collapse;
}
.order-summary td {
  padding: 8px 0;
}
.order-summary .total td {
  font-weight: bold;
  border-top: 1px solid #ddd;
  padding-top: 12px;
}
button.place-btn {
  width: 100%;
  background: #000;
  color: #fff;
  padding: 12px;
  border: none;
  font-weight: bold;
  margin-top: 20px;
  border-radius: 6px;
  cursor: pointer;
}
button.place-btn:hover {
  background: #333;
}
.top-buttons {
  display: flex;
  gap: 10px;
  margin-bottom: 30px;
}
.top-buttons button {
  flex: 1;
  padding: 10px;
  font-weight: bold;
  border: 1px solid #ccc;
  background: #f1f1f1;
  border-radius: 6px;
  cursor: pointer;
}
.top-buttons button img {
  height: 16px;
  margin-left: 6px;
}
</style>

<div class="checkout-container">
  <!-- LEFT FORM -->
  <form method="POST" class="left-form">
    <h2>Checkout</h2>

    <div class="top-buttons">
      <button type="button">Pay with <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" alt="PayPal"></button>
      <button type="button">Debit or Credit Card</button>
    </div>

    <hr style="margin: 20px 0;">

    <div class="section">
      <h4>Contact information</h4>
      <label>Email address</label>
      <input type="email" name="email" required>
    </div>

    <div class="section">
      <h4>Shipping address</h4>
      <label>Country</label>
      <select name="country"><option>India</option></select>

      <div class="two-cols">
        <div>
          <label>First name</label>
          <input type="text" name="fname" required>
        </div>
        <div>
          <label>Last name</label>
          <input type="text" name="lname" required>
        </div>
      </div>

      <label>Address</label>
      <input type="text" name="address" required>

      <div class="two-cols">
        <div>
          <label>City</label>
          <input type="text" name="city" required>
        </div>
        <div>
          <label>State</label>
          <input type="text" name="state" required>
        </div>
      </div>

      <div class="two-cols">
        <div>
          <label>ZIP Code</label>
          <input type="text" name="zip" required>
        </div>
        <div>
          <label>Phone (optional)</label>
          <input type="text" name="phone">
        </div>
      </div>
    </div>

    <div class="section">
      <h4>Shipping options</h4>
      <label><input type="radio" checked> Free shipping</label>
    </div>

    <div class="section payment-methods">
      <h4>Payment options</h4>
      <label><input type="radio" name="payment" value="cod" checked> Cash on Delivery</label><br>
      <label><input type="radio" name="payment" value="paypal"> PayPal</label>
    </div>

    <div class="section">
      <label><input type="checkbox"> Add a note to your order</label>
    </div>

    <button type="submit" class="place-btn">PLACE ORDER</button>
  </form>

  <!-- RIGHT SUMMARY -->
  <div class="right-summary">
    <h4>Order Summary</h4>
    <div class="order-summary">
      <table>
        <?php foreach ($cartItems as $item): ?>
          <tr>
            <td><?= $item['name'] ?> × <?= $item['quantity'] ?></td>
            <td style="text-align:right;">$<?= number_format($item['subtotal'], 2) ?></td>
          </tr>
        <?php endforeach; ?>
        <tr>
          <td>Delivery</td>
          <td style="text-align:right;">FREE</td>
        </tr>
        <tr class="total">
          <td>Total</td>
          <td style="text-align:right;">$<?= number_format($total, 2) ?></td>
        </tr>
      </table>

      <div style="margin-top: 20px;">
        <label>Add a coupon</label>
        <select>
          <option value="">Select a coupon</option>
          <option value="SAVE10">SAVE10 - 10% OFF</option>
        </select>
      </div>
    </div>
  </div>
</div>

<?php include 'include/footer.php'; ?>
