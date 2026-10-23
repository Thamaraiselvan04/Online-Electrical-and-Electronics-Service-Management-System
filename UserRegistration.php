<?php
include('dbConnection.php');

$rName = $rEmail = '';

if (isset($_POST['rSignup'])) {
  $rName     = trim($_POST['rName'] ?? '');
  $rEmail    = trim($_POST['rEmail'] ?? '');
  $rPassword = $_POST['rPassword'] ?? '';

  if ($rName === '' || $rEmail === '' || $rPassword === '') {
    $regmsg = '<div class="alert alert-warning mb-4 form-alert"><i class="fa-solid fa-triangle-exclamation me-2"></i>All fields are required.</div>';
  }
  elseif (!filter_var($rEmail, FILTER_VALIDATE_EMAIL)) {
    $regmsg = '<div class="alert alert-warning mb-4 form-alert"><i class="fa-solid fa-triangle-exclamation me-2"></i>Please enter a valid email address.</div>';
  }
  elseif (strlen($rPassword) < 6) {
    $regmsg = '<div class="alert alert-warning mb-4 form-alert"><i class="fa-solid fa-triangle-exclamation me-2"></i>Password must be at least 6 characters.</div>';
  }
  else {
    // Check if email already exists (prepared statement prevents SQL injection)
    $stmt = $conn->prepare("SELECT r_email FROM requesterlogin_tb WHERE r_email = ?");
    $stmt->bind_param("s", $rEmail);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
      $regmsg = '<div class="alert alert-warning mb-4 form-alert"><i class="fa-solid fa-circle-info me-2"></i>This email is already registered. <a href="Requester/RequesterLogin.php" class="alert-link">Login instead</a>.</div>';
    } else {
      // Store a secure hash, never the plain password
      $hashedPassword = password_hash($rPassword, PASSWORD_DEFAULT);

      $insert = $conn->prepare("INSERT INTO requesterlogin_tb (r_name, r_email, r_password) VALUES (?, ?, ?)");
      $insert->bind_param("sss", $rName, $rEmail, $hashedPassword);

      if ($insert->execute()) {
        $regmsg = '<div class="alert alert-success mb-4 form-alert"><i class="fa-solid fa-circle-check me-2"></i>Account created successfully! <a href="Requester/RequesterLogin.php" class="alert-link">Login now</a>.</div>';
        $rName = $rEmail = '';
      } else {
        $regmsg = '<div class="alert alert-danger mb-4 form-alert"><i class="fa-solid fa-circle-xmark me-2"></i>Unable to create account. Please try again.</div>';
      }
      $insert->close();
    }
    $stmt->close();
  }
}
?>

<div class="container">
  <div class="sec-head" data-aos="fade-up">
    <span class="sec-tag">Join Us</span>
    <h2>Create Your <span class="text-red">Account</span></h2>
    <p>Register for free and book your first electrical or electronic service in minutes.</p>
  </div>

  <div class="reg-wrap" data-aos="fade-up">
    <div class="row g-0">
      <!-- Left: image + benefits -->
      <div class="col-lg-5">
        <div class="reg-side" style="background-image:url('https://images.pexels.com/photos/33694019/pexels-photo-33694019.jpeg?auto=compress&cs=tinysrgb&w=800');">
          <span class="badge bg-light text-danger mb-3 px-3 py-2 rounded-pill"><i class="fa-solid fa-bolt me-1"></i>Free Registration</span>
          <h3 class="mb-3">Why register with OSMS?</h3>
          <ul class="list-unstyled mb-4">
            <li><i class="fa-solid fa-circle-check"></i>Book electrical &amp; electronic repairs 24/7</li>
            <li><i class="fa-solid fa-circle-check"></i>Track your service request live</li>
            <li><i class="fa-solid fa-circle-check"></i>View your complete service history</li>
            <li><i class="fa-solid fa-circle-check"></i>Get exclusive AMC &amp; seasonal offers</li>
            <li><i class="fa-solid fa-circle-check"></i>Download invoices anytime</li>
          </ul>
          <p class="mb-2 small opacity-75">Already have an account?</p>
          <a href="Requester/RequesterLogin.php" class="btn btn-light text-danger fw-semibold rounded-pill px-4">Login Here</a>
        </div>
      </div>

      <!-- Right: form -->
      <div class="col-lg-7">
        <form action="#Registration" method="POST" class="reg-form" id="regForm" novalidate>
          <h4 class="mb-1">Sign Up</h4>
          <p class="text-muted small mb-4">Fill in your details to get started.</p>

          <!-- Success / error message (shown at the top so the user sees it) -->
          <?php if (isset($regmsg)) echo $regmsg; ?>
          <div id="regClientMsg"></div>

          <div class="mb-3">
            <label for="rName" class="form-label">Full Name</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
              <input type="text" id="rName" name="rName" class="form-control" placeholder="Enter your full name"
                     value="<?php echo htmlspecialchars($rName); ?>" required>
            </div>
          </div>

          <div class="mb-3">
            <label for="rEmail" class="form-label">Email Address</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              <input type="email" id="rEmail" name="rEmail" class="form-control" placeholder="you@example.com"
                     value="<?php echo htmlspecialchars($rEmail); ?>" required>
            </div>
            <div class="form-text">We will never share your email with anyone else.</div>
          </div>

          <div class="mb-2">
            <label for="rPassword" class="form-label">Password</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
              <input type="password" id="rPassword" name="rPassword" class="form-control" placeholder="Minimum 6 characters" minlength="6" required>
              <button type="button" class="btn btn-outline-secondary" id="togglePwd" aria-label="Show password"><i class="fa-solid fa-eye"></i></button>
            </div>
          </div>

          <!-- Password strength bar -->
          <div class="progress mb-1" style="height:6px;">
            <div id="pwdBar" class="progress-bar" role="progressbar" style="width:0%"></div>
          </div>
          <small id="pwdText" class="text-muted d-block mb-3">&nbsp;</small>

          <button type="submit" name="rSignup" class="btn btn-red w-100 py-2">
            <i class="fa-solid fa-user-plus me-2"></i>Create Account
          </button>
          <p class="text-muted text-center mt-3 mb-0" style="font-size:12px;">
            By clicking Create Account, you agree to our Terms, Data Policy and Cookie Policy.
          </p>

        </form>
      </div>
    </div>
  </div>
</div>

<script>
  (function () {
    const pwd = document.getElementById('rPassword');
    const btn = document.getElementById('togglePwd');
    const bar = document.getElementById('pwdBar');
    const txt = document.getElementById('pwdText');

    // Show / hide password
    btn.addEventListener('click', function () {
      const show = pwd.type === 'password';
      pwd.type = show ? 'text' : 'password';
      this.querySelector('i').className = show ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye';
    });

    // Password strength meter
    pwd.addEventListener('input', function () {
      const v = this.value;
      let score = 0;
      if (v.length >= 6) score++;
      if (v.length >= 10) score++;
      if (/[A-Z]/.test(v) && /[a-z]/.test(v)) score++;
      if (/\d/.test(v)) score++;
      if (/[^A-Za-z0-9]/.test(v)) score++;

      const levels = [
        ['0%',   '',           '&nbsp;'],
        ['25%',  'bg-danger',  'Weak'],
        ['50%',  'bg-warning', 'Fair'],
        ['75%',  'bg-info',    'Good'],
        ['100%', 'bg-success', 'Strong'],
      ];
      const lvl = v.length === 0 ? levels[0] : levels[Math.min(Math.max(score, 1), 4)];
      bar.style.width = lvl[0];
      bar.className = 'progress-bar ' + lvl[1];
      txt.innerHTML = lvl[2];
    });

    // Check the fields BEFORE sending the form (no page reload if something is wrong).
    // PHP still checks again on the server.
    document.getElementById('regForm').addEventListener('submit', function (e) {
      const name  = document.getElementById('rName').value.trim();
      const email = document.getElementById('rEmail').value.trim();
      const pass  = pwd.value;
      let error = '';

      if (name === '' || email === '' || pass === '') error = 'All fields are required.';
      else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) error = 'Please enter a valid email address.';
      else if (pass.length < 6) error = 'Password must be at least 6 characters.';

      if (error) {
        e.preventDefault();  // stop the form from submitting
        const old = this.querySelector('.form-alert');
        if (old) old.remove();  // hide any old PHP message
        document.getElementById('regClientMsg').innerHTML =
          '<div class="alert alert-warning mb-4"><i class="fa-solid fa-triangle-exclamation me-2"></i>' + error + '</div>';
      }
    });
  })();
</script>