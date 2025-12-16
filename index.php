<?php


session_start();

$cartCount = 0;

if (!empty($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $item) {
    $cartCount += $item['quantity'];
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- displays site properly based on user's device -->

  <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="/schoenen/styles/style.css" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <link
    href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght,YOPQ@100..900,300&family=Rasa:ital,wght@0,300..700;1,300..700&display=swap"
    rel="stylesheet" />

  <!-- Swiper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

  <title>Frontend Mentor | E-commerce product page</title>

</head>

<body>
  <?php include 'header.php'; ?>
  <?php include 'product.php'; ?>


  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>-->



</body>
<footer>
  
<script src="/schoenen/script.js"></script>
</footer>

</html>