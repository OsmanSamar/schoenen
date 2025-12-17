<?php
session_start();

$id = $_POST['product_id'] ?? null;
$action = $_POST['action'] ?? null;

if (!$id || !isset($_SESSION['cart'][$id])) {
  header("Location: check-out.php");
  exit;
}

switch ($action) {
  case 'increase':
    $_SESSION['cart'][$id]['quantity']++;
    break;

  case 'decrease':
    $_SESSION['cart'][$id]['quantity']--;
    if ($_SESSION['cart'][$id]['quantity'] <= 0) {
      unset($_SESSION['cart'][$id]);
    }
    break;

  case 'remove':
    unset($_SESSION['cart'][$id]);
    break;
}

header("Location: check-out.php");
exit;