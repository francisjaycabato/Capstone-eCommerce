<?php
    session_start();

    if (isset($_SESSION["user_id"])){
        $mysqli = require __DIR__ . "/Database.php";

        $sql = "SELECT * FROM stores
            WHERE USER_ID = {$_SESSION["user_id"]}";
            $user_id = $_SESSION["user_id"];
            $result = $mysqli->query($sql);
            $user = $result->fetch_assoc();

        $sql2 = "SELECT 
                    STORE_ID, 
                    STORE_NAME, 
                    USERNAME, 
                    USER_ID, 
                    DESCRIPTION, 
                    LOCATION, 
                    CONTACT_EMAIL, 
                    CONTACT_PHONE 
                FROM 
                    stores 
                WHERE 
                    USER_ID = $user_id";
        $result2 = $mysqli->query($sql2);
       
        if ($result2->num_rows > 0) {
            // Fetch data and store it in variables
            while ($row = $result2->fetch_assoc()) {
                $store_id = $row['STORE_ID'];
                $store_name = $row['STORE_NAME'];
                $username = $row['USERNAME'];
                $description = $row['DESCRIPTION'];
                $location = $row['LOCATION'];
                $contact_email = $row['CONTACT_EMAIL'];
                $contact_phone = $row['CONTACT_PHONE'];
            }
        }
    }
    $mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Styles/VendorPage.css" />
    <link rel="stylesheet" type="text/css" href="../Styles/MyStore.css" />
    <title>Vendor Page</title>
</head>
<body>

    <!-- MAIN NAVBAR -->
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
                <a href="MyStore.php">My Store</a>
            </li>
            <li class="list-item">
                <a href="LogOut.php">Logout</a>
            </li>
        </ul>
    </nav>
        
    <div class="store-name">
        <h1><?php echo $store_name ?></h1>
    </div>
    <div class="description">
        <?php echo $description ?>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2023 eCommerce. All rights reserved.</p>
    </div>
    
    <script src="../script/VendorPage.js"></script>
</body>
</html>