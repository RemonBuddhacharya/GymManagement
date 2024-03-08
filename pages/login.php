<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management Login</title>
    <link rel="stylesheet" href="../styles/login.css" />
</head>

<body>
    <div class="container">
        <div class="center">
            <h1>Login</h1>
            <form action="" method="POST">
                <div class="txt_field">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="txt_field">
                    <input type="password" name="password" placeholder="Password" required>
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
$servername = "localhost";
$username = "root";
$password = "";
$database = "gym";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}




// if (mysqli_num_rows($result) > 0) {
//     // output data of each row
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo "id: " . $row["id"] . " - Username: " . $row["username"] . " Password:" . $row["password"] . "<br>";
//     }
// } else {
//     echo "0 results";
// }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!empty($username) && !empty($password)) {
        $test = "SELECT * FROM user WHERE username='" . $username . "' AND password='" . $password . "'";
        $result = mysqli_query($conn, $test);
        if (mysqli_num_rows($result) > 0) {
            $newURL = 'dashboard.php';
            header('Location: ' . $newURL);
        } else {
            echo '<p style="color:white">user doesnt exist</p>';
        }
    } else {
        echo "Blank";
    }
    unset($_POST['username']);
    unset($_POST['password']);
}
mysqli_close($conn);
