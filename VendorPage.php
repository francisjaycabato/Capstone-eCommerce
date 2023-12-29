<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Styles/VendorPage.css" />
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

    <div class="review-tab vendor-tab" id="review-tab">
        <div class="review-tab-content vendor-tab-content">
            <div class="review-item tab-content-item">
                Review 1
            </div>
            <div class="review-item tab-content-item">
                Review 2
            </div>
            <div class="review-item tab-content-item">
                Review 3
            </div>
            <div class="review-item tab-content-item">
                Review 4
            </div>
            <div class="review-item tab-content-item">
                Review 5
            </div>
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
    
    <script src="script\VendorPage.js"></script>
</body>
</html>