<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nexora — SaaS &amp; Digital Agency Bootstrap Theme</title>
  <meta name="description" content="Nexora is a premium Bootstrap 5 theme for SaaS startups, digital agencies, IT companies and consulting firms. Build a high-converting marketing website fast.">
  <meta name="keywords" content="SaaS theme, agency template, bootstrap 5 business theme, IT company website">
  <meta property="og:title" content="Nexora — Premium SaaS & Agency Bootstrap Theme">
  <meta property="og:description" content="A fully responsive, multi-page business and marketing theme built with Bootstrap 5.">
  <meta property="og:type" content="website">
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Crect width='100' height='100' rx='22' fill='%23155EEF'/%3E%3Ctext x='50' y='68' font-size='58' font-family='Arial' font-weight='800' fill='white' text-anchor='middle'%3EN%3C/text%3E%3C/svg%3E">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@400;600;700;800&display=swap" rel="stylesheet">

  <!-- Bootstrap 5.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/custom.css" rel="stylesheet">
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-nexora fixed-top">
    <div class="container">
      <a class="navbar-brand navbar-brand-custom" href="index.html">Nexora<span>.</span></a>
      <button class="navbar-toggler navbar-toggler-custom" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="bar"></span><span class="bar"></span><span class="bar"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav ms-auto align-items-lg-center gap-1 mt-3 mt-lg-0">
          <li class="nav-item"><a class="nav-link nav2 active" href="{{ url('/welcome') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link nav2" href="{{ url('/about') }}">About</a></li>
          <li class="nav-item"><a class="nav-link nav2" href="{{ url ('services')}}">Services</a></li>
          <li class="nav-item"><a class="nav-link nav2" href="{{ url('/portfolio') }}">Portfolio</a></li>
          <li class="nav-item"><a class="nav-link nav2" href="{{ url('/blog') }}">Blog</a></li>
          <li class="nav-item"><a class="nav-link nav2" href="{{ url('/pricing') }}">Pricing</a></li>
          <li class="nav-item"><a class="nav-link nav2" href="{{ url('/contact') }}">Contact</a></li>
          <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
            <a href="{{ url('/contact') }}" class="btn btn-primary btn-sm-custom w-100">Get Started</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>





@yield('content')






<!-- FOOTER -->
  <footer class="footer-nexora">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6">
        
          <a class="navbar-brand-custom d-inline-block mb-3" href="index.html" style="color:#fff !important;">Nexora<span style="color:var(--n-primary)">.</span></a>
          <p class="text-white-50 mb-4" style="max-width:320px;">We help ambitious SaaS and tech companies design, build and scale digital products that customers love.</p>
          <div class="d-flex gap-2">
            <a href="#" class="social-icon"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-dribbble"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-6">
          <h6>Company</h6>
          <a href="about.html">About Us</a>
          <a href="services.html">Services</a>
          <a href="portfolio.html">Portfolio</a>
          <a href="blog.html">Blog</a>
          <a href="contact.html">Careers</a>
        </div>
        <div class="col-lg-2 col-md-6 col-6">
          <h6>Services</h6>
          <a href="service-details.html">Product Strategy</a>
          <a href="service-details.html">UI/UX Design</a>
          <a href="service-details.html">Web Development</a>
          <a href="service-details.html">Cloud &amp; DevOps</a>
          <a href="service-details.html">Growth Marketing</a>
        </div>
        <div class="col-lg-4 col-md-6">
          <h6>Stay in the loop</h6>
          <p class="text-white-50 mb-3">Get product updates and insights from our team, once a month.</p>
          <form class="d-flex gap-2 needs-validation" novalidate>
            <input type="email" class="form-control" placeholder="Work email" required style="background:rgba(255,255,255,0.06); border-color:rgba(255,255,255,0.12); color:#fff;">
            <button class="btn btn-primary flex-shrink-0" type="submit"><i class="bi bi-send"></i></button>
          </form>
        </div>
      </div>
      <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-2 text-center text-md-start">
        <p class="mb-0" style="display: flex;">&copy; 2026 Nexora. All rights reserved by <a target="_blank" href="https://github.com/HarshadMahadik" style="color: white;padding-left: 5px;"> Harshad Mahadik</a> &bull; Distributed by <a target="_blank" href="https://themewagon.com/" style="color: white;padding-left: 5px;">Themewagon</a>
        </p>
        <div class="d-flex gap-4">
          <a href="#" class="mb-0">Privacy Policy</a>
          <a href="#" class="mb-0">Terms of Service</a>
        </div>
      </div>
    </div>
  </footer>

  <button class="back-to-top" aria-label="Back to top"><i class="bi bi-arrow-up"></i></button>

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
