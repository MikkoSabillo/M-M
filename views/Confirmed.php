<?php include "../nav/admin-header.php" ?>
<main>
    <div
        aria-label="breadcrumb" class="bg-light p-1 m-3 shadow">
        <ol class="breadcrumb s1">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">New Bookings</li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-footer bg-white">
                    <h2 class="mb-4">New Bookings</h2>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-hover table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Vehicle</th>
                                    <th>Plan</th>
                                    <th>Booking Date</th>
                                    <th>Booking Time</th>
                                    <th>Washing Point</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $usertable1 = $adminusertable->ActiveConfirmed();
                                $n = 0;
                                foreach ($usertable1 as $bk) {
                                    $n++;
                                ?>
                                    <tr>
                                        <td><?= $n ?></td>
                                        <td><?= htmlspecialchars($bk['first_name'] . " " .  $bk['last_name']) ?></td>
                                        <td><?= htmlspecialchars($bk['make'] . " " . $bk['model'] . " (" . $bk['vehicle_id'] . ")") ?></td>
                                        <td><?= htmlspecialchars($bk['service_name'] . " (" . $bk['price'] . ")") ?></td>
                                        <td><?= htmlspecialchars($bk['booking_date']) ?></td>
                                        <td><?= htmlspecialchars($bk['booking_time']) ?></td>
                                        <td><?= htmlspecialchars($bk['splash_theme']) ?></td>
                                        <td  class="badge text-bg-primary my-3 mx-2" ><?= htmlspecialchars($bk['status']) ?> </td>
                                        <td align="center"><button class="btn btn-primary btn-sm"
                                                title="UPDATE"
                                                data-bs-toggle="modal"
                                                data-bs-target="#payment<?= ($bk['booking_id']) ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit" title="UPDATE FEATURE">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                    <!--modal for login-->


                                    <!-- Payment Modal -->
                                    <div class="modal fade" id="payment<?= ($bk['booking_id']) ?>" tabindex="-1" aria-labelledby="modallabel<?= ($bk['booking_id']) ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4 class="modal-title">Payment</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form action="../page/Confirmedbk.php?function=completed" method="post">
                                                        <!-- Hidden field for booking_id -->
                                                        <input type="hidden" name="booking_id" value="<?= htmlspecialchars($bk['booking_id']) ?>">

                                                        <!-- Payment Type -->
                                                        <div class="mb-3">
                                                            <label class="form-label">Payment Method</label>
                                                            <select name="payment_method" required class="form-control">
                                                                <option value="">Select Payment Type</option>
                                                                <option value="Cash">Cash</option>
                                                                <option value="Card">Card</option>
                                                                <option value="GCash">GCash</option>
                                                                <option value="PayPal">PayPal</option>
                                                            </select>
                                                        </div>
                                                        <!-- Payment Date -->
                                                        <div class="mb-3">
                                                            <label class="form-label">Payment Date</label>
                                                            <input type="date" name="payment_date" value=" <?= date('Y-m-d') ?>" class="form-control" required>
                                                        </div>
                                                        <!-- Amount (optional override if needed) -->
                                                        <div class="mb-3">
                                                            <label class="form-label">Amount</label>
                                                            <input type="number" step="0.01" name="amount" class="form-control" value="<?= htmlspecialchars($bk['price']) ?>" placeholder="Enter amount (optional)">
                                                        </div>
                                                        <!-- Submit -->
                                                        <button type="submit" class="btn btn-primary">Pay Now</button>
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