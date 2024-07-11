<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Website</title>
    <link rel="icon" href="images/logo/newlogo.png">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <section>
        <div class="banner">
            <div class="navbar">
                <img src="images/logo/FITHUB IMG.PNG" class="logo" alt="logo">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li><a href="#dietplan">Diet Plan</a></li>
                    <!-- <li><a href="#contactUs">Contact us</a></li> -->
                    <li>
                        <?php
                        if (isset($_SESSION['auth']) && $_SESSION['auth']) {
                            echo '<a href="logout.php" class="hero-btn">Logout</a>';
                        } else {
                            echo '<a href="login.php" class="hero-btn">Login</a>';
                        }
                        ?>

                    </li>
                </ul>
            </div>
            <div class="text-box">
                <h1>Welcome to Gym Website</h1>
                <p>A Complete Gym Solution</p>
                <a href="#aboutus" class="hero-btn">Visit us to know more</a>
            </div>
        </div>
    </section>

    <!-------About------->
    <section class="about" id="aboutus">
        <h1>About Us</h1>
        <p>Welcome to Gym website</p>
        <div class="row">
            <div class="about-img">
                <img src="images/index/about.png" alt="about">
            </div>
            <div class="about-col">
                <h3>Introduction</h3>
                <p>Nepal’s Best Gym – Fithub was voted Best Gym in Nepal, 3 years in a row! We are a friendly and inclusive-focused gym offering a range of Classes, Free Weights, Machines, Free Towels, Free Parking, Hot Tubs, Steam-Rooms, Saunas and Court Sports (basketball, pickleball, wallyball, handball, racquetball & squash)! We are a locally owned fitness & wellness facility geared for all types of people regardless of gender, size, age or ability. Most of all, we’re a fun, clean and welcoming family of employees & members.</p>
            </div>
        </div>
    </section>

    <!-- pricing-->
    <section class="pricing" id="pricing">
        <h1>Pricing</h1>
        <div class="row-price">
            <div class="pricing-col">
                <h3>1 MONTH </h3>
                <h4>Rs2500</h4>
                <p>✔ Free Shower<br><br>✔ Free bottle<br><br>✔ 3-hrs Gym time per day</p>
                <a href="signup.php" class="hero">Join Now</a>
            </div>
            <div class="pricing-col">
                <h3>3 MONTH</h3>
                <h4>Rs5000</h4>
                <p>✔ Free Shower<br><br>✔ Free Bottle<br><br>✔ Unlimited Gym Time</p>
                <a href="signup.php" class="hero">Join Now</a>
            </div>
            <div class="pricing-col">
                <h3>6 MONTH</h3>
                <h4>Rs8000</h4>
                <p>✔ Free Shower<br><br>✔ Free Bottle<br><br>✔ Unlimited Gym Time<br><br>✔ Free Trainer</p>
                <a href="signup.php" class="hero">Join Now</a>
            </div>
        </div>
    </section>


    <!------ Diet Plan ------>
    <section class="dietplan" id="dietplan">
        <h1>Our Diet plan</h1>
        <p>This is our following dietplan For Healthy Diet, Weight Loss, Muscle Gain.</p>
        <div class="row">
            <div class="pop" id="img1" style="display: none;">
                <img src="images/index/healthy.jpeg" alt="healthy">
            </div>
            <div class="diet-col" id="pop" onclick="popup('img1')">
                <img src="images/index/healthy.jpeg" alt="healthy">
                <div class="layer">
                    <h3>For healthy Diet</h3>
                </div>
            </div>
            <div class="pop" id="img2" style="display: none;">
                <img id="img2" src="images/index/dietplan.jpg" alt="dietplan">
            </div>
            <div class="diet-col" onclick="popup('img2')">
                <img id="img2" src="images/index/dietplan.jpg" alt="dietplan">
                <div class="layer">
                    <h3>For weight loss</h3>
                </div>
            </div>
            <div class="pop" id="img3" style="display: none;">
                <img src="images/index/muscle.jpg" alt="muscle">
            </div>
            <div class="diet-col" id="pop" onclick="popup('img3')">
                <img src="images/index/muscle.jpg" alt="muscle">
                <div class="layer">
                    <h3>For muscle gain</h3>
                </div>
            </div>
        </div>
    </section>


    <!----- Call to action ----->
    <section class="cta">
        <h1>Enroll for our various online classes <br>Anywhere from the world</h1>
        <a href="about.php" class="hero-btn">ABOUT US</a>
    </section>


    <!----- footer----->
    <div class="footer">
        <div class="logo-column">
            <img src="./images/logo/FITHUB IMG.PNG" alt="" class="footer-logo">
        </div>
        <div class="contact-column">
            <h1 style="color:white;" id="contactUs">Contact</h1><br>
            <ul>
                <li><img src="images/icons/contact.png" alt="contact"><a href="#">+977-9823696969</a></li>
                <li><img src="images/icons/email.png" alt="email"><a href="#">Gym@gmail.com</a></li>
            </ul>
        </div>
        <div class="menu-column">
            <h1 style="color:white;">Menu</h1><br>
            <ul>
                <li><a href="#" class="contactt">Home</a></li>
                <li><a href="#aboutus" class="contactt">About Us</a></li>

            </ul>
        </div>
        <!-- <div class="feedback-column">
            <h1 style="color:white;">Feedback</h1><br>
            <textarea name="feedback" id="feedback-area" placeholder="What's on your mind?" cols="100%" rows="4" style="border-radius: 5px;"></textarea>
            <button id="feedback-btn">Send</button>
        </div> -->
    </div>
    <script src="scripts/pop.js"></script>
</body>

</html>