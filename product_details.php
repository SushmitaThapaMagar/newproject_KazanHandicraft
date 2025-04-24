<?php
@include 'connection.php';
session_start();

if (!isset($_SESSION['userId'])) {
    header("Location: login.php"); // Redirect if user is not logged in
    exit();
}

$userId = $_SESSION['userId'];

if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;
 
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$userId'");
 
    if (mysqli_num_rows($select_cart) > 0) {
       $message[] = 'Product already added to cart';
    } else {
       $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity, user_id) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity', '$userId')");
       if ($insert_product) {
          $message[] = 'Product added to cart successfully';
       } else {
          $message[] = 'Failed to add product to cart';
       }
    }
 }


if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$product_id'");
    if (mysqli_num_rows($select_product) > 0) {
        $product = mysqli_fetch_assoc($select_product);
    } else {
        echo 'Product not found.';
        exit();
    }
} else {
    echo 'No product ID provided.';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="product_detailss.css">
 
</head>
<body>
<?php include 'header.php'; ?>


<div class="container11">
    <div class="product-details22">
        <div class="product-image33">
            <img src="./img/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
        </div>
        <div class="product-info0">
            <h1><?php echo htmlspecialchars($product['name']); ?></h1>
            <h4>Vintage designs often feature muted or sepia tones, giving a faded or aged appearance. Retro designs may incorporate bold, vibrant colors, often inspired by popular color schemes from the 1950s, 1960s, or 1970s.</h4>
            <br>
            <h4>Product Description :</h4>
            <h4>HomeInspo</h4>
            <h4>Aesthetic</h4>
            <h4>VintageFinds</h4>
            <br>
            <div class="price">Rs. <?php echo htmlspecialchars($product['price']); ?>/-</div>
            <p><?php echo htmlspecialchars($product['description']); ?></p>
            
            <form action="" method="post">
                <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product['name']); ?>">
                <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($product['price']); ?>">
                <input type="hidden" name="product_image" value="<?php echo htmlspecialchars($product['image']); ?>">
                <input type="submit" class="btn" value="Add to Cart" name="add_to_cart">
                <input type="submit" class="btn" value="Buy Now" name="buy_now">
            </form>
        </div>
    </div>
</div>
   <!-- Custom JS file link -->
   <script src="script.js"></script>
   <?php 
   include 'footer.php';
   ?>


</body>
</html>
