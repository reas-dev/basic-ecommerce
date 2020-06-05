<!DOCTYPE html>
<html lang="en">

<head>

  <?php $this->load->view("_partials/head.php") ?>
  <link href="<?php echo base_url('/assets/vendor/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


    <?php $this->load->view("_partials/admin/sidebar.php") ?>



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <!-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"> -->

          <!-- Sidebar Toggle (Topbar) -->
          <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button> -->

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </!-->

          <!-- Topbar Navbar -->
          <!-- <ul class="navbar-nav ml-auto"> -->

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <!-- <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a> -->
              <!-- Dropdown - Messages -->
              <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </!-->

          </ul>

        </nav>
        <!-- End of Topbar -->



        <!-- Begin Page Content -->
        <div class="container-fluid pt-3">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Penjualan</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Penjualan</h6>
            </div>
            <div class="card-body">
              <!-- <a href="<?php //echo base_url('/admin/kamera/tambah'); ?>" class="btn btn-primary mb-3">Tambah Data</a> -->
              <a target="_blank" href="<?php echo base_url('/admin/LaporanExcel/cetak_penjualan_selesai'); ?>" class="btn btn-success mb-3 ml-3 float-right"><i class="fa fa-file-excel"></i> Cetak Excel</a>
              <a target="_blank" href="<?php echo base_url('/admin/LaporanPDF/cetak_penjualan_selesai'); ?>" class="btn btn-danger mb-3 float-right"><i class="fa fa-file-pdf"></i> Cetak PDF</a>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No Nota</th>
                      <th>Kamera</th>
                      <th>Pelanggan</th>
                      <th>Jumlah</th>
                      <th>Total Harga</th>
                      <th>Tanggal Pesan</th>
                      <th style="width:1px; white-space:nowrap;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if( ! empty($jual)){ // Jika data kamera tidak sama dengan kosong, artinya jika data kamera ada
                        foreach($jual as $data){
                    ?>
                    <?php if($data->status_lunas == 0 && $data->status_kirim == 0) { ?>
                      <tr style="background-color: #ffcdd2 !important;">
                    <?php } else if($data->status_lunas == 1 && $data->status_kirim == 0) { ?>
                      <tr style="background-color: #fff9c4 !important;">
                    <?php } else if($data->status_lunas == 1 && $data->status_kirim == 1) { ?>
                      <tr style="background-color: #b9f6ca !important;">
                    <?php } else { ?>
                      <tr>
                    <?php } ?>
                      <td><?= $data->no_nota ?></td>
                      <td><a href="<?php echo base_url("admin/kamera/detail/".$data->kode_cam) ?>" class="text-secondary"><?= $data->merk_cam ?> <?= $data->kode_cam ?></a></td>
                      <td><a href="<?php echo base_url("admin/jual/detail/".$data->kode_pelanggan) ?>" class="text-secondary"><?= $data->kode_pelanggan ?></a></td>
                      <td><?= $data->jml_jual ?></td>
                      <td><?= number_format_short($data->total_harga) ?></td>
                      <td><?= $data->tgl_jual ?></td>
                      <td class="text-center">
                        <!-- <a href = "<?php //echo base_url("admin/kamera/ubah/".$data->kode_cam) ?>" class="badge badge-warning">Ubah</a> -->
                        <!-- <a href ="<?php //echo //base_url("admin/kamera/hapus/".$data->kode_cam) ?>" class="badge badge-danger">Hapus</a> -->
                        <?php if($data->status_lunas == 0 && $data->status_kirim == 0) { ?>
                          <a href = "<?php echo base_url("admin/jual/lunas/".$data->no_nota) ?>" class="btn btn-warning btn-sm"><i class="fas fa-donate fa-sm"></i></a>
                        <?php } else if($data->status_lunas == 1 && $data->status_kirim == 0) { ?>
                          <a href = "<?php echo base_url("admin/jual/kirim/".$data->no_nota) ?>" class="btn btn-success btn-sm"><i class="fas fa-box fa-sm"></i></a>
                        <?php } else if($data->status_lunas == 1 && $data->status_kirim == 1) { ?>

                        <?php } else { ?>

                        <?php } ?>
                      </td>
                    </tr>
                    <?php
                        }
                      }else{ // Jika data kamera kosong
                    ?>
                        <tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
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

  <!-- Page level plugins -->
  <script src="<?php echo base_url('/assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('/assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('/assets/js/demo/datatables-demo.js')?>"></script>

<script>
    <?php if($this->session->flashdata('info')){ ?>
        Swal.fire({
            icon: 'info',
            title: 'Info Pelanggan',
            html: '<?php echo $this->session->flashdata('info'); ?>',
        })
    <?php } ?>
</script>


</body>

</html>
