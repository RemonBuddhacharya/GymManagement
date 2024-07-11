<?php
session_start();

if (!isset($_SESSION['auth'])) {
    header("Location: login.php");
} else {
    if ($_SESSION['type'] == 'user') {
        header("Location: user-panel.php");
    }
}
?>
<!DOCTYPE html>
<?php

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "gymwebsite";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM `Trainer`";

$result1 = mysqli_query($connect, $query);
?>
<html>

<head>
    <title>Admin Panel</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="" class="list-group-item active" style="background-color:darkgrey;">Members</a>
                    <a href="member_details.php" class="list-group-item">Member details</a>
                    <a href="package.php" class="list-group-item">Package details</a>
                    <a href="payment.php" class="list-group-item">Payments</a>
                </div>
                <hr>
                <div class="list-group">
                    <a href="" class="list-group-item active" style="background-color:darkgrey;">Trainer</a>
                    <a href="trainer.php" class="list-group-item">Trainer details</a>
                    <a href="trainer_add.php" class="list-group-item">Add new Trainer</a>
                </div>

            </div>
            <div class="col-md-9">
                <div class="card">

                    <div class="card-body" style="background-color:darkgrey;color:FFFFFF;">
                        <h3>Register new members</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-group" action="func.php" method="post">
                            <label>First name:</label>
                            <input type="text" name="fname" class="form-control"><br>
                            <label>Last name:</label>
                            <input type="text" name="lname" class="form-control"><br>
                            <label>Email</label>
                            <input type="text" name="email" class="form-control"><br>
                            <label>Member ID</label>
                            <input type="text" name="contact" class="form-control"><br>
                            <label>Trainer </label>
                            <select class="form-control" name="trainer_id">

                                <?php while ($row1 = mysqli_fetch_array($result1)) :; ?>

                                    <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>

                                <?php endwhile; ?>

                            </select>
                            <br>

                            <input type="submit" class="btn btn-primary" name="pat_submit" value="Register"> <a href="func.php" class="btn btn-light"></a>


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