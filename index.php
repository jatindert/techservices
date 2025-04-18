<?php include 'include/header.php'; ?>

<!-- Banner Section -->
<section class="banner mb-4">
  <img src="assets/images/banner.jpg" alt="Main Banner" class="img-fluid w-100">
</section>

<!-- Sub Banners -->
<section class="sub-banners mb-5">
  <div class="container">
    <div class="row g-3">
      <div class="col-md-6">
        <img src="assets/images/banner-tec.png" alt="Sub Banner" class="img-fluid rounded">
      </div>
      <div class="col-md-6">
        <img src="assets/images/banner-1-tech.png" alt="Sub Banner" class="img-fluid rounded">
      </div>
    </div>
  </div>
</section>

<!-- Product Section -->
<section class="products-section py-5 bg-white">
  <div class="container text-center">
    <h2 class="mb-2 text-primary">DISCOVER BEST SELLING PRINTERS</h2>
    <p class="mb-4 text-muted">We Believe In Technology</p>

    <div class="row g-4">
      <?php include 'products-display.php'; ?>
    </div>
  </div>
</section>

<!-- Promo Section -->
<section class="promo-section py-5">
  <div class="container text-center">
    <div class="promo-header mb-4">
      <h2 class="text-primary">We Believe In Technology</h2>
      <h1><strong>Discover Your Best Selling Printer</strong></h1>
    </div>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="promo-card p-3 shadow-sm rounded bg-light">
          <img src="assets/images/ink.jpg" alt="Ink Printer" class="img-fluid mb-3">
          <h3>HI-TECH FEATURES</h3>
          <p>Instant Ink Printer</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="promo-card p-3 shadow-sm rounded bg-light">
          <img src="assets/images/mod.jpg" alt="Modern Design Printer" class="img-fluid mb-3">
          <h3>MODERN DESIGN</h3>
          <p>Colored Printer</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="promo-card p-3 shadow-sm rounded bg-light">
          <img src="assets/images/col.jpg" alt="Colorful Quality Printer" class="img-fluid mb-3">
          <h3>COLORFUL QUALITY</h3>
          <p>Colored Printer</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'include/footer.php'; ?>
