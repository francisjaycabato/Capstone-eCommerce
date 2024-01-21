<?php
// For invalid login input
$is_invalid = false;
// Check if success parameter is set
if (isset($_GET['success']) && $_GET['success'] == 1) {
    // Display success alert
    echo "<script>alert('Registration successful!');</script>";
    header("Refresh:2; url='index.php'");
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "/Database.php";
    $sql = sprintf(
        "SELECT * FROM user
            WHERE USERNAME ='%s'",

        $mysqli->real_escape_string($_POST["username"])
    );

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {
        //to verify the input password and the password_hash match
        if (password_verify($_POST["password"], $user["PASSWORD_HASH"])) {

            if ($user["IS_ADMIN"] == 1) {


                session_start();
                session_regenerate_id();
                $_SESSION["user_id"] = $user["USER_ID"];

                header("Location: AdminHomePage.php");
                exit;
            } if ($user["IS_VENDOR"] == 1) {
                session_start();
                session_regenerate_id();
                $_SESSION["user_id"] = $user["USER_ID"];

                header("Location: VendorPage.php");
                exit;
            
            } else {
                session_start();
                session_regenerate_id();
                $_SESSION["user_id"] = $user["USER_ID"];

                header("Location: HomePage.php");
                exit;
            }
        }
    }
    $is_invalid = true;

    //var_dump($user);
    //exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Styles/MainPage.css" />
    <title>Main Page</title>
</head>

<body>
    <nav class="navbar">
        <div>
            <p>ECOMMERCE PLATFORM</p>
        </div>
        <ul class="nav-list" id="navi-list">
            <li class="list-item">
                <a href="#" onclick="document.getElementById('login-modal').style.display='block'">Login</a>
            
            <li class="list-item">
                <a href="SignUp.php">Sign Up</a>
            </li>
        </ul>
        <div class="menu" id="burger-button">
            <div class="menu-line"></div>
            <div class="menu-line"></div>
            <div class="menu-line"></div>
        </div>
    </nav>
    <div class="grid-container">
        <div class="grid-item">
            Welcome to [Your E-Commerce Platform] </br> – Where Style Meets Convenience!
            <p>Please sign up or log in to begin.</p>
        </div>
        <hr>
        
    </div>

    <div class="welcome-message">
        At [Your E-Commerce Platform], </br> we believe that every click should spark joy! 
        </br>Immerse yourself in a world of fashion, functionality, and unbeatable deals as you explore our vast collection. 
        </br>From the trendiest apparel to must-have accessories, we have curated the perfect shopping experience just for you.
    </div>

    <div class="switch-container">
            <label class="switch">
                <input type="checkbox" id="toggle" checked="true">
                        <span class="slider"></span>
            </label>
    </div>
    

    <div class="grid-container" id="shopper-text">
        <div class="grid-item">
            Why Choose [Your E-Commerce Platform]?
        </div>
        <hr>
        <div class="grid-item">
            <span class="section-header">Fashion Forward </span>
            </br> Stay ahead of the style curve with our handpicked selection of the latest trends. 
            Our team scours the globe to bring you the hottest looks, ensuring you step out in style every time.
        </div>
        <hr>
        <div class="grid-item">
            <span class="section-header">Irresistible Deals</span> 
            </br> Who said you can't have it all? Enjoy exclusive discounts, seasonal promotions, 
            and limited-time offers that make upgrading your wardrobe a guilt-free pleasure.
        </div>
        <hr>
        <div class="grid-item">
            <span class="section-header">Effortless Shopping </span>
            </br> Say goodbye to the hassle of traditional shopping. With just a few clicks, your favorite items are on their way to your doorstep. 
            We've made the checkout process seamless, ensuring your time is spent on what matters – choosing the perfect pieces.
        </div>
        <hr>
        <div class="grid-item">
            <span class="section-header"> Global Inspiration, Local Flavor</span>
            </br> Explore fashion that transcends borders. Our collections are inspired by the latest global trends while embracing the unique essence of local style. 
            Discover a world of possibilities right at your fingertips.
        </div>
        <hr>
        <div class="grid-item">
            <span class="section-header">Personalized Recommendations </span>
            </br> Let our smart algorithms be your personal stylist. 
            Enjoy tailored recommendations based on your preferences, ensuring that every purchase reflects your unique taste.
        </div>
        <hr>
        <div class="grid-item">
            <span class="section-header">Express Delivery </span>
            </br> We understand that anticipation is part of the thrill. 
            Experience the joy of quick and reliable deliveries, ensuring your fashion finds reach you in record time.
        </div>
        <hr>
        <div class="grid-item">
            <span class="section-header">Customer-Centric Approach</span> 
            </br> Your satisfaction is our priority. Our dedicated support team is ready to assist you at every step. 
            Have a question or concern? We're just a message away!
        </div>
        <hr>
        <div class="grid-item">
            <span class="section-header">Elevate your shopping experience with us. </span>
            </br> Join our community of fashion enthusiasts, trendsetters, and savvy shoppers. 
            Your journey to a more stylish and convenient lifestyle begins now.
        </div>
        <hr>
        <div class="grid-item">
            Ready to redefine your wardrobe? </br> Start shopping at [Your E-Commerce Platform] today!
        </div> 
    </div>


    <div class="grid-container" id="vendor-text">
        <div class="grid-item">
            <span class="section-header">Sell with [Your E-Commerce Platform] – Elevate Your Brand! </span> 

            </br>Welcome to [Your E-Commerce Platform], the ultimate platform for sellers looking to showcase their products to a global audience. 
            Join us on a journey where your brand takes center stage, and your creations find their way into the hearts and homes of enthusiastic buyers.
        </div>
        <hr>
        <div class="grid-item">
            <span class="section-header">Why Partner with [Your E-Commerce Platform]?</span> 
        </div>
        <hr>
        <div class="grid-item">
            <span class="section-header">Global Reach </span> 
            </br> Expand your market reach beyond borders. With [Your E-Commerce Platform], 
            your products have the potential to captivate customers from every corner of the globe.
        </div>
        <hr>
        <div class="grid-item">
            <span class="section-header">User-Friendly Platform </span> 
            </br> List your products effortlessly with our user-friendly seller dashboard. 
            Manage inventory, track sales, and gain insights into your business performance with just a few clicks.
        </div>
        <hr>
        <div class="grid-item">
            <span class="section-header">Marketing Support</span> 
            </br> Benefit from our marketing initiatives designed to give your brand the visibility it deserves. 
            From social media campaigns to featured spotlights, we're committed to making your brand stand out.
        </div>
        <hr>
        <div class="grid-item">
            <span class="section-header">Sales Analytics</span> 
            </br> Understand your audience better with detailed analytics. 
            Track sales trends, customer preferences, and optimize your strategies to maximize your sales potential.
        </div>
        <hr>
        <div class="grid-item">
            <span class="section-header">Custom Storefront</span> 
            </br> Personalize your storefront to reflect your brand's identity. 
            Showcase your products in a way that resonates with your target audience, creating a unique and memorable shopping experience.
        </div>
        <hr>
        <div class="grid-item">
            <span class="section-header">Quality Assurance</span>     
            </br> Our commitment to quality extends to our sellers. 
            Rest assured that your products will be showcased alongside other premium brands, creating an environment where quality shines.
        </div>
        <hr>
        <div class="grid-item">
            <span class="section-header">Secure Transactions</span>  
            </br> Enjoy peace of mind with our secure payment gateway. 
            Your transactions are protected, providing a safe and reliable shopping experience for both you and your customers.
        </div>
        <hr>
        <div class="grid-item">
            <span class="section-header">Join the [Your E-Commerce Platform] Seller Community Today!</span>  
            </br>Discover the potential to grow your brand and connect with a community of sellers who share your passion. 
            Take the next step in your entrepreneurial journey with </br> [Your E-Commerce Platform].
            </br>Ready to elevate your brand? Become a seller at [Your E-Commerce Store] today!
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2023 eCommerce. All rights reserved.</p>
    </div>


    <!-- The login modal -->
    <div id="login-modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('login-modal').style.display='none'">&times;</span>
            <h2>Login</h2>
            <hr>
            <?php if ($is_invalid) : ?>
                <em>
                    <font color="red">Invalid Login</font>
                </em>
            <?php endif; ?>

            <form class="login-form" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Password">

                <button type="submit">Login</button>
            </form>
        </div>
    </div>
    <script>
        // Get the login modal
        var modal = document.getElementById('login-modal');

        var toggle = document.getElementById('toggle');
        var menu1 = document.getElementById('shopper-text');
        var menu2 = document.getElementById('vendor-text');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        const toggleButton = document.getElementById('burger-button');
        const naviList = document.getElementById('navi-list');

        toggleButton.addEventListener('click', () => {
            naviList.classList.toggle('active');
        })

        menu1.style.display = 'none';

        toggle.onchange = function () {
            if (toggle.checked) {
                menu2.style.display = 'grid';
                menu1.style.display = 'none';
            } else {
                menu1.style.display = 'grid';
                menu2.style.display = 'none';
            }
        };
    </script>
</body>

</html>