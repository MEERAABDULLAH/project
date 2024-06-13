<?php
require_once '../includes/auth.php';
require_once '../config/database.php';
if (!isAdmin()) {
    header("Location: /login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = 'employee';

    $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $role);
    if ($stmt->execute()) {
        $message = "Employee added successfully.";
    } else {
        $error = "Error adding employee.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Employee</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <h2>Add Employee</h2>
    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Add Employee</button>
    </form>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
