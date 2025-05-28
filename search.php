<?php


// Connect to your database
$mysqli = new mysqli("localhost", "root", "", "shop_db");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = $mysqli->real_escape_string($_GET['query']);

// SQL query to search products
$sql = "SELECT * FROM products WHERE name LIKE '%$query%' OR price LIKE '%$query%'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="product-container">'; // Add a wrapper for styling
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product-item'>"; // Use the same class as home page
        
        echo "<img src='" . $row['image'] . "' alt='" . $row['name'] . "'>";
        echo "<h2>" . $row['name'] . "</h2>";
        echo "<p>Price: Rs. " . $row['price'] . "</p>";
        echo "<button>Add to Cart</button>"; // Add any other buttons you need
        echo "<button>Details</button>"; // Add details button if necessary
        echo "</div>";
    }
    echo '</div>'; // Close the wrapper
} else {
    echo "No products found.";
}

$mysqli->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="search.css">
</head>

<body>
   <?php include 'header.php'; ?>



</html>
