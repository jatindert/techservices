<?php
session_start();
include 'include/header.php';
include 'db.php';

// Fetch products from database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<style>
body {
    font-family: 'Segoe UI', sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

.shop-container {
    max-width: 1200px;
    margin: 50px auto;
    padding: 20px;
}

.shop-title {
    text-align: center;
    font-size: 2.2rem;
    margin-bottom: 40px;
    color: #333;
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 25px;
}

.product-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-image img {
    width: 100%;
    height: 240px;
    object-fit: cover;
}

.product-content {
    padding: 15px;
    flex-grow: 1;
}

.product-content h3 {
    font-size: 1.1rem;
    margin: 10px 0 5px;
    color: #222;
    text-decoration: none;
}

.product-content a {
    text-decoration: none;
    color: #0073aa;
    transition: color 0.3s;
}

.product-content a:hover {
    color: #005f7f;
}

.product-price {
    font-weight: bold;
    color: #111;
    margin-bottom: 15px;
}

form {
    display: flex;
    justify-content: center;
    padding: 0 0 15px;
}

form button {
    background-color: #0073aa;
    border: none;
    color: white;
    padding: 10px 20px;
    border-radius: 6px;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.3s;
}

form button:hover {
    background-color: #005f7f;
}
</style>

<div class="shop-container">
    <h2 class="shop-title">Shop All Products</h2>
    <div class="products-grid">
        <?php while ($product = $result->fetch_assoc()): ?>
            <div class="product-card">
                <a href="product.php?id=<?= $product['id']; ?>" class="product-image">
                    <img src="<?= htmlspecialchars($product['image']); ?>" alt="<?= htmlspecialchars($product['name']); ?>">
                </a>
                <div class="product-content">
                    <a href="product.php?id=<?= $product['id']; ?>">
                        <h3><?= htmlspecialchars($product['name']); ?></h3>
                    </a>
                    <p class="product-price">$<?= number_format($product['price'], 2); ?></p>
                </div>
                <!-- ✅ Add to Cart Form -->
                <form action="add-to-cart.php" method="POST">
                    <input type="hidden" name="id" value="<?= $product['id']; ?>">
                    <input type="hidden" name="name" value="<?= htmlspecialchars($product['name']); ?>">
                    <input type="hidden" name="price" value="<?= $product['price']; ?>">
                    <input type="hidden" name="image" value="<?= htmlspecialchars($product['image']); ?>">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit">Add to Cart</button>
                </form>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'include/footer.php'; ?>
