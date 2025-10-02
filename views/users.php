<?php include "../nav/admin-header.php" ?>
<main>
    <div style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb" class="bg-light p-1 m-3 shadow">
        <ol class="breadcrumb s1">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Customers Table</li>
        </ol>
    </div>
    <div class="container">
        <h2 class="mb-4">Customers Table</h2>
        <div class="table-responsive">
            <table id="myTable" class="table table-bordered table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr  align="center">
                        <th>ID</th>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Nickname</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Preferred Contact</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>VIEW</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $n = 0;
                    foreach ($usertable as $users) {
                        $n++
                    ?>
                        <tr  align="center">
                            <td><?= $n ?></td>
                            <td style="
                                background-image: url(<?= $users['profile_pic'] ?>);
                                background-size: cover;
                                background-position: center;
                                background-repeat: no-repeat;
                            ">
                                <b style="text-shadow: -1px -1px 0 white,
                                                1px -1px 0 white,
                                                -1px  1px 0 white, 
                                                1px  1px 0 white;">
                                    <?= $users['username'] ?>
                                </b>
                            </td>
                            <td><?= $users['first_name'] ?> <?= $users['last_name'] ?></td>
                            <td><?= $users['nickname'] ?></td>
                            <td><?= $users['gender'] ?></td>
                            <td><?= $users['phone'] ?></td>
                            <td><?= $users['email'] ?></td>
                            <td><?= $users['preferred_contact'] ?></td>
                            <td><?= $users['address'] ?> <?= $users['city'] ?> <?= $users['state'] ?> <?= $users['zip_code'] ?></td>
                            <td><?= $users['role'] ?></td>
                            <td align="center">
                                <button class="btn btn-primary btn-sm"
                                    title="VIEW <?= $users['first_name'] ?> <?= $users['last_name'] ?> Personal Info"
                                    data-bs-toggle="modal"
                                    data-bs-target="#payment<?= htmlspecialchars($users['user_id']) ?>">
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

                        <?php foreach ($allbk as $users) {
                            $userConfirmed = array_filter($allbk, fn($bk) => $bk['user_id']  && $bk['user_id'] === $users['user_id']);
                            $userConfirmed1 = array_filter($allbk, fn($bk1) => $bk1['status'] === 'Confirmed' && $bk1['user_id'] === $users['user_id']);
                            $userConfirmed2 = array_filter($allbk, fn($bk2) => $bk2['status'] === 'Completed' && $bk2['user_id'] === $users['user_id']);
                        ?>
                            <div class="modal fade p-5" id="payment<?= htmlspecialchars($users['user_id']) ?>" tabindex="-1" aria-labelledby="modallabel<?= ($users['booking_id']) ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h4 class="modal-title" id="modallabel<?= ($users['booking_id']) ?>">Personal Info of <?= $users['first_name'] ?> <?= $users['last_name'] ?></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <section class="container py-3">
                                                <header class="bg-light rounded shadow p-4">
                                                    <div class="row align-items-center">

                                                        <div class="col-md-3 text-center">
                                                            <img src="<?= htmlspecialchars($users['profile_pic']) ?>" alt="<?= htmlspecialchars($users['first_name'] . ' ' . $users['last_name']) ?>" class="img-fluid rounded-circle border border-3 border-primary profile-pic">

                                                            <?php if (isset($_SESSION['customer']) && $_SESSION['customer']['user_id'] === $users['user_id']): ?>
                                                                <span class="badge bg-success">Online</span>
                                                            <?php else: ?>
                                                                <span class="badge bg-danger">Offline</span>
                                                            <?php endif; ?>
                                                        </div>


                                                        <div class="col-md-9">
                                                            <h3 class="display-6 fw-bold"><?= $users['first_name'] ?> <?= $users['last_name'] ?></h3>
                                                            <div class="d-flex align-items-center text-muted mb-3">
                                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="me-2">
                                                                    <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12 ,2Z"></path>
                                                                </svg>
                                                                <span><?= $users['address'] ?> <?= $users['city'] ?> <?= $users['state'] ?> <?= $users['zip_code'] ?></span>
                                                            </div>
                                                            <div class="row text-center">
                                                                <div class="col-4">
                                                                    <h4 class="fw-bold mb-0"><?= count($userConfirmed); ?></h4>
                                                                    <small class="text-muted">All Bookings</small>
                                                                </div>
                                                                <div class="col-4">
                                                                    <h4 class="fw-bold mb-0"><?= count($userConfirmed1); ?></h4>
                                                                    <small class="text-muted">Confirmed Bookings</small>
                                                                </div>
                                                                <div class="col-4">
                                                                    <h4 class="fw-bold mb-0"><?= count($userConfirmed2); ?></h4>
                                                                    <small class="text-muted">Completed Bookings</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </header>
                                            </section>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- Add more rows as needed -->
                    <?php  }  ?>
                </tbody>
            </table>
        </div>
    </div>


    <?php include "../nav/admin-footer.php" ?>