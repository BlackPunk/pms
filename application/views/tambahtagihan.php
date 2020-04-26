<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once("template/header_start.php");
?>
<link rel="stylesheet" href="<?= base_url('assets/plugins/select2/css/select2.min.css') ?>" type="text/css">
<?php
include_once("template/header_end.php");
include_once("template/topbar.php");
$error = $this->session->flashdata('error');
?>
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12 mb-2">
            <h4 class="text-muted">Tambah Tagihan baru</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="m-b-20">
                <a href="<?= base_url('tagihan') ?>"><button type="button" class="btn btn-teal waves-effect waves-light"><i class="fa fa-arrow-left"></i>&nbsp; Kembali ke daftar tagihan</button></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20 p-3">
                <div class="card-block">
                    <form method="post" action="<?php echo base_url('tagihan/baru'); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="patient" class="col-form-label text-muted">Pasien</label>
                                            <div class="input-group">
                                                <select class="form-control select" name="id_pasien" required="">
                                                    <option value=''>Pilih</option>
                                                    <?php foreach ($pasien as $row) { ?>
                                                        <option value="<?= $row['id_pasien'] ?>"><?= $row['nama_p'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <?php if ($error['id_pasien']) { ?> <span class="text-danger"><?php echo $error['id_pasien']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="payment_mode" class="col-form-label text-muted">Mode Pembayaran</label>
                                            <div class="input-group">
                                                <select class="form-control" name="mode_pembayaran" required="">
                                                    <option value="tunai">Tunai</option>
                                                    <option value="cc">Debit/Credit</option>
                                                </select>
                                            </div>
                                            <?php if ($error['mode_pembayaran']) { ?> <span class="text-danger"><?php echo $error['mode_pembayaran']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="payment_status" class="col-form-label text-muted">Status Pembayaran</label>
                                            <div class="input-group">
                                                <select class="form-control" name="status_pembayaran" required="">
                                                    <option value="Lunas">Lunas</option>
                                                    <option value="Belum lunas">Belum lunas</option>
                                                </select>
                                            </div>
                                            <?php if ($error['status_pembayaran']) { ?> <span class="text-danger"><?php echo $error['status_pembayaran']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-teal waves-effect waves-light" type="submit" name="create_invoice">Buat nota</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="detail_invoice" class="col-form-label text-muted">Detail invoice</label>
                                            <div id="format_invoice">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <input type="text" class="form-control" placeholder="Deskripsi" name="deskripsi_invoice[]" required="">
                                                        </div>
                                                        <?php if ($error['deskripsi_invoice']) { ?> <span class="text-danger"><?php echo $error['deskripsi_invoice']; ?></span> <?php } ?>
                                                        <div class="col-md-5">
                                                            <div class="input-group mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">Rp.</div>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="Jumlah" name="jumlah_invoice[]" required="">
                                                            </div>
                                                            <?php if ($error['jumlah_invoice']) { ?> <span class="text-danger"><?php echo $error['jumlah_invoice']; ?></span> <?php } ?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button type="button" class="fcbtn btn btn-outline btn-danger btn-1d btn-sm" data-toggle="tooltip" data-placement="right" title="Remove" onclick="hapus_detail(this)"><i class="fa fa-times"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="lahan_invoice_kosong"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-teal waves-effect waves-light" onclick="tambah_detail()"><i class="fa fa-plus"></i> &nbsp; Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- end Card-block -->
            </div>
        </div>
    </div><!-- End Row -->
</div>

<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>

<script type="text/javascript">
    var invoice_kosong = '';
    var jumlah_invoice = 1;

    $(document).ready(function() {
        $('.select').select2();

        invoice_kosong = $('#format_invoice').html();
        console.log(jumlah_invoice);
    });

    function tambah_detail() {

        jumlah_invoice = jumlah_invoice + 1;
        $('#lahan_invoice_kosong').append(invoice_kosong);
        console.log(jumlah_invoice);

    }

    function hapus_detail(n) {

        if (jumlah_invoice > 1) {
            n.parentNode.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode.parentNode);
        }
        if (jumlah_invoice != 1) {
            jumlah_invoice = jumlah_invoice - 1;
        }
        console.log(jumlah_invoice);

    }
</script>

<?php
include_once('template/footer_start.php');
include_once('template/footer_end.php')
?>