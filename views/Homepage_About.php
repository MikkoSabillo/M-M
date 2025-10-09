<?php include "../nav/admin-header.php" ?>
<main>
    <div
        aria-label="breadcrumb" class="bg-light p-1 m-3 shadow">
        <ol class="breadcrumb s1">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Service feature</li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-footer bg-white">
                    <h2 class="mb-4">Service feature</h2>
                    <div class="table-responsive" style=" height: 60vh;  transition: ease-in-out 0.1s;">
                        <table id="myTable" class="table table-bordered table-hover table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $n = 0;

                                foreach ($about as $cwa) {
                                    $n++;

                                    $card_img = htmlspecialchars($cwa['about_us_img']);
                                ?>
                                    <tr>
                                        <td><?= $n ?></td>
                                        <td style="
                                background-image: url(<?= $card_img ?>);
                                background-size: cover;
                                background-position: center;
                                background-repeat: no-repeat;
                                    ">
                                        </td>
                                        <td><?= $cwa['about_us_title'] ?></td>
                                        <td><?= $cwa['about_us_prg'] ?></td>



                                        <td align="center"><button class="btn btn-primary btn-sm"
                                                title="UPDATE"
                                                data-bs-toggle="modal"
                                                data-bs-target="#payment<?= $cwa['id'] ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-eye"
                                                    title="VIEW FEATURE">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg>

                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Payment Modal -->
                                    <div class="modal fade" id="payment<?= $cwa['id'] ?>" tabindex="-1" aria-labelledby="modallabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="modallabel">Update Data</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form action="../page/admin.php?function=upcwa" method="post">

                                                        <input type="hidden" name="id" value="<?= htmlspecialchars($cwa['id']) ?>">

                                                        <div class="mb-3">
                                                            <img src='<?= $card_img ?>' alt='Card Image' class='img-fluid rounded mb-3'>
                                                            <label class="form-label">Service name</label>
                                                            <input type="text" name="img" value="<?= $cwa['about_us_img'] ?>" class="form-control" required>
                                                        </div>

                                                        
                                                        <div class="mb-3">
                                                            <label class="form-label">feature</label>
                                                            <input type="text" name="featuren" value="<?= $cwa['about_us_title'] ?>" class="form-control" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Description </label>

                                                            <div class="control-group ">
                                                                <textarea class="form-control" id="message" placeholder="Message" required="required" name="Description"><?=  $cwa['about_us_prg'] ?></textarea>
                                                            </div>

                                                            <!-- Submit -->
                                                            <button type="submit" class="btn btn-primary my-4">Update Service</button>
                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                        <h2 class="mb-4">Versatile Brand feature</h2>
                        <table id="myTable" class="table table-bordered table-hover table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Brand Name</th>
                                    <th>included </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $n = 0;
                                foreach ($brand as $cwabrand) {
                                    $n++ ?>
                                    <tr>
                                        <td><?= $n ?></td>
                                        <td><?= $cwabrand['Versatile_Brand'] ?></td>
                                        <td><?= $cwabrand['included'] ?></td>



                                        <td align="center"><button class="btn btn-primary btn-sm"
                                                title="UPDATE"
                                                data-bs-toggle="modal"
                                                data-bs-target="#paymentsd<?= $cwabrand['id'] ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-eye"
                                                    title="VIEW FEATURE">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg>

                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Payment Modal -->
                                    <div class="modal fade" id="paymentsd<?= $cwabrand['id'] ?>" tabindex="-1" aria-labelledby="modallabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="modallabel">Update Data</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form action="../page/admin.php?function=upbrand" method="post">

                                                        <input type="hidden" name="booking_id" value="<?= htmlspecialchars($cwabrand['id']) ?>">

                                                        <div class="mb-3">
                                                            <label class="form-label">Brand Name</label>
                                                            <input type="text" name="Brand" value="<?= $cwabrand['Versatile_Brand'] ?>" class="form-control" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Included</label>
                                                            <input type="number"  name="included" class="form-control" value="<?= htmlspecialchars($cwabrand['included'] ) ?>" placeholder="Enter amount (optional)">
                                                        </div>
                                                            <!-- Submit -->
                                                        <button type="submit" class="btn btn-primary">Update Service</button>
                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include "../nav/admin-footer.php" ?>