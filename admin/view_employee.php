<?php
require_once '../includes/auth.php';
require_once '../config/database.php';
if (!isAdmin()) {
    header("Location: /login.php");
    exit();
}

$result = $conn->query("SELECT * FROM users WHERE role='employee'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Employees</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <h2>View Employees</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <a href="edit_employee.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete_employee.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
