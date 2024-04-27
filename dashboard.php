<?php
session_start();

if (!isset($_SESSION['role'])) {
    header('location: login.php');
} elseif ($_SESSION['role'] == 'admin') {

} elseif ($_SESSION['role'] == 'user') {

} elseif ($_SESSION['role'] == 'staff') {
    
}
