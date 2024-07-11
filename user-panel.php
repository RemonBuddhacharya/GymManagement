<?php
session_start();

if (!isset($_SESSION['auth'])) {
    header("Location: login.php");
    exit(); // Ensure script stops here if redirected
} elseif ($_SESSION['type'] == 'admin') {
    header("Location: admin-panel.php");
    exit(); // Ensure script stops here if redirected
}

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "gymwebsite";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
// Fetch current user details from database (example using static values)
$userId = $_SESSION['contact'];
$query = "SELECT * FROM `gymapp` WHERE `logintb_id` = '$userId'";
$result = mysqli_query($connect, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $fname = $row['fname'];
    $lname = $row['lname'];
    $email = $row['email'];
    $contact = $row['contact'];
    $trainer_id = $row['trainer_id'];
}

$queryTrainer = "SELECT * FROM `Trainer`";
$resultTrainer = mysqli_query($connect, $queryTrainer);
?>

<!DOCTYPE html>

<html>

<head>
    <title>User Panel</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="" class="list-group-item active" style="background-color:darkgrey;">Personal</a>
                    <a href="package.php" class="list-group-item">Package</a>
                    <a href="payment.php" class="list-group-item">Payment History</a>
                </div>
                <hr>
                <div class="list-group">
                    <a href="" class="list-group-item active" style="background-color:darkgrey;">Trainer</a>
                    <a href="trainer.php" class="list-group-item">Trainer details</a>
                    <!-- Only admins should see this link -->
                    <?php if ($_SESSION['type'] == 'admin') : ?>
                        <a href="trainer_add.php" class="list-group-item">Add new Trainer</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body" style="background-color:darkgrey;color:FFFFFF;">
                        <h3>Personal Details</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-group" action="updatePersonal.php" method="post">
                            <input type="hidden" name="contact" value="<?php echo $contact; ?>">
                            <label>First name:</label>
                            <input type="text" name="fname" class="form-control" value="<?php echo $fname; ?>"><br>
                            <label>Last name:</label>
                            <input type="text" name="lname" class="form-control" value="<?php echo $lname; ?>"><br>
                            <label>Email:</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>"><br>
                            <label>Member ID:</label>
                            <p><?php echo $contact; ?></p><br>
                            <label>Trainer:</label>
                            <select class="form-control" name="trainer_id">
                                <?php while ($rowTrainer = mysqli_fetch_assoc($resultTrainer)) : ?>
                                    <option value="<?php echo $rowTrainer['Trainer_id']; ?>" <?php if ($rowTrainer['Trainer_id'] == $trainer_id) echo "selected"; ?>><?php echo $rowTrainer['Name']; ?></option>
                                <?php endwhile; ?>
                            </select>
                            <br>
                            <input type="submit" class="btn btn-primary" name="update_submit" value="Update">
                            <?php
                            if (isset($_GET['update'])) {
                                if ($_GET['update'] == "success") {
                                    echo "<p>Update successful!</p>";
                                } elseif ($_GET['update'] == "error") {
                                    echo "<p>Update failed!</p>";
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-3 d-flex justify-content-center">
            <header>
                <nav>
                    <div class="main-wrapper">
                        <div class="nav-login">
                            <form action="index.php" method="POST">
                                <button type="submit" name="submit" class="btn">Logout</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </header>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>