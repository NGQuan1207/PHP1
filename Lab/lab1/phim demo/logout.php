<?php
session_start();

echo 'Chào mừng ' . $_SESSION['username'] . '!';

session_destroy();
header('Location: login.php');
?>