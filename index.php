<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kazan's Handicraft</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php include 'header.php'; ?>
    
            <!-- Main Content -->
        <div class="mainPage"  >
            <div class="text">
                <h1>Welcome to Kazan's Handicraft</h1>
                <p>Your one-stop shop for unique handcrafted items.</p>
                <a href="home.php"><button class="button">Explore Now</button></a>
            </div>
        </div>

    <section class="featured-products">
        <h2>Featured Products</h2>
        <div class="product-container">
            <?php
            require("./connection.php");

            $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6");
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_product = mysqli_fetch_assoc($select_products)) {
            ?>
            <div class="product-item">
                <img src="./img/<?php echo htmlspecialchars($fetch_product['image']); ?>" alt="<?php echo htmlspecialchars($fetch_product['name']); ?>">
                 <a href="home.php" class="btn">Learn More</a>
            </div>
            <?php
                }
            } else {
                echo "<p>No products found.</p>";
            }
            ?>
        </div>
    </section>

    <section class="about-us">
        <h2>About Us</h2>
        <p>At Kazan's Handicraft, we take pride in creating beautiful, handcrafted items that add a personal touch to your home. Our artisans use traditional techniques to craft each piece with care and dedication.</p>
    </section>

    

    <script>
        document.getElementById('heroSection').style.display = 'initial';
    </script>

<?php include 'footer.php'; ?>
</body>
</html>
