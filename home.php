<?php
@include 'connection.php';
session_start(); // Start the session at the beginning

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Products</title>

   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="homes.css">
</head>

<body>
   <?php include 'header.php'; ?>

   <?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>



 <!-- Products Section -->
      <section class="products">
         <h1 class="heading1">Latest Products</h1>
         <div class="box-container">
            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
            if (mysqli_num_rows($select_products) > 0) {
               while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                  ?>
                  <form action="home.php" method="post">
                     <div class="box">
                        <img src="./img/<?php echo $fetch_product['image']; ?>" alt="">
                        <h3><?php echo $fetch_product['name']; ?></h3>
                        <div class="price">Rs. <?php echo $fetch_product['price']; ?>/-</div>
                        <input type="hidden" name="product_id" value="<?php echo $fetch_product['id']; ?>">
                        <input type="hidden" name="product_name" id="product_name" value="<?php echo $fetch_product['name']; ?>">
                        <input type="hidden" name="product_price" id="product_name" value="<?php echo $fetch_product['price']; ?>">
                        <input type="hidden" name="product_image" id="product_name" value="<?php echo $fetch_product['image']; ?>">
                        <input type="submit" class="btn" value="Add to Cart" name="add_to_cart">
                        <a href="product_details.php?product_id=<?php echo  $fetch_product['id'] ?>"> <input type="button" class="btn" value="Details" name="view_details"></a>

                       
                     </div>
                  </form>
                  <?php
               }
            }
            ?>
         </div>
      </section>


      
   

   <!-- Custom JS file link -->
   <script src="script.js"></script>
   <?php 
   include 'footer.php';
   ?>
   
</body>


</html>

