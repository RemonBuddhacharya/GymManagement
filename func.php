<?php
$con = mysqli_connect("localhost", "root", "", "gymwebsite");
if (isset($_POST['login_submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "select * from logintb where username='$username' and password='$password'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 1) {
        header("Location:admin-panel.php");
    } else {
        echo "<script>alert('error login')</script>";
        echo "<script>window.open('admin-panel.php','_self')</script>";
    }
}
if (isset($_POST['pat_submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $trainer_id = $_POST['trainer_id'];
    $query = "insert into gymapp(fname,lname,email,contact,trainer_id)values('$fname','$lname','$email','$contact','$trainer_id')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Member added.')</script>";
        echo "<script>window.open('admin-panel.php','_self')</script>";
    }
}
if (isset($_POST['tra_submit'])) {
    $Trainer_id = $_POST['Trainer_id'];
    $Name = $_POST['Name'];
    $phone = $_POST['phone'];
    $query = "insert into Trainer(Trainer_id,Name,phone)values('$Trainer_id','$Name','$phone')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Trainer added.')</script>";
        echo "<script>window.open('admin-panel.php','_self')</script>";
    }
}
if (isset($_POST['pay_submit'])) {
    $Payment_id = $_POST['Payment_id'];
    $Amount = $_POST['Amount'];
    $customer_id = $_POST['customer_id'];
    $payment_type = $_POST['payment_type'];
    $query = "insert into Payment(Payment_id,Amount,customer_id,payment_type)values('$Payment_id','$Amount','$customer_id','$payment_type')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Payment successful.')</script>";
        echo "<script>window.open('admin-panel.php','_self')</script>";
    }
}
function get_member_details()
{
    global $con;
    $query = "select * from gymapp";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        $contact = $row['contact'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];
        $trainer_id = $row['trainer_id'];

        $query_trainer = "SELECT Name FROM trainer WHERE Trainer_id = '$trainer_id'";
        $result_trainer = mysqli_query($con, $query_trainer);
        $row_trainer = mysqli_fetch_assoc($result_trainer);
        $trainer_name = $row_trainer['Name'];

        $trainer_name_id = $trainer_id . " - " . $trainer_name;
        echo "<tr>
        <td>$contact</td>
        <td>$fname</td>
        <td>$lname</td>
        <td>$email</td>
        <td>$trainer_name_id</td>
        <td>
            <a class='btn btn-success mx-3 editbtn' style='text-decoration:none; color:white;'>Edit</a>
            <a href='memberdelete.php?email=$email'  class='btn btn-danger' style='text-decoration:none; color:white;'>Delete</a>
          </td>
        </tr>";
    }
}
function get_package()
{
    global $con;
    $query = "select * from Package";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        $Package_id = $row['Package_id'];
        $Package_name = $row['Package_name'];
        $Amount = $row['Amount'];
        echo "<tr>
        <td>$Package_id</td>
        <td>$Package_name</td>
            <td>$Amount</td>
        </tr>";
    }
}
function get_trainer()
{
    global $con;
    $query = "select * from Trainer";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        $Trainer_id = $row['Trainer_id'];
        $Name = $row['Name'];
        $phone = $row['phone'];
        echo "<tr>
        <td>$Trainer_id</td>
        <td>$Name</td>
            <td>$phone</td>
            <td>
                <a href='trainerdelete.php?Trainer_id=$Trainer_id'  class='btn btn-danger' style='text-decoration:none; color:white;'>Delete</a>
            </td>
        </tr>";
    }
}
function get_payment()
{
    global $con;
    $query = "select * from Payment";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        $Payment_id = $row['Payment_id'];
        $Amount = $row['Amount'];
        $payment_type = $row['payment_type'];
        $customer_id = $row['customer_id'];
        $package_id = $row['package_id'];

        // Fetching package_name based on package_id
        $query_package = "SELECT Package_name FROM package WHERE Package_id = '$package_id'";
        $result_package = mysqli_query($con, $query_package);
        $row_package = mysqli_fetch_assoc($result_package);
        $package_name = $row_package['Package_name'];

        $query_customer = "SELECT fname, lname FROM gymapp WHERE contact = '$customer_id'";
        $result_customer = mysqli_query($con, $query_customer);
        if ($result_customer && mysqli_num_rows($result_customer) > 0) {
            $row_customer = mysqli_fetch_assoc($result_customer);
            $customer = $Payment_id . " - " . $row_customer['fname'] . " " . $row_customer['lname'];
        } else {
            $customer = "Customer Not Found";
        }

        echo "<tr>
        <td>$Payment_id</td>
        <td>$Amount</td>
        <td>$payment_type</td>
        <td>$customer</td>
        <td>$package_name</td>
        </tr>";
    }
}
