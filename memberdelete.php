<?php

    include './components/connection.php';
    
    if(isset($_GET['email'])){
        $email = $_GET['email'];
        // $adminid = validate($paraResult);

        $deletequery = "DELETE FROM gymapp WHERE email = '$email'";
        $result = mysqli_query($conn, $deletequery);
        if($result){
            header("Location: member_details.php");
        }else{
            header("Location: member_details.php");
        }

    }else{
        header("Location: member_details.php");
    }

?>