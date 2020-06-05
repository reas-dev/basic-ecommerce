<!doctype html>
<html lang="en">
<head>

    <?php $this->load->view("_partials/head.php") ?>

</head>
<body>
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center align-items-center min-vh-100">

    <div class="col-xl-7 col-lg-8 col-md-9 col-sm-12">

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-8 p-5">
                        <div class="text-center">
                            <h1 class="h3 text-gray-900 mb-4">Sign In</h1>
                        </div>
                        <?php echo form_open("auth/loginForm"); ?>
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
                            <?php } else if($msg = $this->session->flashdata('success_login')){ ?>
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="alert alert-success text-center">
                                        <?= $msg ?>
                                    </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="form-group row">
                                <label for="username" class="col-sm-4 col-form-label">Username</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" name="username" id="username" value="<?php echo set_value('username'); ?>" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                <input type="password" class="form-control" name="password" id="password" value="<?php echo set_value('password'); ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col checkbox mb-3">
                                    <input type="checkbox" value="remember_me" id="remember_me" name="remember_me">
                                    <label for="remember_me">Remember me</label>
                                </div>
                                <div class="col text-right">
                                    <a class="small" href="<?= base_url('/auth') ?>">Forgot Password?</a>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                            <a href="<?= base_url('/auth/register') ?>" class="float-left mt-1">Register</a>
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
