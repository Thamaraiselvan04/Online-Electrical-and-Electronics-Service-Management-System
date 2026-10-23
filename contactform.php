<?php
// NOTE: PHP mail() usually does not work on localhost (XAMPP/WAMP).
// It works on a live server that has mail configured.

$cName = $cEmail = $cPhone = $cService = $cSubject = $cMessage = '';

if (isset($_POST['submit'])) {
  $cName    = trim($_POST['name'] ?? '');
  $cEmail   = trim($_POST['email'] ?? '');
  $cPhone   = trim($_POST['phone'] ?? '');
  $cService = trim($_POST['service'] ?? '');
  $cSubject = trim($_POST['subject'] ?? '');
  $cMessage = trim($_POST['message'] ?? '');

  if ($cName === '' || $cEmail === '' || $cSubject === '' || $cMessage === '') {
    $msg = '<div class="alert alert-warning mb-4 form-alert"><i class="fa-solid fa-triangle-exclamation me-2"></i>Please fill in all required fields.</div>';
  }
  elseif (!filter_var($cEmail, FILTER_VALIDATE_EMAIL)) {
    $msg = '<div class="alert alert-warning mb-4 form-alert"><i class="fa-solid fa-triangle-exclamation me-2"></i>Please enter a valid email address.</div>';
  }
  else {
    // Strip line breaks from header values to block email header injection
    $safeName    = str_replace(["\r", "\n"], '', $cName);
    $safeSubject = str_replace(["\r", "\n"], '', $cSubject);

    $mailTo  = "support@osms.com";   // <-- change to your real email address
    $headers = "From: OSMS Website <no-reply@osms.com>\r\n" .   // <-- use an address on your own domain
               "Reply-To: " . $cEmail . "\r\n" .
               "Content-Type: text/plain; charset=UTF-8";
    $body    = "New enquiry from the OSMS website\n\n" .
               "Name    : $safeName\n" .
               "Email   : $cEmail\n" .
               "Phone   : " . ($cPhone ?: '-') . "\n" .
               "Service : " . ($cService ?: '-') . "\n\n" .
               "Message :\n$cMessage";

    if (mail($mailTo, "OSMS Contact: " . $safeSubject, $body, $headers)) {
      $msg = '<div class="alert alert-success mb-4 form-alert"><i class="fa-solid fa-circle-check me-2"></i>Thank you! Your message has been sent. We will get back to you soon.</div>';
      $cName = $cEmail = $cPhone = $cService = $cSubject = $cMessage = '';
    } else {
      $msg = '<div class="alert alert-danger mb-4 form-alert"><i class="fa-solid fa-circle-xmark me-2"></i>Sorry, your message could not be sent. Please try again later.</div>';
    }
  }
}

$serviceOptions = ['Electronic Appliance Repair', 'AC & Refrigeration', 'Electrical Wiring', 'Inverter / UPS / Solar', 'Preventive Maintenance', 'AMC Plan Enquiry', 'Other'];
?>

<div class="col-lg-7" data-aos="fade-right">
  <form action="#Contact" method="POST" class="contact-card" novalidate>
    <h4 class="mb-1"><i class="fa-solid fa-paper-plane text-red me-2"></i>Send Us a Message</h4>
    <p class="text-muted small mb-4">Fields marked <span class="text-red">*</span> are required.</p>

    <!-- Success / error message -->
    <?php if (isset($msg)) echo $msg; ?>

    <div class="row g-3">
      <div class="col-sm-6">
        <label for="cName" class="form-label">Name <span class="text-red">*</span></label>
        <input type="text" id="cName" name="name" class="form-control" placeholder="Your name"
               value="<?php echo htmlspecialchars($cName); ?>" required>
      </div>
      <div class="col-sm-6">
        <label for="cEmail" class="form-label">Email <span class="text-red">*</span></label>
        <input type="email" id="cEmail" name="email" class="form-control" placeholder="you@example.com"
               value="<?php echo htmlspecialchars($cEmail); ?>" required>
      </div>
      <div class="col-sm-6">
        <label for="cPhone" class="form-label">Phone</label>
        <input type="tel" id="cPhone" name="phone" class="form-control" placeholder="+91 98765 43210"
               value="<?php echo htmlspecialchars($cPhone); ?>">
      </div>
      <div class="col-sm-6">
        <label for="cService" class="form-label">Service Needed</label>
        <select id="cService" name="service" class="form-select" style="padding:11px 14px;border-radius:10px;">
          <option value="">Select a service</option>
          <?php foreach ($serviceOptions as $opt) {
            $sel = ($cService === $opt) ? 'selected' : '';
            echo '<option ' . $sel . '>' . htmlspecialchars($opt) . '</option>';
          } ?>
        </select>
      </div>
      <div class="col-12">
        <label for="cSubject" class="form-label">Subject <span class="text-red">*</span></label>
        <input type="text" id="cSubject" name="subject" class="form-control" placeholder="What is this about?"
               value="<?php echo htmlspecialchars($cSubject); ?>" required>
      </div>
      <div class="col-12">
        <label for="cMessage" class="form-label">Message <span class="text-red">*</span></label>
        <textarea id="cMessage" name="message" class="form-control" rows="5"
                  placeholder="Describe the problem with your appliance or wiring..." required><?php echo htmlspecialchars($cMessage); ?></textarea>
      </div>
      <div class="col-12">
        <button type="submit" name="submit" class="btn btn-red px-4">
          <i class="fa-solid fa-paper-plane me-2"></i>Send Message
        </button>
      </div>
    </div>

  </form>
</div>