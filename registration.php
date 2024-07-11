<?php

include './components/connection.php';

session_start();

if (isset($_POST['submit'])) {
    $usernameinput = $_POST['username'];
    $passwordinput = $_POST['password'];

    if ($usernameinput != '' && $passwordinput != '') {
        $query = "SELECT * FROM logintb WHERE username = '$usernameinput'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if ($passwordinput == $row['password']) {

                    $_SESSION['auth'] = true;
                    $_SESSION['loggedInUser'] = [
                        'name' => $row['username']
                    ];
                    if ($row['type'] == 'admin') {
                        $_SESSION['type'] = 'admin';
                        header("Location: admin-panel.php");
                    } elseif ($row['type'] == 'user') {
                        $_SESSION['type'] = 'user';
                        header("Location: user-panel.php");
                    }
                } else {
                    header("Location: login.php");
                    $_SESSION['message'] = "Password Invalid!";
                }
            } else {
                header("Location: login.php");
                $_SESSION['message'] = "Username Not Found!";
            }
        } else {
            header("Location: login.php");
            $_SESSION['message'] = "Username Not Found!";
        }
    }
}
