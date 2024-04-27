<?php
session_start();
if (isset($_SESSION['userId'])) {
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
            <form action="admin-panel.php" method="POST">
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