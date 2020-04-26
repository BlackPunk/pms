<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once("template/header_start.php");
include_once("template/header_end.php");
include_once("template/topbar.php");
?>
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12 mb-2">
            <h4 class="text-muted">Cetak tagihan</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="m-b-20">
                <a href="<?= base_url('tagihan') ?>"><button type="button" class="btn btn-teal waves-effect waves-light"><i class="fa fa-arrow-left"></i>&nbsp; Kembali ke daftar tagihan</button></a>
                <button type="button" class="btn btn-teal waves-effect waves-light" onclick="cetak_invoice()"><i class="fa fa-print"></i>&nbsp; Cetak tagihan</button>
            </div>
        </div>
    </div>
    <div class="cetak-invoice">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20 p-3">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <h3>Invoice</h3>
                                    </div>
                                    <div class="col-6 m-t-0 text-right">
                                        <h4><strong># <?php echo $tagihan['id_tagihan'] ?></strong></h4>
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
                                        <h5><?php echo $tagihan['nama_p']; ?></h5>
                                        <p class="text-muted m-l-30"><strong>Alamat</strong> : <?php echo $tagihan['alamat']; ?></p>
                                        <p class="text-muted"><strong>No. Hp</strong> : <?php echo $tagihan['no_hp']; ?></p>
                                        <p class="m-t-20"><b> Tanggal :</b> &nbsp; <?php echo date('d-m-Y'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="">
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <td><strong>No</strong></td>
                                                        <td class="text-center"><strong>Deskripsi</strong></td>
                                                        <td class="text-center"><strong>Biaya</strong></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $desk = json_decode($tagihan['deskripsi_tagihan']);
                                                    $biaya = json_decode($tagihan['jumlah_tagihan']);
                                                    $total = 0;
                                                    for ($i = 0; $i < count($desk); $i++) {
                                                    ?>

                                                        <tr>
                                                            <td><?php echo $i + 1; ?></td>
                                                            <td class="text-center"><?php echo $desk[$i]; ?></td>
                                                            <td class="text-center">
                                                                <?php
                                                                echo "Rp. " . $biaya[$i];
                                                                $total += $biaya[$i]
                                                                ?>

                                                            </td>
                                                        </tr>
                                                    <?php } ?>

                                                    <tr>
                                                        <td class="no-line"></td>
                                                        <td class="no-line text-right">
                                                            <strong>Total</strong></td>
                                                        <td class="no-line text-center">
                                                            <h4 class="m-0"><?php echo "Rp. " . $total; ?></h4>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
        cetak_invoice();
    });

    function cetak_invoice() {
        $('.cetak-invoice').printThis();
    }
</script>
<?php
include_once('template/footer_end.php')
?>