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
                        <div class="row row-cols-1 row-cols-md-3">
                            <?php
                                if( ! empty($kamera)){ // Jika data kamera tidak sama dengan kosong, artinya jika data kamera ada
                                foreach($kamera as $data){
                            ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 float-left mb-3">
                                <div class="card a h-100">
                                    <img src="<?php echo base_url("/upload/kamera/".$data->img_cam); ?>" class="card-img-top" alt="ea">
                                    <div class="card-body">
                                        <a href="<?php echo base_url("/belanja/detail/".$data->kode_cam)?>" class="stretched-link text-decoration-none text-secondary">
                                            <h5 class="card-title"><?= $data->merk_cam ?> <?= $data->kode_cam ?></h5>
                                            <div class="d-flex justify-content-between">
                                                <p class="card-text"><?= number_format_short($data->harga) ?></p>
                                                <p class="card-text">Stock: <?= $data->stock ?></p>
                                            </div>
                                            <div class="float-right"> Lihat detail <i class="fas fa-angle-double-right"></i></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <!-- <div class="col mb-4">
                                <div class="card h-100">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                            </div> -->
                            <?php
                                }
                                }
                            ?>
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

<script>
    $( ".card.a" ).hover(
    function() {
        $(this).addClass('shadow-sm').css('cursor', 'pointer'); 
    }, function() {
        $(this).removeClass('shadow-sm');
    }
    );
</script>


<script>
    <?php if($this->session->flashdata('success')){ ?>
        Swal.fire({
            icon: 'success',
            title: '<?php echo $this->session->flashdata('success'); ?>',
            html: 'Silahkan melakukan pembayaran melalui no rek kami<br>(ACB - 200013122) <br><br> Konfirmasi melalui nomor kami<br>(081312345678)',
        })
    <?php } ?>
</script>

</body>

</html>
