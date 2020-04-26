<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once("template/header_start.php");
include_once("template/header_end.php")
?>
<div class="login-bg"></div>
<div class="wrapper-page">
    <div class="card">
        <div class="card-block">
            <h3 class="text-center m-1">
                <img class="logo logo-admin" src="<?php echo base_url(); ?>assets/images/hospital-icon.jpg" height="30" alt="logo">
            </h3>
            <div class="p-3">
                <h4 class="text-muted text-center">Pulihkan Password</h4>
                <?= $this->session->flashdata('pesan'); ?>
                <form class="form-horizontal m-t-30" method="post" action="<?= base_url('auth/lupapassword') ?>">
                    <div class="form-group">
                        <label for="useremail">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email yang telah terdaftar" required="">
                    </div>

                    <div class="form-group row m-t-20">
                        <div class="col-sm-6">
                            <a class="text-muted" href="<?php echo base_url(); ?>">Ingat password?</a>
                        </div>

                        <div class="col-sm-6 text-right">
                            <button class="btn btn-primary w-md disabled" type="submit" id="reset">Reset</button>
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