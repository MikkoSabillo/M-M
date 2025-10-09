<?php include "../nav/header.php" ?>
<div class="page-header" style="margin-top: 0px;">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>About Us</h2>
      </div>
      <div class="col-12">
        <a class="sb" href="Homepage.php">Home</a>
        <a href="about.php">About Us</a>
      </div>
    </div>
  </div>
</div>
<main>
  <section>
    <div class="container my-5">
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


  <?php include "../nav/footer.php" ?>