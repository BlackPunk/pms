<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once("template/header_start.php");
include_once("template/header_end.php");
include_once("template/topbar.php");
?>
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12 mb-2">
            <h4 class="text-muted">Pengaturan Profil</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card mb-5 p-3">
                <div class="card-block">
                    <label>
                        <h5>Informasi profil</h5>
                    </label>
                    <?= $this->session->flashdata('profil'); ?>
                    <form method="post" action="<?= base_url('user/updateprofil') ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Dokter</label>
                                    <input type="text" class="form-control" name="nama" value="<?= $dokter['nama'] ?>" required="">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email dokter</label>
                                    <input type="email" class="form-control" name="email" value="<?= $dokter['email'] ?>" required="">
                                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>No Hp Dokter</label>
                                    <input type="text" class="form-control" name="nohp" value="<?= $dokter['no_hp'] ?>" required="">
                                    <?= form_error('nohp', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-teal waves-effect waves-light">Update informasi profil</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card mb-5 p-3">
                <div class="card-block">
                    <label>
                        <h5>Informasi profil</h5>
                    </label>
                    <?= $this->session->flashdata('password'); ?>
                    <form method="post" action="<?= base_url('user/updatepassword') ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Password lama</label>
                                    <input type="Password" class="form-control" name="pass_lama" required="">
                                    <?= form_error('pass_lama', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Password baru</label>
                                    <input type="Password" class="form-control" name="pass_baru" required="">
                                    <?= form_error('pass_baru', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Konfirmasi password baru</label>
                                    <input type="Password" class="form-control" name="pass_baru2" required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-teal waves-effect waves-light">Update Password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
</div>

<?php
include_once('template/footer_start.php');
include_once('template/footer_end.php')
?>