<?php
// Check if success parameter is set
if(isset($_GET['update_success']) && $_GET['update_success'] == 1){
    // Display success alert
    echo "<script>alert('Update successful!');</script>";
    header( "Refresh:2; url='HomePage.php'");

  }

session_start();

if (isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/Database.php";

    $sql = "SELECT * FROM user
            WHERE ID = {$_SESSION["user_id"]}";

            $result = $mysqli->query($sql);
            $user = $result->fetch_assoc();

            //to redirect admin to admin homepage
            if ($user["IS_ADMIN"] == 1){
                header("Location: AdminHomePage.php");
                exit;
            }

    $sql2 = "SELECT STORE_NAME
            FROM stores
            ORDER BY RAND() LIMIT 1";

    $result2 = $mysqli->query($sql2);
       
        if ($result2->num_rows > 0) {
            // Fetch data and store it in variables
            while ($row = $result2->fetch_assoc()) {
                $store_name = $row['STORE_NAME'];
            }
        }

    $sql3 = "SELECT PRODUCT_NAME, PRODUCT_PRICE, DESCRIPTION, COLOR, SIZE
            FROM products";
    
    $result3 = $mysqli->query($sql3);

    if ($result3->num_rows > 0) {
        while ($row = $result3->fetch_assoc()) {
            $product_name = $row["PRODUCT_NAME"];
            $price = $row["PRODUCT_PRICE"];
            $description = $row["DESCRIPTION"];
            $color = $row["COLOR"];
            $size = $row["SIZE"];
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
    <link rel="stylesheet" type="text/css" href="../Styles/HomePage.css" />
    <link rel="stylesheet" type="text/css" href="../Styles/ImgModal.css" />
    <title>HomePage</title>
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
    <?php if (isset($user)):?>
        <h1 style="text-align:center;">Welcome,  <?= htmlspecialchars($user["USERNAME"]) ?></h1>
    <?php else: ?>
    <?php header("Location: HomePage.php"); ?>
    <?php endif; ?>

    <!-- SEARCH BAR -->
    <div class="search-container">
        <input class="search-bar" type="text" placeholder="What are you searching for?">
    </div>

    <!-- FEATURED STORE -->
    <div class="featured">
        <h2><?php echo $store_name ?></h2>
        <div class="featured-store-content scroller">
            <div class="scroller-inner">
                <!-- Modal trigger -->
                <img src="..\images\products\Hoodie_Frog1_black.jpg" alt="Hoodie_Frog1_black" id="img-modal-trigger">
                <img src="..\images\products\HoodieSet1_blue.jpg" alt="HoodieSet1_blue">
                <img src="..\images\products\shorts_drawstrings_black.jpg" alt="shorts_drawstrings_black">
                <img src="..\images\products\sweatpants1_darkgrey.jpg" alt="sweatpants1_darkgrey">
                <img src="..\images\products\tshirt_natural.jpg" alt="tshirt_natural">
                <img src="..\images\products\swimmingtrunks1_orange.jpg" alt="swimmingtrunks1_orange">
            </div>    
        </div>
    </div>

    <!-- TOP SELLER STORE  -->
    <div class="featured">
        <h2>TOP SELLER</h2>
        <div class="featured-store-content scroller">
            <div class="scroller-inner">
                <img src="..\images\products\tshirt_darkgrey.jpg" alt="tshirt_darkgrey">
                <img src="..\images\products\sweatpants1_indigo.jpg" alt="sweatpants1_indigo">
                <img src="..\images\products\sweatpants1_black.jpg" alt="sweatpants1_black">
                <img src="..\images\products\HoodieSet1_red.jpg" alt="HoodieSet1_red">
                <img src="..\images\products\JeanJacket1.jpg" alt="JeanJacket1">
                <img src="..\images\products\Jeans1.jpg" alt="Jeans1">
            </div>    
        </div>
    </div>
</div>

    <div class="img-modal-container">
        <div class="left">
            <!-- Modal trigger -->
            <img src="..\images\products\Hoodie_Frog1_black.jpg" alt="Hoodie_Frog1_black" id="img-modal-trigger">
            <!-- img modal-->    
            <div class="img-modal" id="img-modal">
                    <!-- img modal close button -->
                    <span class="close-img-modal">&times;</span>
                    <!-- img modal content -->
                    <img src="" alt="" class="modal-content" id="img01">
                    <div class="product-content">
                        <?php echo $product_name ?> <?php echo $price ?>
                        <p> <?php echo $description ?> </p>
                    </div>
            </div>
        </div>
        <div class="right"></div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2023 eCommerce. All rights reserved.</p>
    </div>

    <script src="../script/HomePage.js"></script>
    <script src="../script/ImgModal.js"></script>
</body>
</html>