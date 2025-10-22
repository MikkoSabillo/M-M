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
        <div class="card shadow-sm" style="max-width: 100%; margin: 0 auto; ">
            <div class="row g-0">
                <?php
                if (isset($_SESSION['customer']['user_id'])) {
                    $usertable = $Homemodal->users_table($_SESSION['customer']['user_id']);
                    foreach ($usertable as $pfp): ?>
                        <div class="col-md-4 p-3 text-center">
                            <img src="<?= $pfp['profile_pic'] ?>" style=" border-radius: 200px; height: 15vh; max-width: 150px; margin: 0 auto; " class="img-thumbnail" alt="Profile Picture">
                            <div class="mt-2">
                                <span class="badge bg-success">Online</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-between align-items-center">
                                    <?= $pfp['first_name'] ?> <?= $pfp['last_name'] . " (" . $pfp['nickname'] . ")" ?>
                                    <button class="btn btn-sm btn-outline-primary"
                                        title="Edit Your Profile"
                                        data-bs-toggle="modal"
                                        data-bs-target="#payment1<?= ($_SESSION['customer']['user_id']) ?>">
                                        <i class="fas fa-edit"></i> Edit Profile
                                    </button>

                                </h5>

                                <p class="card-text d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="fas fa-map-marker-alt"></i> <?= $pfp['address'] ?> <?= $pfp['city'] ?> <?= $pfp['state'] ?> <?= $pfp['zip_code'] ?>
                                    </small>
                                    <button class="btn btn-sm btn-outline-primary"
                                        title="Add New Vehicle"
                                        data-bs-toggle="modal"
                                        data-bs-target="#payment5<?= ($_SESSION['customer']['user_id']) ?>">
                                        <i class="fas fa-edit"></i> Add Vehicle
                                    </button>
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
                                            $pending = array_filter($allbkr, fn($allbkr) => $allbkr['status'] === 'Confirmed');
                                            ?>
                                            <strong><?= count($pending) ?></strong>
                                        </div>
                                        <div class="col border-start">
                                            <h6>Completed</h6>
                                            <?php
                                            $pending1 = array_filter($allbkr, fn($allbkr) => $allbkr['status'] === 'Completed');
                                            ?>
                                            <strong><?= count($pending1) ?></strong>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card-footer bg-white">
                                <h2 class="mb-4">All Bookings</h2>
                                <div class="table-responsive" style=" height: 20vh;  transition: ease-in-out 0.1s;">
                                    <table class="table table-bordered table-hover table-striped align-middle">
                                        <thead class="table-dark">
                                            <tr align="center">
                                                <th>#</th>
                                                <th>Username</th>
                                                <th>Vehicle</th>
                                                <th>Booking Date</th>
                                                <th>Booking Time</th>
                                                <th>Rutern Date</th>
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
                                                <tr align="center">
                                                    <td><?= $n ?></td>
                                                    <td><?= htmlspecialchars($bk['first_name'] . " " .  $bk['last_name']) ?></td>
                                                    <td><?= htmlspecialchars($bk['make'] . " " . $bk['model'] . " (" . $bk['vehicle_id'] . ")") ?></td>
                                                    <td><?= htmlspecialchars($bk['booking_date']) ?></td>
                                                    <td><?= htmlspecialchars($bk['booking_time']) ?></td>
                                                    <td><?= htmlspecialchars($bk['return_date']) ?></td>
                                                    <td><?= htmlspecialchars($bk['splash_theme']) ?></td>
                                                    <?php
                                                    $statusClass = match ($bk['status']) {
                                                        'Confirmed' => 'text-bg-primary',
                                                        'Completed' => 'text-bg-success',
                                                        'Cancelled' => 'text-bg-danger',
                                                        default => 'text-bg-secondary' // fallback for unexpected status
                                                    };
                                                    ?>

                                                    <td class="badge <?= $statusClass ?> my-3 mx-2">
                                                        <?= htmlspecialchars($bk['status']) ?>
                                                    </td>

                                                    <?php if ($bk['status'] === 'Completed'): ?>
                                                        <td >
                                                            <button class="btn btn-primary btn-sm"
                                                                title="View"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#payment<?= htmlspecialchars($bk['booking_id']) ?>">
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
                                                    <?php elseif ($bk['status'] === 'Confirmed'): ?>
                                                        <td >
                                                            <button class="btn btn-primary btn-sm"
                                                                title="Cancel Booking"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#payment2<?= htmlspecialchars($bk['booking_id']) ?>">
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
                                                    <?php else: ?>
                                                        <td >
                                                            <a class="btn btn-warning btn-sm"
                                                                href="../page/profilepage.php?function=deleteconcelbk&delete_id=<?= ($bk['booking_id']) ?>"
                                                                title="DELETE">
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
                                                            </a>
                                                        </td>
                                                    <?php endif; ?>


                                                </tr>
                                            <?php } ?>
                                            <?php
                                            $n = 0;
                                            $pymt = $Homemodal->payment($_SESSION['customer']['user_id']);
                                            foreach ($pymt as $bk) {
                                                $n++;
                                            ?>
                                                <!-- Payment Modal -->
                                                <div class="modal fade" id="payment<?= ($bk['booking_id']) ?>" tabindex="-1" aria-labelledby="modallabel<?= ($bk['booking_id']) ?>" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="modallabel<?= ($bk['booking_id']) ?>">Payment Data</h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-body">

                                                                <div class="mb-3">
                                                                    <h6 class="fw-bold text-secondary">Name:</h6>
                                                                    <p class="text-dark"><?= htmlspecialchars($bk['first_name'] . " " .  $bk['last_name']) ?></p>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <h6 class="fw-bold text-secondary">Amount:</h6>
                                                                    <p class="text-dark">₱<?= number_format($bk['amount'], 2) ?></p>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <h6 class="fw-bold text-secondary">Payment Method:</h6>
                                                                    <p class="text-dark"><?= ($bk['payment_method']) ?></p>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <h6 class="fw-bold text-secondary">Payment Date:</h6>
                                                                    <p class="text-dark"><?= ($bk['payment_date']) ?></p>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <h6 class="fw-bold text-secondary">Status:</h6>
                                                                    <p class="text-dark"><?= ucfirst($bk['status']) ?></p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php
                                            $n = 0;
                                            foreach ($allbkr as $bk) {
                                                $n++;
                                            ?>
                                                <!-- Payment Modal -->
                                                <div class="modal fade" id="payment2<?= ($bk['booking_id']) ?>" tabindex="-1" aria-labelledby="modallabel<?= ($bk['booking_id']) ?>" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="modallabel<?= ($bk['booking_id']) ?>">Cancel Booking #<?= ($bk['booking_id']) ?></h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-body">

                                                                <div class="mb-3">
                                                                    <h6 class="fw-bold text-secondary">Name:</h6>
                                                                    <p class="text-dark"><?= htmlspecialchars($bk['first_name'] . " " .  $bk['last_name']) ?></p>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <h6 class="fw-bold text-secondary">Vehicle:</h6>
                                                                    <p class="text-dark"><?= htmlspecialchars($bk['make'] . " " . $bk['model'] . " (" . $bk['vehicle_id'] . ")") ?></p>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <h6 class="fw-bold text-secondary">Amount:</h6>
                                                                    <p class="text-dark">₱<?= number_format($bk['price'], 2) ?></p>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <h6 class="fw-bold text-secondary">Booking Date:</h6>
                                                                    <p class="text-dark"><?= htmlspecialchars($bk['booking_date']) ?></p>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <h6 class="fw-bold text-secondary">Booking Time:</h6>
                                                                    <p class="text-dark"><?= htmlspecialchars($bk['booking_time']) ?></p>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <h6 class="fw-bold text-secondary">Washing Point</h6>
                                                                    <p class="text-dark"><?= htmlspecialchars($bk['splash_theme']) ?></p>
                                                                </div>
                                                                <form action="../page/profilepage.php?function=concel" method="POST" enctype="multipart/form-data">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Status:</label>
                                                                        <select class="form-select" name="status">
                                                                            <option value="<?= ucfirst($bk['status']) ?>"><?= ucfirst($bk['status']) ?></option>
                                                                            <option value="Cancelled">Cancel</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4 mb-3">
                                                                        <input type="hidden" class="form-control" id="state" name="id" value="<?= ($bk['booking_id']) ?> ">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary w-100 glow-on-hover">Change</button>
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
                        <div class="modal fade" id="payment5<?= ($_SESSION['customer']['user_id']) ?>" tabindex="-1" aria-labelledby="modallabel<?= ($bk['booking_id']) ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h4 class="modal-title" id="modallabel<?= ($bk['booking_id']) ?>">Add Vehicle</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="../page/profilepage.php?function=addvh" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label for="Make" class="form-label">Vehicle Make</label>
                                                <input type="text" class="form-control" id="Make" name="Make"  required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="Make" class="form-label">Vehicle Model</label>
                                                <input type="text" class="form-control" id="Make" name="Model"  required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="Make" class="form-label">Vehicle Year</label>
                                                <input type="text" class="form-control" id="Make" name="year"  required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="Make" class="form-label">Vehicle license Plate</label>
                                                <input type="text" class="form-control" id="Make" name="licenseplate" required>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <input type="hidden" class="form-control" id="state" name="id" value="<?= ($_SESSION['customer']['user_id']) ?>">
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100 glow-on-hover">Change</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="payment1<?= ($_SESSION['customer']['user_id']) ?>" tabindex="-1" aria-labelledby="modallabel<?= ($_SESSION['customer']['user_id']) ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h4 class="modal-title" id="modallabel"><?= ($_SESSION['customer']['username']) ?> Personal info</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="../page/profilepage.php?function=profile" method="POST" enctype="multipart/form-data" class="p-4 rounded shadow-lg bg-light">

                                            <img src='<?= $pfp['profile_pic'] ?>' alt='Card Image' class='img-fluid rounded mb-3'>
                                            <div class="mb-3">
                                                <label for="profile_pic" class="form-label">Profile Picture 🖼️</label>
                                                <input type="file" class="form-control" id="profile_pic" name="profile_pic">

                                                <input type="hidden" class="form-control" id="id" name="id" value="<?= ($_SESSION['customer']['user_id']) ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username 🧑‍💻</label>
                                                <input type="text" class="form-control" id="username" name="username" value="<?= $pfp['username'] ?>" required>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="first_name" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $pfp['first_name'] ?> " required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="last_name" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $pfp['last_name'] ?>" required>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="nickname" class="form-label">Nickname 🎭</label>
                                                <input type="text" class="form-control" id="nickname" value="<?= $pfp['nickname'] ?>" name="nickname">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Gender ⚧️</label>
                                                <select class="form-select" name="gender">
                                                    <option value="<?= $pfp['gender'] ?>"><?= $pfp['gender'] ?></option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone 📱</label>
                                                <input type="text" class="form-control" id="phone" name="phone" value="<?= $pfp['phone'] ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email 📧</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?= $pfp['email'] ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Preferred Contact Method</label>
                                                <select class="form-select" name="preferred_contact">
                                                    <option value="<?= $pfp['preferred_contact'] ?>"><?= $pfp['preferred_contact'] ?></option>
                                                    <option value="Phone">Phone</option>
                                                    <option value="Email">Email</option>
                                                    <option value="SMS">SMS</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address 🏠</label>
                                                <textarea class="form-control" id="address" name="address" rows="2"><?= $pfp['address'] ?></textarea>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="city" class="form-label">City</label>
                                                    <input type="text" class="form-control" id="city" name="city" value="<?= $pfp['city'] ?> ">
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="state" class="form-label">State</label>
                                                    <input type="text" class="form-control" id="state" name="state" value="<?= $pfp['state'] ?> ">
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="zip_code" class="form-label">Zip Code</label>
                                                    <input type="text" class="form-control" id="zip_code" name="zip_code" value="<?= $pfp['zip_code'] ?>">
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary w-100 glow-on-hover">Change</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                <?php endforeach;
                } ?>
            </div>
        </div>
    </div>

    <?php include "../nav/footer.php"; ?>