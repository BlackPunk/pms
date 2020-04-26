<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once("template/header_start.php");
include_once("template/header_end.php");
include_once("template/topbar.php");
?>

<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12 mb-2">
            <h4 class="text-muted">Tambah pasien baru</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="m-b-20">
                <a href="<?= base_url('pasien') ?>"><button type="button" class="btn btn-teal waves-effect waves-light"><i class="fa fa-arrow-left"></i>&nbsp; Kembali ke daftar pasien</button></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-block m-3">
                    <blockquote>Informasi Umum</blockquote>
                    <form method="post" action="<?= base_url('pasien/baru') ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Masukkan nama pasien" value="<?= set_value('nama') ?>" required="">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Usia</label>
                                    <input type="text" class="form-control" placeholder="Masukkan usia pasien" name="usia" value="<?= set_value('usia') ?>" required="">
                                    <?= form_error('usia', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" required="">
                                        <option value="">--Pilih Jenis kelamin--</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor Hp</label>
                                    <input type="text" class="form-control" name="phone" placeholder="08123123123" required="" value="<?= set_value('phone') ?>">
                                    <?= form_error('phone', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" rows="3" class="form-control" placeholder="Masukkan alamat saat ini" required=""><?= set_value('alamat') ?></textarea>
                                    <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                        <blockquote>Informasi Medis</blockquote>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tinggi badan</label>
                                    <input type="text" class="form-control" name="tinggi" placeholder="Masukkan tinggi badan" required="" value="<?= set_value('tinggi') ?>">
                                    <?= form_error('tinggi', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Berat badan</label>
                                    <input type="text" class="form-control" name="berat" placeholder="Masukkan berat badan" required="" value="<?= set_value('berat') ?>">
                                    <?= form_error('berat', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Golongan Darah</label>
                                    <select class="form-control" name="gol_darah" required="">
                                        <option value="">-- Pilih Golongan Darah --</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                    <?= form_error('gol_darah', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tekanan darah</label>
                                    <input type="text" class="form-control" name="tekanan_darah" placeholder="Masukkan Tekanan darah" required="" value="<?= set_value('tekanan_darah') ?>">
                                    <?= form_error('tekanan_darah', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Detak jantung</label>
                                    <input type="text" class="form-control" name="detak_jantung" placeholder="Masukkan Detak jantung per menit" required="" value="<?= set_value('detak_jantung') ?>">
                                    <?= form_error('detak_jantung', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tingkat pernapasan</label>
                                    <input type="text" class="form-control" name="pernapasan" placeholder="Masukkan tingkat pernapasan per menit" required="" value="<?= set_value('pernapasan') ?>">
                                    <?= form_error('pernapasan', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Alergi</label>
                                    <input type="text" class="form-control" name="alergi" placeholder="Masukkan gejala alergi" value="<?= set_value('alergi') ?>">
                                    <?= form_error('alergi', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Diet</label>
                                    <input type="text" class="form-control" name="diet" placeholder="Enter diet" value="<?= set_value('diet') ?>">
                                    <?= form_error('diet', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-teal waves-effect waves-light">Tambah pasien baru</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- Ends Row -->
</div>

<?php
include_once('template/footer_start.php');
include_once('template/footer_end.php')
?>