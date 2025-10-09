<?php include "../nav/header.php" ?>

<div
  id="myCarousel"
  class="carousel slide carousel-fade"
  style="margin: 0 auto; width: 75%; margin-top: 75px; "
  data-bs-ride="carousel" data-aos="fade-up" data-aos-delay="200">
  <div class="carousel-indicators">
    <?php
    $carousel = $Homemodal->Homecarousel();
    foreach ($carousel as $index => $crsl_listItem) {
      $active = ($index === 0) ? 'active' : '';
      echo '<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="' . $index . '" class="' . $active . '" aria-current="' . ($active ? 'true' : 'false') . '" aria-label="Slide ' . ($index + 1) . '"></button>';
    }
    ?>
  </div>

  <div class="carousel-inner">
    <?php
    $carousel = $Homemodal->Homecarousel();
    foreach ($carousel as $index => $crsl) {
      $active = ($index === 0) ? 'active' : '';
    ?>
      <div class="carousel-item <?= $active ?>" data-bs-interval="4000">
        <img src="<?= htmlspecialchars($crsl['carousel_img']) ?>" class="w-100 h-100" alt="Slide 1">
        <div class="container ">
          <div class="carousel-caption color text-white">
            <h1><?= htmlspecialchars($crsl['carousel_title']) ?></h1>
            <p class="opacity-75"><?= htmlspecialchars($crsl['carousel_desc']) ?></p>
            <p><a class="btn btn-lg btn-primary" href="Service.php#PLAN">Book Now</a></p>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
  <button
    class="carousel-control-prev"
    type="button"
    data-bs-target="#myCarousel"
    data-bs-slide="prev">
    <span
      class="carousel-control-prev-icon"
      aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button
    class="carousel-control-next"
    type="button"
    data-bs-target="#myCarousel"
    data-bs-slide="next">
    <span
      class="carousel-control-next-icon"
      aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<main class="height">
  <!-- About 1 - Bootstrap Brain Component -->
  <section class=" py-3 py-md-5">
    <div class="container">
      <hr class="featurette-divider" />
      <?php
      foreach ($about as $seen): ?>
        <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
          <div class="col-12 col-lg-6 col-xl-5" data-aos="fade-up" data-aos-delay="100">
            <img class="img-fluid rounded" loading="lazy" src="<?= $seen['about_us_img'] ?>" alt="About 1">
          </div>
          <div class="col-12 col-lg-6 col-xl-7" data-aos="fade-up" data-aos-delay="200">
            <div class="row justify-content-xl-center">
              <div class="col-12 col-xl-11">
                <h3 class="mb-3 text-danger">About Us?</h3>
                <h1 class="mb-3"><?= $seen['about_us_title'] ?></h1>
                <p class="mb-5"><?= $seen['about_us_prg'] ?></p>
                <div class="row gy-4 gy-md-0 gx-xxl-5X">
                  <div class="col-12 col-md-6">
                    <div class="d-flex">
                      <div class="me-4 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                          <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                        </svg>
                      </div>
                      <div>
                        <h2 class="h4 mb-3">Versatile Brand</h2>
                        <?php
                        foreach ($brand as $brd): ?>
                          <h6>
                            <?php if ($brd['included']): ?>
                              <i class="bi bi-check2-circle p-1 text-danger fs-5">
                              <?php else: ?>
                                <i class="far fa-times-circle p-1 text-danger fs-5"></i>
                              <?php endif; ?>

                              </i><?= $brd['Versatile_Brand'] ?>
                          </h6>

                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

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

  <div class="price">
    <div class="container">
      <div class="section-header text-center">
        <p>Washing Plan</p>
        <h2>Choose Your Plan</h2>
      </div>
      <div class="row">
        <?php
        $total = count($srv);
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
                  <?php
                  $features = $Homemodal->getServiceFeatures($seen['service_id']);
                  foreach ($features as $feature):
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

  <section class="page-header1 bg-light py-5">
    <div class="container ">
      <div class="row justify-content-center">
        <div class="text-center mb-5">
          <h2 class="fw-bold">Testimonial</h2>
        </div>
        <div class="col-md-8">

          <div id="carouselTestimonial" class="carousel slide text-center bg" data-bs-ride="carousel" data-aos="fade-up" data-aos-delay="0">
            <div class="carousel-inner">
              <!-- Slide 1 -->
              <div class="carousel-item active tk">
                <img src="../images/unnamed_1.webp" width="80" height="80" class="img-thumbnail rounded-circle" alt="John Deo">
                <h4 class="fw-bold">John Deo</h4>
                <p class=" px-3 ">
                  Fusce non fermentum mi. Praesent vel lobortis elit. Nulla sodales, risus quis sollicitudin iaculis,
                  felis dolor aliquet purus, eget elementum velit nunc eu dolor. Curabitur elit tellus.
                </p>
              </div>

              <!-- Slide 2 -->
              <div class="carousel-item tk">
                <img src="../images/unnamed_1.webp" width="80" height="80" class="img-thumbnail rounded-circle" alt="Gramth Larry">
                <h4 class="fw-bold">Gramth Larry</h4>
                <p class=" px-3">
                  Fusce non fermentum mi. Praesent vel lobortis elit. Nulla sodales, risus quis sollicitudin iaculis,
                  felis dolor aliquet purus, eget elementum velit nunc eu dolor. Curabitur elit tellus, dictu.
                </p>
              </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselTestimonial" data-bs-slide="prev">
              <span class="fs-3 text-dark"><i class="bi bi-chevron-left"></i></span>
              <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselTestimonial" data-bs-slide="next">
              <span class="fs-3 text-dark"><i class="bi bi-chevron-right"></i></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- /.container -->
  <?php include "../nav/footer.php" ?>