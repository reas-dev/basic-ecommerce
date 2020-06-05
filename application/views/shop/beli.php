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
                        <!-- hanya untuk sm -->
                        <div class="d-block d-sm-block d-md-none">  
                            <div class="card border-left-danger shadow-sm h-100 mb-4">
                                <div class="card-body p-3">
                                    <div class="row justify-content-center">
                                        <div class="col-4">
                                            <img src="<?php echo base_url("/upload/kamera/".$kamera->img_cam); ?>" class="img-fluid rounded" alt="ea">
                                        </div>
                                        <div class="col-6">
                                            <p class="h6"><?= $kamera->merk_cam." ".$kamera->kode_cam ?></p>
                                            <p class="h6"><?= $kamera->tipe_cam ?></p>
                                        </div>
                                        <div class="col-2 text-right">
                                            <i class="fas fa-times text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- selain sm -->
                        <div class="d-none d-sm-none d-md-block">  
                            <div class="row justify-content-center">
                                <div class="card border-left-danger shadow-sm col-sm-6 mb-5">
                                    <div class="card-body">
                                        <div class="row justify-content-center">
                                            <div class="col-4">
                                                <img src="<?php echo base_url("/upload/kamera/".$kamera->img_cam); ?>" class="img-fluid rounded" alt="ea">
                                            </div>
                                            <div class="col-6">
                                                <p class="h6"><?= $kamera->merk_cam." ".$kamera->kode_cam ?></p>
                                                <p class="h6"><?= $kamera->tipe_cam ?></p>
                                            </div>
                                            <div class="col-2 text-right">
                                                <i class="fas fa-times text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- form beli -->
                        <?php echo form_open("belanja/beli/".$kamera->kode_cam); ?>
                            <div class="row justify-content-center">
                                <div class="col-sm-10">
                                <!-- Menampilkan Error jika validasi tidak valid -->
                                <div style="color: red;"><?php echo validation_errors(); ?></div>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama" id="nama" value="<?php echo set_value('nama'); ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                        <textarea class="form-control" name="alamat" id="alamat" rows="5" ><?php echo set_value('alamat'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="<?php echo set_value('kecamatan'); ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kota" id="kota" value="<?php echo set_value('kota'); ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kode_pos" class="col-sm-2 col-form-label">Kode Pos</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kode_pos" id="kode_pos" value="<?php echo set_value('kode_pos'); ?>" required>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-sm-2 col-4 text-primary">Tersisa</div>
                                        <div class="col-sm-10 col text-primary"><?= $kamera->stock ?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jml_jual" class="col-sm-2 col-form-label">Jumlah</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="jml_jual" id="jml_jual" value="<?php echo set_value('jml_jual', 1); ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="total" class="col-sm-2 col-form-label">Total</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control-plaintext" name="total" id="total" value="" readonly>
                                        </div>
                                    </div>
                                    <input type="hidden" id="harga" name="harga" value="<?= $kamera->harga ?>">
                                    <input type="hidden" id="total_harga" name="total_harga" value="">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-sm-10">
                                    <div class="form-group row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10">
                                            <input type="submit" name="submit" value="Beli Sekarang" class="btn btn-primary">
                                            <a href="<?php echo base_url("/belanja/detail/".$kamera->kode_cam)?>" class="btn btn-danger">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
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
    var jml_jual = $("#jml_jual").val();
    var harga = $("#harga").val();
    var total = jml_jual * harga;
    var total_harga = jml_jual * harga;
    total = addPeriod(total);
    total = 'Rp '+total+',-';
    $('input[name=total]').val(total);
    $('input[name=total_harga]').val(total_harga);

    $('input[name=jml_jual]').on('change', function() {
        var jml_jual = $("#jml_jual").val();
        var harga = $("#harga").val();
        var total = jml_jual * harga;
        var total_harga = jml_jual * harga;
        total = addPeriod(total);
        total = 'Rp '+total+',-';
        $('input[name=total]').val(total);
        $('input[name=total_harga]').val(total_harga);
    });

    function addPeriod(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    }
</script>




<script>
    <?php if($this->session->flashdata('danger')){ ?>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?php echo $this->session->flashdata('danger'); ?>',
            showConfirmButton: false,
            timer: 1500
        })
    <?php } ?>
    <?php if($this->session->flashdata('alert')){ ?>
        Swal.fire({
            icon: 'info',
            title: 'Maaf',
            text: '<?php echo $this->session->flashdata('alert'); ?>',
            showConfirmButton: false,
            timer: 1500
        })
    <?php } ?>
</script>

</body>

</html>
