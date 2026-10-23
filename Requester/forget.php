<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forget Password | OSMS</title>
  <!-- Bootstrap 5, Font Awesome 6, Google Fonts (same as home page) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/custom.css?v=2">
</head>
<body>

<div class="auth-page">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10">
        <div class="reg-wrap">
          <div class="row g-0">

            <!-- Left: image + info -->
            <div class="col-lg-5">
              <div class="reg-side" style="background-image:url('https://images.pexels.com/photos/33694019/pexels-photo-33694019.jpeg?auto=compress&cs=tinysrgb&w=800');">
                <a href="../index.php" class="auth-brand mb-4"><span class="bolt"><i class="fa-solid fa-bolt"></i></span>OSMS</a>
                <span class="badge bg-light text-danger mb-3 px-3 py-2 rounded-pill align-self-start"><i class="fa-solid fa-user-lock me-1"></i>Requester Area</span>
                <h3 class="mb-3">Forgot your password?</h3>
                <p class="mb-0 opacity-75">Enter your registered email to continue.</p>
              </div>
            </div>

            <!-- Right: form -->
            <div class="col-lg-7">
              <form action="forget.php" class="reg-form" method="GET">
                <h4 class="mb-1">Forget Password</h4>
                <p class="text-muted small mb-4">Requester Forget Password Area</p>

                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="email" id="email" class="form-control" placeholder="Enter your Registered Email" name="rEmail">
                  </div>
                  <div class="form-text">We will never share your email with anyone else.</div>
                </div>

                <div class="mb-4">
                  <label for="pass" class="form-label">Password</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                    <input type="password" id="pass" class="form-control" placeholder="Password" name="rPassword">
                    <button type="button" class="btn btn-outline-secondary pwd-eye" data-target="pass" aria-label="Show password"><i class="fa-solid fa-eye"></i></button>
                  </div>
                </div>

                <button type="submit" class="btn btn-red w-100 py-2">
                  <i class="fa-solid fa-right-to-bracket me-2"></i>Login
                </button>
                <div class="text-center">
                  <a href="forget.php" class="btn btn-soft mt-3">Forget password</a>
                </div>
                <?php if(isset($msg))
                {
                    echo $msg;
                }
                ?>
                <p class="text-center mt-3 mb-0"><a href="../index.php" class="back-link"><i class="fa-solid fa-arrow-left me-1"></i>Back to Home</a></p>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Show / hide password (eye button) -->
<script>
  document.querySelectorAll('.pwd-eye').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var input = document.getElementById(this.dataset.target);
      var show = input.type === 'password';
      input.type = show ? 'text' : 'password';
      this.querySelector('i').className = show ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye';
    });
  });
</script>
</body>
</html>
