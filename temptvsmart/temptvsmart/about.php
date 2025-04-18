<?php include 'include/header.php'; ?>

<style>
/* About Us Page Styling */
.about-container {
    max-width: 1200px;
    margin: 50px auto;
    padding: 40px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.about-header {
    text-align: center;
    margin-bottom: 40px;
}

.about-header h1 {
    font-size: 36px;
    color: #333;
    margin-bottom: 10px;
}

.about-header p {
    font-size: 18px;
    color: #555;
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.6;
}

.about-content {
    display: flex;
    gap: 40px;
    justify-content: space-between;
    margin-top: 40px;
}

.about-content img {
    max-width: 500px;
    width: 100%;
    border-radius: 8px;
}

.about-text {
    flex: 1;
    max-width: 600px;
}

.about-text h2 {
    font-size: 28px;
    margin-bottom: 20px;
    color: #333;
}

.about-text p {
    font-size: 18px;
    color: #555;
    line-height: 1.8;
    margin-bottom: 20px;
}

.mission, .vision {
    margin-top: 40px;
    text-align: center;
}

.mission h3, .vision h3 {
    font-size: 24px;
    margin-bottom: 15px;
    color: #333;
}

.mission p, .vision p {
    font-size: 18px;
    color: #555;
    line-height: 1.6;
}

@media (max-width: 768px) {
    .about-content {
        flex-direction: column;
        text-align: center;
    }

    .about-content img {
        max-width: 100%;
    }

    .about-text {
        max-width: 100%;
    }
}
</style>

<div class="about-container">
    <!-- About Header -->
    <div class="about-header">
        <h1>About Us</h1>
        <p>We are a passionate team dedicated to providing high-quality products and services to our valued customers. Learn more about our story and mission.</p>
    </div>

    <!-- About Content -->
    <div class="about-content">
        <img src="assets/images/banner1.jpg" alt="Our Team">
        <div class="about-text">
            <h2>Our Story</h2>
            <p>Founded in [Year], our company started with a simple idea: to provide customers with high-quality, reliable, and affordable products. Over the years, we’ve grown from a small startup to a trusted name in the industry, serving thousands of happy customers worldwide.</p>
            <p>Our dedication to quality and customer satisfaction is at the heart of everything we do. We pride ourselves on delivering the best value through innovation, sustainability, and a customer-first approach.</p>
        </div>
    </div>

    <!-- Mission Section -->
    <div class="mission">
        <h3>Our Mission</h3>
        <p>Our mission is to revolutionize the industry by providing innovative products that make a positive impact on our customers' lives. We are committed to sustainability, excellence, and integrity in every product we offer.</p>
    </div>

    <!-- Vision Section -->
    <div class="vision">
        <h3>Our Vision</h3>
        <p>To be the leading brand in our industry, recognized for our commitment to quality, sustainability, and customer satisfaction. We envision a world where our products enhance the lives of our customers and contribute to a better future for all.</p>
    </div>
</div>

<?php include 'include/footer.php'; ?>
