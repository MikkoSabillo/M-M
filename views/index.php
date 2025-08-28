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
                
              
                <!-- /END THE FEATURETTES -->
            </div>
            <!-- /.container -->
<?php include "../nav/footer.php"?>