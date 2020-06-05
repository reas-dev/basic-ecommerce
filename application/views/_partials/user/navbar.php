<!-- Navbar -->
<div class="fixed-top">
                <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
                    <div class="container">
                        <a class="navbar-brand" href="<?php echo base_url('/')?>">
                            <img src="<?php echo base_url('/assets/img/favicon/favicon.png')?>" height="35" class="d-inline-block align-top" alt="" loading="lazy">
                            CAM|ERA
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item my-1">
                                    <!-- Topbar Search -->
                                    <!-- <form action="" method="post"> -->
                                            <div class="input-group">
                                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger border" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                    </button>
                                                </div>
                                            </div>
                                    <!-- </form> -->
                                </li>
                                <div class="row">
                                    <li class="nav-item ml-5 my-1">
                                        <a href="<?php echo base_url('/')?>" class="nav-link"><i class="fas fa-user fa-sm"></i></a>
                                    </li>
                                    <li class="nav-item ml-4 my-1">
                                        <a href="<?php echo base_url('/')?>" class="btn btn-outline-warning"><i class="fas fa-shopping-basket fa-sm"></i></a>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="bg-dark shadow">
                    <div class="container">
                        <div class="row">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?php echo base_url('/')?>">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-light" href="#" id="navCategory" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Category
                                    </a>
                                    <div class="dropdown-menu bg-dark" aria-labelledby="navCategory">
                                    <a class="dropdown-item text-white" href="<?php echo base_url('/category/mirrorless')?>">Mirrorless</a>
                                    <a class="dropdown-item text-white" href="<?php echo base_url('/category/dslr')?>">DSLR</a>
                                    <a class="dropdown-item text-white" href="<?php echo base_url('/category/action_cam')?>">Action Cam</a>
                                    <a class="dropdown-item text-white" href="<?php echo base_url('/category/pocket_cam')?>">Pocket Cam</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-light" href="#" id="navBrand" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Brand
                                    </a>
                                    <div class="dropdown-menu bg-dark" aria-labelledby="navBrand">
                                    <a class="dropdown-item text-white" href="<?php echo base_url('/brand/sony')?>">SONY</a>
                                    <a class="dropdown-item text-white" href="<?php echo base_url('/brand/canon')?>">CANON</a>
                                    <a class="dropdown-item text-white" href="<?php echo base_url('/brand/nikon')?>">NIKON</a>
                                    <a class="dropdown-item text-white" href="<?php echo base_url('/brand/gopro')?>">GoPro</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Topbar -->