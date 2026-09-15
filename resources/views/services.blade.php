@extends('layout.index')

@section('content')

  <header class="page-header">
    <div class="container">
      <h1 class="mb-3">Our Services</h1>
      <div class="breadcrumb-custom">
        <a href="index.html">Home</a> <span>/</span> <span class="active">Services</span>
      </div>
    </div>
  </header>

  <!-- SERVICES GRID -->
  <section class="section">
    <div class="container">
      <div class="row section-header justify-content-center text-center">
        <div class="col-lg-7 reveal">
          <span class="eyebrow">Full-stack capability</span>
          <h2 class="section-title">Everything you need under one roof</h2>
          <p class="section-subtitle mx-auto">Mix and match services to fit your stage — from a single design sprint to a fully managed product team.</p>
        </div>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-lg-4 reveal">
          <div class="card-premium">
            <div class="icon-box icon-box-lg icon-box-primary mb-4"><i class="bi bi-bar-chart-line"></i></div>
            <h3 class="card-title">Product Strategy</h3>
            <p class="mb-3">User research, competitive analysis and roadmap planning that aligns your team around what matters most.</p>
            <a href="service-details.html" class="card-link-arrow">Learn more <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="card-premium">
            <div class="icon-box icon-box-lg icon-box-secondary mb-4"><i class="bi bi-palette"></i></div>
            <h3 class="card-title">UI/UX Design</h3>
            <p class="mb-3">Wireframes, interactive prototypes and a documented design system your team can scale with.</p>
            <a href="service-details.html" class="card-link-arrow">Learn more <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="card-premium">
            <div class="icon-box icon-box-lg icon-box-success mb-4"><i class="bi bi-code-slash"></i></div>
            <h3 class="card-title">Web Development</h3>
            <p class="mb-3">Production-grade front-end and back-end engineering using modern, maintainable frameworks.</p>
            <a href="service-details.html" class="card-link-arrow">Learn more <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="card-premium">
            <div class="icon-box icon-box-lg icon-box-primary mb-4"><i class="bi bi-cloud-arrow-up"></i></div>
            <h3 class="card-title">Cloud &amp; DevOps</h3>
            <p class="mb-3">Infrastructure-as-code, CI/CD pipelines and observability so your platform scales reliably.</p>
            <a href="service-details.html" class="card-link-arrow">Learn more <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="card-premium">
            <div class="icon-box icon-box-lg icon-box-secondary mb-4"><i class="bi bi-megaphone"></i></div>
            <h3 class="card-title">Growth Marketing</h3>
            <p class="mb-3">SEO, content and lifecycle campaigns engineered to lower CAC and increase retention.</p>
            <a href="service-details.html" class="card-link-arrow">Learn more <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="card-premium">
            <div class="icon-box icon-box-lg icon-box-success mb-4"><i class="bi bi-shield-check"></i></div>
            <h3 class="card-title">QA &amp; Security Audits</h3>
            <p class="mb-3">Automated test suites, penetration testing and compliance reviews before you ship.</p>
            <a href="service-details.html" class="card-link-arrow">Learn more <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- HOW WE ENGAGE -->
  <section class="section bg-soft">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-6 reveal">
          <span class="eyebrow">Engagement models</span>
          <h2 class="section-title">Flexible ways to work with us</h2>
          <p class="section-subtitle mb-4">Whether you need a short sprint or an ongoing partner, we shape the engagement around your roadmap — not the other way around.</p>
          <ul class="list-check">
            <li><i class="bi bi-check"></i><div><strong class="text-navy">Fixed-scope projects</strong> — defined deliverables, timeline and price.</div></li>
            <li><i class="bi bi-check"></i><div><strong class="text-navy">Monthly retainers</strong> — a dedicated pod working from your backlog.</div></li>
            <li><i class="bi bi-check"></i><div><strong class="text-navy">Staff augmentation</strong> — embed our specialists directly in your team.</div></li>
          </ul>
        </div>
        <div class="col-lg-6 reveal">
          <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?w=700&h=560&fit=crop" class="rounded-img w-100" alt="Team planning session on whiteboard" style="aspect-ratio:5/4; object-fit:cover;">
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="section">
    <div class="container">
      <div class="row section-header justify-content-center text-center">
        <div class="col-lg-7 reveal">
          <span class="eyebrow">Questions</span>
          <h2 class="section-title">Frequently asked questions</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-8 reveal">
          <div class="accordion accordion-custom" id="servicesFaq">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">How quickly can we get started?</button>
              </h2>
              <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#servicesFaq">
                <div class="accordion-body">Most engagements kick off within 1–2 weeks of signing. For urgent projects, we can sometimes start sooner depending on team availability.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">Do you work with early-stage startups?</button>
              </h2>
              <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#servicesFaq">
                <div class="accordion-body">Yes — about a third of our clients are pre-Series A. We offer scoped MVP packages designed for speed and budget sensitivity.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">What tools and frameworks do you use?</button>
              </h2>
              <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#servicesFaq">
                <div class="accordion-body">It depends on your existing stack, but commonly React, Node.js, Next.js and AWS/GCP infrastructure, paired with Figma for design.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">Can you take over an existing codebase?</button>
              </h2>
              <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#servicesFaq">
                <div class="accordion-body">Absolutely. We start every takeover with a technical audit so we understand the codebase before making changes.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="section pt-0">
    <div class="container">
      <div class="cta-section reveal">
        <div class="row align-items-center">
          <div class="col-lg-8">
            <h2 class="mb-2">Not sure which service you need?</h2>
            <p class="mb-0 fs-5">Book a free consultation and we'll help map out the right plan.</p>
          </div>
          <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
            <a href="contact.html" class="btn btn-primary btn-lg-custom">Book a Call <i class="bi bi-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection
