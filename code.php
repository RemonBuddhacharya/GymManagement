<?php
include './components/connection.php';
// Update Pharmacy
if(isset($_POST['update-member'])){
    $update_id = $_POST['update_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $trainer= $_POST['trainer'];

    $query = "UPDATE gymapp SET
            fname = '$firstname',
            lname = '$lastname',
            email = '$email',
            trainer_id = '$trainer'
            WHERE contact = '$update_id'";
    $data = mysqli_query($conn,$query);
    if($data){
        header("Location: member_details.php");
    }
    else{
        header("Location: member_details.php");
    }
    
}