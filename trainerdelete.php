<?php

    include './components/connection.php';
    
    if(isset($_GET['Trainer_id'])){
        $trainer_id = $_GET['Trainer_id'];
        // $adminid = validate($paraResult);

        $deletequery = "DELETE FROM trainer WHERE Trainer_id = '$trainer_id'";
        $result = mysqli_query($conn, $deletequery);
        if($result){
            header("Location: trainer.php");
        }else{
            header("Location: trainer.php");
        }

    }else{
        header("Location: trainer.php");
    }

?>