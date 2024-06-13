<?php
require_once 'auth.php';
?>
<header>
    <nav class="navbar">
        <img src="/public/assets/logo.png" alt="Logo" class="logo">
        <ul>
            <?php if (isLoggedIn()) { ?>
                <li>Welcome, <?php echo $_SESSION['username']; ?></li>
                <li><a href="/logout.php">Logout</a></li>
            <?php } else { ?>
                <li><a href="/login.php">Login</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>
