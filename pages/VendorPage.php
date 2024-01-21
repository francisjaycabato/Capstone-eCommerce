<?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    // Redirect to login or handle as appropriate
    header("Location: Login.php");
    exit();
}

// Include the database connection
$mysqli = require __DIR__ . "/Database.php";

// Get the logged-in user's ID
$user_id = $_SESSION["user_id"];

// Prepare the SQL query to fetch USERNAME of comments
$sql = "SELECT
            c.COMMENT_TEXT, c.STORE_ID, c.USER_ID, c.RATING,
            s.STORE_ID,
            u.USER_ID, u.USERNAME
        FROM
            user u
        JOIN
            comments c ON c.USER_ID = u.USER_ID
        JOIN
            stores s ON c.STORE_ID = s.STORE_ID
        WHERE s.USER_ID = ?";

// Prepare the statement
$stmt = $mysqli->prepare($sql);

// Bind parameters
$stmt->bind_param('i', $user_id);

// Execute query
$stmt->execute();

// Fetch the results
$result = $stmt->get_result();

// Prepare the SQL query to fetch comments
$sql2 =  "SELECT
            c.COMMENT_TEXT, c.STORE_ID, c.USER_ID, c.RATING,
            s.STORE_ID, s.STORE_NAME, s.USER_ID,
            u.USER_ID, u.USERNAME, u.FNAME, u.LNAME
        FROM
            stores s
        JOIN
            comments c ON s.STORE_ID = c.STORE_ID
        JOIN
            user u ON s.USER_ID = u.USER_ID
        WHERE u.USER_ID = ?";

// Prepare the statement
$stmt = $mysqli->prepare($sql2);

// Bind parameters
$stmt->bind_param('i', $user_id);

// Execute the query
$stmt->execute();

// Fetch the results
$result2 = $stmt->get_result();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Styles/VendorPage.css" />
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

    <!-- VENDOR NAVBAR -->
    <div class="vendor-navbar">
        <div>
            <ul class="vendor-nav-list" id="vendor-navi-list">
                <li class="vendor-list-item">
                    <a href="#" class="tab-link" data-tab="product-tab">Products</a>
                </li>
                <li class="vendor-list-item">
                    <a href="#" class="tab-link" data-tab="review-tab">Reviews</a>
                </li>
                <li class="vendor-list-item">
                    <a href="#" class="tab-link" data-tab="discount-tab">Discounts and Promotions</a>
                </li>
                <li class="vendor-list-item">
                    <a href="#" class="tab-link" data-tab="analytics-tab">Analytics and Reporting</a>
                </li>
            </ul>
        </div>
    </div>


    <!-- VENDOR TABS -->
    <div class="product-tab vendor-tab" id="product-tab">
        <div class="product-tab-content vendor-tab-content">
            <div class="product-item tab-content-item">
                Product 1
            </div>
            <div class="product-item tab-content-item">
                Product 2
            </div>
            <div class="product-item tab-content-item">
                Product 3
            </div>
            <div class="product-item tab-content-item">
                Product 4
            </div>
            <div class="product-item tab-content-item">
                Product 5
            </div>
        </div>
        

    </div>

        <!-- Display comments -->
        <div class="review-tab vendor-tab" id="review-tab">
        <div class="review-tab-content vendor-tab-content">
            <?php
                while ($row2 = $result2->fetch_assoc()) {
                    $row = $result->fetch_assoc()
                    ?>
                    <div class="review-item tab-content-item">
                        <p class="comment-username"><?php echo $row["USERNAME"]; ?></p></br>
                        <p class="comment-text"><?php echo $row2["COMMENT_TEXT"]; ?></p></br>
                        <?php
                            for ($x = 0; $x < $row2["RATING"]; $x++){
                        ?>
                                <span class="star-rating">&#9733</span>
                        <?php    
                            }
                        ?>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>

    <div class="discount-tab vendor-tab" id="discount-tab">
        <div class="discount-tab-content vendor-tab-content">
            discount tab
        </div>

    </div>

    <div class="analytics-tab vendor-tab" id="analytics-tab">
        <div class="analytics-tab-content vendor-tab-content">
            analytics tab
        </div>

    </div>

    <div class="footer-bottom">
        <p>&copy; 2023 eCommerce. All rights reserved.</p>
    </div>
    
    <script src="../script/VendorPage.js"></script>
</body>
</html>