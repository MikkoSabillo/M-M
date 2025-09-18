<?php include "../nav/header.php" ?>
<div class="page-header" style="margin-top: 0px;">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>Service & Washing Plan</h2>
      </div>
      <div class="col-12">
        <a class="sb" href="Homepage.php">Home</a>
        <a href="Service.php">Service</a>
      </div>
    </div>
  </div>
</div>
<main>
  <section id="services" class="py-5 bg-light">
    <div class="container">

      <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Services</h2>
        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>Praesent eget risus vitae massa semper aliquam quis mattis quam.</p>
      </div>

      <div class="row g-4">
        <!-- Service 1 -->
        <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="0">
          <div class="d-flex align-items-start p-4 bg-white shadow-sm rounded service-box h-100">
            <div class="me-3 text-danger fs-2">
              <i class="fa fa-heart"></i>
            </div>
            <div>
              <h5 class="fw-bold">Car Checkup</h5>
              <p class="text-muted">Comprehensive diagnostics and health checks to keep your car running smoothly.</p>
            </div>
          </div>
        </div>

        <!-- Service 2 -->
        <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
          <div class="d-flex align-items-start p-4 bg-white shadow-sm rounded service-box h-100">
            <div class="me-3 text-info fs-2">
              <i class="fa fa-compass"></i>
            </div>
            <div>
              <h5 class="fw-bold">Car Wash</h5>
              <p class="text-muted">Sparkling clean inside and out, with eco-friendly products and a touch of care.</p>
            </div>
          </div>
        </div>

        <!-- Service 3 -->
        <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="200">
          <div class="d-flex align-items-start p-4 bg-white shadow-sm rounded service-box h-100">
            <div class="me-3 text-warning fs-2">
              <i class="fa fa-bell"></i>
            </div>
            <div>
              <h5 class="fw-bold">Car Repair</h5>
              <p class="text-muted">From minor fixes to major repairs, we’ve got the tools and expertise you need.</p>
            </div>
          </div>
        </div>

        <!-- Service 4 -->
        <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="300">
          <div class="d-flex align-items-start p-4 bg-white shadow-sm rounded service-box h-100">
            <div class="me-3 text-success fs-2">
              <i class="fa fa-cube"></i>
            </div>
            <div>
              <h5 class="fw-bold">Car Paint</h5>
              <p class="text-muted">Custom colors, flawless finishes, and a shine that turns heads.</p>
            </div>
          </div>
        </div>

        <!-- Service 5 -->
        <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="400">
          <div class="d-flex align-items-start p-4 bg-white shadow-sm rounded service-box h-100">
            <div class="me-3 text-secondary fs-2">
              <i class="fa fa-yelp"></i>
            </div>
            <div>
              <h5 class="fw-bold">Car Decor</h5>
              <p class="text-muted">Personalize your ride with stylish accessories and interior upgrades.</p>
            </div>
          </div>
        </div>

        <!-- Service 6 -->
        <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="500">
          <div class="d-flex align-items-start p-4 bg-white shadow-sm rounded service-box h-100">
            <div class="me-3 text-primary fs-2">
              <i class="fa fa-life-ring"></i>
            </div>
            <div>
              <h5 class="fw-bold">Car Polish</h5>
              <p class="text-muted">Restore your car’s shine with premium polish and protective coating.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="price">
    <div class="container">
      <div class="section-header text-center">
        <p>Washing Plan</p>
        <h2>Choose Your Plan</h2>
      </div>
      <div class="row">
        <?php
        $total =  count($srv);
        $middleIndex = floor($total / 2); // find middle index
        $index = 0;
        foreach ($srv as $seen): ?>
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="price-item <?php if ($index == $middleIndex) echo 'featured-item'; ?>">
              <div class="price-header">
                <h3><?= htmlspecialchars($seen['service_name']); ?></h3>
                <h2><span>$</span><strong><?= number_format($seen['price'], 2); ?></strong></h2>
              </div>
              <div class="price-body">
                <h3><?= htmlspecialchars($seen['description']); ?></h3>
                <ul>
                  <?php $features = $Homemodal->getServiceFeatures($seen['service_id']); foreach ($features as $feature):
                  $features = $Homemodal->getServiceFeatures($seen['service_id']);
                 
                  ?>
                    <li>
                      <?php if ($feature['is_included']): ?>
                        <i class="far fa-check-circle text-success"></i>
                      <?php else: ?>
                        <i class="far fa-times-circle text-danger"></i>
                      <?php endif; ?>
                      <?= htmlspecialchars($feature['feature_name']); ?>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
              <div class="price-footer">
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'customer'): ?>
                  <a class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#myModal">Book Now</a>
                <?php else: ?>
                  <a class="btn btn-custom" onclick="logonfirst()" data-bs-toggle="modal" data-bs-target="#loginmodal">Book Now</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <?php $index++; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <?php include "../nav/footer.php" ?>