


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
      <?php include 'imports.php'; ?>
    <title>Login or Register</title>
   
</head>
<body class="d-flex align-items-center justify-content-center vh-100">

<div class="card p-4" style="width: 400px;">
    
    <!-- Logo -->
    <div class="text-center mb-3">
        <img src="images/logo.svg" width="120">
    </div>

    <!-- Title -->
    <h5 class="text-center mb-4">Inloggen of registreren</h5>

    <!-- Email -->
    <div class="mb-3">
        <input type="email" class="form-control" placeholder="Email address">
    </div>

    <!-- Continue button -->
    <button class="btn btn-dark w-100 mb-3">
        Continue
    </button>

    <!-- Already have account -->
    <p class="text-center text-muted mb-3">
        Heb je al een account? <a href="#">Inloggen</a>
    </p>

    <!-- Divider -->
    <div class="text-center mb-3">or</div>

    <!-- Social login -->
    <button class="btn btn-outline-dark w-100 mb-2">
        Continue met Google
    </button>

    <button class="btn btn-outline-dark w-100 mb-2">
        Continue met Apple
    </button>

    <button class="btn btn-outline-dark w-100">
        Continue met Facebook
    </button>

</div>

</body>
</html>