<?php
require_once '../includes/auth.php';
require_once '../config/database.php';
if (!isAdmin()) {
    header("Location: /login.php");
    exit();
}

$result = $conn->query("SELECT financial_operations.*, users.username FROM financial_operations JOIN users ON financial_operations.employee_id = users.id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Financial Operations</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <h2>View Financial Operations</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee</th>
                <th>Operation Type</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo ucfirst($row['operation_type']); ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
