<?php
require_once '../includes/auth.php';
require_once '../config/database.php';
if (!isOwner()) {
    header("Location: /login.php");
    exit();
}

$owner_id = $_SESSION['user_id'];
$result = $conn->query("SELECT reminders.*, users.username FROM reminders JOIN users ON reminders.employee_id = users.id WHERE reminders.owner_id = $owner_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Installment Reminders</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <h2>View Installment Reminders</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
