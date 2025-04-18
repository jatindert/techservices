<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TechServices - Home</title>

  <!-- ✅ Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>

  <!-- ✅ Your Custom Styles -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="site-header bg-dark text-white">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="index.php">
        <img src="assets/images/logo.jpg" alt="TechServices Logo" height="50">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Privacy Policy</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Shipping Policy</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Return Policy</a></li>
        </ul>
      </div>
    </nav>
  </div>
</header>
