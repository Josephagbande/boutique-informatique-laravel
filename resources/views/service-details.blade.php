@extends('layouts.app')

@section('content')

  <header class="page-header">
    <div class="container">
      <h1 class="mb-3">UI/UX Design</h1>
      <div class="breadcrumb-custom">
        <a href="index.html">Home</a> <span>/</span> <a href="services.html">Services</a> <span>/</span> <span class="active">UI/UX Design</span>
      </div>
    </div>
  </header>

  <section class="section">
    <div class="container">
      <div class="row g-5">
        <!-- MAIN CONTENT -->
        <div class="col-lg-8 reveal">
          <img src="https://images.unsplash.com/photo-1581291518857-4e27b48ff24e?w=900&h=500&fit=crop" class="rounded-img w-100 mb-4" alt="UI design wireframes on screen" style="aspect-ratio:16/9; object-fit:cover;">
          <span class="eyebrow">Service overview</span>
          <h2 class="mb-3">Interfaces that look great and convert better</h2>
          <p class="mb-4">Good design isn't decoration — it's the difference between a user completing a checkout flow or abandoning it. Our UI/UX design service covers everything from early research to a fully documented design system, handed off in developer-ready Figma files.</p>
          <p class="mb-4">We start with stakeholder interviews and usability audits of your current product, then move into low-fidelity wireframes, validating flows with real users before investing in high-fidelity visuals. Every project ends with a component library that keeps your product consistent as it grows.</p>

          <h3 class="mb-3 mt-5">What's included</h3>
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <div class="feature-grid-item">
                <div class="icon-box icon-box-primary"><i class="bi bi-search"></i></div>
                <div><strong class="text-navy d-block mb-1">User Research</strong><span class="small">Interviews, surveys and usability testing.</span></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="feature-grid-item">
                <div class="icon-box icon-box-secondary"><i class="bi bi-diagram-3"></i></div>
                <div><strong class="text-navy d-block mb-1">Information Architecture</strong><span class="small">Sitemaps and user-flow diagrams.</span></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="feature-grid-item">
                <div class="icon-box icon-box-success"><i class="bi bi-pencil-square"></i></div>
                <div><strong class="text-navy d-block mb-1">Wireframing</strong><span class="small">Low-fidelity flows for rapid validation.</span></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="feature-grid-item">
                <div class="icon-box icon-box-primary"><i class="bi bi-layers"></i></div>
                <div><strong class="text-navy d-block mb-1">Design Systems</strong><span class="small">Reusable components, tokens and docs.</span></div>
              </div>
            </div>
          </div>

          <h3 class="mb-3 mt-5">Our process</h3>
          <div class="row g-4 mb-4">
            <div class="col-md-6">
              <div class="process-step">
                <span class="process-number">01</span>
                <h4 class="card-title">Research &amp; Audit</h4>
                <p class="mb-0">We review analytics, run usability tests and interview your users to find friction points.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="process-step">
                <span class="process-number">02</span>
                <h4 class="card-title">Wireframes</h4>
                <p class="mb-0">Structured low-fidelity flows reviewed with stakeholders before visual design starts.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="process-step">
                <span class="process-number">03</span>
                <h4 class="card-title">Visual Design</h4>
                <p class="mb-0">High-fidelity screens built on a documented design system and component library.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="process-step">
                <span class="process-number">04</span>
                <h4 class="card-title">Handoff &amp; Support</h4>
                <p class="mb-0">Developer-ready files, specs, and 30 days of post-handoff design support.</p>
              </div>
            </div>
          </div>

          <!-- FAQ -->
          <h3 class="mb-3 mt-5">Common questions</h3>
          <div class="accordion accordion-custom" id="serviceDetailFaq">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sdfaq1">How long does a typical design project take?</button>
              </h2>
              <div id="sdfaq1" class="accordion-collapse collapse show" data-bs-parent="#serviceDetailFaq">
                <div class="accordion-body">A full redesign typically runs 6–10 weeks depending on scope, with weekly review checkpoints.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sdfaq2">Do you provide developer handoff files?</button>
              </h2>
              <div id="sdfaq2" class="accordion-collapse collapse" data-bs-parent="#serviceDetailFaq">
                <div class="accordion-body">Yes — every project includes a structured Figma file with components, tokens and annotations ready for engineering.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sdfaq3">Can you work with our existing brand guidelines?</button>
              </h2>
              <div id="sdfaq3" class="accordion-collapse collapse" data-bs-parent="#serviceDetailFaq">
                <div class="accordion-body">Absolutely. We'll extend your existing brand into a cohesive digital design system rather than starting from scratch.</div>
              </div>
            </div>
          </div>
        </div>

        <!-- SIDEBAR -->
        <div class="col-lg-4 reveal">
          <div class="widget">
            <h5>All Services</h5>
            <ul class="widget-link-list">
              <li><a href="service-details.html" class="text-decoration-none text-navy">Product Strategy</a> <i class="bi bi-arrow-right text-primary-custom"></i></li>
              <li><a href="service-details.html" class="text-decoration-none text-primary-custom fw-bold">UI/UX Design</a> <i class="bi bi-arrow-right text-primary-custom"></i></li>
              <li><a href="service-details.html" class="text-decoration-none text-navy">Web Development</a> <i class="bi bi-arrow-right text-primary-custom"></i></li>
              <li><a href="service-details.html" class="text-decoration-none text-navy">Cloud &amp; DevOps</a> <i class="bi bi-arrow-right text-primary-custom"></i></li>
              <li><a href="service-details.html" class="text-decoration-none text-navy">Growth Marketing</a> <i class="bi bi-arrow-right text-primary-custom"></i></li>
            </ul>
          </div>
          <div class="widget bg-gradient-dark text-white border-0">
            <div class="icon-box icon-box-white mb-3"><i class="bi bi-headset"></i></div>
            <h5 class="text-white">Need help scoping this?</h5>
            <p class="text-white-50 small mb-3">Talk to a strategist — free, no obligation 30-minute call.</p>
            <a href="contact.html" class="btn btn-primary w-100">Book a Call</a>
          </div>
          <div class="widget">
            <h5>Pricing snapshot</h5>
            <ul class="widget-link-list">
              <li>Design Sprint <span>$4,500</span></li>
              <li>Full Redesign <span>$18,000+</span></li>
              <li>Design Retainer <span>$6,000/mo</span></li>
            </ul>
            <a href="pricing.html" class="card-link-arrow mt-3 d-inline-flex">See all plans <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection
