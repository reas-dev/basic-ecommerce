<!DOCTYPE html>
<html lang="en">

<head>

  <?php $this->load->view("_partials/head.php") ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


    <?php $this->load->view("_partials/admin/sidebar.php") ?>




    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">





        <!-- Begin Page Content -->
        <div class="container-fluid pt-3">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Detail Camera</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Detail Camera <?= $kamera->merk_cam ?> <?= $kamera->kode_cam ?></h6>
            </div>
            <div class="card-body">
              <img src="<?php echo base_url("/upload/kamera/".$kamera->img_cam); ?>" width="250px" alt="ea" class="pb-3">
              <div class="row mb-1">
                  <div class="col-md-2">Merk</div>
                  <div class="col-md"><?= $kamera->merk_cam ?></div>
              </div>
              <div class="row mb-1">
                  <div class="col-md-2">Kode</div>
                  <div class="col-md"><?= $kamera->kode_cam ?></div>
              </div>
              <div class="row mb-1">
                  <div class="col-md-2">Tipe</div>
                  <div class="col-md"><?= $kamera->tipe_cam ?></div>
              </div>
              <div class="row mb-1">
                  <div class="col-md-2">Stock</div>
                  <div class="col-md"><?= $kamera->stock ?></div>
              </div>
              <div class="row mb-1">
                  <div class="col-md-2">Harga</div>
                  <div class="col-md"><?= number_format_short($kamera->harga) ?></div>
              </div>
              <div class="h5 mt-5 mb-3 text-dark">deskripsi</div>
              <div class=""><?= $kamera->deskripsi ?></div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->














    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


  <?php $this->load->view("_partials/footer.php") ?>



  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>






  <?php $this->load->view("_partials/js.php") ?>

    <script>
        $('#img_cam').on('change',function(){
            //get the file name
            var fileName = $(this).val().replace('C:\\fakepath\\', " ");
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>


</body>

</html>
