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
        <h2 class="fw-bold text-primary">Service feature</h2>
        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>Praesent eget risus vitae massa semper aliquam quis mattis quam.</p>
      </div>

      <div class="row g-4">
        <!-- Service 1 -->
        <?php
        $features = $Homemodal->booking_table();
        $icons = [
          'fa-star',        // ⭐
          'fa-cogs',        // ⚙️
          'fa-shower',      // 🚿
          'fa-car',         // 🚗
          'fa-broom',       // 🧹
          'fa-spray-can',   // 🧴
          'fa-wind',        // 🌬️
          'fa-water',       // 💧
          'fa-sparkles',    // ✨
          'fa-check-circle' // ✅
        ];

        foreach ($features as $index => $row) {
          if (in_array($row['feature_id'], [6, 7, 8, 9, 10])) {
            // Rotate icons safely
            $iconClass = $icons[$index % count($icons)];
        ?>

            <div class="col-md-4 col-sm-6" data-aos="fade-up">
              <div class="d-flex align-items-start p-4 bg-white shadow-sm rounded service-box h-100">
                <div class="me-3 text-primary fs-2">
                  <i class="fa <?= $iconClass ?>"></i>
                </div>
                <div>
                  <h5 class="fw-bold"><?= htmlspecialchars($row['feature_name']) ?></h5>
                  <p class="text-muted"><?= htmlspecialchars($row['Description_tb']) ?></p>
                </div>
              </div>
            </div>
        <?php
          }
        }
        ?>
      </div>
  </section>

  <div id="PLAN" class="price">
    <div class="container">
      <div  class="section-header text-center">
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
                <h2><span>₱</span><strong><?= number_format($seen['price'], 2); ?></strong></h2>
              </div>
              <div class="price-body">
                <h3><?= htmlspecialchars($seen['description']); ?></h3>
                <ul>
                  <?php $features = $Homemodal->getServiceFeatures($seen['service_id']);
                  foreach ($features as $feature):
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
                <?php if (isset($_SESSION['customer']) && $_SESSION['customer']['role'] === 'customer'): ?>
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