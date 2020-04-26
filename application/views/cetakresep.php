<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once("template/header_start.php");
include_once("template/header_end.php");
include_once("template/topbar.php");
?>
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12 mb-2">
            <h4 class="text-muted">Cetak Resep</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="m-b-20">
                <a href="<?= base_url('resep') ?>"><button type="button" class="btn btn-teal waves-effect waves-light"><i class="fa fa-arrow-left"></i>&nbsp; Kembali ke daftar resep</button></a>
                <button type="button" class="btn btn-teal waves-effect waves-light" onclick="cetak_resep()"><i class="fa fa-print"></i>&nbsp; Cetak resep</button>
            </div>
        </div>
    </div>
    <div class="cetak-resep">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20 p-3">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <h3>Resep obat</h3>
                                    </div>
                                    <div class="col-6 m-t-0 text-right">
                                        <h4><strong># <?php echo $resep['id_resep'] ?></strong></h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <h3 class="text-danger">Dr. <?php echo $user['nama'] ?></h3>
                                        <address>
                                            <p class="text-muted m-l-5">
                                                Dramaga cantik, Bogor<br>
                                                Email - <?php echo $user['email'] ?> <br>
                                                Phone - <?php echo $user['no_hp'] ?>
                                            </p>
                                        </address>
                                    </div>
                                    <div class="col-6 text-right">
                                        <h3>Kepada,</h3>
                                        <h5><?php echo $resep['nama_p']; ?></h5>
                                        <p class="text-muted m-l-30"><strong>Alamat</strong> : <?php echo $resep['alamat']; ?></p>
                                        <p class="text-muted"><strong>No. Hp</strong> : <?php echo $resep['no_hp']; ?></p>
                                        <p class="m-t-20"><b> Tanggal :</b> &nbsp; <?php echo date('d-m-Y'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Gejala</h5>
                                <p><?php echo $resep['gejala'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Diagnosa</h5>
                                <p><?php echo $resep['diagnosa'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Obat</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama obat</th>
                                                <th>Catatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $obat = json_decode($resep['obat']);
                                            $catatan = json_decode($resep['catatan_obat']);
                                            for ($i = 0; $i < count($obat); $i++) { ?>

                                                <tr>
                                                    <td><?php echo $i + 1; ?></td>
                                                    <td><?php echo $obat[$i]; ?></td>
                                                    <td><?php echo $catatan[$i]; ?></td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end row -->
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- end div-print -->
</div>

<?php
include_once('template/footer_start.php');
?>
<script type="text/javascript" src="<?= base_url('assets/plugins/printthis/printThis.js') ?>"></script>
<script>
    $(document).ready(function() {
        cetak_resep();
    });

    function cetak_resep() {
        $('.cetak-resep').printThis();
    }
</script>
<?php
include_once('template/footer_end.php')
?>