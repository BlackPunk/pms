<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once("template/header_start.php");
?>
<style>
    .user-bg {
        margin: -20px;
        height: 230px;
        overflow: hidden;
        position: relative;
    }

    .overlay-box {
        background: #8acaf7;
        opacity: .9;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 100%;
        text-align: center;
        padding: 110px;
    }

    .user-content {
        margin-top: -65px;
    }

    .user-btm-box {
        padding: 40px 0 10px;
        clear: both;
        overflow: hidden;
    }

    .basic-list {
        padding: 0;
    }

    .basic-list li {
        display: block;
        padding: 15px 0;
        border-bottom: 1px solid rgba(120, 130, 140, .13);
        line-height: 27px;
    }
</style>
<?php
include_once("template/header_end.php");
include_once("template/topbar.php");
?>

<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12 mb-2">
            <h4 class="text-muted">Profil pasien</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-9">
            <div class="m-b-20">
                <a href="<?= base_url('pasien') ?>"><button type="button" class="btn btn-teal waves-effect waves-light"><i class="fa fa-arrow-left"></i>&nbsp; Kembali ke daftar pasien</button></a>
            </div>
        </div>
        <?= $this->session->flashdata('pesan'); ?>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="card m-b-20 p-3">
                <div class="card-block">
                    <div class="user-bg">
                        <div class="overlay-box">
                            <div class="user-content">
                                <img class="thumb-lg img-circle" src="<?php echo base_url(); ?>assets/images/male_avatar.png">
                                <h5 class="text-white"><?= $pasien['nama_p'] ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="user-btm-box">
                        <ul class="basic-list">
                            <li>
                                <b class="title">Nama:</b> &nbsp;&nbsp;&nbsp;
                                <span class="text"><?= $pasien['nama_p'] ?></span>
                            </li>
                            <li>
                                <b class="title">Usia:</b> &nbsp;&nbsp;&nbsp;
                                <span class="text"><?= $pasien['usia'] ?></span>
                            </li>
                            <li>
                                <b class="title">Jenis kelamin:</b> &nbsp;&nbsp;&nbsp;
                                <span class="text"><?= $pasien['j_kelamin'] ?></span>
                            </li>
                            <li>
                                <b class="title">No. Hp:</b> &nbsp;&nbsp;&nbsp;
                                <span class="text"><?= $pasien['no_hp'] ?></span>
                            </li>
                            <li>
                                <b class="title">Alamat:</b> &nbsp;&nbsp;&nbsp;
                                <span class="text"><?= $pasien['alamat'] ?></span>
                            </li>
                        </ul>
                        <a href="<?= base_url('pasien/edit/') . $pasien['id_pasien'] ?>"><button type="button" class="btn btn-teal waves-effect waves-light"><i class="fa fa-pencil"></i>&nbsp; Edit</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card m-b-20">
                <div class="card-block">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#infomedis" role="tab" aria-expanded="false">Info Medis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#appointment" role="tab" aria-expanded="false">Daftar Appointment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#resep" role="tab" aria-expanded="false">Daftar Resep</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tagihan" role="tab" aria-expanded="true">Tagihan</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane p-3 active" id="infomedis" role="tabpanel" aria-expanded="false">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>Tinggi badan</td>
                                        <td><?= $pasien['tinggi'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Berat badan</td>
                                        <td><?= $pasien['berat'] ?> kg</td>
                                    </tr>
                                    <tr>
                                        <td>Golongan darah</td>
                                        <td><?= $pasien['gol_darah'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tekanan darah</td>
                                        <td><?= $pasien['tekanan_darah'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Detak jantung</td>
                                        <td><?= $pasien['detak_jantung'] ?> bpm</td>
                                    </tr>
                                    <tr>
                                        <td>Pernapasan</td>
                                        <td><?= $pasien['pernapasan'] ?> kali per menit</td>
                                    </tr>
                                    <tr>
                                        <td>Alergi</td>
                                        <td><?= $pasien['alergi'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Diet</td>
                                        <td><?= $pasien['diet'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane p-3" id="appointment" role="tabpanel" aria-expanded="false">
                            <?php if (count($appointment) > 0) { ?>
                                <table class="table table-bordered datatable-init">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($appointment as $info) { ?>

                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $info['tanggal']; ?></td>
                                                <td><?php echo $info['jam']; ?></td>
                                                <td><button type="button" class="btn btn-sm btn-outline-primary" data-href="<?= base_url('appointment/hapus/') . $info['id_appointment'] ?>" data-toggle="modal" data-target="#confirm-delete"><i class="far fa-trash"></i></button></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        } ?>

                                    </tbody>
                                </table>
                            <?php } else {
                                echo "<h6>Pasien ini tidak memiliki jadwal appointment</h6>";
                            } ?>
                        </div>

                        <div class="tab-pane p-3" id="resep" role="tabpanel" aria-expanded="false">
                            <?php if (count($resep) > 0) { ?>
                                <table class="table table-bordered  datatable-init">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($resep as $info) : ?>

                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $info['tanggal'] ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('resep/cetak/') .  $info['id_resep']; ?>"><button type="button" class="btn btn-1d btn-sm btn-outline-primary">Cetak resep</button></a>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" data-href="<?= base_url('resep/hapus/') . $info['id_resep'] ?>" data-toggle="modal" data-target="#confirm-delete"><i class="far fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
                                        endforeach; ?>

                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                        <div class="tab-pane p-3" id="tagihan" role="tabpanel" aria-expanded="true">
                            <?php if (count($tagihan) > 0) { ?>
                                <table class="table table-bordered  datatable-init">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($tagihan as $info) {
                                        ?>

                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($info['tanggal_invoice'])); ?></td>
                                                <td>
                                                    <?php
                                                    $amount = json_decode($info['jumlah_tagihan']);
                                                    echo array_sum($amount);
                                                    ?>

                                                </td>
                                                <td><?php echo $info['status_pembayaran']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('tagihan/cetak/') . $info['id_tagihan']; ?>"><button type="button" class="btn btn-1d btn-sm btn-outline-primary">Cetak Invoice</button></a>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" data-href="<?= base_url('tagihan/hapus/') . $info['id_tagihan'] ?>" data-toggle="modal" data-target="#confirm-delete"><i class="far fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            <?php } else {
                                echo "<h6>Pasien ini tidak memiliki tagihan</h6>";
                            } ?>
                        </div>
                    </div>
                </div><!-- Ends Card-Block-->
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Apakah Anda ingin melanjutkan?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once('template/footer_start.php');
include_once('template/footer_end.php')
?>