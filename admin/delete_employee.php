<?php
require_once '../includes/auth.php';
require_once '../config/database.php';
if (!isAdmin()) {
    header("Location: /login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: view_employees.php");
        exit();
    } else {
        $error = "Error deleting employee.";
    }
}
?>
