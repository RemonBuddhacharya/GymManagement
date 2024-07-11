<?php
session_start();

if (!isset($_SESSION['auth'])) {
    header("Location: login.php");
    exit(); // Ensure script stops here if redirected
}

// Database connection parameters
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "gymwebsite";

// Establish database connection
$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form data has been submitted
if (isset($_POST['update_submit'])) {
    // Sanitize and validate inputs
    $fname = mysqli_real_escape_string($connect, $_POST['fname']);
    $lname = mysqli_real_escape_string($connect, $_POST['lname']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $contact = mysqli_real_escape_string($connect, $_POST['contact']);
    $trainer_id = mysqli_real_escape_string($connect, $_POST['trainer_id']);

    // Update query
    $query = "UPDATE `gymapp` SET `fname`='$fname', `lname`='$lname', `email`='$email', `trainer_id`='$trainer_id' WHERE `contact`='$contact'";

    if (mysqli_query($connect, $query)) {
        // Redirect to a success page or back to the form with a success message
        header("Location: user-panel.php?update=success");
        exit();
    } else {
        // Redirect to an error page or back to the form with an error message
        header("Location: user-panel.php?update=error");
        exit();
    }
} else {
    // Redirect to an error page or back to the form if update_submit is not set
    header("Location: user-panel.php?update=error");
    exit();
}

// Close database connection
mysqli_close($connect);
?>
