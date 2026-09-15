@extends('layout.index')

@section('content')
  <header class="page-header">
    <div class="container">
      <h1 class="mb-3">Simple, Transparent Pricing</h1>
      <div class="breadcrumb-custom">
        <a href="index.html">Home</a> <span>/</span> <span class="active">Pricing</span>
      </div>
    </div>
  </header>

  <!-- TOGGLE -->
  <section class="section pb-0">
    <div class="container">
      <div class="row section-header justify-content-center text-center">
        <div class="col-lg-7 reveal">
          <span class="eyebrow">Retainer plans</span>
          <h2 class="section-title">Choose the plan that fits your stage</h2>
          <p class="section-subtitle mx-auto">All plans include a dedicated project lead, weekly demos and a shared Slack channel. Cancel or switch plans anytime.</p>
        </div>
      </div>
      <div class="d-flex justify-content-center align-items-center gap-3 mb-5 reveal">
        <span class="fw-semibold text-navy" id="monthlyLabel">Monthly</span>
        <div class="form-check form-switch m-0">
          <input class="form-check-input" type="checkbox" role="switch" id="billingToggle" style="width:3em; height:1.5em; cursor:pointer;">
        </div>
        <span class="fw-semibold text-slate" id="yearlyLabel">Yearly <span class="badge-soft">Save 15%</span></span>
      </div>
    </div>
  </section>

  <!-- PRICING CARDS -->
  <section class="section pt-0">
    <div class="container">
      <div class="row g-4 align-items-stretch">
        <div class="col-lg-4 reveal">
          <div class="pricing-card">
            <h3 class="mb-1">Starter</h3>
            <p class="text-slate small mb-3">For early-stage teams validating an MVP.</p>
            <div class="price-wrap">
              <span class="price" data-monthly="4500" data-yearly="3825">$4,500</span>
              <span class="price-period">/mo</span>
            </div>
            <hr class="pricing-divider">
            <ul class="feature-list">
              <li><i class="bi bi-check-circle-fill"></i> 1 dedicated designer</li>
              <li><i class="bi bi-check-circle-fill"></i> Up to 40 hours/month</li>
              <li><i class="bi bi-check-circle-fill"></i> Weekly progress demos</li>
              <li><i class="bi bi-check-circle-fill"></i> Shared Slack channel</li>
              <li class="disabled"><i class="bi bi-x-circle"></i> Dedicated engineer</li>
              <li class="disabled"><i class="bi bi-x-circle"></i> Priority support</li>
            </ul>
            <a href="contact.html" class="btn btn-light-custom w-100 mt-4">Get Started</a>
          </div>
        </div>
        <div class="col-lg-4 reveal">
          <div class="pricing-card featured">
            <span class="pricing-badge">Most Popular</span>
            <h3 class="mb-1">Growth</h3>
            <p class="text-slate small mb-3">For scaling teams shipping every sprint.</p>
            <div class="price-wrap">
              <span class="price" data-monthly="9500" data-yearly="8075">$9,500</span>
              <span class="price-period">/mo</span>
            </div>
            <hr class="pricing-divider">
            <ul class="feature-list">
              <li><i class="bi bi-check-circle-fill"></i> 1 designer + 1 engineer</li>
              <li><i class="bi bi-check-circle-fill"></i> Up to 100 hours/month</li>
              <li><i class="bi bi-check-circle-fill"></i> Twice-weekly demos</li>
              <li><i class="bi bi-check-circle-fill"></i> Shared Slack channel</li>
              <li><i class="bi bi-check-circle-fill"></i> Priority support (24h)</li>
              <li class="disabled"><i class="bi bi-x-circle"></i> Dedicated QA engineer</li>
            </ul>
            <a href="contact.html" class="btn btn-primary w-100 mt-4">Get Started</a>
          </div>
        </div>
        <div class="col-lg-4 reveal">
          <div class="pricing-card">
            <h3 class="mb-1">Enterprise</h3>
            <p class="text-slate small mb-3">For complex, multi-team product organizations.</p>
            <div class="price-wrap">
              <span class="price">Custom</span>
            </div>
            <hr class="pricing-divider">
            <ul class="feature-list">
              <li><i class="bi bi-check-circle-fill"></i> Full pod (design + dev + QA)</li>
              <li><i class="bi bi-check-circle-fill"></i> Unlimited hours</li>
              <li><i class="bi bi-check-circle-fill"></i> Daily standups</li>
              <li><i class="bi bi-check-circle-fill"></i> Dedicated account manager</li>
              <li><i class="bi bi-check-circle-fill"></i> Priority support (4h)</li>
              <li><i class="bi bi-check-circle-fill"></i> Custom SLAs &amp; contracts</li>
            </ul>
            <a href="contact.html" class="btn btn-light-custom w-100 mt-4">Contact Sales</a>
          </div>
        </div>
      </div>
      <p class="text-center text-slate small mt-4 reveal">All plans include a 14-day satisfaction guarantee. Need a one-off project instead? <a href="contact.html" class="text-primary-custom fw-semibold">Get a custom quote →</a></p>
    </div>
  </section>

  <!-- COMPARISON TABLE -->
  <section class="section bg-soft">
    <div class="container">
      <div class="row section-header justify-content-center text-center">
        <div class="col-lg-7 reveal">
          <span class="eyebrow">Compare plans</span>
          <h2 class="section-title">Full feature breakdown</h2>
        </div>
      </div>
      <div class="table-responsive reveal">
        <table class="table align-middle bg-white rounded-4 overflow-hidden" style="box-shadow: var(--n-shadow-sm);">
          <thead>
            <tr class="text-center">
              <th class="text-start ps-4 py-3" style="font-family:var(--n-font-display); color:var(--n-navy);">Feature</th>
              <th class="py-3" style="font-family:var(--n-font-display); color:var(--n-navy);">Starter</th>
              <th class="py-3 text-primary-custom" style="font-family:var(--n-font-display);">Growth</th>
              <th class="py-3 pe-4" style="font-family:var(--n-font-display); color:var(--n-navy);">Enterprise</th>
            </tr>
          </thead>
          <tbody>
            <tr class="text-center">
              <td class="text-start ps-4">Dedicated designer</td>
              <td><i class="bi bi-check-lg text-success"></i></td>
              <td><i class="bi bi-check-lg text-success"></i></td>
              <td><i class="bi bi-check-lg text-success"></i></td>
            </tr>
            <tr class="text-center">
              <td class="text-start ps-4">Dedicated engineer</td>
              <td><i class="bi bi-dash text-slate-light"></i></td>
              <td><i class="bi bi-check-lg text-success"></i></td>
              <td><i class="bi bi-check-lg text-success"></i></td>
            </tr>
            <tr class="text-center">
              <td class="text-start ps-4">QA engineer</td>
              <td><i class="bi bi-dash text-slate-light"></i></td>
              <td><i class="bi bi-dash text-slate-light"></i></td>
              <td><i class="bi bi-check-lg text-success"></i></td>
            </tr>
            <tr class="text-center">
              <td class="text-start ps-4">Monthly hours</td>
              <td>40</td>
              <td>100</td>
              <td>Unlimited</td>
            </tr>
            <tr class="text-center">
              <td class="text-start ps-4">Progress demos</td>
              <td>Weekly</td>
              <td>Twice weekly</td>
              <td>Daily</td>
            </tr>
            <tr class="text-center">
              <td class="text-start ps-4 pb-4">Support response time</td>
              <td class="pb-4">48h</td>
              <td class="pb-4">24h</td>
              <td class="pb-4 pe-4">4h</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="section">
    <div class="container">
      <div class="row section-header justify-content-center text-center">
        <div class="col-lg-7 reveal">
          <span class="eyebrow">Billing questions</span>
          <h2 class="section-title">Pricing FAQs</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-8 reveal">
          <div class="accordion accordion-custom" id="pricingFaq">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#pfaq1">Can I change plans later?</button>
              </h2>
              <div id="pfaq1" class="accordion-collapse collapse show" data-bs-parent="#pricingFaq">
                <div class="accordion-body">Yes, you can upgrade, downgrade or pause your plan at the start of any billing cycle with no penalty.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pfaq2">What happens if I don't use all my hours?</button>
              </h2>
              <div id="pfaq2" class="accordion-collapse collapse" data-bs-parent="#pricingFaq">
                <div class="accordion-body">Unused hours roll over to the following month, up to a maximum of 20% of your monthly allocation.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pfaq3">Do you offer one-time project pricing?</button>
              </h2>
              <div id="pfaq3" class="accordion-collapse collapse" data-bs-parent="#pricingFaq">
                <div class="accordion-body">Yes — for clearly scoped projects we can provide a fixed quote. Reach out via the contact page for a custom estimate.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pfaq4">Is there a minimum contract length?</button>
              </h2>
              <div id="pfaq4" class="accordion-collapse collapse" data-bs-parent="#pricingFaq">
                <div class="accordion-body">Retainer plans run month-to-month with no long-term lock-in. Enterprise plans may include custom terms.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection
