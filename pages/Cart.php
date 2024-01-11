<?php
function getSalesTax($province) {
    $url = "https://api.salestaxapi.ca/v2/province/$province";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_URL, $url);

    $response = curl_exec($curl);

    if (isset($response) && !curl_error($curl) ) {
        $parsed_response = json_decode($response, true); 
    } else {
        echo curl_error($curl);
    }

    curl_close($curl);

    return $parsed_response;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Styles/HomePage.css" />
    <title>Cart</title>
</head>
<body>
    <nav class="navbar">        
        <div>
            <ul class="nav-list" id="navi-list">
                <li class="list-item">
                    eCommerce Platform
                </li>
                <li class="list-item">
                    <a href="Homepage.php">Home</a>
                </li>
                <li class="list-item">
                    <a href="About.php">About</a>
                </li>
                <li class="list-item">
                    <a href="Services.php">Services</a>
                </li>
                <li class="list-item">
                    <a href="ContactUs.php">Contact Us</a>
                </li>
            </ul>
        </div>
        <ul class="nav-list" id="navi-list">
            <li class="list-item">
                <a href="Update.php">Profile</a>
            </li>
            <li class="list-item">
                <a href="Cart.php">Cart</a>
            </li>
            <li class="list-item">
                <a href="LogOut.php">Logout</a>
            </li>
        </ul>
    </nav>

    <div>
        <?php 
            $sales_tax = getSalesTax('qc');
            $product = $_GET['product'];
            $price = (float)$_GET['price'] * $_GET['qty'];
            $gst = number_format($price * $sales_tax['gst'], 2, '.', '');
            $pst = number_format($price * $sales_tax['pst'], 2, '.', '');
            $order_total = number_format($price + $pst + $gst, 2, '.', '');

            echo "<p>Item: $product</p>";
            echo "<p>Total before tax: \$$price</p>";
            echo "<p>Estimated GST: \$$gst</p>";
            echo "<p>Estimated PST: \$$pst</p>";
            echo "<p>Order Total: \$$order_total</p>";
        ?>   
        <a href="Homepage.php">Continue shopping</a>
        <a href="#">go to checkout</a>
    </div>
</body>
</html>