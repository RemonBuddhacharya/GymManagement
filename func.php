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
        $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];
        $contact = $row['contact'];
        $trainer_id = $row['trainer_id'];
        echo "<tr>
          <td>$fname</td>
        <td>$lname</td>
            <td>$email</td>
            <td>$contact</td>
          <td>$trainer_id</td>
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

        echo "<tr>
        <td>$Payment_id</td>
        <td>$Amount</td>
        <td>$payment_type</td>
        <td>$customer_id</td>
            </tr>";
    }
}
