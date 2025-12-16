<?php
session_start();

if (empty($_SESSION['cart'])) {
    header('Location: index.php'); // Redirect to homepage if cart empty
    exit;
}

?>