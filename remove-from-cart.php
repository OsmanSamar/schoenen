<?php
session_start();

$id = $_POST['product_id'];

if (isset($_SESSION['cart'][$id])) {
  unset($_SESSION['cart'][$id]);
}

header("Location: index.php");
exit;