@extends('layout.index')

@section('content')

  <header class="page-header">
    <div class="container">
      <span class="tag-pill" style="background:rgba(255,255,255,0.1); color:#fff;">Product Strategy</span>
      <h1 class="mb-3">How to Build a Product Roadmap That Survives Contact With Reality</h1>
      <div class="breadcrumb-custom">
        <a href="index.html">Home</a> <span>/</span> <a href="blog.html">Blog</a> <span>/</span> <span class="active">Roadmap Article</span>
      </div>
    </div>
  </header>

  <section class="section">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-8 reveal">
          <div class="d-flex align-items-center gap-3 mb-4 pb-4 border-bottom">
            <img src="https://i.pravatar.cc/56?img=8" class="rounded-circle" style="width:48px;height:48px;" alt="Daniel Hwang">
            <div>
              <div class="fw-bold text-navy">Daniel Hwang</div>
              <small class="text-slate-light">June 2, 2026 · 7 min read</small>
            </div>
          </div>

          <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?w=900&h=500&fit=crop" class="rounded-img w-100 mb-4" alt="Team reviewing product roadmap on whiteboard" style="aspect-ratio:16/9; object-fit:cover;">

          <p class="fs-5 mb-4">Every product team has a roadmap. Very few have one that survives the first quarter unchanged — and that's actually fine, if the roadmap was built to flex. The problem is most aren't.</p>

          <h3 class="mb-3">Why traditional roadmaps break</h3>
          <p class="mb-4">The classic roadmap is a list of features mapped to dates. It looks reassuring in a board meeting, but it treats every commitment as equally certain. When priorities shift — a competitor ships first, a key customer churns, an engineering estimate doubles — the whole document needs rework, and stakeholders lose trust in the next version too.</p>

          <p class="mb-4">We've found the fix isn't more detail. It's restructuring the roadmap around confidence levels and outcomes rather than fixed dates and features.</p>

          <h3 class="mb-3">The three-horizon framework</h3>
          <p class="mb-4">Instead of a single timeline, we organize roadmaps into three horizons: "Now" (committed, in active development), "Next" (scoped and likely, but not yet started), and "Later" (directional bets that need more validation). Each horizon carries a different level of detail and a different conversation with stakeholders.</p>

          <div class="row g-3 mb-4">
            <div class="col-md-4">
              <div class="feature-grid-item flex-column">
                <div class="icon-box icon-box-success mb-2"><i class="bi bi-1-circle"></i></div>
                <strong class="text-navy d-block mb-1">Now</strong>
                <span class="small">In progress, fully scoped, dates are commitments.</span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="feature-grid-item flex-column">
                <div class="icon-box icon-box-primary mb-2"><i class="bi bi-2-circle"></i></div>
                <strong class="text-navy d-block mb-1">Next</strong>
                <span class="small">Scoped at a high level, dates are estimates.</span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="feature-grid-item flex-column">
                <div class="icon-box icon-box-secondary mb-2"><i class="bi bi-3-circle"></i></div>
                <strong class="text-navy d-block mb-1">Later</strong>
                <span class="small">Directional only — themes, not features.</span>
              </div>
            </div>
          </div>

          <h3 class="mb-3">Tie every item to a measurable outcome</h3>
          <p class="mb-4">A roadmap item that says "Build CSV export" tells you what to build but not why. Reframe it as "Reduce manual reporting time for enterprise admins" and suddenly the team has room to find the best solution — which might not be a CSV export at all. This framing also makes it far easier to deprioritize items honestly when something more impactful comes up.</p>

          <h3 class="mb-3">Review monthly, not quarterly</h3>
          <p class="mb-4">Quarterly roadmap reviews are too infrequent to catch drift early and too frequent to justify a full re-plan each time. A lightweight monthly check — 30 minutes, three questions: what moved, what's blocked, what's new — keeps the roadmap honest without becoming a planning treadmill.</p>

          <h3 class="mb-3">The takeaway</h3>
          <p class="mb-4">A roadmap's job isn't to predict the future perfectly — it's to give your team and stakeholders a shared, current understanding of priorities. Build yours so that being wrong about a date doesn't mean being wrong about direction.</p>

          <!-- Tags -->
          <div class="d-flex flex-wrap gap-2 mb-4 pt-3 border-top">
            <span class="badge-soft">Product Management</span>
            <span class="badge-soft">Roadmapping</span>
            <span class="badge-soft">Strategy</span>
          </div>

          <!-- Author box -->
          <div class="widget d-flex gap-3 align-items-center">
            <img src="https://i.pravatar.cc/80?img=8" class="rounded-circle" style="width:64px;height:64px;" alt="Daniel Hwang headshot">
            <div>
              <h5 class="mb-1">Daniel Hwang</h5>
              <p class="small mb-0">CEO &amp; Co-Founder at Nexora. Previously led product teams at two YC-backed startups. Writes about product strategy and team building.</p>
            </div>
          </div>

          <!-- Comments -->
          <h4 class="mt-5 mb-4">Leave a comment</h4>
          <form class="needs-validation" novalidate>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" required>
                <div class="invalid-feedback">Please enter your name.</div>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" required>
                <div class="invalid-feedback">Please enter a valid email.</div>
              </div>
              <div class="col-12">
                <label class="form-label">Comment</label>
                <textarea class="form-control" rows="4" required></textarea>
                <div class="invalid-feedback">Please enter a comment.</div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-lg-custom">Post Comment</button>
              </div>
            </div>
          </form>
        </div>

        <!-- SIDEBAR -->
        <div class="col-lg-4 reveal">
          <div class="widget">
            <h5>Related Articles</h5>
            <ul class="widget-link-list">
              <li><a href="blog-details.html" class="text-decoration-none text-navy">Why Your Design System Keeps Falling Apart</a></li>
              <li><a href="blog-details.html" class="text-decoration-none text-navy">Running Discovery Sprints Remotely</a></li>
              <li><a href="blog-details.html" class="text-decoration-none text-navy">Onboarding Metrics That Predict Churn</a></li>
            </ul>
          </div>
          <div class="widget">
            <h5>Categories</h5>
            <ul class="widget-link-list">
              <li>Product Strategy <span>12</span></li>
              <li>Design <span>18</span></li>
              <li>Engineering <span>24</span></li>
              <li>Growth <span>9</span></li>
            </ul>
          </div>
          <div class="widget bg-gradient-dark text-white border-0">
            <div class="icon-box icon-box-white mb-3"><i class="bi bi-envelope-paper"></i></div>
            <h5 class="text-white">Enjoyed this article?</h5>
            <p class="text-white-50 small mb-3">Get more like it, once a month.</p>
            <form class="needs-validation" novalidate>
              <input type="email" class="form-control mb-2" placeholder="Your email" required style="background:rgba(255,255,255,0.06); border-color:rgba(255,255,255,0.12); color:#fff;">
              <button class="btn btn-primary w-100" type="submit">Subscribe</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection