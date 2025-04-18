<?php
include 'products-data.php';

foreach ($products as $product) {
  echo '
    <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card h-100 shadow-sm product-card">
        <a href="product.php?name=' . urlencode($product[0]) . '">
          <img src="' . $product[1] . '" class="card-img-top p-3" alt="' . $product[0] . '">
        </a>
        <div class="card-body text-center">
          <h5 class="card-title">' . $product[0] . '</h5>
          <p class="card-text fw-bold text-success">₹' . $product[2] . '</p>
          
          <!-- Add to Cart Form -->
          <form method="POST" action="add-to-cart.php" class="d-flex flex-column gap-2 align-items-center">
            <input type="hidden" name="id" value="' . $product[3] . '">
            <input type="hidden" name="name" value="' . $product[0] . '">
            <input type="hidden" name="price" value="' . $product[2] . '">
            <input type="hidden" name="image" value="' . $product[1] . '">

           
            <!-- Buttons -->
            <button type="submit" class="btn btn-primary btn-sm w-100">Add to Cart</button>
            <button type="button" class="btn btn-outline-danger btn-sm w-100">❤️ Wishlist</button>
          </form>
        </div>
      </div>
    </div>
  ';
}
?>
