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
                                    <th>Service name</th>
                                    <th>feature Name</th>
                                    <th>Description For Services Features</th>
                                    <th>Plan</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $n = 0;
                                foreach ($fture as $service) {
                                    $n++ ?>
                                    <tr>
                                        <td><?= $n ?></td>
                                        <td><?= $service['service_name'] ?></td>
                                        <td><?= $service['feature_name'] ?></td>
                                        <td><?= $service['Description_tb'] ?></td>
                                        <td><?= $service['price'] ?></td>
                                        <td><?= $service['Timeup'] ?></td>

                                        <td align="center"><button class="btn btn-primary btn-sm"
                                                title="UPDATE"
                                                data-bs-toggle="modal"
                                                data-bs-target="#payment<?= $service['feature_id'] ?>">
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
                                    <div class="modal fade" id="payment<?= $service['feature_id'] ?>" tabindex="-1" aria-labelledby="modallabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="modallabel">Update Data</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form action="../page/admin.php?function=update_Service" method="post">

                                                        <input type="hidden" name="booking_id" value="<?= htmlspecialchars($service['feature_id']) ?>">

                                                        <div class="mb-3">
                                                            <label class="form-label">Service name</label>
                                                            <input type="text" name="ServiceN" value="<?= $service['service_name'] ?>" class="form-control" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Amount</label>
                                                            <input type="number" step="0.01" name="amount" class="form-control" value="<?= htmlspecialchars($service['price']) ?>" placeholder="Enter amount (optional)">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">feature</label>
                                                            <input type="text" name="featuren" value="<?= $service['feature_name'] ?>" class="form-control" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Description For Services Features</label>

                                                            <div class="control-group">
                                                                <textarea class="form-control" id="message" placeholder="Message" required="required" name="Description"><?= $service['Description_tb'] ?></textarea>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Payment Date</label>
                                                                <input type="datetime-local" name="payment_date" value="<?= date('Y-m-d H:i:s A') ?>" class="form-control" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Check or Wrong</label>
                                                                <input type="number" step="1,0" name="is_included" class="form-control" value="<?= $service['is_included'] ?>" placeholder="1 = check, 0 = wrong">
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