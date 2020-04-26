<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once("template/header_start.php");
include_once("template/header_end.php");
?>
<div class="login-bg"></div>
<div class="container account-sign">
    <div class="card">
        <div class="card-block">
            <h3 class="text-center m-0">
                <a href="#" class="logo logo-admin"><img src="<?= base_url('assets/images/hospital-icon.jpg') ?>" height="30" alt="logo"></a>
            </h3>
            <div class="p-3">
                <h3 class="text-muted text-center">Selamat datang di sistem manajemen pasien</h3>
                <form class="form-horizontal m-t-30" method="post" action="<?= base_url('user/setup') ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="namadokter">Nama Dokter</label>
                                <input type="text" class="form-control" id="namadokter" name="nama_dokter" placeholder="Masukkan nama dokter" value="<?= set_value('nama_dokter') ?>" autofocus required>
                                <?= form_error('nama_dokter', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Alamat Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email" value="<?= set_value('email') ?>" required>
                                <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">No Handphone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="082221231232" value="<?= set_value('phone') ?>" required>
                                <?= form_error('phone', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" value="<?= set_value('username') ?>" required>
                                <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                                <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="confirmpassword">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Masukkan kembali password" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row m-t-20">
                        <div class="col-sm-12 text-right">
                            <button class="btn btn-primary" type="submit">Simpan</button>
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