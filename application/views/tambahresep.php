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
            <h4 class="text-muted">Tambah Resep baru</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="m-b-20">
                <a href="<?= base_url('resep') ?>"><button type="button" class="btn btn-teal waves-effect waves-light"><i class="fa fa-arrow-left"></i>&nbsp; Kembali ke daftar resep</button></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-block m-3">
                    <form method="post" action="<?php echo base_url('resep/tambah'); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="pasien" class="col-form-label text-muted">Pasien</label>
                                            <div class="input-group">
                                                <select class="form-control select" name="id_pasien" required="">
                                                    <option value=''>Pilih</option>
                                                    <?php foreach ($pasien as $row) { ?>
                                                        <option value="<?= $row['id_pasien'] ?>"><?= $row['nama_p'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <?php if ($error['patient_id']) { ?> <span class="text-danger"><?php echo $error['patient_id']; ?></span> <?php } ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="gejala" class="col-form-label text-muted">Gejala</label>
                                            <div class="input-group">
                                                <textarea class="form-control" name="gejala" placeholder="Tambah gejala" rows="3" required=""></textarea>
                                            </div>
                                            <?php if ($error['gejala']) { ?> <span class="text-danger"><?php echo $error['gejala']; ?></span> <?php } ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="diagnosa" class="col-form-label text-muted">Diagnosa</label>
                                            <div class="input-group">
                                                <textarea class="form-control" name="diagnosa" placeholder="Tambah diagnosa" rows="3" required=""></textarea>
                                            </div>
                                            <?php if ($error['diagnosa']) { ?> <span class="text-danger"><?php echo $error['diagnosa']; ?></span> <?php } ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-teal waves-effect waves-light" type="submit" name="simpan_resep"><i class="fa fa-save"></i> &nbsp; Simpan Resep</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="medis" class="col-form-label text-muted">Obat</label>
                                            <div id="format_medis">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <input type="text" class="form-control" placeholder="Nama Obat" name="nama_obat[]" required="">
                                                            <?php if ($error['nama_obat']) { ?> <span class="text-danger"><?php echo $error['nama_obat']; ?></span> <?php } ?>

                                                        </div>
                                                        <div class="col-md-5">
                                                            <input type="text" class="form-control" placeholder="Catatan" name="catatan_obat[]" required="">
                                                            <?php if ($error['catatan_obat']) { ?> <span class="text-danger"><?php echo $error['catatan_obat']; ?></span> <?php } ?>

                                                        </div>
                                                        <div class="col-md-2">
                                                            <button type="button" class="fcbtn btn btn-outline btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Remove" onclick="hapus_format(this, 'medis')"><i class="fa fa-times"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="lahan_medis_kosong"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-teal waves-effect waves-light" onclick="tambah_format_kosong('medis')"><i class="fa fa-plus"></i> &nbsp; Tambah obat</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- Ends Row -->
</div>

<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>

<script type="text/javascript">
    var blank_format_medis = '';
    var jumlah_obat = 1;

    $(document).ready(function() {

        $('.select').select2();

        blank_format_medis = $('#format_medis').html();
        console.log(jumlah_obat);

    });

    function tambah_format_kosong(selector) {
        if (selector == 'medis') {
            jumlah_obat = jumlah_obat + 1;
            $('#lahan_medis_kosong').append(blank_format_medis);
            console.log(jumlah_obat);
        }
    }

    function hapus_format(n, selector) {
        if (selector == 'medis') {
            if (jumlah_obat > 1) {
                n.parentNode.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode.parentNode);
            }
            if (jumlah_obat != 1) {
                jumlah_obat = jumlah_obat - 1;
            }
            console.log(jumlah_obat);
        }
    }
</script>

<?php
include_once('template/footer_start.php');
include_once('template/footer_end.php')
?>