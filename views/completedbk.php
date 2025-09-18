<?php include "../nav/admin-header.php" ?>
<main>
    <div 
        aria-label="breadcrumb" class="bg-light p-1 m-3 shadow">
        <ol class="breadcrumb s1">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Completed Bookings</li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-footer bg-white">
                    <h2 class="mb-4">Completed Bookings</h2>
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
                                    <th>Return Date</th>
                                    <th>Washing Point</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 $usertable = $adminusertable->completedbook();
                                $n = 0;
                                foreach ($usertable as $bk) {
                                    $n++;
                                ?>
                                    <tr>
                                        <td><?= $n ?></td>
                                        <td><?= htmlspecialchars($bk['first_name'] . " " .  $bk['last_name']) ?></td>
                                        <td><?= htmlspecialchars($bk['make'] . " " . $bk['model'] . " (" . $bk['vehicle_id'] . ")") ?></td>
                                        <td><?= htmlspecialchars($bk['service_name'] . " (" . $bk['price'] . ")") ?></td>
                                        <td><?= htmlspecialchars($bk['booking_date']) ?></td>
                                        <td><?= htmlspecialchars($bk['booking_time']) ?></td>
                                        <td><?= htmlspecialchars($bk['return_date']) ?></td>
                                        <td><?= htmlspecialchars($bk['splash_theme']) ?></td>
                                        <td><?= htmlspecialchars($bk['status']) ?></td>

                                        <td align="center"><button class="btn btn-primary btn-sm"
                                                title="UPDATE"
                                                data-bs-toggle="modal"
                                                data-bs-target="#payment<?= ($bk['booking_id']) ?>">
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
                                    <!--modal for login-->
                                    <!-- Payment Modal -->
                                    <div class="modal fade" id="payment<?= ($bk['booking_id']) ?>" tabindex="-1" aria-labelledby="modallabel<?= ($bk['booking_id']) ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="modallabel<?= ($bk['booking_id']) ?>">Payment Data</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <!-- Submit -->
                                                    <button type="submit" class="btn btn-primary">Pay Now</button>
                                                    
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