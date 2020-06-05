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
          <h1 class="h3 mb-2 text-gray-800">Tambah Camera</h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Camera</h6>
            </div>
            <div class="card-body">
            <!-- Menampilkan Error jika validasi tidak valid -->
            <div style="color: red;"><?php echo validation_errors(); ?></div>
              <!-- form tambah -->
              <?php echo form_open_multipart("admin/kamera/tambah"); ?>
              <div class="col-sm-8">
                  <div class="form-group row">
                      <label for="kode_cam" class="col-sm-2 col-form-label">Kode Kamera</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control" name="kode_cam" id="kode_cam" value="<?php echo set_value('kode_cam'); ?>" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="merk_cam" class="col-sm-2 col-form-label">Merk Kamera</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control" name="merk_cam" id="merk_cam" value="<?php echo set_value('merk_cam'); ?>" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="tipe_cam" class="col-sm-2 col-form-label">Tipe Kamera</label>
                      <div class="col-sm-10">
                      <select class="form-control" name="tipe_cam" id="tipe_cam" value="<?php echo set_value('tipe_cam'); ?>" required>
                          <option>mirrorless</option>
                          <option>DSLR</option>
                          <option>Action Cam</option>
                          <option>Pocket Cam</option>
                      </select>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="img_cam" class="col-sm-2 col-form-label">Gambar Kamera</label>
                      <div class="col-sm-10">
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" name="img_cam" id="img_cam" required>
                          <label class="custom-file-label" for="img_cam">Choose file</label>
                      </div>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control" name="stock" id="stock" value="<?php echo set_value('stock'); ?>" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control" name="harga" id="harga" value="<?php echo set_value('harga'); ?>" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                      <div class="col-sm-10">
                      <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" value="<?php echo set_value('deskripsi'); ?>"></textarea>
                      </div>
                  </div>
              </div>
              <hr>
              <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
              <a href="<?php echo base_url('/admin/kamera'); ?>" class="btn btn-danger">Batal</a>
              <?php echo form_close(); ?>
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
