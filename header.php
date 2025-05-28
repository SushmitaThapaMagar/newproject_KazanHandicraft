<?php 
error_reporting(E_ERROR | E_PARSE);
session_start();
$cartNumber = 0;
require_once("./connection.php");
$select_cart = mysqli_query($conn, "SELECT count(id) as number FROM `cart`");
if (mysqli_num_rows($select_cart) > 0) {  
   $row = $select_cart->fetch_assoc(); 
   $cartNumber = $row["number"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="Connect.css">
    <!-- Font Awesome for Icons -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://kit.fontawesome.com/f30fac2c61.js" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Catamaran:wght@200;400;700&family=Courgette&family=Roboto:wght@300;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Navigation Bar -->
        <nav>
            <div class="icon">
                <h1 class="logo">Kazan's Handicraft</h1>
            </div>
            <div class="menu">
                <ul>
                    <li><a id="home" href="index.php">Home</a></li>
                    <li><a id="shop" href="home.php">Shop</a></li>
                    <li><a id="blog" href="blog.php">Blog</a></li>
                    <li><a id="about" href="about.php">About</a></li>
                    <li><a id="contact" href="contact.php">Contact</a></li>


                    <li>
                        <form action="search.php" method="GET">
                            <input type="text" name="query" placeholder="Search products..." required>
                            <button type="submit">Search</button>
                        </form>
                    </li>



                    <?php if (isset($_SESSION['valid'])): ?>
                        <!-- Links for logged-in users -->
                        <li><a id="cart" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"><span></span></i> (<?php echo $cartNumber ?>)</a></li>
                        <li><a href="users.php"><i class="fa-solid fa-user"></i></a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <!-- Links for logged-out users --  fr>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    <?php endif; ?>

                    <!-- <li class="search-container">
                        <input class="srch" type="text" placeholder="Search for products...">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </li> -->
                </ul>
            </div>
        </nav>

        
    </div>
</body>
</html>
