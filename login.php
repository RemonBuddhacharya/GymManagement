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
    <div class="container">
        <div class="center">
            <h1>Log In</h1>
            <form action="" method="POST">
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

<?php
$serverName = "localhost";
$username = "root";
$password = "";
$database = "gym";
$conn = mysqli_connect($serverName, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!empty($username) && !empty($password)) {
        $query = "SELECT * FROM Users WHERE username='" . $username . "'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($password == $row['password']) {
                $_SESSION['userId'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                header('Location: dashboard.php');
                exit();
            } else {
                echo '
                <script>
                document.getElementById("error_field_login").innerHTML = "Invalid password";
                </script>
                ';
            }
        } else {
            echo '
            <script>
            document.getElementById("error_field_login").innerHTML = "Invalid username";
            </script>
            ';
        }
    }
    unset($_POST['username']);
    unset($_POST['password']);
}
mysqli_close($conn);
