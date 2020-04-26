<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once("template/header_start.php");
include_once("template/header_end.php");
include_once("template/topbar.php");
$error = $this->session->flashdata('error');
?>

<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12 mb-2">
            <h4 class="text-muted">Edit Informasi Pasien</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="m-b-20">
                <a href="<?= base_url('pasien/profil/') . $pasien['id_pasien'] ?>"><button type="button" class="btn btn-teal waves-effect waves-light"><i class="fa fa-arrow-left"></i>&nbsp; Kembali ke daftar pasien</button></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-block m-3">
                    <blockquote>Informasi Umum</blockquote>
                    <form method="post" action="<?= base_url('pasien/edit/') . $pasien['id_pasien'] ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Masukkan nama pasien" required="" value="<?= $pasien['nama_p'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Usia</label>
                                    <input type="text" class="form-control" placeholder="Masukkan usia pasien" name="usia" required="" value="<?= $pasien['usia'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" required="">
                                        <option>--Pilih Jenis kelamin--</option>
                                        <option value="Laki-laki" <?php if ($pasien['j_kelamin'] == 'Laki-laki') echo 'selected' ?>>Laki-laki</option>
                                        <option value="Perempuan" <?php if ($pasien['j_kelamin'] == 'Perempuan') echo 'selected' ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor Hp</label>
                                    <input type="text" class="form-control" name="phone" placeholder="08123123123" required="" value="<?= $pasien['no_hp'] ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" rows="3" class="form-control" placeholder="Masukkan alamat saat ini" required=""><?= $pasien['alamat'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <blockquote>Informasi Medis</blockquote>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tinggi badan</label>
                                    <input type="text" class="form-control" name="tinggi" placeholder="Masukkan tinggi badan" pattern="[0-9\']{1,3}" title="Tinggi badan tidak valid (3 digit on;y)" required="" value="170">
                                    <?php if ($error['tinggi']) { ?> <span class="text-danger"><?php echo $error['tinggi']; ?></span> <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Berat badan</label>
                                    <input type="text" class="form-control" name="berat" placeholder="Masukkan berat badan" value="<?= $pasien['berat'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Golongan Darah</label>
                                    <select class="form-control" name="gol_darah" required="">
                                        <option>-- Pilih Golongan Darah --</option>
                                        <option value="A+" <?php if ($pasien['gol_darah'] == 'A+') echo 'selected' ?>>A+</option>
                                        <option value="A-" <?php if ($pasien['gol_darah'] == 'A-') echo 'selected' ?>>A-</option>
                                        <option value="B+" <?php if ($pasien['gol_darah'] == 'B+') echo 'selected' ?>>B+</option>
                                        <option value="B-" <?php if ($pasien['gol_darah'] == 'B-') echo 'selected' ?>>B-</option>
                                        <option value="O+" <?php if ($pasien['gol_darah'] == 'O+') echo 'selected' ?>>O+</option>
                                        <option value="O-" <?php if ($pasien['gol_darah'] == 'O-') echo 'selected' ?>>O-</option>
                                        <option value="AB+" <?php if ($pasien['gol_darah'] == 'AB+') echo 'selected' ?>>AB+</option>
                                        <option value="AB-" <?php if ($pasien['gol_darah'] == 'AB-') echo 'selected' ?>>AB-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tekanan darah</label>
                                    <input type="text" class="form-control" name="tekanan_darah" placeholder="Masukkan Tekanan darah" required="" value="<?= $pasien['tekanan_darah'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Detak jantung</label>
                                    <input type="text" class="form-control" name="detak_jantung" placeholder="Masukkan Detak jantung per menit" required="" value="<?= $pasien['detak_jantung'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tingkat pernapasan</label>
                                    <input type="text" class="form-control" name="pernapasan" placeholder="Masukkan tingkat pernapasan per menit" required="" value="<?= $pasien['pernapasan'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Alergi</label>
                                    <input type="text" class="form-control" name="alergi" placeholder="Masukkan gejala alergi" value="<?= $pasien['alergi'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Diet</label>
                                    <input type="text" class="form-control" name="diet" placeholder="Enter diet" value="<?= $pasien['diet'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-teal waves-effect waves-light">Simpan informasi pasien</button>
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