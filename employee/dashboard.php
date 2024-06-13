<?php
require_once '../includes/auth.php';
if (!isEmployee()) {
    header("Location: /login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <h2>Employee Dashboard</h2>
    <ul>
        <li><a href="pay_bill.php">Pay Bill</a></li>
        <li><a href="pay_invoice.php">Pay Invoice</a></li>
        <li><a href="send_reminder.php">Send Installment Reminder</a></li>
    </ul>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
