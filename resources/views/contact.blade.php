@extends('layout.index')


@section('content')







  <header class="page-header">
    <div class="container">
      <h1 class="mb-3">Get In Touch</h1>
      <div class="breadcrumb-custom">
        <a href="index.html">Home</a> <span>/</span> <span class="active">Contact</span>
      </div>
    </div>
  </header>

  <!-- CONTACT INFO CARDS -->
  <section class="section pb-0">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-4 reveal">
          <div class="card-premium text-center">
            <div class="icon-box icon-box-primary mx-auto mb-3"><i class="bi bi-geo-alt"></i></div>
            <h3 class="card-title">Visit Us</h3>
            <p class="mb-0">148 Innovation Drive, Suite 400<br>San Francisco, CA 94107</p>
          </div>
        </div>
        <div class="col-md-4 reveal">
          <div class="card-premium text-center">
            <div class="icon-box icon-box-secondary mx-auto mb-3"><i class="bi bi-envelope"></i></div>
            <h3 class="card-title">Email Us</h3>
            <p class="mb-1">General inquiries:<br><a href="mailto:hello@nexora.com" class="text-primary-custom fw-semibold text-decoration-none">hello@nexora.com</a></p>
          </div>
        </div>
        <div class="col-md-4 reveal">
          <div class="card-premium text-center">
            <div class="icon-box icon-box-success mx-auto mb-3"><i class="bi bi-telephone"></i></div>
            <h3 class="card-title">Call Us</h3>
            <p class="mb-0">Mon – Fri, 9am – 6pm PST<br><a href="tel:+14155550182" class="text-primary-custom fw-semibold text-decoration-none">+1 (415) 555-0182</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FORM + MAP -->
  <section class="section">
    <div class="container">
      <div class="row g-5 align-items-stretch">
        <div class="col-lg-7 reveal">
          <span class="eyebrow">Send a message</span>
          <h2 class="section-title mb-4">Tell us about your project</h2>
          <form class="needs-validation" novalidate method="POST" action="{{ route('ajouter') }}">
            
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label" for="fullName">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="fullName" required>
                <div class="invalid-feedback">Please enter your name.</div>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="workEmail">Work Email</label>
                <input type="email" class="form-control" id="workEmail" name="workEmail" required>
                <div class="invalid-feedback">Please enter a valid email address.</div>
              </div>
              <div class="col-md-12">
                <label class="form-label" for="companyName">Company</label>
                <input type="text" class="form-control" id="companyName" name="companyName">
              </div>
             
              
              <div class="col-12">
                <label class="form-label" for="message">Project Details</label>
                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Tell us a bit about your goals, timeline, and anything else we should know." required></textarea>
                <div class="invalid-feedback">Please share a few details about your project.</div>
              </div>
             
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-lg-custom">Send Message <i class="bi bi-send ms-1"></i></button>
              </div>
            </div>
          </form>
        </div>

        <div class="col-lg-5 reveal">
          <div class="map-frame mb-4">
            <iframe src="https://www.google.com/maps?q=San+Francisco&output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Nexora office location map"></iframe>
          </div>
          <div class="widget bg-gradient-dark text-white border-0">
            <div class="icon-box icon-box-white mb-3"><i class="bi bi-clock"></i></div>
            <h5 class="text-white mb-3">Office Hours</h5>
            <ul class="widget-link-list" style="--n-border: rgba(255,255,255,0.1);">
              <li style="border-color: rgba(255,255,255,0.1); color:#fff;">Monday – Friday <span style="color:rgba(255,255,255,0.6);">9:00 AM – 6:00 PM</span></li>
              <li style="border-color: rgba(255,255,255,0.1); color:#fff;">Saturday <span style="color:rgba(255,255,255,0.6);">10:00 AM – 2:00 PM</span></li>
              <li style="border-color: rgba(255,255,255,0.1); color:#fff;">Sunday <span style="color:rgba(255,255,255,0.6);">Closed</span></li>
            </ul>
            <p class="text-white-50 small mt-3 mb-0">All times Pacific Standard Time (PST).</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="section bg-soft">
    <div class="container">
      <div class="row section-header justify-content-center text-center">
        <div class="col-lg-7 reveal">
          <span class="eyebrow">Before you reach out</span>
          <h2 class="section-title">Quick answers</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-8 reveal">
          <div class="accordion accordion-custom" id="contactFaq">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#cfaq1">How soon will I hear back?</button>
              </h2>
              <div id="cfaq1" class="accordion-collapse collapse show" data-bs-parent="#contactFaq">
                <div class="accordion-body">We respond to all inquiries within one business day, usually much sooner.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cfaq2">Do I need a fully scoped brief?</button>
              </h2>
              <div id="cfaq2" class="accordion-collapse collapse" data-bs-parent="#contactFaq">
                <div class="accordion-body">Not at all — a rough idea is enough to start. We'll help you scope the rest during a free discovery call.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cfaq3">Can we sign an NDA before discussing details?</button>
              </h2>
              <div id="cfaq3" class="accordion-collapse collapse" data-bs-parent="#contactFaq">
                <div class="accordion-body">Yes, we're happy to sign your NDA — just mention it in your message and we'll send it over before our first call.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  









  @endsection