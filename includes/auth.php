<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isLoggedIn() && $_SESSION['role'] === 'admin';
}

function isEmployee() {
    return isLoggedIn() && $_SESSION['role'] === 'employee';
}

function isOwner() {
    return isLoggedIn() && $_SESSION['role'] === 'owner';
}

function login($user) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];
}

function logout() {
    session_destroy();
    header("Location: /login.php");
    exit();
}
?>
