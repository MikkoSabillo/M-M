<?php include "../nav/header.php"?>
        
            <div
                id="myCarousel"
                class="carousel slide"
                style="margin: 0 auto; width: 70%; margin-top: 60px; "
                data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button
                        type="button"
                        data-bs-target="#myCarousel"
                        data-bs-slide-to="0"
                        class="active"
                        aria-current="true"
                        aria-label="Slide 1"
                    ></button>
                    <button
                        type="button"
                        data-bs-target="#myCarousel"
                        data-bs-slide-to="1"
                        aria-label="Slide 2"
                    ></button>
                    <button
                        type="button"
                        data-bs-target="#myCarousel"
                        data-bs-slide-to="2"
                        aria-label="Slide 3"
                    ></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="4000">
                            <img src="https://www.datocms-assets.com/32623/1732563126-cliffside_beach_philippines.jpeg" class="w-100 h-100" alt="Slide 1"  style="border-radius: 10px;">
                        <div class="container ">
                            <div class="carousel-caption color text-white">
                                <h1>Example headline.</h1>
                                <p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p>
                                <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item " data-bs-interval="4000">
                            <img src="https://www.datocms-assets.com/32623/1732563126-cliffside_beach_philippines.jpeg" class="w-100 h-100" alt="Slide 2">
                        <div class="container ">
                            <div class="carousel-caption color text-white">
                            <h1>Another example headline.</h1>
                            <p>Some representative placeholder content for the second slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item " data-bs-interval="4000">
                      <img src="https://www.datocms-assets.com/32623/1732563126-cliffside_beach_philippines.jpeg" class="w-100 h-100" alt="Slide 3">
                      <div class="container ">
                        <div class="carousel-caption t color text-white ">
                          <h1>One more for good measure.</h1>
                          <p>Some representative placeholder content for the third slide of this carousel.</p>
                          <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                        </div>
                      </div>
                    </div>
                </div>
                <button
                    class="carousel-control-prev"
                    type="button"
                    data-bs-target="#myCarousel"
                    data-bs-slide="prev"
                >
                    <span
                        class="carousel-control-prev-icon"
                        aria-hidden="true"
                    ></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button
                    class="carousel-control-next"
                    type="button"
                    data-bs-target="#myCarousel"
                    data-bs-slide="next"
                >
                    <span
                        class="carousel-control-next-icon"
                        aria-hidden="true"
                    ></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        <main>
            <!-- Marketing messaging and featurettes
            ================================================== -->
            <!-- Wrap the rest of the page in another container to center all the content. -->
            <div class="container marketing">
                <!-- Three columns of text below the carousel -->

                <!-- /.row -->
                <!-- START THE FEATURETTES -->
                <hr class="featurette-divider" />
                <div class="row featurette">
                  <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">
                      First featurette heading.
                      <span class="text-body-secondary">It’ll blow your mind.</span>
                    </h2>
                    <p class="lead">
                      Some great placeholder content for the first featurette here. Imagine some exciting prose here.
                    </p>
                  </div>
                  <div class="col-md-5">
                    <img src="https://www.datocms-assets.com/32623/1732563126-cliffside_beach_philippines.jpeg" class="featurette-image img-fluid mx-auto" alt="Feature 1">
                  </div>
                </div>
            </div>
            <!-- About 1 - Bootstrap Brain Component -->
            <section class=" py-3 py-md-5">
              <div class="container">
                <hr class="featurette-divider" />
                <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
                  <div class="col-12 col-lg-6 col-xl-5">
                    <img class="img-fluid rounded" loading="lazy" src="https://washhounds.com/wp-content/uploads/35413014_m_normal_none.webp" alt="About 1">
                  </div>
                  <div class="col-12 col-lg-6 col-xl-7">
                    <div class="row justify-content-xl-center">
                      <div class="col-12 col-xl-11">
                        <h2 class="mb-3">About Us?</h2>
                        <p class="lead fs-4 text-secondary mb-3">At  M&M CARWASH,  we know your car isn’t just a way to get around—it’s part of your daily life, your adventures, and your personality. That’s why we treat every vehicle with the same care and attention we’d give our own.</p>
                        <p class="mb-5">We are a fast-growing company, but we have never lost sight of our core values. We believe in collaboration, innovation, and customer satisfaction. We are always looking for new ways to improve our products and services.</p>
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
                                <p class="text-secondary mb-0">We are crafting a digital method that subsists life across all mediums.</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-md-6">
                            <div class="d-flex">
                              <div class="me-4 text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
                                  <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16Zm0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15Z" />
                                </svg>
                              </div>
                              <div>
                                <h2 class="h4 mb-3">Digital Agency</h2>
                                <p class="text-secondary mb-0">We believe in innovation by merging primary with elaborate ideas.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <!-- /.container -->
<?php include "../nav/footer.php"?>