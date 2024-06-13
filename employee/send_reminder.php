<?php
require_once '../includes/auth.php';
require_once '../config/database.php';
if (!isEmployee()) {
    header("Location: /login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_id = $_SESSION['user_id'];
    $owner_id = $_POST['owner_id'];
    $message = $_POST['message'];

