<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once("template/header_start.php");
include_once("template/header_end.php")
?>
<div class="login-bg"></div>
<div class="wrapper-page">
    <div class="card">
        <div class="card-block">
            <h3 class="text-center m-0">
                <a href="#" class="logo logo-admin"><img src="<?= base_url('assets/images/hospital-icon.jpg') ?>" height="50" alt="logo"></a>
            </h3>
            <div class="p-3">
                <p class="text-muted text-center">Silahkan login untuk melanjutkan.</p>
                <?= $this->session->flashdata('pesan'); ?>
                <form class="form-horizontal m-t-30" method="post" action="<?= base_url('auth') ?>">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" value="<?= set_value('username') ?>" autofocus>
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>

                    <div class="form-group">
                        <label for="userpassword">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>

                    <div class="form-group row m-t-20">
                        <div class="col-sm-6">
                            <div class="custom-control custom-checkbox">
                                <input id="remember-me" class="custom-control-input" type="checkbox" name="remember" value="true">
                                <label for="remember-me" class="custom-control-label">Ingat Saya</label>
                            </div>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group m-t-10 mb-0 row">
                        <div class="col-12 m-t-20">
                            <a href="<?= base_url('auth/lupapassword') ?>" class="text-muted"><i class="far fa-key"></i> Lupa password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include_once('template/footer_start.php');
include_once('template/footer_end.php')
?>