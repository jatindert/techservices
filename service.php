<?php include 'include/header.php'; ?>

  <style>
    body {
      background-color: #f4f7fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .services-section {
      padding: 60px 0;
    }
    .section-title {
      font-size: 32px;
      font-weight: bold;
      color: #002244;
    }
    .section-subtitle {
      color: #666;
      margin-top: 10px;
      font-size: 16px;
    }
    .service-box {
      background: white;
      border-radius: 15px;
      padding: 30px 20px;
      transition: 0.3s;
      border: 2px solid #e3eaf3;
      text-align: center;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
    }
    .service-box:hover {
      transform: translateY(-8px);
      border-color: #007bff;
      box-shadow: 0 15px 30px rgba(0, 123, 255, 0.15);
    }
    .service-badge {
      display: inline-block;
      background: #007bff;
      color: white;
      font-size: 20px;
      font-weight: bold;
      width: 50px;
      height: 50px;
      line-height: 50px;
      border-radius: 50%;
      margin-bottom: 20px;
    }
    .service-title {
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 10px;
      color: #002244;
    }
    .service-desc {
      font-size: 15px;
      color: #555;
    }
  </style>

<body>



<section class="services-section" id="services">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-title">Our Printer Support Services</h2>
      <p class="section-subtitle">Fast, Friendly & Reliable Printer Solutions</p>
    </div>

    <div class="row g-4">
      <?php
      $services = [
        "Fixing Connectivity Issues",
        "Firmware Error Solutions",
        "Network Setup & Optimization",
        "Printer Offline Problem Fixes",
        "New Printer Installation",
        "Driver Troubleshooting"
      ];

      $count = 1;
      foreach ($services as $title) {
        echo '
        <div class="col-lg-4 col-md-6">
          <div class="service-box">
            <div class="service-badge">' . $count . '</div>
            <div class="service-title">' . $title . '</div>
            <div class="service-desc">
              We handle ' . strtolower($title) . ' with care and expertise, ensuring smooth printing operations.
            </div>
          </div>
        </div>';
        $count++;
      }
      ?>
    </div>
  </div>
</section>




<?php include 'include/footer.php'; ?>


