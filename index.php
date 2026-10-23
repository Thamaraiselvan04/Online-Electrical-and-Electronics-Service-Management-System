<?php
// Helper: build a Pexels image URL (free image CDN/API) by photo ID and width
function px($id, $w = 800) {
  return "https://images.pexels.com/photos/$id/pexels-photo-$id.jpeg?auto=compress&cs=tinysrgb&w=$w";
}
// If an online image fails to load, fall back to your local banner
$fallback = "this.onerror=null;this.src='images/Banner1.jpg';";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="OSMS - Electrical & Electronic Service Management System. Book appliance repair, wiring, AC service and maintenance online.">
  <title>OSMS ⚡ | Electrical &amp; Electronic Services</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" referrerpolicy="no-referrer">
  <!-- AOS scroll animations -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom.css">
</head>

<body data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="90">

<!-- ================= TOP BAR ================= -->
<div class="topbar">
  <div class="container d-flex flex-wrap justify-content-between gap-2">
    <div>
      <span class="me-3"><i class="fa-solid fa-phone"></i><a href="tel:+910000000000">+91 00000 00000</a></span>
      <span class="d-none d-sm-inline"><i class="fa-solid fa-envelope"></i><a href="mailto:support@osms.com">support@osms.com</a></span>
    </div>
    <div class="d-none d-md-block"><i class="fa-solid fa-clock"></i>Mon – Sat: 9 AM – 8 PM &nbsp;|&nbsp; 24/7 Emergency</div>
  </div>
</div>

<!-- ================= NAVBAR ================= -->
<nav id="mainNav" class="navbar navbar-expand-lg navbar-dark sticky-top">
  <div class="container">
    <a href="index.php" class="navbar-brand"><span class="bolt"><i class="fa-solid fa-bolt"></i></span>OSMS</a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#myMenu" aria-controls="myMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myMenu">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item"><a href="#home" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#About" class="nav-link">About</a></li>
        <li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
        <li class="nav-item"><a href="#Works" class="nav-link">Our Work</a></li>
        <li class="nav-item"><a href="#Pricing" class="nav-link">Pricing</a></li>
        <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
        <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
          <a href="Requester/RequesterLogin.php" class="btn btn-ghost btn-sm px-3 py-2 me-1"><i class="fa-solid fa-right-to-bracket me-1"></i>Login</a>
          <a href="#Registration" class="btn btn-red btn-sm px-3 py-2">Sign Up</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- ================= HERO ================= -->
<header id="home" class="hero">
  <div class="hero-bg" style="background-image:url('<?php echo px(17018103, 1600); ?>');"></div>
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6" data-aos="fade-right">
        <span class="hero-badge"><i class="fa-solid fa-bolt me-1"></i> Electrical &amp; Electronic Experts</span>
        <h1>Powering Homes,<br><span>Fixing Devices</span><br>Without Delay</h1>
        <p class="lead">From short circuits to smart TVs, OSMS connects you with certified electricians and electronics technicians. Book online, track live, and relax.</p>
        <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start">
          <a href="#Registration" class="btn btn-red"><i class="fa-solid fa-calendar-check me-2"></i>Book a Service</a>
          <a href="#Services" class="btn btn-ghost"><i class="fa-solid fa-screwdriver-wrench me-2"></i>Explore Services</a>
        </div>
        <div class="hero-points">
          <span><i class="fa-solid fa-circle-check"></i>Certified Technicians</span>
          <span><i class="fa-solid fa-circle-check"></i>Genuine Spare Parts</span>
          <span><i class="fa-solid fa-circle-check"></i>90-Day Warranty</span>
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-left">
        <div class="hero-img-wrap">
          <img src="<?php echo px(34054464, 1000); ?>" onerror="<?php echo $fallback; ?>" class="hero-img" alt="Electrician testing an electrical panel with a multimeter">
          <div class="float-card fc-1">
            <div class="ic"><i class="fa-solid fa-user-gear"></i></div>
            <div><strong>250+</strong><small>Expert Technicians</small></div>
          </div>
          <div class="float-card fc-2">
            <div class="ic"><i class="fa-solid fa-star"></i></div>
            <div><strong>4.9 / 5</strong><small>Customer Rating</small></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- ================= TICKER ================= -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <?php
      $items = [
        ['fa-tv','LED / Smart TV'], ['fa-snowflake','Air Conditioner'], ['fa-temperature-low','Refrigerator'],
        ['fa-soap','Washing Machine'], ['fa-fan','Ceiling Fan'], ['fa-plug-circle-bolt','House Wiring'],
        ['fa-car-battery','Inverter & UPS'], ['fa-solar-panel','Solar Panel'], ['fa-fire-burner','Microwave Oven'],
        ['fa-faucet-drip','Water Heater'], ['fa-laptop','Laptop & PC'], ['fa-lightbulb','Lighting']
      ];
      // printed twice for a seamless scroll loop
      for ($r = 0; $r < 2; $r++) {
        foreach ($items as $it) echo '<span><i class="fa-solid '.$it[0].'"></i>'.$it[1].'</span>';
      }
    ?>
  </div>
</div>

<!-- ================= ABOUT ================= -->
<section id="About">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6" data-aos="fade-up">
        <div class="about-collage">
          <img src="<?php echo px(33694016, 900); ?>" onerror="<?php echo $fallback; ?>" class="img-main" alt="Technician repairing an electronic circuit board">
          <img src="<?php echo px(5691588, 600); ?>" onerror="<?php echo $fallback; ?>" class="img-small" alt="Electrician installing sockets and switches">
          <div class="exp-badge"><strong>10+</strong>Years of<br>Experience</div>
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <span class="sec-tag">About OSMS</span>
        <h2 class="mt-2 mb-3" style="font-size:clamp(1.9rem,4vw,2.8rem);">India's Trusted Chain for <span class="text-red">Electrical &amp; Electronic</span> Care</h2>
        <p class="text-muted">OSMS Services is a multi-brand chain of electrical and electronics service workshops. We keep your devices fit and healthy, and our customers happy and smiling.</p>
        <p class="text-muted mb-4">With well-equipped service centres, fully trained technicians and an online booking system, you can request a service, follow its progress and get the job done without phone calls or waiting in queues.</p>
        <ul class="list-unstyled about-list">
          <li>
            <div class="ic"><i class="fa-solid fa-shield-halved"></i></div>
            <div><h6>Safety First</h6><p>All electrical work follows standard safety practices and is done with insulated tools.</p></div>
          </li>
          <li>
            <div class="ic"><i class="fa-solid fa-microchip"></i></div>
            <div><h6>Board-Level Electronics Repair</h6><p>We repair circuit boards, power supplies and displays, not just replace them.</p></div>
          </li>
          <li>
            <div class="ic"><i class="fa-solid fa-mobile-screen"></i></div>
            <div><h6>Online Tracking</h6><p>Register once to request service and check its live status from your dashboard.</p></div>
          </li>
        </ul>
        <a href="#Registration" class="btn btn-red mt-2">Join OSMS Today <i class="fa-solid fa-arrow-right ms-2"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- ================= STATS ================= -->
<div class="stats">
  <div class="container">
    <div class="row g-4">
      <div class="col-6 col-md-3 stat-col"><div class="stat-box"><i class="fa-solid fa-face-smile"></i><div class="num" data-count="15000">0</div><p>Happy Customers</p></div></div>
      <div class="col-6 col-md-3 stat-col"><div class="stat-box"><i class="fa-solid fa-screwdriver-wrench"></i><div class="num" data-count="32000">0</div><p>Repairs Completed</p></div></div>
      <div class="col-6 col-md-3 stat-col"><div class="stat-box"><i class="fa-solid fa-user-gear"></i><div class="num" data-count="250">0</div><p>Expert Technicians</p></div></div>
      <div class="col-6 col-md-3 stat-col"><div class="stat-box"><i class="fa-solid fa-city"></i><div class="num" data-count="40">0</div><p>Cities Covered</p></div></div>
    </div>
  </div>
</div>

<!-- ================= SERVICES ================= -->
<section id="Services" class="bg-light-2">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <span class="sec-tag">What We Do</span>
      <h2>Our <span class="text-red">Services</span></h2>
      <p>Complete electrical and electronic solutions for homes, shops and offices, all bookable online.</p>
    </div>
    <div class="row g-4">
      <?php
        $services = [
          [35290684, 'fa-tv',             'Electronic Appliances', 'Repair of LED/Smart TVs, music systems, set-top boxes, microwaves and other home electronics.'],
          [7347538,  'fa-snowflake',      'AC & Refrigeration',    'Gas refilling, cooling issues, PCB faults, installation and servicing of split and window ACs.'],
          [7285965,  'fa-plug-circle-bolt','Electrical Wiring',    'New house wiring, rewiring, switchboard repair, earthing and MCB / DB installation.'],
          [10699355, 'fa-microchip',      'Fault Repair',          'Diagnosis and chip-level repair of circuit boards, power supplies and control panels.'],
          [33694019, 'fa-sliders',        'Preventive Maintenance','Scheduled check-ups that catch problems early and keep your devices running longer.'],
          [17842843, 'fa-car-battery',    'Inverter, UPS & Solar', 'Battery check-up, inverter repair, UPS servicing and rooftop solar maintenance.'],
        ];
        $d = 0;
        foreach ($services as $s) { ?>
        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo $d; $d = ($d + 100) % 300; ?>">
          <div class="svc-card">
            <div class="svc-img">
              <img src="<?php echo px($s[0], 700); ?>" onerror="<?php echo $fallback; ?>" alt="<?php echo $s[2]; ?>" loading="lazy">
              <div class="svc-icon"><i class="fa-solid <?php echo $s[1]; ?>"></i></div>
            </div>
            <div class="svc-body">
              <h4><?php echo $s[2]; ?></h4>
              <p><?php echo $s[3]; ?></p>
              <a href="#Registration" class="svc-link">Book Now <i class="fa-solid fa-arrow-right ms-1"></i></a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- ================= APPLIANCES WE REPAIR ================= -->
<section id="Appliances">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <span class="sec-tag">Multi-Brand Support</span>
      <h2>Appliances <span class="text-red">We Repair</span></h2>
      <p>Whatever the brand, our technicians are trained to handle it.</p>
    </div>
    <div class="row g-3 row-cols-2 row-cols-sm-3 row-cols-lg-6">
      <?php
        $appl = [
          ['fa-tv','Television'], ['fa-snowflake','Air Conditioner'], ['fa-temperature-low','Refrigerator'],
          ['fa-soap','Washing Machine'], ['fa-fire-burner','Microwave'], ['fa-fan','Fans & Coolers'],
          ['fa-faucet-drip','Water Heater'], ['fa-car-battery','Inverter / UPS'], ['fa-laptop','Laptop & PC'],
          ['fa-lightbulb','Lights & Fittings'], ['fa-blender','Mixer Grinder'], ['fa-solar-panel','Solar System']
        ];
        foreach ($appl as $i => $a) {
          echo '<div class="col" data-aos="zoom-in" data-aos-delay="'.(($i % 6) * 50).'"><div class="appl-box"><i class="fa-solid '.$a[0].'"></i><h6>'.$a[1].'</h6></div></div>';
        }
      ?>
    </div>
  </div>
</section>

<!-- ================= PROCESS ================= -->
<section class="process">
  <div class="container">
    <div class="sec-head light" data-aos="fade-up">
      <span class="sec-tag">How It Works</span>
      <h2>Get It Fixed in <span class="text-red">4 Easy Steps</span></h2>
      <p>A simple online process from registration to a working device.</p>
    </div>
    <div class="row g-4">
      <div class="col-sm-6 col-lg-3" data-aos="fade-up">
        <div class="step-card"><span class="step-no">01</span><div class="ic"><i class="fa-solid fa-user-plus"></i></div><h4>Register</h4><p>Create your free OSMS account with your name, email and password.</p></div>
      </div>
      <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
        <div class="step-card"><span class="step-no">02</span><div class="ic"><i class="fa-solid fa-file-pen"></i></div><h4>Submit Request</h4><p>Describe the problem, add your address and choose a preferred date.</p></div>
      </div>
      <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
        <div class="step-card"><span class="step-no">03</span><div class="ic"><i class="fa-solid fa-user-gear"></i></div><h4>Technician Assigned</h4><p>Admin assigns a verified technician and you get the visit details.</p></div>
      </div>
      <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
        <div class="step-card"><span class="step-no">04</span><div class="ic"><i class="fa-solid fa-circle-check"></i></div><h4>Work Done</h4><p>Your device is repaired, tested, and the status is updated online.</p></div>
      </div>
    </div>
  </div>
</section>

<!-- ================= EMERGENCY BAND ================= -->
<div class="emergency" style="background-image:url('<?php echo px(27928762, 1600); ?>');">
  <div class="container">
    <div class="row align-items-center g-4 text-center text-lg-start">
      <div class="col-lg-7" data-aos="fade-right">
        <h2 class="mb-2">Power Cut? Sparking Socket? Burning Smell?</h2>
        <p class="mb-0 opacity-75">Don't take risks with electricity. Switch off the main supply and call our 24/7 emergency electricians right away.</p>
      </div>
      <div class="col-lg-5 d-flex align-items-center justify-content-center justify-content-lg-end gap-3" data-aos="fade-left">
        <span class="pulse"><i class="fa-solid fa-phone-volume"></i></span>
        <div>
          <small class="d-block opacity-75">24/7 Emergency Helpline</small>
          <a href="tel:+910000000000" class="phone-big">+91 00000 00000</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ================= GALLERY ================= -->
<section id="Works">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <span class="sec-tag">Our Work</span>
      <h2>Inside Our <span class="text-red">Workshops</span></h2>
      <p>A look at the kind of electrical and electronic jobs our team handles every day.</p>
    </div>
    <div class="gallery-grid" data-aos="fade-up">
      <div class="g-item tall"><img src="<?php echo px(6471913, 700); ?>" onerror="<?php echo $fallback; ?>" alt="AC outdoor unit repair" loading="lazy"><div class="g-cap"><span>Cooling</span><h6 class="m-0">AC Gas Check &amp; Repair</h6></div></div>
      <div class="g-item"><img src="<?php echo px(33531830, 600); ?>" onerror="<?php echo $fallback; ?>" alt="Voltage testing with multimeter" loading="lazy"><div class="g-cap"><span>Electrical</span><h6 class="m-0">Voltage Testing</h6></div></div>
      <div class="g-item wide"><img src="<?php echo px(34404168, 900); ?>" onerror="<?php echo $fallback; ?>" alt="Electronic device repair" loading="lazy"><div class="g-cap"><span>Electronics</span><h6 class="m-0">Device Board Repair</h6></div></div>
      <div class="g-item"><img src="<?php echo px(27928761, 600); ?>" onerror="<?php echo $fallback; ?>" alt="Electrical panel work" loading="lazy"><div class="g-cap"><span>Electrical</span><h6 class="m-0">Panel Installation</h6></div></div>
      <div class="g-item wide"><img src="<?php echo px(36085816, 900); ?>" onerror="<?php echo $fallback; ?>" alt="Solar battery installation" loading="lazy"><div class="g-cap"><span>Energy</span><h6 class="m-0">Solar Battery Setup</h6></div></div>
      <div class="g-item"><img src="<?php echo px(6755135, 600); ?>" onerror="<?php echo $fallback; ?>" alt="Soldering a circuit board" loading="lazy"><div class="g-cap"><span>Electronics</span><h6 class="m-0">Soldering &amp; PCB Work</h6></div></div>
    </div>
  </div>
</section>

<!-- ================= PRICING ================= -->
<section id="Pricing" class="bg-light-2">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <span class="sec-tag">Service Plans</span>
      <h2>Simple, <span class="text-red">Transparent</span> Pricing</h2>
      <p>No hidden charges. Choose a plan that fits your home or business.</p>
    </div>
    <div class="row g-4 justify-content-center">
      <div class="col-md-6 col-lg-4" data-aos="fade-up">
        <div class="plan">
          <div class="plan-ic"><i class="fa-solid fa-plug"></i></div>
          <h4>Quick Fix</h4>
          <div class="price">₹299 <small>/ visit</small></div>
          <ul>
            <li><i class="fa-solid fa-check text-red"></i> Inspection &amp; diagnosis</li>
            <li><i class="fa-solid fa-check text-red"></i> Minor electrical repairs</li>
            <li><i class="fa-solid fa-check text-red"></i> Switch / socket / fan fixes</li>
            <li><i class="fa-solid fa-check text-red"></i> 30-day service warranty</li>
          </ul>
          <a href="#Registration" class="btn btn-outline-danger rounded-pill w-100 py-2">Choose Plan</a>
        </div>
      </div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
        <div class="plan featured">
          <span class="ribbon">Most Popular</span>
          <div class="plan-ic"><i class="fa-solid fa-screwdriver-wrench"></i></div>
          <h4>Complete Care</h4>
          <div class="price">₹799 <small>/ visit</small></div>
          <ul>
            <li><i class="fa-solid fa-check text-red"></i> Full appliance servicing</li>
            <li><i class="fa-solid fa-check text-red"></i> Board-level fault repair</li>
            <li><i class="fa-solid fa-check text-red"></i> Priority technician booking</li>
            <li><i class="fa-solid fa-check text-red"></i> 90-day service warranty</li>
          </ul>
          <a href="#Registration" class="btn btn-red w-100 py-2">Choose Plan</a>
        </div>
      </div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="plan">
          <div class="plan-ic"><i class="fa-solid fa-file-contract"></i></div>
          <h4>Annual AMC</h4>
          <div class="price">₹2,499 <small>/ year</small></div>
          <ul>
            <li><i class="fa-solid fa-check text-red"></i> 4 preventive maintenance visits</li>
            <li><i class="fa-solid fa-check text-red"></i> Unlimited breakdown calls</li>
            <li><i class="fa-solid fa-check text-red"></i> 10% off on spare parts</li>
            <li><i class="fa-solid fa-check text-red"></i> Free electrical safety audit</li>
          </ul>
          <a href="#Registration" class="btn btn-outline-danger rounded-pill w-100 py-2">Choose Plan</a>
        </div>
      </div>
    </div>
    <p class="text-center text-muted small mt-4 mb-0">* Spare parts charged separately. Prices are indicative and may vary by appliance and city.</p>
  </div>
</section>

<!-- ================= REGISTRATION (included) ================= -->
<section id="Registration">
  <?php include('UserRegistration.php'); ?>
</section>

<!-- ================= TESTIMONIALS ================= -->
<section class="bg-light-2">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <span class="sec-tag">Testimonials</span>
      <h2>Our <span class="text-red">Happy Customers</span></h2>
      <p>What people say after their devices came back to life.</p>
    </div>
    <div class="row g-4">
      <?php
        $reviews = [
          ['Ravi Kumar', 'Chennai',   5,   'My washing machine stopped mid-cycle. The technician found the faulty board and fixed it the same day.'],
          ['Vijay',      'Cuddalore', 4.5, 'Booking was easy and I could see the request status at every step. Very professional service.'],
          ['Ravi Ram',   'Trichy',    5,   'Full house rewiring done neatly with proper earthing. They explained every safety point clearly.'],
          ['Kumar',      'Madurai',   4,   'The AMC plan is worth it. My AC and inverter are serviced on time without me having to remember.'],
        ];
        foreach ($reviews as $i => $r) {
          $avatar = 'https://ui-avatars.com/api/?name=' . urlencode($r[0]) . '&background=dc3545&color=fff&bold=true&size=128';
      ?>
        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="<?php echo $i * 100; ?>">
          <div class="testi">
            <i class="fa-solid fa-quote-right quote-ic"></i>
            <div class="stars">
              <?php for ($s = 1; $s <= 5; $s++) {
                if ($r[2] >= $s) echo '<i class="fa-solid fa-star"></i>';
                elseif ($r[2] >= $s - 0.5) echo '<i class="fa-solid fa-star-half-stroke"></i>';
                else echo '<i class="fa-regular fa-star"></i>';
              } ?>
            </div>
            <p>"<?php echo $r[3]; ?>"</p>
            <div class="who">
              <img src="<?php echo $avatar; ?>" alt="<?php echo $r[0]; ?>">
              <div><h6><?php echo $r[0]; ?></h6><small><?php echo $r[1]; ?></small></div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- ================= SAFETY TIPS ================= -->
<section id="Safety">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <span class="sec-tag">Stay Safe</span>
      <h2>Electrical <span class="text-red">Safety Tips</span></h2>
      <p>Simple habits that protect your family and your appliances.</p>
    </div>
    <div class="row g-4">
      <div class="col-md-6 col-lg-4" data-aos="fade-up"><div class="tip"><i class="fa-solid fa-plug-circle-xmark"></i><div><h6>Don't Overload Sockets</h6><p>Avoid running heaters, irons and ACs from one extension board.</p></div></div></div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100"><div class="tip"><i class="fa-solid fa-hand-holding-droplet"></i><div><h6>Keep Water Away</h6><p>Never touch switches or appliances with wet hands or near water.</p></div></div></div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200"><div class="tip"><i class="fa-solid fa-toggle-off"></i><div><h6>Use MCB &amp; RCCB</h6><p>Proper circuit breakers cut power instantly during a short circuit or leakage.</p></div></div></div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up"><div class="tip"><i class="fa-solid fa-bolt-lightning"></i><div><h6>Use Stabilizers</h6><p>Protect ACs, fridges and TVs from voltage fluctuations with a stabilizer.</p></div></div></div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100"><div class="tip"><i class="fa-solid fa-triangle-exclamation"></i><div><h6>Replace Damaged Wires</h6><p>Cracked or burnt wires can cause fires. Get them replaced right away.</p></div></div></div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200"><div class="tip"><i class="fa-solid fa-calendar-check"></i><div><h6>Yearly Inspection</h6><p>Get your home wiring and earthing checked by a professional once a year.</p></div></div></div>
    </div>
  </div>
</section>

<!-- ================= FAQ ================= -->
<section id="FAQ" class="bg-light-2">
  <div class="container">
    <div class="row g-5 align-items-stretch">
      <div class="col-lg-5 d-none d-lg-block" data-aos="fade-right">
        <img src="<?php echo px(32588553, 800); ?>" onerror="<?php echo $fallback; ?>" class="faq-img" alt="Electrician repairing electrical equipment" loading="lazy">
      </div>
      <div class="col-lg-7" data-aos="fade-left">
        <span class="sec-tag">FAQ</span>
        <h2 class="mt-2 mb-4" style="font-size:clamp(1.9rem,4vw,2.6rem);">Frequently Asked <span class="text-red">Questions</span></h2>
        <div class="accordion" id="faqAcc">
          <?php
            $faqs = [
              ['How do I book a service?', 'Register for a free account, log in, and submit a service request with your device details, address and preferred date. Our admin will assign a technician.'],
              ['Which brands and appliances do you service?', 'We are a multi-brand service provider. We repair TVs, ACs, refrigerators, washing machines, inverters, fans, lighting, house wiring and more.'],
              ['How can I check my request status?', 'Log in to your account and open the Service Status page to see whether your request is pending, assigned or completed.'],
              ['Do you offer a warranty on repairs?', 'Yes. Every repair includes a service warranty of 30 to 90 days depending on the plan you choose.'],
              ['Do you provide emergency electrical service?', 'Yes. For power failures, sparking or burning smells, call our 24/7 emergency helpline and switch off the main supply until we arrive.'],
              ['What payment methods are accepted?', 'You can pay by cash, UPI, debit/credit card or net banking after the work is completed.'],
            ];
            foreach ($faqs as $i => $f) { $id = 'faq' . $i; ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button <?php echo $i ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $id; ?>"><?php echo $f[0]; ?></button>
              </h2>
              <div id="<?php echo $id; ?>" class="accordion-collapse collapse <?php echo $i ? '' : 'show'; ?>" data-bs-parent="#faqAcc">
                <div class="accordion-body text-muted"><?php echo $f[1]; ?></div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= CONTACT ================= -->
<section id="Contact">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <span class="sec-tag">Get In Touch</span>
      <h2>Contact <span class="text-red">Us</span></h2>
      <p>Questions about a service or a plan? Send us a message and we'll reply soon.</p>
    </div>
    <div class="row g-4">
      <?php include('contactform.php'); ?>

      <div class="col-lg-5" data-aos="fade-left">
        <div class="info-card">
          <div class="info-row"><div class="ic"><i class="fa-solid fa-building"></i></div><div><h6>Headquarters</h6><p>OSMS Pvt Ltd, Ashok Nagar, T. Nagar, Chennai - 600017</p></div></div>
          <div class="info-row"><div class="ic"><i class="fa-solid fa-code-branch"></i></div><div><h6>Branch</h6><p>OSMS Pvt Ltd, Gandhi Nagar, Cuddalore - 607001</p></div></div>
          <div class="info-row"><div class="ic"><i class="fa-solid fa-phone"></i></div><div><h6>Phone</h6><p>+91 00000 00000</p></div></div>
          <div class="info-row"><div class="ic"><i class="fa-solid fa-envelope"></i></div><div><h6>Email</h6><p>support@osms.com</p></div></div>
          <iframe class="map-frame" src="https://maps.google.com/maps?q=T%20Nagar%20Chennai&z=13&output=embed" loading="lazy" title="OSMS location map"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= FOOTER ================= -->
<footer>
  <div class="container">
    <div class="row g-4">
      <div class="col-md-6 col-lg-4">
        <a href="index.php" class="navbar-brand d-inline-block mb-3"><span class="bolt"><i class="fa-solid fa-bolt"></i></span>OSMS</a>
        <p>Online Services Management System for electrical and electronic appliances. Customer's happiness is our aim!</p>
        <div class="social mt-3">
          <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="#" aria-label="X"><i class="fab fa-x-twitter"></i></a>
          <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
          <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        </div>
      </div>
      <div class="col-6 col-md-3 col-lg-2">
        <h5>Quick Links</h5>
        <ul class="list-unstyled links">
          <li><a href="#home"><i class="fa-solid fa-chevron-right"></i>Home</a></li>
          <li><a href="#About"><i class="fa-solid fa-chevron-right"></i>About</a></li>
          <li><a href="#Works"><i class="fa-solid fa-chevron-right"></i>Our Work</a></li>
          <li><a href="#Pricing"><i class="fa-solid fa-chevron-right"></i>Pricing</a></li>
          <li><a href="#FAQ"><i class="fa-solid fa-chevron-right"></i>FAQ</a></li>
        </ul>
      </div>
      <div class="col-6 col-md-3 col-lg-3">
        <h5>Services</h5>
        <ul class="list-unstyled links">
          <li><a href="#Services"><i class="fa-solid fa-chevron-right"></i>Electronic Appliances</a></li>
          <li><a href="#Services"><i class="fa-solid fa-chevron-right"></i>AC &amp; Refrigeration</a></li>
          <li><a href="#Services"><i class="fa-solid fa-chevron-right"></i>Electrical Wiring</a></li>
          <li><a href="#Services"><i class="fa-solid fa-chevron-right"></i>Inverter &amp; Solar</a></li>
          <li><a href="#Pricing"><i class="fa-solid fa-chevron-right"></i>AMC Plans</a></li>
        </ul>
      </div>
      <div class="col-md-12 col-lg-3">
        <h5>Stay Updated</h5>
        <p>Get service offers and safety tips in your inbox.</p>
        <form class="newsletter d-flex mb-3" onsubmit="event.preventDefault(); this.reset(); alert('Thanks for subscribing!');">
          <input type="email" class="form-control" placeholder="Your email" required aria-label="Email for newsletter">
          <button class="btn btn-red px-3" type="submit" aria-label="Subscribe"><i class="fa-solid fa-paper-plane"></i></button>
        </form>
        <a href="Admin/login.php" class="btn btn-ghost btn-sm"><i class="fa-solid fa-user-shield me-1"></i>Admin Login</a>
      </div>
    </div>
    <div class="foot-bottom d-flex flex-column flex-md-row justify-content-between gap-2 text-center">
      <span>&copy; <?php echo date('Y'); ?> OSMS Pvt Ltd. All rights reserved.</span>
      <span>Designed by developer &nbsp;|&nbsp; Images: <a href="https://www.pexels.com" target="_blank" rel="noopener">Pexels</a></span>
    </div>
  </div>
</footer>

<button id="backToTop" aria-label="Back to top"><i class="fa-solid fa-arrow-up"></i></button>

<!-- ================= SCRIPTS ================= -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  // After Sign Up / Contact submit: jump straight to the message (no scrolling animation)
  const formMsg = document.querySelector('.form-alert');
  if (formMsg) {
    // don't replay the fade-in animation for the form that was just submitted
    formMsg.closest('section').querySelectorAll('[data-aos]').forEach(el => el.removeAttribute('data-aos'));
    const showMsg = () => formMsg.scrollIntoView({ block: 'center' });
    showMsg();
    window.addEventListener('load', showMsg);  // again after images load (page height changes)
  }

  // Turn on smooth scrolling for menu links only after the page has loaded
  window.addEventListener('load', () => document.documentElement.classList.add('smooth-scroll'));

  // Scroll animations
  AOS.init({ duration: 800, once: true, offset: 60 });

  // Navbar shadow + back-to-top button
  const nav = document.getElementById('mainNav');
  const topBtn = document.getElementById('backToTop');
  function onScroll() {
    nav.classList.toggle('scrolled', window.scrollY > 50);
    topBtn.classList.toggle('show', window.scrollY > 500);
  }
  window.addEventListener('scroll', onScroll);
  onScroll();
  topBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

  // Close the mobile menu after tapping a link
  document.querySelectorAll('#myMenu a').forEach(a => a.addEventListener('click', () => {
    const menu = document.getElementById('myMenu');
    if (menu.classList.contains('show')) bootstrap.Collapse.getOrCreateInstance(menu).hide();
  }));

  // Animated counters
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (!e.isIntersecting) return;
      const el = e.target, target = +el.dataset.count;
      let cur = 0;
      const step = Math.max(1, Math.ceil(target / 70));
      const t = setInterval(() => {
        cur = Math.min(cur + step, target);
        el.textContent = cur.toLocaleString('en-IN') + (cur === target ? '+' : '');
        if (cur === target) clearInterval(t);
      }, 22);
      io.unobserve(el);
    });
  }, { threshold: .5 });
  document.querySelectorAll('[data-count]').forEach(c => io.observe(c));

</script>
</body>
</html>