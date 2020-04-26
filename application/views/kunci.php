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
                <h4 class="text-muted text-center">Layar terkunci</h4>
                <p class="text-muted text-center"><label class="status">Silahkan masukkan kata sandi untuk melanjutkan</label></p>
                <form class="form-horizontal m-t-30" method="post" action="<?= base_url('auth/login') ?>">
                    <div class="form-group">
                        <input type="hidden" name='username' value="<?= $username ?>">
                        <label for="pass">Kata sandi</label>
                        <input type="password" name="password" class="form-control" id="pass" placeholder="Masukkan Kata sandi" required="">
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 text-right">
                            <button class="btn btn-teal waves-effect waves-light disabled" type="submit" id="unlock">Buka kunci</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
$this->session->sess_destroy();
include_once('template/footer_start.php');
include_once('template/footer_end.php')
?>