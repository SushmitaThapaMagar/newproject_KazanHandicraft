<?php
@include 'connection.php';
session_start();

if (!isset($_SESSION['userId'])) {
   header("Location: login.php");
   exit();
}

$userId = $_SESSION['userId'];
$query = isset($_GET['query']) ? $_GET['query'] : '';

// $search_query = "SELECT * FROM `products` WHERE name LIKE '%$query%'";
// $result = mysqli_query($conn, $search_query);


//Fuzzy Search Algorithm

// Fetch all products
$all_products = [];
$products_result = mysqli_query($conn, "SELECT * FROM `products`");
while ($row = mysqli_fetch_assoc($products_result)) {
    $all_products[] = $row;
}

// Fuzzy search using Levenshtein distance
$filtered_products = [];
$max_distance = 2; // Adjust this value for more/less strict matching

foreach ($all_products as $product) {
    $distance = levenshtein(strtolower($query), strtolower($product['name']));
    if ($distance <= $max_distance || stripos($product['name'], $query) !== false) {
        $filtered_products[] = $product;
    }
}






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
   <title>Search Results</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="search.css">
</head>
<body>
   <?php include 'header.php'; ?>

<section class="search-results">
    <h1 class="heading1">Search Results for "<?php echo htmlspecialchars($query); ?>"</h1>
    
<?php if (isset($message)) {
    foreach ($message as $msg) {
        if ($msg === 'Product already added to cart') {
            echo '<div class="alert-message">
                    <span>' . $msg . '</span>
                    <i class="fas fa-times close-icon" onclick="this.parentElement.style.display = `none`;"></i>
                  </div>';
        }
    }
} ?>

    <div class="box-container">
        <?php
        // if (mysqli_num_rows($result) > 0) {
        //     while ($fetch_product = mysqli_fetch_assoc($result)) {


        if (count($filtered_products) > 0) {
    foreach ($filtered_products as $fetch_product) {
                ?>
                <form action="search.php" method="post">
                    <div class="box">
                        <img src="./img/<?php echo $fetch_product['image']; ?>" alt="">
                        <h3><?php echo $fetch_product['name']; ?></h3>
                        <div class="price">Rs. <?php echo $fetch_product['price']; ?>/-</div>
                        <input type="hidden" name="product_id" value="<?php echo $fetch_product['id']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                        <div class="button-container">
                        <input type="submit" class="btn" value="Add to Cart" name="add_to_cart">
                        <a href="product_details.php?product_id=<?php echo $fetch_product['id']; ?>" class="btn">Details</a>
                    </div>
                    </div>
                </form>
                <?php
            }
        } else {
            echo '<p>No products found.</p>';
        }
        ?>
    </div>
</section>


</body>

</html>

