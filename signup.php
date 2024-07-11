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
    <title>Gym Management Signup</title>
    <link rel="stylesheet" href="styles/login.css" />
</head>

<body>
    <div class="container-fluid">
        <div class="center">
            <h1>Sign Up</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="txt_field">
                    <input type="text" name="fname" placeholder="First Name" required>
                </div>
                <div class="txt_field">
                    <input type="text" name="lname" placeholder="Last Name" required>
                </div>
                <div class="txt_field">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="txt_field">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="txt_field">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <input name="submit" type="Submit" value="Signup">
                <div class="login_link">
                    Already a Member? <a href="login.php">Login</a>
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
$database = "gymwebsite";

// Create connection
$conn = mysqli_connect($serverName, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];

    // Check if username or email already exists
    $check_query = "SELECT * FROM logintb WHERE username='$username'";
    $result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($result) > 0) {
        echo '<p style="color:white">Username already exists.</p>';
    } else {
        // Insert new user into database
        $insert_query = "INSERT INTO logintb (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($conn, $insert_query)) {
            // Get the user ID of the newly inserted user
            $user_id = mysqli_insert_id($conn);

            // Insert new user into gymapp table
            $insert_gymapp_query = "INSERT INTO gymapp (fname, lname, email, trainer_id, logintb_id) VALUES ('$fname', '$lname', '$email', NULL, $user_id)";
            if (mysqli_query($conn, $insert_gymapp_query)) {
                $_SESSION['message'] = "User registered successfully.";
                echo '<meta http-equiv="refresh" content="0;url=login.php">';
            } else {
                echo '<p style="color:white">Error: ' . mysqli_error($conn) . '</p>';
            }
        } else {
            echo '<p style="color:white">Error: ' . mysqli_error($conn) . '</p>';
        }
    }
}

mysqli_close($conn);
?>