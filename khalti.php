<?php
if($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['order_btn'])){
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
    "return_url": "http://localhost/newproject/checkout.php",
    "website_url": "http://localhost/newproject/index.php",
    "amount": "5000",
    "purchase_order_id": "Order01",
    "purchase_order_name": "test",

    "customer_info": {
        "name": "Test Bahadur",
        "email": "test@khalti.com",
        "phone": "9800000001"
    }
    }

    ',
        CURLOPT_HTTPHEADER => array(
            'Authorization: key e5f1d95ac5244cd4986bcf7660d695c8',
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