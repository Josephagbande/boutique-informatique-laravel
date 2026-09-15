@extends('layout.index')

@section('content')

  <header class="page-header">
    <div class="container">
      <h1 class="mb-3">Our Portfolio</h1>
      <div class="breadcrumb-custom">
        <a href="index.html">Home</a> <span>/</span> <span class="active">Portfolio</span>
      </div>
    </div>
  </header>

  <!-- FILTERS -->
  <section class="section pb-0">
    <div class="container">
      <div class="row section-header justify-content-center text-center">
        <div class="col-lg-7 reveal">
          <span class="eyebrow">Case studies</span>
          <h2 class="section-title">Work we're proud of</h2>
          <p class="section-subtitle mx-auto">A selection of recent engagements across industries and project types.</p>
        </div>
      </div>
      <div class="d-flex flex-wrap justify-content-center gap-2 mb-5 reveal">
        <button class="btn btn-primary btn-sm-custom filter-btn active" data-filter="all">All Work</button>
        <button class="btn btn-light-custom btn-sm-custom filter-btn" data-filter="design">Product Design</button>
        <button class="btn btn-light-custom btn-sm-custom filter-btn" data-filter="dev">Development</button>
        <button class="btn btn-light-custom btn-sm-custom filter-btn" data-filter="brand">Branding</button>
      </div>
    </div>
  </section>

  <!-- PORTFOLIO GRID -->
  <section class="section pt-0">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-6 col-lg-4 reveal" data-category="design">
          <a href="portfolio-single.html" class="portfolio-card d-block">
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&h=450&fit=crop" alt="Payflow dashboard redesign">
            <div class="portfolio-overlay">
              <span>FinTech · Product Design</span>
              <h5>Payflow Dashboard Redesign</h5>
            </div>
          </a>
        </div>
        <div class="col-md-6 col-lg-4 reveal" data-category="dev">
          <a href="portfolio-single.html" class="portfolio-card d-block">
            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&h=450&fit=crop" alt="Metricly analytics platform">
            <div class="portfolio-overlay">
              <span>SaaS · Web Development</span>
              <h5>Metricly Analytics Platform</h5>
            </div>
          </a>
        </div>
        <div class="col-md-6 col-lg-4 reveal" data-category="brand">
          <a href="portfolio-single.html" class="portfolio-card d-block">
            <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&h=450&fit=crop" alt="Carewise patient app branding">
            <div class="portfolio-overlay">
              <span>HealthTech · Branding</span>
              <h5>Carewise Patient App</h5>
            </div>
          </a>
        </div>
        <div class="col-md-6 col-lg-4 reveal" data-category="dev">
          <a href="portfolio-single.html" class="portfolio-card d-block">
            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=600&h=450&fit=crop" alt="Orbiq CRM platform build">
            <div class="portfolio-overlay">
              <span>B2B SaaS · Development</span>
              <h5>Orbiq CRM Platform</h5>
            </div>
          </a>
        </div>
        <div class="col-md-6 col-lg-4 reveal" data-category="design">
          <a href="portfolio-single.html" class="portfolio-card d-block">
            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&h=451&fit=crop" alt="Verta mobile banking UI">
            <div class="portfolio-overlay">
              <span>FinTech · UI Design</span>
              <h5>Verta Mobile Banking App</h5>
            </div>
          </a>
        </div>
        <div class="col-md-6 col-lg-4 reveal" data-category="brand">
          <a href="portfolio-single.html" class="portfolio-card d-block">
            <img src="https://images.unsplash.com/photo-1559028012-481c04fa702d?w=600&h=450&fit=crop" alt="Cloudra brand identity">
            <div class="portfolio-overlay">
              <span>Cloud Infrastructure · Branding</span>
              <h5>Cloudra Brand Identity</h5>
            </div>
          </a>
        </div>
        <div class="col-md-6 col-lg-4 reveal" data-category="dev">
          <a href="portfolio-single.html" class="portfolio-card d-block">
            <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=600&h=450&fit=crop" alt="Flowbit automation tool">
            <div class="portfolio-overlay">
              <span>Productivity SaaS · Development</span>
              <h5>Flowbit Automation Suite</h5>
            </div>
          </a>
        </div>
        <div class="col-md-6 col-lg-4 reveal" data-category="design">
          <a href="portfolio-single.html" class="portfolio-card d-block">
            <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?w=600&h=450&fit=crop" alt="Northpeak consulting site design">
            <div class="portfolio-overlay">
              <span>Consulting · Web Design</span>
              <h5>Northpeak Consulting Site</h5>
            </div>
          </a>
        </div>
        <div class="col-md-6 col-lg-4 reveal" data-category="brand">
          <a href="portfolio-single.html" class="portfolio-card d-block">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=600&h=450&fit=crop" alt="Pivotal agency rebrand">
            <div class="portfolio-overlay">
              <span>Marketing Agency · Branding</span>
              <h5>Pivotal Agency Rebrand</h5>
            </div>
          </a>
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
            <h2 class="mb-2">Have a project in mind?</h2>
            <p class="mb-0 fs-5">Let's discuss how we can bring it to life.</p>
          </div>
          <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
            <a href="contact.html" class="btn btn-primary btn-lg-custom">Start a Project <i class="bi bi-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection
