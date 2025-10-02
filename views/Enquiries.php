<?php include "../nav/admin-header.php" ?>
<main>
    <div
        aria-label="breadcrumb" class="bg-light p-1 m-3 shadow">
        <ol class="breadcrumb s1">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Enquiries</li>
        </ol>
    </div>
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-footer bg-white">
                    <h2 class="mb-4">Enquiries</h2>
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-hover table-striped align-middle">
                            <thead class="table-dark">
                                <tr align="center">
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $usertable1 = $adminusertable->message();
                                $n = 0;
                                foreach ($usertable1 as $bk) {
                                    $n++;
                                ?>
                                    <tr align="center">
                                        <td><?= $n ?></td>
                                        <td><?= !empty($bk['Username']) ? $bk['Username'] : 'Anonymous'?></td>
                                        <td><?= htmlspecialchars($bk['Email']) ?></td>
                                        <td><?= htmlspecialchars($bk['Subject'])?></td>
                                        <td><?= htmlspecialchars($bk['Time']) ?></td>
                                        <td align="center"><button class="btn btn-primary btn-sm"
                                                title="VIEW"
                                                data-bs-toggle="modal"
                                                data-bs-target="#payment<?= ($bk['Message_id']) ?>">
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
                                    <div class="modal fade" id="payment<?= ($bk['Message_id']) ?>" tabindex="-1" aria-labelledby="modallabel<?= ($bk['Message_id']) ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4 class="modal-title">Message of <?= htmlspecialchars($bk['Username']) ?></h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <h1 class="badge text-bg-primary jk"><?= ($bk['Message']) ?></h1>
                                                    <h6><?= ($bk['Time']) ?></h6>
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