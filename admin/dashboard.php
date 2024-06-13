<?php
require_once '../includes/auth.php';
if (!isAdmin()) {
    header("Location: /login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <h2>Admin Dashboard</h2>
    <ul>
        <li><a href="add_employee.php">Add Employee</a></li>
        <li><a href="view_employees.php">View Employees</a></li>
        <li><a href="view_operations.php">View Financial Operations</a></li>
    </ul>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
