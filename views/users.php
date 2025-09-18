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
                    <tr>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $n = 0;
                     foreach ($usertable as $users)
                        {  
                    $n++
                     ?>
                    <tr>
                        <td><?= $n ?></td>
                        <td><?= $users['username'] ?></td>
                        <td><?= $users['first_name'] ?> <?= $users['last_name'] ?></td>
                        <td><?= $users['nickname'] ?></td>
                        <td><?= $users['gender'] ?></td>
                        <td><?= $users['phone'] ?></td>
                        <td><?= $users['email'] ?></td>
                        <td><?= $users['preferred_contact'] ?></td>
                        <td><?= $users['address'] ?> <?= $users['city'] ?> <?= $users['state'] ?> <?= $users['zip_code'] ?></td>
                        <td><?= $users['role'] ?></td>
                    </tr>
                    <!-- Add more rows as needed -->
                 <?php  }  ?>
                
           
                </tbody>
            </table>
        </div>
    </div>


    <?php include "../nav/admin-footer.php" ?>