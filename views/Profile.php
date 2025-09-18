<?php include "../nav/header.php"; ?>
<div class="page-header" style="margin-top: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Profile</h2>
            </div>
            <div class="col-12">
                <a class="sb" href="Homepage.php">Home</a>
                <a href="profilepage.php">Profile</a>
            </div>
        </div>
    </div>
</div>
<main>
    <div class="container">
        <div class="card shadow-sm" style="max-width: 980px; margin: 0 auto; ">
            <div class="row g-0">
                <?php
                if (isset($_SESSION['customer']['user_id'])) {
                    $usertable = $Homemodal->users_table($_SESSION['customer']['user_id']);
                    foreach ($usertable as $pfp): ?>
                        <div class="col-md-4 p-3 text-center">
                            <img src="<?= $pfp['profile_pic'] ?>" style=" border-radius: 200px; height: 15vh; max-width: 150px; margin: 0 auto; "  class="img-thumbnail" alt="Profile Picture">
                            <div class="mt-2">
                                <span class="badge bg-success">Online</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-between align-items-center">
                                    <?= $pfp['first_name'] ?> <?= $pfp['last_name'] ?>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                </h5>
                                <p class="card-text text-muted">
                                <h6>nickname :</h6>
                                <p><?= $pfp['nickname'] ?></p>
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        <i class="fas fa-map-marker-alt"></i> <?= $pfp['address'] ?> <?= $pfp['city'] ?> <?= $pfp['state'] ?> <?= $pfp['zip_code'] ?>
                                    </small>
                                </p>

                                <div class="border-top pt-2">
                                    <div class="row text-center">
                                        <div class="col">
                                            <h6>All booking</h6>
                                            <?php
                                            $allbkr = $Homemodal->allbooking($_SESSION['customer']['user_id']);
                                            $allbks = count($allbkr);
                                            ?>
                                            <strong><?= $allbks ?></strong>
                                        </div>
                                        <div class="col border-start">
                                            <h6>New</h6>
                                            <?php
                                            $pending = array_filter($allbkr, fn($bk) => $bk['status'] === 'Confirmed');
                                            ?>
                                            <strong><?= count($pending) ?></strong>
                                        </div>
                                        <div class="col border-start">
                                            <h6>Completed</h6>
                                            <?php
                                            $pending = array_filter($allbkr, fn($bk) => $bk['status'] === 'Completed');
                                            ?>
                                            <strong><?= count($pending) ?></strong>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card-footer bg-white" >
                                <h2 class="mb-4">All Bookings</h2>
                                <div  class="table-responsive" style=" height: 10vh;  transition: ease-in-out 0.1s;">
                                    <table  class="table table-bordered table-hover table-striped align-middle"  >
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Username</th>
                                                <th>Vehicle</th>
                                                <th>Booking Date</th>
                                                <th>Booking Time</th>
                                                <th>Washing Point</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $n = 0;
                                            foreach ($allbkr as $bk) {
                                                $n++;
                                            ?>
                                                <tr>
                                                    <td><?= $n ?></td>
                                                    <td><?= htmlspecialchars($bk['username']) ?></td>
                                                    <td><?= htmlspecialchars($bk['make'] . " " . $bk['model'] . " (" . $bk['vehicle_id'] . ")") ?></td>
                                                    <td><?= htmlspecialchars($bk['booking_date']) ?></td>
                                                    <td><?= htmlspecialchars($bk['booking_time']) ?></td>
                                                    <td><?= htmlspecialchars($bk['splash_theme']) ?></td>
                                                    <td><?= htmlspecialchars($bk['status']) ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                <?php endforeach;
                } ?>
            </div>
        </div>
    </div>

    <?php include "../nav/footer.php"; ?>