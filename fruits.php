<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruits</title>
    <link rel="stylesheet" type="text/css" href="item.css">
    <!--Bootstrap 5 CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Font Awsome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!--boxicons link-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="home.css">
    
</head>
<body>
    <!--Header Section-->
    <header class="header">
        <nav class="navbar">
            <div class="logo">
                <img src="images/logo.png" alt="logo">
            </div>
            <div class="nav-item">
                <a href="home.html">Home</a>
                <div class="dropdown-container">
                    <a href="#" style="border-bottom: 2px solid rgb(8, 48, 10);">Categories <i class="ri-arrow-drop-down-fill"></i></a>
                    <ul class="dropdown">
                        <li><a href="vegetables.php">Vegetables</a></li>
                        <li><a href="fruits.php">Fruits</a></li>
                        <li><a href="meats.php">Meats</a></li>
                    </ul>
                </div>
                <a href="about.html">About</a>
                <a href="contact.html">Contact</a>
            </div>
            <form id="form" action="search.php" method="get">
                <div class="header-icons">
                    <div class="search-box">
                        <input type="text" id="search-value" name="search-value" placeholder="Search here...">
                        <!--<a href="#"><i class="ri-search-line"></i></a>-->
                        <button style="border-radius: 50%; background-color: rgb(11, 41, 13); color: aliceblue; " 
                        name="search" type="submit"><i class="ri-search-line"></i></button>
                    </div>
                    <a href="#"><i class="ri-shopping-cart-fill"></i></a>
                    <a href="#"><i class="ri-user-fill"></i></a>
                </div>
            </form>
        </nav>
    </header> 
    <!--Banner Section Design-->
    <section class="item-banner" style="background-image: url(images/fruit.jpg);">
        <div class="item-container">
            <h4>Fresh</h4>
            <h1>Fruits</h1>
        </div>
    </section>
    <!--Item Section Design-->
    <section class="items">
        <div class="grid-container">
            <?php
                $con = new mysqli('localhost','root','root','fresh_mart');
                $sql = "select * from fruits";
                $result = mysqli_query($con,$sql);
                while($row = mysqli_fetch_assoc($result))
                {
            ?>       
                    <div class="grid-item" style="padding:6%">
                        <img style="width: 120px;height: 120px;" src="<?php echo $row['img_url']?>"><br><br>
                        <label class="name"><?php echo $row['name']?></label><br><br>
                        <label class="prise">Rs <?php echo $row['price']?></label><br><br>
                        <button class="cart-btn"><i class="ri-shopping-cart-2-fill"></i> Add to Cart</button>
                    </div>
            <?php
                }
                $con->close();
            ?>
           
        </div> 
    </section>
    <!--Footer Section Design-->
    <section class="footer">
        <div class="newsletter">
            <div><img src="images/logo.png"></div>
            <div>
                <input type="text" placeholder="Enter your email to subscribe to our newsletter"> 
                <button class="newsletter-btn">Submit</button>
            </div>
        </div><br>
        <div class="footer-content">
            <div class="footer-item">
                <p>ASP Marketing Services Pvt.Ltd<br>No.12, Vauxhall Street, Colombo 10.</p>
                <h3><i class="ri-phone-fill"></i>+94 11 2213652</h3>
                <p>(Daily operating hours 8.00a.m to 8.00p.m)</p>
            </div>
            <div class="footer-item">
                <h4>Quick Links</h4>
                <hr>
                <a href="home.html">Home</a><br>
                <a href="about.html">About</a><br>
                <a href="contact.html">Contact</a><br>
                <a href="login.html">Login</a><br>
            </div>
            <div class="footer-item">
                <h4>Categories</h4>
                <hr>
                <a href="vegetables.php">Vegetables</a><br>
                <a href="fruits.php">Fruits</a><br>
                <a href="meats.php">Meats</a><br>
            </div>
            <div class="footer-item">
                <h4>Social</h4>
                <hr>
                <div class="social">
                    <a href="#"><i class="ri-instagram-fill"></i></a>
                    <a href="#"><i class="ri-twitter-fill"></i></a>
                    <a href="#"><i class="ri-facebook-circle-fill"></i></a>
            </div>
                </div>
                
        </div>
    </section>
    <!--Copyright Section Design-->
    <section class="copyright">
        <p>Copyright <i class="ri-copyright-line"></i> Group 10 WEB Mini_Project.All Rights Reserved</p>
    </section>
</body>
</html>