<?php
include 'include/header.php';
include 'products-data.php';

$productName = $_GET['name'] ?? '';
$selectedProduct = null;

// Search product by name
foreach ($products as $product) {
  if (trim($product[0]) === trim($productName)) {
    $selectedProduct = $product;
    break;
  }
}

if (!$selectedProduct) {
  echo "<p>Product not found.</p>";
  include 'include/footer.php';
  exit;
}
?>

<style>
.product-container {
  display: flex;
  gap: 40px;
  padding: 40px 20px;
  flex-wrap: wrap;
  justify-content: center;
  max-width: 1200px;
  margin: 0 auto;
}

.product-image img {
  max-width: 400px;
  width: 100%;
  border-radius: 8px;
}

.product-details {
  flex: 1;
  max-width: 500px;
}

.product-details h1 {
  font-size: 28px;
  margin-bottom: 10px;
}

.product-details .price {
  font-size: 24px;
  color: #0073aa;
  margin-bottom: 15px;
}

.product-details input[type="number"] {
  width: 60px;
  padding: 5px;
  margin: 10px 0;
}

.btn {
  padding: 10px 20px;
  background-color: #0073aa;
  color: #fff;
  border: none;
  cursor: pointer;
  margin-right: 10px;
  border-radius: 5px;
}

.btn.secondary {
  background-color: #f1f1f1;
  color: #333;
}

.product-description, .related-products, .product-reviews {
  padding: 40px 20px;
  border-top: 1px solid #eee;
}

.products-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
}

.view-more-btn {
  text-align: center;
  margin-top: 20px;
}

.view-more-btn a {
  padding: 10px 20px;
  background-color: #0073aa;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
}
</style>

<section class="product-single">
  <div class="product-container">
    <div class="product-image">
      <img src="<?php echo $selectedProduct[1]; ?>" alt="<?php echo $selectedProduct[0]; ?>">
    </div>
    <div class="product-details">
      <h1><?php echo $selectedProduct[0]; ?></h1>
      <p class="short-desc">High-quality wireless printer with multiple functions including scan, copy, and color printing.</p>
      <h2 class="price"><?php echo $selectedProduct[2]; ?></h2>

      <!-- ✅ Add to Cart Form -->
      <form method="POST" action="add-to-cart.php">
        <input type="hidden" name="id" value="<?php echo $selectedProduct[3]; ?>"> <!-- Make sure this index is product ID -->
        <input type="hidden" name="name" value="<?php echo $selectedProduct[0]; ?>">
        <input type="hidden" name="price" value="<?php echo str_replace(['$', ','], '', $selectedProduct[2]); ?>">
        <input type="hidden" name="image" value="<?php echo $selectedProduct[1]; ?>">

        <label for="quantity">Qty:</label>
        <input type="number" id="quantity" name="quantity" value="1" min="1" required>

        <button type="submit" class="btn">Add to Cart</button>
        <button type="button" class="btn secondary">❤️ Add to Wishlist</button>
      </form>
    </div>
  </div>
</section>

<section class="product-description">
  <h2>Description</h2>
  <p>This printer is designed for high-performance, home and office use. Compact and stylish with the latest technology.</p>
</section>

<section class="related-products">
  <h2>Related Products</h2>
  <div class="products-grid">
    <?php
    $count = 0;
    foreach ($products as $product) {
      if ($product[0] === $selectedProduct[0]) continue;

      echo '
        <div class="product-card">
          <a href="product.php?name=' . urlencode($product[0]) . '">
            <img src="' . $product[1] . '" alt="' . $product[0] . '">
            <h3>' . $product[0] . '</h3>
            <p>' . $product[2] . '</p>
          </a>
          <button>Add to Cart</button>
          <button>❤️ Wishlist</button>
        </div>
      ';

      if (++$count >= 5) break;
    }
    ?>
  </div>
  <div class="view-more-btn">
    <a href="shop.php">View More Products</a>
  </div>
</section>

<section class="product-reviews">
  <h2>Customer Reviews</h2>
  <p>No reviews yet. Be the first to write one!</p>
</section>

<?php include 'include/footer.php'; ?>
