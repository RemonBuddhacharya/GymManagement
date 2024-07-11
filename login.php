<?php
session_start();
if (isset($_SESSION['userId'])) {
    $message = $_SESSION['message'];
    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management Login</title>
    <link rel="stylesheet" href="styles/login.css" />
</head>

<body>
    <div class="container-fluid">
        <div class="center">
            <h1>Log In</h1>
            <?php
                if (isset($_SESSION['message'])) {
                    $message = $_SESSION['message'];
                    echo "<p style='color:red;font-size:26px;text-align:center;'>$message</p>";
                    unset($_SESSION['message']);
                }
            ?>
            <form action="registration.php" method="POST">
                <div class="txt_field">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="txt_field">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div id="error_field_login">
                </div>
                <div class="pass">Forget Password?</div>
                <input name="submit" type="Submit" value="Login">
                <div class="signup_link">
                    Not a Member ? <a href="signup.php">Signup</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>