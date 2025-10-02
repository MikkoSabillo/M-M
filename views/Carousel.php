<?php include "../nav/admin-header.php" ?>
<main>
    <div
        aria-label="breadcrumb" class="bg-light p-1 m-3 shadow">
        <ol class="breadcrumb s1">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Carousel Featured</li>
        </ol>
    </div>
    <div class="container">
        <div class="row table-responsive">
            <div class="col-md-7 my-4">
                <div class="card-footer bg-white">
                    <h2 class="mb-4">Carousel Featured </h2>
                    <div class="table-responsive ">
                        <table id="myTable" class="table table-bordered table-hover table-striped align-middle">
                            <thead class="table-dark">
                                <tr align="center">
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $n = 0;
                                $carousel = $adminusertable->Homecarousel();

                                foreach ($carousel as $data) {
                                    $n++;

                                    $card_id = htmlspecialchars($data['id']);
                                    $card_title = htmlspecialchars($data['carousel_title']);
                                    $card_prg = htmlspecialchars($data['carousel_desc']);
                                    $card_img = htmlspecialchars($data['carousel_img']);
                                    $time = htmlspecialchars($data['carousel_time']);
                                ?>
                                    <tr>
                                        <td><?= $n ?></td>
                                        <td style="
                                background-image: url(<?= $card_img ?>);
                                background-size: cover;
                                background-position: center;
                                background-repeat: no-repeat;
                            ">
                                            <b style="text-shadow: -1px -1px 0 white,
                                                1px -1px 0 white,
                                                -1px  1px 0 white, 
                                                1px  1px 0 white;">
                                                <?= $card_title ?>
                                            </b>
                                        </td>
                                        <td id="msg" style="text-align: justify;"><?= $card_prg ?></td>
                                        <td style="text-align: justify;"><?=  $time ?></td>
                                        <td align="center"><button class="btn btn-primary btn-sm"
                                                title="UPDATE"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modal2<?= $card_id ?>">
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
                                    <div class='modal fade' id='modal2<?= $card_id ?>' tabindex='-1' role='dialog' aria-labelledby='modalLabel<?= $card_id ?>' aria-hidden='true'>
                                        <div class='modal-dialog modal-dialog-centered-top'>
                                            <div class='modal-content rounded-4 py-4 px-4'>
                                                <form action='../page/admin.php?function=updateCarousel' method='post'>
                                                    <div class='modal-header p-4 border-bottom-0'>
                                                        <h1 class='fw-bold fs-4 mb-0' id='modalLabel<?= $card_id ?>'>Update Carousel Featured</h1>
                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                    </div>
                                                    <div class='modal-body p-4 border border-dark'>
                                                        <img src='<?= $card_img ?>' alt='Card Image' class='img-fluid rounded mb-3'>
                                                        <div class='mb-2'><b>image link:</b></div>
                                                        <input class='form-control mb-3' type='text' name='img' value='<?=$card_img?>'>
                                                        
                                                        <div class='mb-2'><b>Title:</b></div>
                                                        <input class='form-control mb-3' type='text' name='title' value='<?= $card_title?>' required>
                                                        <div class='mb-2'><b>Description:</b></div>
                                                        <textarea class='form-control auto-resize' name='desc' oninput='autoResizeTextarea(this)' required><?=$card_prg?></textarea>
                                                        <div class='mb-2'><b>Time:</b></div>
                                                        <input class='form-control mb-3' type='datetime-local' value="<?= date('Y-m-d H:i:s A') ?>" name='time' value='<?=  $time ?>' required>
                                                        <input type='hidden' value='<?= $card_id ?>' name='useid' />
                                                    </div>
                                                    <div class='modal-footer justify-content-end'>
                                                        <a class='btn btn-warning btn-sm'
                                                            href='../page/admin_home.php?function=deletehomecarouse&delete_id2=<?= $card_id ?>'
                                                            title='DELETE'>
                                                            Dellete
                                                        </a>
                                                        <button type='submit' class='btn btn-primary btn-sm' >Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "../nav/admin-footer.php" ?>