<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view("_partials/head.php") ?>

</head>

<body id="page-top" class="bg-light">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content" class="min-vh-90">

            <?php $this->load->view("_partials/user/navbar.php") ?>


            <div class="py-2 my-5"></div>



            <!-- Begin Page Content -->
            <div class="container pt-3">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body mb-5 mt-3">
                <!-- <div class="mb-4">
                    <div class="mb-5 mt-3"> -->
                        <!-- Page Heading -->
                        <!-- <div class="d-block d-sm-block d-md-none">  
                            <img src="<?php //echo base_url("/upload/kamera/".$kamera->img_cam); ?>" class="img-fluid" alt="ea">
                        </div>
                        <div class="d-none d-sm-none d-md-block">  
                            <img src="<?php //echo base_url("/upload/kamera/".$kamera->img_cam); ?>" width="500px" alt="ea">
                        </div> -->
                        <div class="row justify-content-center">
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md mb-4">
                                        <img src="<?php echo base_url("/upload/kamera/".$kamera->img_cam); ?>" class="img-fluid rounded" alt="ea">
                                    </div>
                                    <div class="col-md mb-4">
                                        <div class="h3 mb-4 text-gray-800"><?= $kamera->merk_cam ?> <?= $kamera->kode_cam ?></div>
                                        <div class="row mb-3">
                                            <div class="col col-md-3">Merk</div>
                                            <div class="col"><?= $kamera->merk_cam ?></div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col col-md-3">Kode</div>
                                            <div class="col"><?= $kamera->kode_cam ?></div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col col-md-3">Tipe</div>
                                            <div class="col"><?= $kamera->tipe_cam ?></div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col col-md-3">Stock</div>
                                            <div class="col"><?= $kamera->stock ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-3">Harga</div>
                                            <div class="col"><b><?= number_format_short($kamera->harga) ?></b></div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url("/belanja/beli/".$kamera->kode_cam)?>" class="btn btn-primary mb-4 px-4">Buy</a>
                                <div class="h5 mb-1 text-gray-800">Deskripsi</div>
                                <p><?= $kamera->deskripsi ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container -->
        </div>
        <!-- End of Main Content -->


        <?php $this->load->view("_partials/footer.php") ?>



    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>






<?php $this->load->view("_partials/js.php") ?>

</body>

</html>
