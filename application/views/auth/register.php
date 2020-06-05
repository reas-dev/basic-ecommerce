<!doctype html>
<html lang="en">
<head>

    <?php $this->load->view("_partials/head.php") ?>

</head>
<body>
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center align-items-center min-vh-100">

    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-8 p-5">
                        <div class="text-center">
                            <h1 class="h3 text-gray-900 mb-4">Registration</h1>
                        </div>
                        <?php echo form_open("auth/registerForm"); ?>
                            <?php
                            $errors = $this->session->flashdata('errors');
                            if(!empty($errors)){
                            ?>
								<div class="row">
									<div class="col-md-12">
										<div class="alert alert-danger text-center">
												<?php foreach($errors as $key=>$error){ ?>
												<?php echo "$error<br>"; ?>
												<?php } ?>
										</div>
									</div>
								</div>
                            <?php
                            }
                            if($msg = $this->session->flashdata('error_login')){ ?>
								<div class="row">
										<div class="col-md-12">
												<div class="alert alert-danger text-center">
													<?= $msg ?>
												</div>
										</div>
								</div>
                            <?php } ?>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label">Full Name</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" id="name" value="<?php echo set_value('name'); ?>" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-4 col-form-label">Username</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" name="username" id="username" value="<?php echo set_value('username'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" id="email" value="<?php echo set_value('email'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                <input type="password" class="form-control" name="password" id="password" value="<?php echo set_value('password'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="confirm_password" class="col-sm-4 col-form-label">Confirm Password</label>
                                <div class="col-sm-8">
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="<?php echo set_value('confirm_password'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="key_access" class="col-sm-4 col-form-label">Key Access</label>
                                <div class="col-sm-8">
                                <input type="password" class="form-control" name="key_access" id="key_access" value="<?php echo set_value('key_access'); ?>" required>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                            <a href="<?= base_url('/auth') ?>" class="float-left mt-1">Login</a>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




    <?php $this->load->view("_partials/js.php") ?>

</body>
</html>
