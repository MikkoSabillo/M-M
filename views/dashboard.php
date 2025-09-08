<?php include "../nav/admin-header.php"?>
    <main>
        <div style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb" class="bg-light p-1 m-3 shadow">
            <ol class="breadcrumb s1">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </div>
        <div class="four-grids">

            <a href="all-bookings.php" class="text-decoration-none">
                <div class="col-md-3 four-grid">
                    <div class="four-agileits">
                        <div class="icon">
                            <i class="bi bi-card-list" aria-hidden="true"></i>
                        </div>
                        <div class="four-text">
                            <h3>Total Bookings</h3>
                            <h4> 14 </h4>
                        </div>

                    </div>
                </div>
            </a>
            <a href="new-booking.php" class="text-decoration-none">
                <div class="col-md-3 four-grid">
                    <div class="four-agileinfo">
                        <div class="icon">
                            <i class="bi bi-card-list" aria-hidden="true"></i>
                        </div>
                        <div class="four-text">
                            <h3>New Bookings</h3>
                            <h4>7</h4>
                        </div>
                    </div>
                </div>
            </a>
            <a href="completed-booking.php" class="text-decoration-none" >
                <div class="col-md-3 four-grid">
                    <div class="four-wthree">
                        <div class="icon">
                            <i class="bi bi-card-list" aria-hidden="true"></i>
                        </div>
                        <div class="four-text">
                            <h3>Completed Bookings</h3>
                            <h4>7</h4>
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
<?php include "../nav/admin-footer.php"?>