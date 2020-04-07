<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>

    <!-- Icon -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/'); ?>favicon.ico" type="image/x-icon">
    <!-- CSS file -->
    <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>all.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>style.css" type="text/css">

    <!-- JS file -->
    <script defer src="<?= base_url('assets/js/') ?>all.min.js"></script>
</head>

<body>
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>
    <div class="login-bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign in</h5>
                        <p class="text-danger text-center"><?= $this->session->flashdata('pesan');
                                                            ?></p>
                        <form action="<?= base_url('auth/login') ?>" method="POST" class="from-signin">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" class="form-control" type="text" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" class="form-control" type="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group row m-t-20">
                                <div class="col-sm-6">
                                    <div class="custom-control custom-checkbox">
                                        <input id="remember-me" class="custom-control-input" type="checkbox" name="remember" value="true">
                                        <label for="remember-me" class="custom-control-label">Ingat Saya</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button class="btn btn-primary" type="submit">Sign In</button>
                                </div>
                            </div>
                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20">
                                    <a href="#" class="text-muted"><i class="far fa-key"></i> Lupa password?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/'); ?>app.js"></script>
</body>

</html>