<?php include "../nav/admin-header.php" ?>
<main>
    <div
        aria-label="breadcrumb" class="bg-light p-1 m-3 shadow">
        <ol class="breadcrumb s1">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"></li>
        </ol>
    </div>
    <div class="four-grids">

        <a href="admin_usertable.php" class="text-decoration-none">
            <div class="col-md-3 four-grid">
                <div class="four-agileits">
                    <div class="icon">
                        <i class="bi bi-card-list" aria-hidden="true"></i>
                    </div>
                    <div class="four-text">
                        <h3>User</h3>
                        <?php $users = count($usertable); {
                        ?>
                            <h4><?= $users ?></h4>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </a>
        <a href="Confirmedbk.php" class="text-decoration-none">
            <div class="col-md-3 four-grid">
                <div class="four-w3ls">
                    <div class="icon">
                        <i class="bi bi-folder2-open" aria-hidden="true"></i>
                    </div>
                    <div class="four-text">
                        <h3>New Bookings</h3>
                        <?php
                        $pending = array_filter($allbkr, fn($bk) => $bk['status'] === 'Confirmed');
                        ?>
                        <h4><?= count($pending); ?></h4>
                    </div>
                </div>
            </div>
        </a>
        <a href="completeduserbk.php" class="text-decoration-none">
            <div class="col-md-3 four-grid">
                <div class="four-wthree">
                    <div class="icon">
                        <i class="bi bi-card-list" aria-hidden="true"></i>
                    </div>
                    <div class="four-text">
                        <h3>Completed Bookings</h3>
                        <?php
                        $pending = array_filter($allbkr, fn($bk) => $bk['status'] === 'Completed');
                        ?>
                        <h4><?= count($pending); ?></h4>
                    </div>
                </div>
            </div>
        </a>
        <a href="manage-enquires.php" class="text-decoration-none">
            <div class="col-md-3 four-grid">
                <div class="four-w3ls">
                    <div class="icon">
                        <i class="bi bi-folder2-open" aria-hidden="true"></i>
                    </div>
                    <div class="four-text">
                        <h3>Enquiries</h3>
                        <h4>8</h4>

                    </div>
                </div>
            </div>
        </a>

        <div class="clearfix"></div>
    </div>
    <?php include "../nav/admin-footer.php" ?>