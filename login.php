


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
      <?php include 'imports.php'; ?>
    <title>Login or Register</title>
   
</head>
<body class="d-flex align-items-center justify-content-center vh-100">

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-4 offset-lg-4 ">
            <div class="card p-4" >
    
    <!-- Logo -->
    <div class="text-center mb-3">
        <img src="images/logo.svg" width="120">
    </div>

    <!-- Title -->
    <h5 class="text-center mb-4">Inloggen of registreren</h5>

    <!-- Email -->
    <div class="mb-4">
        <input type="email" class="form-control" placeholder="Email address">
    </div>

    <!-- Continue button -->
    <button class="btn btn-dark w-100 mb-4">
        Continue
    </button>

    <!-- Already have account -->
    <p class="text-center text-muted mb-4">
        Heb je al een account? <a href="#">Inloggen</a>
    </p>

    <!-- Divider -->
    <div class="text-center mb-3">or</div>

    <!-- Social login -->
    <button class="btn btn-outline-dark w-100 mb-3 d-flex align-items-center gap-3 justify-content-center">
      
        <img src="images/google.svg" class="media-icon">
       <span> Continue met Google</span>
    </button>

    <button class="btn btn-outline-dark w-100 mb-3 d-flex align-items-center gap-3 justify-content-center">
        <img src="images/apple.svg" class="media-icon">
       <span> Continue met Apple</span>
    </button>

    <button class="btn btn-outline-dark w-100 d-flex align-items-center gap-3 justify-content-center">
         <img src="images/facebook.svg" class="media-icon">
       <span>
         Continue met Facebook
       </span>
    </button>

</div>
        </div>
    </div>
</div>

</body>
</html>