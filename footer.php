<?php

require_once 'connection.php';

$sql = "SELECT * FROM products";
$all_product = $conn->query($sql);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="footer.css">
    <script src="https://kit.fontawesome.com/f30fac2c61.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Catamaran:wght@200&family=Courgette&family=Edu+TAS+Beginner:wght@700&family=Lato:wght@300;900&family=Mukta:wght@700&family=Mulish:wght@300&family=Open+Sans&family=PT+Sans:ital,wght@1,700&family=Poppins:wght@300&family=Raleway:wght@100&family=Roboto&family=Roboto+Condensed:wght@700&family=Roboto+Slab&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Catamaran:wght@200&family=Courgette&family=Edu+TAS+Beginner:wght@700&family=Lato:wght@300;900&family=Mukta:wght@700&family=Mulish:wght@300&family=Open+Sans&family=PT+Sans:ital,wght@1,700&family=Piedra&family=Poppins:wght@300&family=Raleway:wght@100&family=Roboto&family=Roboto+Condensed:wght@700&family=Roboto+Slab&display=swap"
        rel="stylesheet">
</head>

<body>
<div class="wrapper">

    <!-- Footer -->
<div class="Mainfooter">
    <footer class="footer">
    <div class="container">
        <div class="footer-column">
            <h3>Kazans</h3>
            <p>Service</p>
            <p>Customer</p>
            <p>Satisfaction</p>
        </div>
        <div class="footer-column">
            <h3>About Us</h3>
            <p><b>Address:</b> Near Gyan Complex, Chapagaoun, Lalitpur</p>
        </div>
        <div class="footer-column">
            <h3>Contact</h3>
            <p>9812032158</p>
            <p><b>Email:</b> <a href="mailto:kazancollab@gmail.com">kazancollab@gmail.com</a></p>
        </div>
        <div class="footer-column">
            <h3>Blog</h3>
            <p><a href="blog.php">Company</a></p>
            <p><a href="blog.php">Products</a></p>
        </div>
        <div class="footer-column">
            <h3>More</h3>
            <p><a href="#">Visit Us</a></p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Kazans. All rights reserved.</p>
    </div>
</footer>
</div>

    <div class="kazan"><a id="" onclick="" href="https://www.facebook.com/profile.php?id=100093683500155&sk=about"><i
                class="fa-brands fa-facebook-messenger"></i></a>
            </div>
    <!-- LOGOUT -->
</div>
</body>

</html>