<?php
require_once '../includes/auth.php';
if (!isOwner()) {
    header("Location: /login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Owner Dashboard</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <h2>Owner Dashboard</h2>
    <ul>
        <li><a href="view_reminders.php">View Installment Reminders</a></li>
        <li><a href="../admin/view_operations.php">View Financial Operations</a></li>
    </ul>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
