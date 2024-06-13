<?php
require_once '../includes/auth.php';
require_once '../config/database.php';
if (!isEmployee()) {
    header("Location: /login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_id = $_SESSION['user_id'];
    $amount = $_POST['amount'];
    $operation_type = 'pay_invoice';

    $stmt = $conn->prepare("INSERT INTO financial_operations (employee_id, operation_type, amount) VALUES (?, ?, ?)");
    $stmt->bind_param("isd", $employee_id, $operation_type, $amount);
    if ($stmt->execute()) {
        $message = "Invoice paid successfully.";
    } else {
        $error = "Error paying invoice.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pay Invoice</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <h2>Pay Invoice</h2>
    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    <form method="POST">
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" step="0.01" required>
        <button type="submit">Pay Invoice</button>
    </form>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
