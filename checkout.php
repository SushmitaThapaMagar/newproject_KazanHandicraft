<?php
@include 'connection.php';
session_start(); // Start the session

// Check if user is logged in
if (!isset($_SESSION['valid'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}
error_reporting(E_ERROR | E_PARSE);

//for khalti integration

if($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $grand_total=$_POST['grand']*100;


   $curl = curl_init();
   curl_setopt_array($curl, array(
       CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/initiate/',
       CURLOPT_RETURNTRANSFER => true,
       CURLOPT_ENCODING => '',
       CURLOPT_MAXREDIRS => 10,
       CURLOPT_TIMEOUT => 0,
       CURLOPT_FOLLOWLOCATION => true,
       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
       CURLOPT_CUSTOMREQUEST => 'POST',
       CURLOPT_POSTFIELDS => '{
   "return_url": "http://localhost/newproject/message.php",
   "website_url": "http://localhost/newproject/index.php",
   "amount": "'.$grand_total .'",
   "purchase_order_id": "Order01",
   "purchase_order_name": "test",

   "customer_info": {
       "name": "'.$name .'",
       "email": "'.$email .'",
       "phone": "9800000001"
   }
   }

   ',
       CURLOPT_HTTPHEADER => array(
           'Authorization: key 298d9996382142efaf44f00b33f3fec1',
           'Content-Type: application/json',
       ),
   ));

   $response = curl_exec($curl);


   echo $response;

   if (curl_errno($curl)) {
   echo 'Error:' . curl_error($curl);
} else {
   $responseArray = json_decode($response, true);

       if (isset($responseArray['error'])) {
       echo 'Error: ' . $responseArray['error'];
   }
   if (isset($responseArray['payment_url'])) {
       // Redirect the user to the payment page
       header('Location: ' . $responseArray['payment_url']);
   } else {
       echo 'Unexpected response: ' . $response;
   }
}

   curl_close($curl);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>

   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="checkout.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container1">

   <section class="checkout-form">

      <h1 class="heading1">Complete Your Order</h1>

      <form action="" method="post">

         <div class="display-order">
            <?php
               $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
               $total = 0;
               $grand_total = 0;
               if(mysqli_num_rows($select_cart) > 0){
                  while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                  $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
                  $grand_total = $total += $total_price;
            ?>
            <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
            <?php
               }
            }else{
               echo "<div class='display-order'><span>Your cart is empty!</span></div>";
            }
            ?>
            
            <span class="grand-total">Grand Total: Rs.<?= $grand_total; ?>/-</span>
            <input type="hidden" name="grand" value="<?= $grand_total; ?>">
         </div>

         <div class="flex">
            <div class="inputBox">
               <span>Your Name</span>
               <input type="text" placeholder="Enter your name" name="name" required>
            </div>
            <div class="inputBox">
               <span>Your Number</span>
               <input type="number" placeholder="Enter your number" name="number" value="1" required>
            </div>
            <div class="inputBox">
               <span>Your Email</span>
               <input type="email" placeholder="Enter your email" name="email" value="<?php echo $_SESSION['valid']; ?>" required>
            </div>
            <div class="inputBox">
               <span>Payment Method</span>
               <select name="method">
                  <!-- <option value="Cash on delivery" selected>Cash on Delivery (COD)</option> -->
                  <option value="" selected>Khalti</option>
                  <!-- <option value="credit card">Credit Card</option>
                  <option value="paypal">PayPal</option> -->
               </select>
            </div>
            <div class="inputBox">
               <span>Address Line 1</span>
               <input type="text" placeholder="e.g. flat no." name="flat" required>
            </div>
            <div class="inputBox">
               <span>Address Line 2</span>
               <input type="text" placeholder="e.g. street name" name="street" required>
            </div>
            <div class="inputBox">
               <span>City</span>
               <input type="text" placeholder="e.g. Chapagoun" name="city" required>
            </div>
            <div class="inputBox">
               <span>State</span>
               <input type="text" placeholder="e.g. Bajra Barahi" name="state" required>
            </div>
            <div class="inputBox">
               <span>Country</span>
               <input type="text" placeholder="e.g. Nepal" name="country" required>
            </div>
            <div class="inputBox">
               <span>Pin Code</span>
               <input type="text" placeholder="e.g. 3456" name="pin_code" required>
            </div>
         </div>
         <input type="submit" value="Order Now" name="order_btn" class="btn">
      </form>

   </section>

</div>


   
</body>
<!-- Custom JS file link -->
<script src="script.js"></script>
<?php include 'footer.php'; ?>
</html>


