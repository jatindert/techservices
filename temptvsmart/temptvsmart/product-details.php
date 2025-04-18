<?php include 'include/header.php'; ?>
<!-- Product Details Page -->
<div class="container mt-5">
    <h2 class="text-center">Product Details</h2>
    <div class="card shadow-lg border-0 p-4">
        <img id="product-image" class="card-img-top" alt="Product Image">
        <div class="card-body text-center">
            <h3 id="product-title"></h3>
            <p id="product-description"></p>
            <h4 id="product-price" class="text-success"></h4>
            <!-- <button class="btn btn-success w-100">Add to Cart</button> -->
        </div>
    </div>
</div>

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const product = urlParams.get('product');
    const productData = {
        printer1: {
            title: "HP LaserJet Printer",
            description: "High-speed wireless printer for office and home use.",
            price: "$150",
            image: "assets/images/pri.jpg"
        },
        laptop: {
            title: "Dell Inspiron Laptop",
            description: "Powerful laptop with Intel i7 processor and 16GB RAM.",
            price: "$800",
            image: "assets/images/imac.png"
        },
        keyboard: {
            title: "Mechanical Keyboard",
            description: "RGB gaming keyboard with tactile keys.",
            price: "$50",
            image: "assets/images/keyboard.png"
        }
    };

    if (productData[product]) {
        document.getElementById('product-title').innerText = productData[product].title;
        document.getElementById('product-description').innerText = productData[product].description;
        document.getElementById('product-price').innerText = productData[product].price;
        document.getElementById('product-image').src = productData[product].image;
    }
</script>
<?php include 'include/footer.php'; ?>